<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Category;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function getCaseStudy(Request $request, $theCategory, $theCaseStudy){
        $casestudy = CaseStudy::where('alias',$theCaseStudy)->with('category')->get();
        return view('casestudy',compact(['casestudy']));
    }
    
    public function getCaseStudies(Request $request, $theCategory = null){
        if($theCategory){
            $category = Category::with(['casestudies'])->where('alias',$theCategory)->firstOrFail();
            $casestudies = $category->casestudies;
        }else{
            $casestudies = CaseStudy::with('category')->latest()->orderBy('category_id')->get();
        }
        
        
        return view('casestudies',compact(['casestudies']));
    }
}
