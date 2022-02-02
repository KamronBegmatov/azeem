@extends('layout.default')

@section('content')
<div class="edit row">
    <div class="col-12">
        <form class="fill-form" method="POST" action="{{ url('allah_name_langs', $allah_name_lang) }}">
            @method('PATCH')
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword1" class="col-form-label">ID</label>
                </div>
                <div class="col-8">
                    <input type="number" name="id" id="inputPassword1" class="form-control"
                        aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->id }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword2" class="col-form-label">Allah name ID</label>
                </div>
                <div class="col-8">
                    <input type="number" name="allah_name_id" id="inputPassword2" class="form-control"
                        aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->allah_name_id }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword3" class="col-form-label">Name</label>
                </div>
                <div class="col-8">
                    <input type="text" name="name" id="inputPassword3" class="form-control"
                        aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->name }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword4" class="col-form-label">Iso-code</label>
                </div>
                <div class="col-8">
                    <input type="text" name="iso_code" id="inputPassword4" class="form-control"
                        aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->iso_code }}">
                </div>
            </div>
            <div class="row g-3">
                <button type="submit" class="btn submit btn-primary float-right">Save</button>
            </div>

        </form>
    </div>
</div>

@stop
