<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Book::orderBy('created_at', 'desc')->get();
        return view('admin/list')->with('list_book', $assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        Book::create([
            'name' => $request->name,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'path' => $file->getClientOriginalName()
        ]);
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Book::findOrFail($id);
        return view('admin/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Book::findOrFail($id);
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'img';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $data->name = $request->input('name');
        $data->penerbit = $request->input('penerbit');
        $data->pengarang = $request->input('pengarang');
        $data->path = $file->getClientOriginalName();

        $data->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return redirect('home');
    }
}
