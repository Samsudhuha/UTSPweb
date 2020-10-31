<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Review;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Book::orderBy('created_at', 'desc')->get();
        return view('user/list')->with('list_book', $assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $data = Book::findOrFail($id);
        $user = DB::table('users')->where('id', '=', $request->session()->get('user'))->get();
        return view('user/form')->with('data', $data)->with('user', $user[0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Review::create([
            'book_id' => $request->book,
            'user_id' => $request->user,
            'comments' => $request->review,
            'rate' => $request->rate,
        ]);
        return redirect('book/' . $request->book);
    }

    public function view(Request $request, $id)
    {
        $data = Book::findOrFail($id);
        $review = DB::table('reviews')->where('book_id', '=', $id)->get();
        if (count($review) != 0) {
            $user = DB::table('users')->where('id', '=', $review[0]->user_id)->get();

            return view('show')->with('data', $data)->with('review', $review)->with('user', $user);
        } else {
            return view('show')->with('data', $data)->with('review', null)->with('user', null);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $book = Book::orderBy('created_at', 'desc')->get();
        return view('search-book')->with('list_book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = Review::findOrFail($id);
        $user = DB::table('users')->where('id', '=', $request->session()->get('user'))->get();
        return view('user/edit')->with('data', $data)->with('user', $user[0]);
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
        $id = $request->input('book');
        $data = Review::findOrFail($id);
        $idbook = $data->book_id;

        $data->comments = $request->input('review');
        $data->rate = $request->input('rate');

        $data->save();
        return redirect('book/' . $idbook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Review::find($id);
        $idbook = $book->book_id;
        $book->delete();

        return redirect('book/' . $idbook);
    }
}
