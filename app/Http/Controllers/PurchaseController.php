<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('purchases.index', compact('products'));
    }

    /**
     * Creating a new resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $user = request()->user();

        if ($user->purchases()
            ->where('product_id', $product->id)
            ->whereNull('invoice_id')
            ->exists()
        ) {
            return back()->with('error', 'You can not buy this product again');
        }

        $purchase = new Purchase([
            'product_name' => $product->name,
            'product_description' => $product->description,
            'product_sub_total' => $product->price - (($product->price * $product->vat) / 100),
            'product_total' => $product->price,
            'product_price_vat' => ($product->price * $product->vat) / 100,
            'product_vat' => $product->vat,
            'product_currency_symbol' => $product->currency_symbol
        ]);

        $purchase->user()->associate($user);
        $purchase->product()->associate($product);
        $purchase->save();

        return back()->with('successful', 'Product successfully purchased');
    }
}
