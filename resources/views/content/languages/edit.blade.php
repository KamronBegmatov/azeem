@extends('layout.default')

@section('content')

<form class="fill-form" method="POST" action="{{ url('languages', $language) }}">
    @method('PATCH')
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">ID</label>
        </div>
        <div class="col-8">
            <input type="number" name="id" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $language->id }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Name</label>
        </div>
        <div class="col-8">
            <input type="text" name="name" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $language->name }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Active</label>
        </div>
        <div class="col-8">
            <input type="number" name="active" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $language->active }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Iso-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="iso-code" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $language->iso_code }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Language-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="language-code" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $language->language_code }}">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop
