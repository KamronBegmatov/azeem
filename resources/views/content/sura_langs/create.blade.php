@extends('layout.default')

@section('content')

<form class="fill-form" method="POST" action="{{ url('sura_langs') }}">
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
            <label for="inputPassword2" class="col-form-label">Sura</label>
        </div>
        <div class="col-8">
            <input type="number" name="name" id="inputPassword2" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword3" class="col-form-label">Aya</label>
        </div>
        <div class="col-8">
            <input type="number" name="name" id="inputPassword3" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword4" class="col-form-label">Text</label>
        </div>
        <div class="col-8">
            <input type="text" name="name" id="inputPassword4" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword5" class="col-form-label">Iso-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="iso_code" id="inputPassword5" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Name</label>
        </div>
        <div class="col-8">
            <input type="text" name="name" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword7" class="col-form-label">Location</label>
        </div>
        <div class="col-8">
            <input type="text" name="active" id="inputPassword7" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword8" class="col-form-label">Action</label>
        </div>
        <div class="col-8">
            <input type="text" name="sura_lang_action" id="inputPassword8" class="form-control"
                aria-describedby="passwordHelpInline">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop
