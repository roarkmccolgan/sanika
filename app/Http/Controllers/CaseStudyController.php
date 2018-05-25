<?php

namespace App\Http\Controllers;

use App\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function getCaseStudy(Request $request, $tree = null){
        if($tree){
            $path = explode('/', $tree);
            $last = last($path);
            $casestudy = CaseStudy::with('category')->where('alias',$last)->firstOrFail();
            return view('casestudy',compact(['casestudy']));
        }
        $casestudies = CaseStudy::with('category')->get();
        return view('casestudies',compact(['casestudies']));
    }
    public function getCaseStudies(Request $request, $tree = null){
        $casestudies = CaseStudy::with('category')->get();
        return view('casestudies',compact(['casestudies']));
    }
}
