<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
class UserConTroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('permission:publish information|edit information|delete information|add information',['only' => ['index','show']]);
         $this->middleware('permission:add information', ['only' => ['create','store']]);
         $this->middleware('permission:edit information', ['only' => ['edit','update']]);
         $this->middleware('permission:delete information', ['only' => ['destroy']]);
    }
    public function index()

    {

         //Role::create(['name'=>'Admin']);
        // Permission::create(['name' => 'delete genre']);
        // $role = Role::find(4);
        // $permission = Permission::find(14);
        // $permission->assignRole($role);

        // $role->givePermissionTo($permission);
        // $role->revokePermissionTo($permission);
        // auth()->user()->givePermissionTo('add articles');

        // auth()->user()->assignRole(['admin','writer','editor','publisher']);
        // return auth()->user()->permissions;
        //return auth()->user()->getDirectPermissions();
        // return auth()->user()->getAllPermissions();
        // return auth()->user()->getPermissionsViaRoles();
        // return User::role('writer')->get();
       // auth()->user()->removeRole('writer');
        //return User::permission('add articles')->get();
        // $user = User::with('roles','permissions')->orderBy('id','DESC')->get();

        $user = User::with('roles','permissions')->get();

        return view('admincp.User.index',compact('user'));
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
        return redirect()->back()->with('status','Thêm người dùng thành công !');
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
        //
    }


    public function phanvaitro($id){
        $user = User::find($id);
        $role = Role::orderBy('id','DESC')->get();
        $permission = Permission::orderBy('id','DESC')->get();
        $all_column_roles = $user->roles->first();
        return view('admincp.user.phanvaitro',compact('user','role','all_column_roles','permission'));

    }
    public function phanquyen($id){
        $user = User::find($id);
        $permission = Permission::orderBy('id','DESC')->get();
        $name_roles = $user->roles->first()->name;
        $get_permission_via_role = $user->getPermissionsViaRoles();
        return view('admincp.user.phanquyen',compact('user','name_roles','permission','get_permission_via_role'));

    }

    public function insert_roles(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        $role_id = $user->roles->first()->id;
        // $user->removeRole($data['role']);
        // $user->assignRole($data['role']);
        return redirect()->back()->with('status','Thêm vai trò cho user thành công');
    }
    public function insert_permission(Request $request,$id){
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        //cap quyen
        $role = Role::find($role_id);
        $role->syncPermissions($data['permission']);
        //lay quyen
        // $user->removeRole($data['role']);
        // $user->assignRole($data['role']);
        return redirect()->back()->with('status','Thêm quyền cho user thành công');
    }

    public function insert_permission_x(Request $request) {
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission->save();

        return redirect()->back()->with('status','Thêm quyền thành công');
    }
    public function impersonate($id) {
        $user = User::find($id);
        if($user){
            Session:put('impersonate',$user->id);
        }

        return redirect('/home');
    }




}
