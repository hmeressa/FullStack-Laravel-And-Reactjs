<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Http\Resources\PatientResource;
use App\Models\User;
use Illuminate\Support\facades\Auth;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view-user'])->only('index');
        // $this->middleware(['permission:delete-user'])->only('delete');
        // $this->middleware(['permission:create-user'])->only('create');
        // $this->middleware(['permission:edit-user'])->only('update');
    }
    public function index()
    {
         $user = User::all();

        return $user;
    }
    public function create(Request $request)
    {
        
        try {
            if (!User::where('id', $request->input('id'))->exists()) {
                $user = User::create($request->all());
                $user->assignRole($request->input('Role'));
                if ($user) {
                    return response()->json(["message" => "User is successfully is created and saved to the store"]);
                }
            }
            else{
                return response()->json(["message" => "User is exist with the current username try another"]);
            }
            }catch(Exception $e){
            return response()->json(["message" => $e]);
        }
            
    }

    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $user = User::where('id', $id);
        return $user;
    }
    public function edit()
    {
        
    }
    public function update(Request $request, $id)
    {
        try {
            $user = [
                "Firstname" => $request->input('Firstname'),
                "Lastname" => $request->input('Lastname'),
                "email" => $request->input('email'),
                // "password" => $request->input('password'),
                "Phone" => $request->input('Phone'),
                "Role" => $request->input('Role'),

            ];
            if (!User::where('email', $request->input('email'))->exists()) {
                $data = User::where('id', '=', $id)->update($user);
                if ($data) {
                    return response()->json(["message" => "User is successfully updated"]);
                }
            }
            else{
                return response()->json(["message" => "User is exist with current username"]);    
            }
        } catch (Exception $e) {
            return response()->json(["message" => $e]);
        }
    }
    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
        if ($user) {
            return response()->json(["message" => "user is successfull deleted"], 200);
        } else {
            return response()->json(['message' => "user is not deleted"]);
        }

        }
        public function logout(){
       if( Auth::logout()){ 
            return response()->json(["message" => "User is successfully logged out"]);
       }
        return response()->json(["message" => "User is unable to logout"]);
        }
    }