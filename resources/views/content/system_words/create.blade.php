@if(session('token'))
@extends('layout.default')

@section('content')

<form class="fill-form" method="POST" action="{{ url('system_words') }}">
    @csrf
{{--    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword1" class="col-form-label">ID</label>
        </div>
        <div class="col-8">
            <input type="number" name="id" id="inputPassword1" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>--}}
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword2" class="col-form-label">Title</label>
        </div>
        <div class="col-8">
            <input type="text" name="title" id="inputPassword2" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword3" class="col-form-label">Text</label>
        </div>
        <div class="col-8">
            <input type="text" name="text" id="inputPassword3" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword4" class="col-form-label">Language</label>
        </div>
        <div class="col-8">
            <input type="text" name="language" id="inputPassword4" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop
@endif
