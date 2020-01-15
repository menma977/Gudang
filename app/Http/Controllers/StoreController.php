<?php

namespace App\Http\Controllers;

use App\Model\Route;
use App\Model\Store;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $store = Store::all();
        $store->map(function ($item) {
            $item->route = Route::find($item->route);
            $item->user = User::find($item->user);
            return $item;
        });

        $data = [
            'stores' => $store
        ];

        return view('store.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $routes = Route::all();
        $data = [
            'routes' => $routes
        ];

        return view('store.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Store $store
     * @return Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Store $store
     * @return Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Store $store
     * @return Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $store
     * @return Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
