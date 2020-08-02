<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Role_attr;
use App\Role_attr_value;
use App\User;
use App\Primary_dep;
use App\Dep;
use App\ImageUser;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;
class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $deps = Dep::pluck('name', 'id')->all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.employees.create', compact('deps','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
       $user = Auth::user();
       if($user){
           //password field trim and encrypt
          if(trim($request->password == '')){
                $data = $request->expect('password');
            }
          else{
                $data = $request->all();
                $data['password'] = bcrypt($request->password);
            }
             //image set
            if($file = $request->file('image_id')){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $image = ImageUser::create(['image'=>$name]);
             }
          //insert into users static fields
          $create_user = User::create([
            'image_id'=>$image->id,
            'role_id'=>$data['role_id'],
            'dep_id'=>$data['dep_id'],
            'name'=>$data['name'],
            'surname'=>$data['surname'],
            'username'=>$data['username'],
            'email'=>$data['email'],
            'password'=>$data['password']
          ]);
          //remove static and leave dynamic fields attrs
          unset($data['_token']);
          unset($data['role_id']);
          unset($data['dep_id']);
          unset($data['name']);
          unset($data['surname']);
          unset($data['username']);
          unset($data['email']);
          unset($data['password']);
          unset($data['password_confirmation']);
          unset($data['image_id']);
          //fill dynamic fields
          $i = 0; $userAttr;

          foreach ($data as $key => $value) {
            if($i % 2 == 0){
                 $userAttr = $value;
            }
            else {
                Role_attr_value::create([
                    'user_id'=>$create_user->id,
                    'role_id'=>$request->role_id,
                    'role_attr_id'=>$userAttr,
                    'attribute_value'=>$value
                ]);
            }
              $i++;
          }
          Session::flash('flash_message', 'The User has been created!');
          return redirect()->back();
       }
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
        $dep = Dep::findOrFail($id);
        $employees = User::where('dep_id', $dep->id)->get();
        return view('admin.employees.index', compact('employees','dep'));
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
        $employee = User::findOrFail($id);
        $deps = Dep::pluck('name','id')->all();
        $attrs = $employee->role_attr_values;
        $condition = [];
         foreach ($attrs as $attr) {
            $condition[] = Role_attr::where('id',$attr->role_attr_id)->where('role_id', $employee->role_id)->get();
         }
        return view('admin.employees.edit', compact('employee','deps', 'condition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        //
        $user  = Auth::user();
        if($user){
           $data = $request->all();
           $employee = User::findOrFail($id);
           //if we will update image and other data
           if($file = $request->file('image_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $image = ImageUser::create(['image'=>$name]);
            $employee->update([
                   'image_id'=>$image->id,
                   'dep_id'=>$data['dep_id'],
                   'name'=>$data['name'],
                   'surname'=>$data['surname'],
                   'username'=>$data['username'],
                   'email'=>$data['email'],
            ]);

           }
           //update data without image
           else{
               $employee->update([
                      'dep_id'=>$data['dep_id'],
                      'name'=>$data['name'],
                      'surname'=>$data['surname'],
                      'username'=>$data['username'],
                      'email'=>$data['email'],
               ]);
           }
          unset($data['_method']);
          unset($data['_token']);
          unset($data['dep_id']);
          unset($data['name']);
          unset($data['surname']);
          unset($data['username']);
          unset($data['email']);
          unset($data['image_id']);
          //updaye dynamic fields
          $i = 0; $userAttr;
          foreach ($data as $key => $value) {
            if($i % 2 == 0){
                 $userAttr = $value;
            }
            else {
                Role_attr_value::where('user_id', $employee->id)->where('role_attr_id', $userAttr)->update(['attribute_value'=>$value
                ]);
            }
              $i++;
          }
          Session::flash('flash_message', 'The User has been updated!');
          return redirect()->back();
        }

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
        $employee = User::findOrFail($id);
        unlink(public_path() . '/images/' .$employee->image->image);
        $employee->delete();
        Session::flash('flash_message', 'The User has been deleted!');
        return redirect()->back();
    }
}
