<?php

namespace App\Http\Controllers;

use App\Peminjam;
use App\Book;
use App\ReturnBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function return(Request $request)
    {
        if ($request->name != NULL) {
            $name = $request->name;
            $user = DB::table('peminjams')->where('name', $name)->get();
            $count = count($user);
            if ($count != 0) {
                for ($i = 0; $i < $count; $i++) {
                    $id[$i] = $user[$i]->id_book;
                }
                $book = DB::table('books')->whereIn('id', $id)->get();
                return view('return-book')->with('data', $user)->with('list_book', $book);
            } else {
                return view('return-book')->with('data', null);
            }
        } else {
            return view('return-book')->with('data', null);
        }
    }

    public function returnbook(Request $request)
    {
        $name = $request->name;
        $user = DB::table('peminjams')->where('name', $name)->get();
        $count = count($user);
        for ($i = 0; $i < $count; $i++) {
            $id[$i] = $user[$i]->id_book;
        }
        $book = DB::table('books')->whereIn('id', $id)->get();

        return view('return-book')->with('data', $user)->with('list_book', $book);
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

    public function returnform($id)
    {
        $data = DB::table('peminjams')->where('id', $id)->get();
        ReturnBook::create([
            'name' => $data[0]->name,
        ]);
        $data = DB::table('peminjams')->where('id', $id)->delete();
        return view('return-book')->with('data', NULL);
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
