<?php

namespace App\Http\Controllers;

use App\Model\LedgerProduct;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;

class LedgerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ledgerProduct = LedgerProduct::all();
        $ledgerProduct->map(function ($item) {
            $item->product = Product::find($item->product);
            $item->user = User::find($item->user);
            $item->approved_storehouse = User::find($item->approved_storehouse);
            $item->approved_admin = User::find($item->approved_admin);

            return $item;
        });

        $data = [
            'ledgerProduct' => $ledgerProduct
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\LedgerProduct $ledgerProduct
     * @return \Illuminate\Http\Response
     */
    public function show(LedgerProduct $ledgerProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\LedgerProduct $ledgerProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(LedgerProduct $ledgerProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\LedgerProduct $ledgerProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LedgerProduct $ledgerProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\LedgerProduct $ledgerProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(LedgerProduct $ledgerProduct)
    {
        //
    }
}
