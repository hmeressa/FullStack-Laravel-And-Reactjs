<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use stdClass;

class RoleController extends Controller
{

    public function getRolePermission(){
        return $this->getAll();;
    }
    public function index()
    {
        return response()->json(["Permissions : " => Permission::all(),'Role' =>  Role::all()]) ;
    }

    public function getPermission()
    {
         $permissions = Permission::all();
        return response()->json(['permission' => $permissions]);
    }
    public function create()
    {
        
        return response()->json(['permission' => Permission::get()]);
    }
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->get('name')]);
        return response()->json(['message' => 'user permissions are ','roles' => $role]);
    }

    public function getAll()
    {
        $roles = Role::with(['permissions'])->get();
        $permissions = Permission::all();
        $roleManagement = new stdClass();
        $roleManagement->Roles = $roles;
        $roleManagement->Permissions = $permissions;
      return $roleManagement;
    }
    public function createRoles(Request $request)
    {
        $role = Role::create($request->all());
        $role->syncPermissions($request->input('permissions'));
        if($role){
            return $this->getAll();
        }
        return response()->json(["message" => "Role is not created"]);  
    }  
    public function show($id)
    {
        //
    }
    private function find($id)
    {
      return Role::find($id);
    }
    public function updatePermissions(Request $request, $id)
    {
        $role = $this->find($request['id'])->update(['name' => $request['name']]);
        $this->find($request['id'])->syncPermissions($request['permissions']);
        return $this->getAll();
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $role = Role::where('id',$id)->delete();
        if ($role) {
            return response()->json(["message" => "Role is successfull deleted"], 200);
        } else {
            return response()->json(['message' => "Role is not deleted"]);
        }
    }
}