@extends('layouts.app')

@section('style')

@endsection
@section('content')
<div style="text-align: center;">
    <h3>EDIT BOOK</h3>
    <div class="col-md-12">
        <img src="/img/<?php echo $data->path ?>" style="height: 250px; width:250px; margin-top:50px">
        <div class="caption">
            <h3>{{$data->name}}</h3>
            <h3></h3>
            <h3></h3>
        </div>
    </div>
</div>
<form class="form-horizontal col-sm-6 col-sm-offset-2" method="POST" action="{{route('peminjam.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group" hidden>
        <label class="control-label col-sm-4" for="user-name">Name</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="user-name" value="{{$data->id}}" name="id_book" required hidden>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="user-name">Nama Peminjam</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="user-name" name="name" required>
        </div>
    </div>
    <p>
        <button type="submit" class="btn btn-warning col-sm-4 col-sm-offset-4">
            Submit
            <i class="fa fa-paper-plane"></i>
        </button>
        <a href="{{url('borrow-book')}}" class="btn btn-primary col-sm-4 col-sm-offset-4" role="button">Kembali</a></p>
</form>
@endsection