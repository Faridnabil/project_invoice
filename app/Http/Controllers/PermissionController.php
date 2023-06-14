<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function view_permission(Request $request)
    {
        $permission = Permission::all();
        return view('user-management.view-permission', compact('permission'));
    }

    public function create_permission()
    {
        $permission = Permission::pluck('name', 'name')->all();
        return view('user-management.create-permission', compact('permission'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Permission::create($input);

        return redirect('view-permission')->with('success', 'Permission created successfully');
    }

    public function edit_permission($id)
    {
        $permission = Permission::find($id);

        return view('user-management.edit-permission', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $permission = Permission::find($id);
        $permission->update($input);

        // $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();

        return redirect('view-permission')->with('success', 'Permission updated successfully');
    }

    public function delete_permission($id)
    {
        Permission::find($id)->delete();
        return redirect('view-permission')->with('success', 'Permission deleted successfully');
    }
}
