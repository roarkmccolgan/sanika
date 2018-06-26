<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Category;
use App\Features;
use App\News;
use App\Product;
use App\Specs;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataBaseController extends Controller
{
	public function productfrompdf(Request $request){
		Log::info('Submitted Data : '.print_r($request->all(), true));
		$error = false;
		$message = '';
		if (!$request->has(['name'])) {
			$error = true;
			$message = 'ERROR!: Name is required';
		}
		$attachProducts = [];

		if($request->has('pack') && count($request->input('pack'))>0){
			foreach ($request->input('pack') as $pack) {
				$packItem = Product::where('sku',$pack['sku'])->first();
				if($packItem){
					$attachProducts[$packItem->id] =  ['qty' => $pack['qty']];
				}else{
					$error = true;
					$message = 'ERROR!:\n Pack Item not found\n Please add '.$pack['sku'];
					break;
				}
			}
		}

		Log::info('Attach : '.print_r($attachProducts, true));

		if(!$error){

			$categories =[];
			foreach ($request->input('categories') as $cat) {
				if(isset($cat['category'])){
					$category = Category::firstOrCreate(
						['alias' => str_slug($cat['category'])],
						['name' => $cat['category']]
					);
					$categories[] = $category->id;
					if(isset($cat['sub-category'])){
						$subCategory = Category::firstOrCreate(
							['alias' => str_slug($cat['sub-category']), 'parent_id'=>$category->id],
							['name' => $cat['sub-category']]
						);
						$categories[] = $subCategory->id;
						if(isset($cat['sub-sub-category'])){
							$subSubCategory = Category::firstOrCreate(
								['alias' => str_slug($cat['sub-sub-category']), 'parent_id'=>$subCategory->id],
								['name' => $cat['sub-sub-category']]
							);
							$categories[] = $subSubCategory->id;
						}
					}
				}
			}
			$insightly = false;
			if($request->has('insightly')){
				$insightly = [];
				//{"CUSTOMFIELDS": [{"FIELD_VALUE": "false", "CUSTOM_FIELD_ID": "LEAD_FIELD_6"}], "OWNER_USER_ID": 913412, "LEAD_SOURCE_ID": 294699}'
				$insightly['OWNER_USER_ID'] = $request->input('insightly.OWNER_USER_ID');
				$insightly['LEAD_SOURCE_ID'] = $request->input('insightly.LEAD_SOURCE_ID');
				if($request->input('insightly.CUSTOMFIELDS')){
					foreach ($request->input('insightly.CUSTOMFIELDS') as $key=>$value) {
						$insightly['CUSTOMFIELDS'][$key]['CUSTOM_FIELD_ID'] = 'LEAD_FIELD_'.$value;
						$insightly['CUSTOMFIELDS'][$key]['FIELD_VALUE'] = true;
					}
				}
			}
			Log::info($insightly);

			$product = Product::updateOrCreate(
				['alias' => str_slug($request->input('name'))],
				[
					'name' => $request->input('name'),
					'alias' => str_slug($request->input('name')),
					'strapline' => $request->has('strapline') ? $request->input('strapline') : null,
					'description' => $request->has('description') ? Markdown::convertToHtml($request->input('description')) : null,
					'how_it_works' => $request->has('how_it_works') ? Markdown::convertToHtml($request->input('how_it_works')) : null, 
					'application' => $request->has('application') ? Markdown::convertToHtml($request->input('application')) : null,
					'uses_intro' => $request->has('uses_intro') ? $request->input('uses_intro') : null,
					'uses' => $request->has('uses') ? $request->input('uses') : null,
					'insightly' => $insightly ? $insightly : null,
					'seo_title' => ($request->has('seo') && $request->has('seo.title')) ? $request->input('seo.title') : null,
					'seo_keywords' => ($request->has('seo') && $request->has('seo.keywords')) ? $request->input('seo.keywords') : null,
					'seo_description' => ($request->has('seo') && $request->has('seo.description')) ? $request->input('seo.description') : null,
				]
			);
			if(count($categories)>0){
				$product->categories()->sync($categories);
			}
			if(count($attachProducts)>0){
				$product->products()->sync($attachProducts);
			}
			//start media stuff
			if($request->has('image')) {
				$image = str_replace("dl=0","raw=1",$request->input('image'));
				$parts = parse_url($image); 
				$slug_name = str_replace(['%20','?raw=1'],['-',''],basename($parts['path']));
				Log::info($slug_name);
				$file_name = str_replace(['%20','-','_','.jpg','.JPG','.JPEG','.png','.png'],[' ',' ',' ','','','','',''],basename($parts['path']));
				Log::info($file_name);
				$product->addMediaFromUrl($image)->usingFileName($slug_name)->usingName($file_name)->toMediaCollection('title');
			}
			if($request->has('content')) {
				$product->clearMediaCollection('content');				
				foreach ($request->input('content') as $content) {
					$content = str_replace("dl=0","raw=1",$content);
					$parts = parse_url($content); 
					$slug_name = str_replace(['%20','?raw=1'],['-',''],basename($parts['path']));
					Log::info($slug_name);
					$file_name = str_replace(['%20','-','_','.jpg','.JPG','.JPEG','.png','.png'],[' ',' ',' ','','','','',''],basename($parts['path']));
					Log::info($file_name);
					$product->addMediaFromUrl($content)->usingFileName($slug_name)->usingName($file_name)->toMediaCollection('content');
				}
				$mediaItems = $product->getMedia('content');
				$replaceImages = [];
				$replaceURLS = [];
				foreach ($mediaItems as $key => $item) {
					$replaceImages[]='img_'.$key;
					$replaceURLS[]='!['.$item->name.']('.$item->getUrl().' "'.$item->name.'")';

					$replaceImages[]='img_'.$key;
					$replaceURLS[]='!['.$item->name.']('.$item->getUrl().' "'.$item->name.'")';
				}
				if($request->has('description')){
					$newDescription = str_replace($replaceImages, $replaceURLS, $request->input('description'));
					$product->description = Markdown::convertToHtml($newDescription);
				}
				if($request->has('how_it_works')){
					$newHowItWorks = str_replace($replaceImages, $replaceURLS, $request->input('how_it_works'));
					$product->how_it_works = Markdown::convertToHtml($newHowItWorks);
				}				
				$product->save();
			}
			if($request->has('gallery')) {
				$product->clearMediaCollection('gallery');
				foreach ($request->input('gallery') as $gallery) {
					$gallery = str_replace("dl=0","raw=1",$gallery);
					$parts = parse_url($gallery); 
					$slug_name = str_replace(['%20','?raw=1'],['-',''],basename($parts['path']));
					Log::info($slug_name);
					$file_name = str_replace(['%20','-','_','.jpg','.JPG','.JPEG','.png','.png'],[' ',' ',' ','','','','',''],basename($parts['path']));
					Log::info($file_name);
					$product->addMediaFromUrl($gallery)->usingFileName($slug_name)->usingName($file_name)->toMediaCollection('gallery');
				}
			}
			if($request->has('applications')) {
				$product->clearMediaCollection('applications');
				foreach ($request->input('applications') as $applications) {
					$applications = str_replace("dl=0","raw=1",$applications);
					$parts = parse_url($applications); 
					$slug_name = str_replace(['%20','?raw=1'],['-',''],basename($parts['path']));
					Log::info($slug_name);
					$file_name = str_replace(['%20','-','_','.jpg','.JPG','.JPEG','.png','.png'],[' ',' ',' ','','','','',''],basename($parts['path']));
					Log::info($file_name);
					$product->addMediaFromUrl($applications)->usingFileName($slug_name)->usingName($file_name)->toMediaCollection('applications');
				}
			}
			if($request->has('technical')) {
				$product->clearMediaCollection('technical');
				foreach ($request->input('technical') as $technical) {
					$technical = str_replace("dl=0","raw=1",$technical);
					$parts = parse_url($technical); 
					$slug_name = str_replace(['%20','?raw=1'],['-',''],basename($parts['path']));
					Log::info($slug_name);
					$file_name = str_replace(['%20','-','_','.jpg','.JPG','.JPEG','.png','.png'],[' ',' ',' ','','','','',''],basename($parts['path']));
					Log::info($file_name);
					$product->addMediaFromUrl($technical)->usingFileName($slug_name)->usingName($file_name)->toMediaCollection('technical');
				}
			}
			//end media stuff
			if($request->has('features')) {
				$product->features()->delete();
				foreach ($request->input('features') as $feature) {
					Features::create(['name'=>$feature,'product_id'=>$product->id]);
				}
			}
			if($request->has('spec') && count($request->input('spec'))>0) {
				$product->specs()->delete();
				foreach ($request->input('spec') as $spec) {
					Specs::create(['spec'=>$spec['spec'], 'value'=>$spec['value'],'product_id'=>$product->id]);
				}
			}
			$message = 'Success!\n'.$product->name.' Successfully Saved';
		}
		$response = "%FDF-1.2\r\n" .
		"1 0 obj<< /FDF << /Status ($message) >>      >>endobj\r\n" .
		"trailer\r\n" .
		"<< /Root 1 0 R >>%%EOF";
		return response($response)->header('Content-Type', 'application/vnd.fdf');
	}

	public function categoryfrompdf(Request $request){
		Log::info('Submitted Data : '.print_r($request->all(), true));
		$error = false;
		$message = '';
		if (!$request->has(['categories', 'description'])) {
			$error = true;
			$message = 'ERROR!: Category and Description are required';
		}

		$categories =[];
		$categoryToEdit = false;
		foreach ($request->input('categories') as $cat) {
			if(isset($cat['category'])){
				$category = Category::firstOrCreate(
					['alias' => str_slug($cat['category'])],
					['name' => $cat['category']]
				);
				$categoryToEdit = $category;
				$categories[] = $category->id;
				if(isset($cat['sub-category'])){
					$subCategory = Category::firstOrCreate(
						['alias' => str_slug($cat['sub-category']), 'parent_id'=>$category->id],
						['name' => $cat['sub-category']]
					);
					$categoryToEdit = $subCategory;
					$categories[] = $subCategory->id;
					if(isset($cat['sub-sub-category'])){
						$subSubCategory = Category::firstOrCreate(
							['alias' => str_slug($cat['sub-sub-category']), 'parent_id'=>$subCategory->id],
							['name' => $cat['sub-sub-category']]
						);
						$categoryToEdit = $subSubCategory;
						$categories[] = $subSubCategory->id;
					}
				}
			}
		}

		if(!$error){
			$categoryToEdit->description = Markdown::convertToHtml($request->input('description'));
			$categoryToEdit->seo_title = $request->input('seo.title');
			$categoryToEdit->seo_description = $request->input('seo.description');
			$categoryToEdit->seo_keywords = $request->input('seo.keywords');
			$categoryToEdit->save();

			if($request->has('image')) {
				$image = str_replace("dl=0","raw=1",$request->input('image'));
				$categoryToEdit->addMediaFromUrl($image)->toMediaCollection('title');
			}

			$message = 'Success!\n'.$category->name.' Successfully Saved';
		}
		$response = "%FDF-1.2\r\n" .
		"1 0 obj<< /FDF << /Status ($message) >>      >>endobj\r\n" .
		"trailer\r\n" .
		"<< /Root 1 0 R >>%%EOF";
		return response($response)->header('Content-Type', 'application/vnd.fdf');
	}

	public function casestudyfrompdf(Request $request){
		Log::info('Submitted Data : '.print_r($request->all(), true));
		$error = false;
		$message = '';
		if (!$request->has(['client']) || !$request->has(['site']) || !$request->has(['scope']) || !$request->has(['background']) || !$request->has(['solution']) || !$request->has(['category'])) {
			$error = true;
			$message = 'ERROR!: Client, Site, Scope, background, solution and Category is required';
		}
		$attachProducts = [];
		$products = [];

		if($request->has('product') && count($request->input('product'))>0){
			foreach ($request->input('product') as $product) {
				$productItem = Product::where('alias',str_slug($product))->first();
				if($productItem){
					$attachProducts[] = $productItem->id;
				}else{
					$products[] = $product;
				}
			}
		}

		Log::info('Attach : '.print_r($attachProducts, true));
		Log::info('Unlisted Products : '.print_r($products, true));
		$category = Category::where('alias',str_slug($request->input('category')))->first();
		if(!$category){
			$error = true;
			$message = 'ERROR!: Category '.$request->input('category').' not found';
		}
		if(!$error){
			$casestudy = CaseStudy::updateOrCreate(
				['alias' => str_slug($request->input('client').' '.$request->input('place'))],
				[
					'title' => $request->input('client').' '.$request->input('place'),
					'category_id' => $category->id,
					'alias' => str_slug($request->input('client').' '.$request->input('place')),
					'client' => $request->has('client') ? $request->input('client') : null,
					'site' => $request->has('place') ? $request->input('place') : null,
					'scope' => $request->has('scope') ? $request->input('scope') : null, 
					'background' => $request->has('background') ? Markdown::convertToHtml($request->input('background')) : null,
					'solution' => $request->has('solution') ? Markdown::convertToHtml($request->input('solution')) : null,
					'products' => count($products)? $products : null,
					'seo_title' => ($request->has('seo') && $request->has('seo.title')) ? $request->input('seo.title') : null,
					'seo_keywords' => ($request->has('seo') && $request->has('seo.keywords')) ? $request->input('seo.keywords') : null,
					'seo_description' => ($request->has('seo') && $request->has('seo.description')) ? $request->input('seo.description') : null,
				]
			);

			if(count($attachProducts)>0){
				$casestudy->siteproducts()->sync($attachProducts);
			}
			if($request->has('image')) {
				$image = str_replace("dl=0","raw=1",$request->input('image'));
				$product->addMediaFromUrl($image)->toMediaCollection('title');
			}

			$message = 'Success!\n'.$request->input('client').' '.$request->input('place').' Successfully Saved';
		}
		$response = "%FDF-1.2\r\n" .
		"1 0 obj<< /FDF << /Status ($message) >>      >>endobj\r\n" .
		"trailer\r\n" .
		"<< /Root 1 0 R >>%%EOF";
		return response($response)->header('Content-Type', 'application/vnd.fdf');
	}
	public function newsfrompdf(Request $request){
		Log::info('Submitted Data : '.print_r($request->all(), true));
		$error = false;
		$message = '';
		if (!$request->has(['title']) || !$request->has(['article']) || !$request->has(['category'])) {
			$error = true;
			$message = 'ERROR!: Title, article and Category is required';
		}
		$attachProducts = [];
		$products = [];

		if($request->has('product') && count($request->input('product'))>0){
			foreach ($request->input('product') as $product) {
				$productItem = Product::where('alias',str_slug($product))->first();
				if($productItem){
					$attachProducts[] = $productItem->id;
				}else{
					$products[] = $product;
				}
			}
		}

		Log::info('Attach : '.print_r($attachProducts, true));
		Log::info('Unlisted Products : '.print_r($products, true));
		$category = Category::where('alias',str_slug($request->input('category')))->first();
		if(!$category){
			$error = true;
			$message = 'ERROR!: Category '.$request->input('category').' not found';
		}
		if(!$error){
			$news = News::updateOrCreate(
				['alias' => str_slug($request->input('title'))],
				[
					'title' => $request->input('title'),
					'sub_title' => $request->input('sub-title'),
					'category_id' => $category->id,
					'alias' => str_slug($request->input('title')),
					'publish' => $request->has('publish') ? Carbon::parse($request->input('publish')) : Carbon::now(),
					'active' => $request->input('active'),
					'products' => count($products)? $products : null,
					'article' => $request->has('article') ? Markdown::convertToHtml($request->input('article')) : null,
					'seo_title' => ($request->has('seo') && $request->has('seo.title')) ? $request->input('seo.title') : null,
					'seo_keywords' => ($request->has('seo') && $request->has('seo.keywords')) ? $request->input('seo.keywords') : null,
					'seo_description' => ($request->has('seo') && $request->has('seo.description')) ? $request->input('seo.description') : null,
				]
			);

			if(count($attachProducts)>0){
				$news->siteproducts()->sync($attachProducts);
			}

			$message = 'Success!\n'.$request->input('title').' Successfully Saved';
		}
		$response = "%FDF-1.2\r\n" .
		"1 0 obj<< /FDF << /Status ($message) >>      >>endobj\r\n" .
		"trailer\r\n" .
		"<< /Root 1 0 R >>%%EOF";
		return response($response)->header('Content-Type', 'application/vnd.fdf');
	}
}
