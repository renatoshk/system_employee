<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Primary_dep; 
use App\Dep; 
use App\Http\Requests\DepRequest;
class AdminDepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $primary_deps = Primary_dep::pluck('name', 'id')->all();
        return view('admin.deps.create', compact('primary_deps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepRequest $request)
    {
        //
        $data = $request->all();
        Dep::create($data);
        Session::flash('flash_message','Departament has been created!');
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
        $deps = Dep::where('primary_dep_id', $primary_dep->id)->get();
        return view('admin.deps.index', compact('primary_dep', 'deps'));
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
        $dep = Dep::findOrFail($id);
        $parent_deps = Primary_dep::pluck('name','id')->all();
        return view('admin.deps.edit', compact('dep', 'parent_deps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepRequest $request, $id)
    {
        //
        $data = $request->all();
        $dep = Dep::findOrFail($id);
        if($dep){
            $dep->update($data);
            Session::flash('flash_message', 'Departament has been updated!');
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
        $dep = Dep::findOrFail($id);
        if($dep){
            $dep->delete();
            Session::flash('flash_message', 'Departament has been deleted!');
            return redirect('/adm');
        }
    }
}
