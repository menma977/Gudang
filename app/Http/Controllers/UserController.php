<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
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
        if (Auth::user()->role == 0) {
            $users = User::all();
        } else {
            $users = User::whereIn('role', [2, 3, 4, 5])->get();
        }

        $data = [
            'users' => $users
        ];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('user.create');
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
            'role' => 'required|numeric',
            'username' => 'required|string|min:6|unique:users',
            'name' => 'required|string',
            'phone' => 'required|string|min:10|unique:users',
            'password' => 'required|string|min:6|same:c_password',
            'c_password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->role = $request->role;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required|numeric',
            'username' => 'required|string|min:6|unique:users',
            'name' => 'required|string',
            'phone' => 'required|string|min:10|unique:users',
            'password' => 'required|string|min:6|same:c_password',
            'c_password' => 'required|string|min:6',
        ]);

        $user = User::find($id);
        $user->role = $request->role;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Factory|View
     */
    public function delete()
    {
        $users = User::whereIn('role', [2, 3, 4, 5])->get();
        $data = [
            'users' => $users,
        ];

        return view('user.delete', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->user);
        if ($user->delete == 0) {
            $user->delete = 1;
        } else {
            $user->delete = 0;
        }
        $user->save();

        return redirect()->back();
    }
}
