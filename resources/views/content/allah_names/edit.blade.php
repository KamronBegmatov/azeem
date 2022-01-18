@extends('layout.default')

@section('content')
<div class="col-sm-6">
<br>

<form class="fill-form" method="POST" action="{{ url('allah_names', $allah_name) }}">
    @method('PATCH')
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword1" class="col-form-label">ID</label>
        </div>
        <div class="col-8">
            <input type="number" name="id" id="inputPassword1" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name->id }}">
        </div>
    </div>
    <div class="row g-3 align-items-center">
        <div class="col-4">
            <label for="inputPassword2" class="col-form-label">Name</label>
        </div>
        <div class="col-8">
            <input type="text" name="name" id="inputPassword2" class="form-control"
                aria-describedby="passwordHelpInline" value="{{ $allah_name->name }}">
        </div>
    </div>
    <div class="row g-3">
        <button type="submit" class="btn submit btn-primary float-right">Save</button>
    </div>

</form>
@stop