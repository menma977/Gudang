<?php

namespace App\Http\Controllers;

use App\Model\Route;
use App\Model\Store;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RouteController extends Controller
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
        $routes = Route::all();
        $routes->map(function ($item) {
            $item->user = $item->user ? User::find($item->user)->name : 'Belum Memiliki Sales';
            $item->listStore = Store::where('route', $item->id)->get();

            return $item;
        });

        $data = [
            'routes' => $routes,
        ];

        return view('route.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $users = User::where('role', 4)->get();
        $data = [
            'users' => $users,
        ];
        return view('route.create', $data);
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
            'name' => 'required|string|unique:users',
            'description' => 'required|string',
        ]);

        $route = new Route();
        if ($request->sales) {
            $route->user = $request->sales;
        }
        $route->name = $request->name;
        $route->description = $request->description;
        $route->save();

        return redirect()->route('route.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Route $route
     * @return Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $route = Route::find($id);
        $users = User::where('role', 4)->get();
        $data = [
            'route' => $route,
            'users' => $users
        ];

        return view('route.edit', $data);
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
            'description' => 'required|string',
        ]);

        $route = Route::find($id);
        if ($request->sales) {
            $route->user = $request->sales;
        } else {
            $route->user = '';
        }
        if ($route->name != $request->name) {
            $this->validate($request, [
                'name' => 'required|string|unique:users',
            ]);
            $route->name = $request->name;
        }
        $route->description = $request->description;
        $route->save();

        return redirect()->route('route.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Route $route
     * @return Response
     */
    public function destroy(Route $route)
    {
        //
    }
}
