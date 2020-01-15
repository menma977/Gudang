<?php

namespace App\Http\Controllers;

use App\Model\Route;
use App\Model\Store;
use App\User;
use File;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
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
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'route' => 'required|exists:routes,id',
            'username' => 'required|string|min:6|unique:users',
            'full_name' => 'required|string',
            'full_address' => 'required|string',
            'phone' => 'required|numeric|min:10|unique:users',
            'password' => 'required|string|min:6|same:c_password',
            'c_password' => 'required|string|min:6',
            'number_ktp' => 'required|numeric',
            'ktp' => 'required|image|mimes:jpeg,jpg,png|max:20000',
            'ktp_and_user' => 'required|image|mimes:jpeg,jpg,png|max:20000'
        ]);

        $ktpImageName = time() . '.KTP.' . $request->ktp->extension();
        $ktpSelfImageName = time() . 'UserAndKTP' . $request->ktp_and_user->extension();

        $user = new User();
        $user->name = $request->full_name;
        $user->role = 5;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        $store = new Store();
        $store->route = $request->route;
        $store->user = $user->id;
        $store->full_name = $user->name;
        $store->full_address = $request->full_address;
        $store->phone = $user->phone;
        $store->number_ktp = $request->number_ktp;
        $store->ktp = $ktpImageName;
        $store->ktp_and_user = $ktpSelfImageName;
        $store->save();

        $request->ktp->move("ktp", $ktpImageName);
        $request->ktp_and_user->move('ktp/user', $ktpSelfImageName);

        return redirect()->back();
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
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $routes = Route::all();
        $store = Store::find($id);
        if ($store) {
            $store->user = User::find($store->user);
        }

        $data = [
            'routes' => $routes,
            'store' => $store
        ];

        return view('store.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $this->validate($request, [
            'route' => 'required|exists:routes,id',
            'full_name' => 'required|string',
            'full_address' => 'required|string',
            'number_ktp' => 'required|string|numeric',
            'ktp' => 'image|mimes:jpeg,jpg,png|max:20000',
            'ktp_and_user' => 'image|mimes:jpeg,jpg,png|max:20000'
        ]);

        $store = Store::find($id);
        if ($store->phone != $request->phone) {
            $this->validate($request, [
                'phone' => 'required|numeric|min:10|unique:users',
            ]);
            $store->phone = $request->phone;
        }
        $store->route = $request->route;
        $store->full_name = $request->full_name;
        $store->full_address = $request->full_address;
        $store->number_ktp = $request->number_ktp;
        if ($request->ktp) {
            File::delete('ktp/' . $store->ktp);
            $ktpImageName = time() . '.KTP.' . $request->ktp->extension();
            $store->ktp = $ktpImageName;
            $request->ktp->move("ktp", $ktpImageName);
        }

        if ($request->ktp_and_user) {
            File::delete('ktp/user/' . $store->ktp_and_user);
            $ktpSelfImageName = time() . '.UserAndKTP.' . $request->ktp_and_user->extension();
            $store->ktp_and_user = $ktpSelfImageName;
            $request->ktp_and_user->move('ktp/user', $ktpSelfImageName);
        }

        $user = User::find($store->user);
        $user->name = $request->full_name;
        if ($user->username != $request->username) {
            $this->validate($request, [
                'username' => 'required|string|min:6|unique:users',
            ]);
            $user->username = $request->username;
        }
        $user->phone = $request->phone;
        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|string|min:6|same:c_password',
                'c_password' => 'required|string|min:6',
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $store->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        User::destroy($store->user);
        Store::destroy($id);

        return redirect()->back();
    }
}
