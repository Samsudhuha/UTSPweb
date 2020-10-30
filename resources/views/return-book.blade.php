@extends('layouts.app')

@section('style')
<style>

</style>
@endsection
@section('content')
<div class="container">
    <form class="form-horizontal col-sm-6 col-sm-offset-3" method="POST" action="{{route('book.return')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-4" for="user-name">name of borrower</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" class="form-control" id="user-name" placeholder="Name" name="name" required>
            </div>
        </div>

        <button type="submit" class="btn btn-warning col-sm-4 col-sm-offset-4">
            Submit
            <i class="fa fa-paper-plane"></i>
        </button>
    </form>
    @if($data != NULL)
    <div class="row justify-content-center">
        <div class="card">
            <div class="row">
                @foreach ($data as $peminjam)
                <div class="col-md-6">
                    <div class="caption">
                        <h3>Name of Borrower : {{$peminjam->name}}</h3>
                        @foreach ($list_book as $book)
                        @if($peminjam->id_book == $book->id)
                        <img src="img/<?php echo $book->path ?>" alt="..." style="height: 250px; width:250px; margin-top:50px">
                        <h3>Name of Book : {{$book->name}}</h3>
                        <p>Pengarang : {{$book->pengarang}}</p>
                        <p>Penerbit : {{$book->penerbit}}</p>
                        <p><a href="{{url('/returnbook/'.$peminjam->id)}}" class="btn btn-primary" role="button">Return the Book</a></p>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endsection