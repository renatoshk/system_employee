<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Primary_dep;
use App\Http\Requests\ParentDepRequest;
use Illuminate\Support\Facades\Session;
class AdminParentDepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.parent_deps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentDepRequest $request)
    {
        //
        $data = $request->all();
        Primary_dep::create($data);
        Session::flash('flash_message', 'Primary Departament has been created');
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
        $primary_dep = Primary_dep::findOrFail($id);
        return view('admin.parent_deps.index', compact('primary_dep'));
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
        $parent_Dep = Primary_dep::findOrFail($id);
        return view('admin.parent_deps.edit', compact('parent_Dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParentDepRequest $request, $id)
    {
        //
        $data = $request->all();
        $parent_Dep = Primary_dep::findOrFail($id);
        $parent_Dep->update($data);
        Session::flash('flash_message', 'Primary Departament has been created!');
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
        $primary_dep = Primary_dep::findOrFail($id);
        $primary_dep->delete();
        Session::flash('flash_message', 'Primary Departament has been deleted!');
        return redirect('/adm');
    }
}
