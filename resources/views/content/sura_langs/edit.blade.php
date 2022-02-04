@extends('layout.default')

@section('content')
<div class="edit row">
    <div class="col-12">
        <form class="fill-form" method="POST" action="{{ url('sura_langs', $sura_lang) }}">
            @method('PATCH')
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword1" class="col-form-label">ID</label>
                </div>
                <div class="col-8">
                    <input type="number" name="id" id="inputPassword1" class="form-control"
                          value="{{ $sura_lang->id }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword2" class="col-form-label">Sura</label>
                </div>
                <div class="col-8">
                    <input type="number" name="sura" id="inputPassword2" class="form-control"
                          value="{{ $sura_lang->sura }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword3" class="col-form-label">Aya</label>
                </div>
                <div class="col-8">
                    <input type="number" name="aya" id="inputPassword3" class="form-control"
                          value="{{ $sura_lang->aya }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword4" class="col-form-label">Text</label>
                </div>
                <div class="col-8">
                    <input type="text" name="text" id="inputPassword4" class="form-control"
                          value="{{ $sura_lang->text }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword5" class="col-form-label">Iso-code</label>
                </div>
                <div class="col-8">
                    <input type="text" name="iso_code" id="inputPassword5" class="form-control"
                          value="{{ $sura_lang->iso_code }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword6" class="col-form-label">Name</label>
                </div>
                <div class="col-8">
                    <input type="text" name="name" id="inputPassword6" class="form-control"
                          value="{{ $sura_lang->name }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword7" class="col-form-label">Location</label>
                </div>
                <div class="col-8">
                    <input type="text" name="location" id="inputPassword7" class="form-control"
                          value="{{ $sura_lang->location }}">
                </div>
            </div>
            <div class="row g-3">
                <button type="submit" class="btn submit btn-primary float-right">Save</button>
            </div>

        </form>
    </div>
</div>

@stop
