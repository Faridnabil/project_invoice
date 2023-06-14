<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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

    public function view_user(Request $request)
    {
        $datas = User::all();
        return view('user-management/view-user', compact('datas'));
    }

    public function create_user(Request $request)
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('user-management/create-user', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'foto' => '',
            'roles' => 'required',
            'created_at' => now(),
        ]);

        // $file = $request->file('foto');
        // if (empty($file)) {
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]);
        // } else {
        //     $nama_file = time() . "_" . $file->getClientOriginalName();
        //     $ekstensi = $file->getClientOriginalExtension();
        //     $ukuran = $file->getSize();
        //     $pathAsli = $file->getRealPath();
        //     $nama_folder = 'foto_profil';
        //     $file->move($nama_folder, $nama_file);
        //     $pathPublic = $nama_folder . "/" . $nama_file;

        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'foto' => $pathPublic,
        //     ]);
        // }
        // $user->assignRole($request->roles);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect('view-user')->with('success', 'User created successfully');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('user-management.edit-user', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect('view-user')->with('success', 'User updated successfully');
    }

    public function delete_user($id)
    {
        User::find($id)->delete();
        return redirect('view-user')->with('success', 'User deleted successfully');
    }
}
