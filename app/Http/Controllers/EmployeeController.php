<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = "Position";

        //Query Builder
        $employee = Employee::all();
        
        return view('employee.home', [
            "title" => $judul,
            "data" => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::all();
        
        return view('employee.create', [
            "title" => "Tambah Employee",
            "position" => $position,
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
            'name' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required'],
        ]);

        Employee::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
        ]);

        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id', '=', $id)->first();
        return view('employee.show', [
            "title" => "History Peminjaman",
            "data" => $employee,
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
        $employee = Employee::where('id', '=', $id)->first();
        $position = Position::all();
        return view('employee.edit', [
            "title" => "Edit Employee",
            "data" => $employee,
            "position" => $position,
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
            'name' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required'],
        ]);
        
        Employee::where('id', '=', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
        ]);

        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee');
    }
}
