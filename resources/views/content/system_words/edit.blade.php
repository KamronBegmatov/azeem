@if(session('token'))
@extends('layout.default')

@section('content')
<div class="edit row">
    <div class="col-12">
        <form class="fill-form" method="POST" action="{{ url('system_words', $system_word) }}">
            @method('PATCH')
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword1" class="col-form-label">ID</label>
                </div>
                <div class="col-8">
                    <input type="number" name="id" id="inputPassword1" class="form-control"
                        aria-describedby="passwordHelpInline" value="{{ $system_word->id }}"  disabled>
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
                    <label for="inputPassword4" class="col-form-label">Language</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="language_id">
                        <option selected value="{{$system_word->language->id}}">{{$system_word->language->name}}</option>
                        @foreach($languages as $language)
                            @if(!($language->id == $system_word->language->id))
                                <option value="{{$language->id}}">{{$language->name}}</option>
                            @endif
                        @endforeach
                    </select>
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
