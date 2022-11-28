<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Books";

        //Query Builder
        $books = DB::table('books')->get();

        return view('books.home', [
            "title" => $judul,
            "data" => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create', [
            "title" => "Tambah Buku",
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
        // dd request();

        DB::table('books')->insert([
            'title' => $request->title,
            'author' => $request->author,
            'tahun' => $request->tahun,
            'publisher' => $request->publisher,
        ]);
        return redirect('/books');
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
        $books = DB::table('books')->where("id", "=", $id)->first();

        //dd($books);

        return view('books.edit', [
            "title" => "Edit Buku",
            "data" => $books,
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
        DB::table('books')
            ->where('id', '=', $request->id)
            ->update([
                'title' => $request->title,
                'author' => $request->author,
                'tahun' => $request->tahun,
                'publisher' => $request->publisher,
            ]);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('books')->where("id", "=", $id)->delete();
        return redirect('/books');
    }
}
