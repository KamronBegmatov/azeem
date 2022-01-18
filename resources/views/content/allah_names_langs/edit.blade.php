@extends('layout.default')

@section('content')
<div class="col-sm-6">
<br>

<form class="fill-form" method="POST" action="{{ url('allah_name_langs', $allah_name_lang) }}">
    @method('PATCH')
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">ID</label>
        </div>
        <div class="col-8">
            <input type="number" name="id" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->id }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Name</label>
        </div>
        <div class="col-8">
            <input type="text" name="name" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->name }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Active</label>
        </div>
        <div class="col-8">
            <input type="number" name="active" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->active }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">Iso-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="iso-code" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->iso_code }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword6" class="col-form-label">allah_name_lang-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="allah_name_lang-code" id="inputPassword6" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->allah_name_lang_code }}">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop
