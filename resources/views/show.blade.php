@extends('layouts.app')

@section('style')

@endsection
@section('content')
<div class="container">
    <div class="card col-sm-4 col-sm-offset-4">
        <img src="/img/<?php echo $data->path ?>" alt="..." style="height: 250px; width:250px; margin-top:50px">
        <div class="caption">
            <h3>{{$data->name}}</h3>
            <p>Pengarang : {{$data->pengarang}}</p>
            <p>Penerbit : {{$data->penerbit}}</p>
        </div>
    </div>
    @if(count($review)!=0)
    @foreach($review as $re)
    <div class="form-horizontal col-sm-12 col-sm-offset-2">
        <div class=" form-group">
            <label class="control-label col-sm-4" for="user-name">Name</label>
            <div class="input-group">
                @foreach($user as $us)
                @if($us->id==$re->user_id)
                <h3>{{$us->name}}</h3>
                @endif
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="user-name">Review</label>
            <div class="input-group">
                <h4>{{$re->comments}}</h4>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="user-name">Rate</label>
            <div class="input-group">
                <h3>{{$re->rate}}</h3>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <p>
        <a href="{{url('search-book')}}" class="btn btn-primary col-sm-4 col-sm-offset-4" role="button">Kembali</a>
    </p>
</div>
@endsection