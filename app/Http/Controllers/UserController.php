<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Session;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $role = Role::create(['name' => 'publisher']);
        // $permission = Permission::create(['name' => 'public genre']);

        // $role = Role::find(5);
        // $permission = Permission::find(2);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // $role->revokePermissionTo($permission);
        // $permission->removeRole($role);

        // auth()->user()->assignRole('admin');
        // auth()->user()->removeRole('admin');

        // DOng bo
        // auth()->user()->syncRole('admin');

        // $user = User::find(4);
        // $user->givePermissionTo('add category');

        $user = User::with('roles', 'permissions')->orderBy('id', 'DESC')->get();

        return view('admincp.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return redirect()->back()->with('status', 'Tạo User thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('status', 'Xóa thành công');
    }

    public function impersonate($id) {
        $user = User::find($id);
        if($user) {
            Session::put('impersonate', $user->id);
        }
        return redirect('/user');
    }

    public function phanquyen($id) {
        $user = User::find($id);
        $name_roles = $user->roles->first()->name;
        // dd($name_roles);
        $permission = Permission::orderBy('id', 'DESC')->get();
        // Lay quyen
        $get_permission_via_role = $user->getPermissionsViaRoles();
        // dd($get_permission_via_role);
        return view('admincp.user.phanquyen', compact('user', 'name_roles', 'permission', 'get_permission_via_role'));
    }

    public function phanvaitro($id) {
        $user = User::find($id);
        $name_roles = $user->roles->first()->name;
        $role = Role::orderBy('id', 'DESC')->get();
        $all_column_roles = $user->roles->first();
        $permission = Permission::orderBy('id', 'DESC')->get();
        return view('admincp.user.phanvaitro', compact('user', 'role', 'all_column_roles', 'permission', 'name_roles'));
    }

    public function insert_roles(Request $request, $id) {
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        $role_id = $user->roles->first()->id;
        return redirect()->back()->with('status', 'Tạo vai trò thành công');
    }

    public function insert_permission(Request $request, $id) {
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $role = Role::find($role_id);
        // Cap quyen
        $role->syncPermissions($data['permission']);

        return redirect()->back()->with('status', 'Cấp quyền thành công');
    }

    public function insert_per_permission(Request $request) {
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission->save();
        return redirect()->back()->with('status_per', 'Tạo quyền thành công');
    }

    public function insert_rol_roles(Request $request) {
        $data = $request->all();
        $roles = new Role();
        $roles->name = $data['roles'];
        $roles->save();
        return redirect()->back()->with('status_per', 'Tạo vai trò thành công');
    }
}
