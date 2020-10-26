@extends('layouts.app')

@section('style')
<style>

</style>
@endsection
@section('content')
<div class="container">
    <form class="form-horizontal col-sm-6 col-sm-offset-3" method="POST" action="{{route('book.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="control-label col-sm-4" for="user-name">Name</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" class="form-control" id="user-name" placeholder="Name" name="name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="penerbit">Penerbit</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" class="form-control" id="penerbit" placeholder="Penerbit" name="penerbit" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="pengarang">Pengarang</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" class="form-control" id="pengarang" placeholder="Pengarang" name="pengarang" required>
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

        <button type="submit" class="btn btn-warning col-sm-4 col-sm-offset-4">
            Submit
            <i class="fa fa-paper-plane"></i>
        </button>
    </form>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img src="img/book-icon-png-6.png" alt="...">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img src="img/book-icon-png-6.png" alt="...">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img src="img/book-icon-png-6.png" alt="...">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img src="img/book-icon-png-6.png" alt="...">
                        </a>
                    </div>
                    ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection