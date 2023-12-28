<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::All();
        return view('pages.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('profile_photo_path')) {
            // Do something with the file
            $data['profile_photo_path'] = $request->file('profile_photo_path')->store('/images/photo_profile', 'public');
        }
        $data['password'] = $request->password;

        User::create($data);

        return redirect()
            ->route('users.index')
            ->with('Success', 'New User has been add');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        $data = User::findOrFail($User->id);
        return view('pages.users.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        $data = $request->all();

        $item = User::findOrFail($User->id);

        $item->update($data);

        return redirect()
            ->route('users.index')
            ->with('Success', 'Users telah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        $item = User::findOrFail($User->id);

        $item->delete();
        return redirect()
            ->route('users.index')
            ->with('Success', 'The user has been delete');
    }
}
