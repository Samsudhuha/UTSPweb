@extends('layouts.app')

@section('style')

@endsection
@section('content')
<div style="text-align: center;">
    <h3>LIST BOOK</h3>
    <a href="/" class="btn btn-primary" role="button">Kembali</a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="row">
                @foreach ($list_book as $book)
                <div class="col-md-4">
                    <img src="img/<?php echo $book->path ?>" alt="..." style="height: 250px; width:250px; margin-top:50px">
                    <div class="caption">
                        <h3>{{$book->name}}</h3>
                        <p>Pengarang : {{$book->pengarang}}</p>
                        <p>Penerbit : {{$book->penerbit}}</p>
                        <p><a href="{{url('/borrowbook/'.$book->id)}}" class="btn btn-primary" role="button">Borrow the Book</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection