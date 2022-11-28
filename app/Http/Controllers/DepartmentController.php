<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $judul = "Department";

        //Query Builder
        $department = Department::all();

        return view('department.home', [
            "title" => $judul,
            "data" => $department,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create', [
            "title" => "Tambah Department",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:12', 'min:3'],
            'code' => ['required', 'string', 'max:3'],
        ]);

        $department = new Department();
        
        $department->name = $request->name;
        $department->code = $request->code;

        $department->save();

        return redirect('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // $department = Department::find($id);
         $department = Department::where('id', '=', $id)->first();

         return view('department.show', [
             "title" => "Department",
             "data" => $department,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $department = Department::find($id);
        $department = Department::where('id', '=', $id)->first();

        return view('department.edit', [
            "title" => "Edit Department",
            "data" => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:12', 'min:3'],
            'code' => ['required', 'string', 'max:3'],
        ]);
        
        $department = Department::find($request->id);
        $department->name = $request->name;
        $department->code = $request->code;

        $department->save();

        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect('/department');
    }
}
