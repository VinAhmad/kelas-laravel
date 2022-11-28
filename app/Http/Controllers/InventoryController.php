<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Inventory;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $judul = "Inventory";

        //Query Builder
        $inventory = Inventory::all();
        
        return view('inventory.home', [
            "title" => $judul,
            "data" => $inventory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create', [
            'title' => "Tambah Inventory"
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
            'inventory_name' => ['required', 'unique:inventories,name'],
            'inventory_number' => ['required', 'unique:inventories,inventory_number'],
            'archive_name' => ['required'],
            'archive_number' => ['required'],
        ]);

        $inventory = Inventory::create([
            'name' => $request->inventory_name,
            'inventory_number' => $request->inventory_number
        ]);
        $last_inventory_id = $inventory->id;

        Archive::create([
            'name' => $request->archive_name,
            'archive_number' => $request->archive_number,
            'inventory_id' => $last_inventory_id
        ]);

        return redirect('/inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::where('id', '=', $id)->first();
        return view('inventory.show', [
            "title" => "History Peminjaman",
            "data" => $inventory,
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
        $inventory = Inventory::where('id', '=', $id)->first();
        $archive = Archive::where('inventory_id', '=', $id)->first();

        return view('inventory.edit', [
            'inventory' => $inventory,
            'archive' => $archive,
            'title' => "Edit Inventory",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,)
    {
        $request->validate([
            'inventory_name' => ['required'],
            'inventory_number' => ['required'],
            'archive_name' => ['required'],
            'archive_number' => ['required'],
        ]);
        
        Inventory::where('id', '=', $request->inventory_id)->update([
            'name' => $request->inventory_name,
            'inventory_number' => $request->inventory_number,
        ]);
        
        Archive::where('id', '=', $request->archive_id)->update([
            'name' => $request->archive_name,
            'archive_number' => $request->archive_number,
        ]);

        return redirect('/inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // mass asignment

        Archive::where('inventory_id', '=', $id)->delete();
        Inventory::where('id', '=', $id)->delete();

        return redirect('/inventory');
    }

    public function lend($id)
    {
        $inventory = Inventory::where('id', '=', $id)->first();
        $employee = Employee::all();

        return view('inventory.lend', [
            'inventory' => $inventory,
            'employee' => $employee,
            'title' => "Form Peminjaman Inventory",
        ]);
    }

    public function lending(Request $request)
    {
        DB::table('employee_inventory')->insert([
            'description' => $request->description,
            'employee_id' => $request->employee_id,
            'inventory_id' => $request->inventory_id,
            'created_at' => now($tz = null),
        ]);

        return redirect('/inventory/show/'. $request->inventory_id);
    }
}

