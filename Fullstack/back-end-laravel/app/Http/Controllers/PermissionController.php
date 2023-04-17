<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        return response()->json(['Permissions' => Permission::all()]) ;
    }

    public function create(Request $request)
    {
        $permission =  Permission::create($request->only('name'));
        if($permission){
            return response()->json(['message' => "User permission is created successfully"]);
        }
        return response()->json(['message' => "User permission is not created"]);
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        
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
}