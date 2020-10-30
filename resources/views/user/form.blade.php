@extends('layouts.navbar')

@section('style')

@endsection
@section('content')
<div style="text-align: center;">
    <h3>REVIEW BOOK</h3>
</div>
<form class="form-horizontal col-sm-6 col-sm-offset-2" method="POST" action="{{route('review.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-4" for="user-name">Review</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" id="review" placeholder="Review" name="review" required>
        </div>
        <input type="text" hidden id="user" placeholder="user" name="user" value="{{$user->id}}">
        <input type="text" hidden id="book" placeholder="book" name="book" value="{{$data->id}}">
    </div>

    <div class=" form-group">
        <label class="control-label col-sm-4" for="penerbit">Rate</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            <select name="rate" id="rate" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>

    <p>
        <button type="submit" class="btn btn-warning col-sm-4 col-sm-offset-4">
            Submit
            <i class="fa fa-paper-plane"></i>
        </button>
        <a href="{{url('book/'.$data->id)}}" class="btn btn-primary col-sm-4 col-sm-offset-4" role="button">Kembali</a></p>
</form>
@endsection