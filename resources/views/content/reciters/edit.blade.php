@if(session('token'))
@extends('layout.default')

@section('content')
<div class="edit row">
    <div class="col-12">
        <form class="fill-form" method="POST" action="{{ url('reciters', $reciter) }}">
            @method('PATCH')
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword1" class="col-form-label">Title</label>
                </div>
                <div class="col-8">
                    <input type="text" name="title" id="inputPassword1" class="form-control" value="{{ $reciter->title }}" disabled>
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword2" class="col-form-label">Image</label>
                </div>
                <div class="col-8">
                    <input type="file" name="image" id="inputPassword2" class="form-control" value="{{ $reciter->image }}">
                </div>
            </div>
            <div class="row g-3">
                <button type="submit" class="btn submit btn-primary float-right">Save</button>
            </div>

        </form>
    </div>
</div>

@stop
@endif
