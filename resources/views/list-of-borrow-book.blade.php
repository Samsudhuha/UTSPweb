@extends('layouts.app')

@section('style')

@endsection
@section('content')
<div style="text-align: center;">
    <h3>LIST of Borrow The BOOK</h3>
    <a href="/" class="btn btn-primary" role="button">Kembali</a>
</div>
<div class="container">
    <table id="example" class=" table table-striped table-bordered" style=" width:100%; margin-top:50px">
        <thead>
            <tr>
                <th>Name</th>
                <th>Book</th>
                <th>waktu minjam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list_peminjam as $peminjam)
            <tr>
                <td>{{$peminjam->name}}</td>
                @foreach ($list_book as $book)
                @if($peminjam->id_book == $book->id)
                <td>{{$book->name}}</td>
                @endif
                @endforeach
                <td>{{$peminjam->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection