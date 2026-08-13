<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->show(request('q'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Order  $order
     * @return Response
     */
    public function show($query)
    {
        $products = $query ? Product::search($query)->take(30)->get() : collect();

        return view('search', compact('products', 'query'));
    }
}
