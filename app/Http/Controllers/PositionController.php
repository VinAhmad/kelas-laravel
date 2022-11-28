<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Department;
use Database\Seeders\PositionSeeder;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = "Position";

        //Query Builder
        $position = Position::all();
        
        return view('position.home', [
            "title" => $judul,
            "data" => $position,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        
        return view('position.create', [
            "title" => "Tambah Position",
            "department" => $department,
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
            'name' => ['required', 'unique:positions,name'],
            'code' => ['required', 'max:5'],
            'department_id' => ['required'],
        ]);

        Position::create([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);

        return redirect('/position');
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
        // $department = Department::find($id);
        $position = Position::where('id', '=', $id)->first();
        $department = Department::all();
        return view('position.edit', [
            "title" => "Edit Position",
            "data" => $position,
            "department" => $department,
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
            'name' => ['required', 'unique:positions,name'],
            'code' => ['required', 'max:5'],
            'department_id' => ['required'],
        ]);
        
        Position::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'department_id' => $request->department_id,
        ]);

        return redirect('/position');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect('/position');
    }
}
