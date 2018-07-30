<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use App\Category;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function getCaseStudy(Request $request, $theCategory, $theCaseStudy){
        $casestudy = CaseStudy::where('alias',$theCaseStudy)->with('category')->firstOrfail();
        return view('casestudy',compact(['casestudy']));
    }
    
    public function getCaseStudies(Request $request, $theCategory = null){
        $rootCategory = null;
        if($theCategory){
            $rootCategory = Category::with(
                [
                    'casestudies' => function($query){
                        $query->orderBy('created_at', 'desc');
                    }
                ])->where('alias',$theCategory)->firstOrFail();
            $casestudies = collect($rootCategory->casestudies)->groupBy('category.name');
        }else{
            $casestudies = CaseStudy::with('category')->latest()->orderBy('category_id')->get();
            $casestudies = collect($casestudies)->groupBy('category.name');
        }
        
        
        return view('casestudies',compact(['casestudies','rootCategory']));
    }
}
