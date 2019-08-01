<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Events\LeadGenerated;

class LeadController extends Controller
{
    public function NewLead(Request $request)
    {
        $product_id = $request->input('product_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $telephone = $request->input('telephone');

        $product = Product::findOrFail($product_id);

        event(new LeadGenerated($product, $first_name, $last_name, $email, $telephone));

        if ($request->wantsJson()) {
            return ['message'=>'success'];
        }
    }
}
