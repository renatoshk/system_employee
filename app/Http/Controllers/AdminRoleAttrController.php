<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RoleAttrRequest;
use App\Http\Requests\EditRoleAttrRequest;
use App\Role;
use App\Role_attr;
class AdminRoleAttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attributes = Role_attr::all();
        return view('admin.role_attrs.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $attributes = Role_attr::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.role_attrs.create', compact('attributes', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleAttrRequest $request)
    {
        //
        $data = $request->all();
        Role_attr::create($data);
        Session::flash('flash_message', 'Role has been created!');
        return redirect()->back(); 
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
        $attribute = Role_attr::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.role_attrs.edit', compact('attribute', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoleAttrRequest $request, $id)
    {
        //
        $data = $request->all();
        $attr = Role_attr::findOrFail($id);
        $attr->update($data);
        Session::flash('flash_message', 'Role Attribute has been updated!');
        return redirect()->back(); 

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
        $attr = Role_attr::findOrFail($id);
        $attr->delete();
        Session::flash('flash_message', 'Role Attribute has been deleted!');
        return redirect()->back();
    }
}
