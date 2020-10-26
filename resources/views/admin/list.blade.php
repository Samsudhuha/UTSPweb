@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="container">
    @foreach ($list_book as $book)
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="..." alt="...">
                <div class="caption">
                    <h3>{{$book->name}}</h3>
                    <p>Pengarang : {{$book->pengarang}}</p>
                    <p>Penerbit : {{$book->penerbit}}</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection