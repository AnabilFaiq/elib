<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Role::all();
        return view('roles.baseRole', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nama = $request->input('name');

        $role = Role::create([
            'name' => $nama
        ]);

        return redirect('/role')->with('succes', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        $role = Role::find($role->id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $role = Role::find($role->id);
        $role->name = $request->input('name');

        $role->save();

        return redirect('/role')->with('success', 'Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $role = Role::find($role->id);
        if ($role) {
            $role->delete();
            return redirect('/role')->with('success', 'Delete Succesfully');
        }
    }
}
