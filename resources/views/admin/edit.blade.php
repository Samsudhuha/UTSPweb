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
<form class="form-horizontal col-sm-6 col-sm-offset-2" method="POST" action="{{route('book.update')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-4" for="user-name">Name</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="user-name" value="{{$data->name}}" name="name" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-4" for="penerbit">Penerbit</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="penerbit" value="{{$data->penerbit}}" name="penerbit" required>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-4" for="pengarang">Pengarang</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="pengarang" value="{{$data->pengarang}}" name="pengarang" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="image" class="control-label col-sm-4">Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" required name="file">
            </div>
        </div>
    </div>
    <p>
        <button type="submit" class="btn btn-warning col-sm-4 col-sm-offset-4">
            Submit
            <i class="fa fa-paper-plane"></i>
        </button>
        <a href="{{url('home')}}" class="btn btn-primary col-sm-4 col-sm-offset-4" role="button">Kembali</a></p>
</form>
@endsection