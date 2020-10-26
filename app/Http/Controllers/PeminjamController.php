<?php

namespace App\Http\Controllers;

use App\Peminjam;
use App\Book;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Book::orderBy('created_at', 'desc')->get();
        return view('search-book')->with('list_book', $assignments);
    }

    public function borrow()
    {
        $assignments = Book::orderBy('created_at', 'desc')->get();
        return view('borrow-book')->with('list_book', $assignments);
    }

    public function list()
    {
        $book = Book::orderBy('created_at', 'desc')->get();
        $peminjam = Peminjam::orderBy('created_at', 'desc')->get();

        return view('list-of-borrow-book')->with('list_book', $book)->with('list_peminjam', $peminjam);
    }

    public function borrowform($id)
    {
        $data = Book::findOrFail($id);
        return view('form-borrow-book')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Peminjam::create([
            'id_book' => $request->id_book,
            'name' => $request->name,
        ]);
        return redirect('borrow-book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjam $peminjam)
    {
        //
    }
}
