<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		return $this->show(request('q'));
	}
	/**
	* Display the specified resource.
	*
	* @param  \App\Order  $order
	* @return \Illuminate\Http\Response
	*/
	public function show($query)
	{
		return view('search',compact('query'));
	}
}
