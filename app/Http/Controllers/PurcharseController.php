<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider;
use App\Http\Requests\Purcharse\StoreRequest;
use App\Http\Requests\Purcharse\UpdateRequest ;

class PurcharseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provider = Provider::get();
        return view('admin.purchase.create', compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all());
        foreach ($request-> product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantify[$key], "price"=>$request->price[$key]);
        }
        
        $purchase->shoppingDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return view('admin.purchase.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.Purchase.show', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Purchase $purcharse)
    {
        // $purcharse->update($request->all());
        // return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchase.index');
    }
}
