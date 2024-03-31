<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest ;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Client::create($request->all());
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $Client)
    {
        return view('admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $Client)
    {
        return view('admin.client.show', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Client $Client)
    {
        $Client->update($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $Client)
    {
        $Client->delete();
        return redirect()->route('clients.index');
    }
}
