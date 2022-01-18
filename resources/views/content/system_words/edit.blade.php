@extends('layout.default')

@section('content')
<div class="col-sm-6">
<br>

<form class="fill-form" method="POST" action="{{ url('system_words', $system_word) }}">
    @method('PATCH')
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword1" class="col-form-label">ID</label>
        </div>
        <div class="col-8">
            <input type="number" name="id" id="inputPassword1" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $system_word->id }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPasswor2" class="col-form-label">Title</label>
        </div>
        <div class="col-8">
            <input type="text" name="title" id="inputPassword2" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $system_word->title }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword3" class="col-form-label">Text</label>
        </div>
        <div class="col-8">
            <input type="text" name="text" id="inputPassword3" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $system_word->text }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword4" class="col-form-label">Iso-code</label>
        </div>
        <div class="col-8">
            <input type="text" name="iso_code" id="inputPassword4" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $system_word->iso_code }}">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop