@if(session('token'))
@extends('layout.default')

@section('content')
<div class="create row">
    <div class="col-12">
        <form class="fill-form" method="POST" action="{{ url('sura_reciters') }}" enctype="multipart/form-data">
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
                    <label for="inputPassword3" class="col-form-label">Reciter</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="reciter_id">
                        @foreach($reciters as $reciter)
                            <option value="{{$reciter->id}}">{{$reciter->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword2" class="col-form-label">Sura</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="sura_id">
                        @foreach($suras as $sura)
                            <option value="{{$sura->sura}}">{{$sura->sura}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="inputPassword2" class="col-form-label">Sura</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="sura_id">
                        @foreach($suras as $sura)
                            <option value="{{$sura->ayah}}">{{$sura->ayah}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 align-items-center">
                <div class="col-4">
                    <label for="audio" class="col-form-label">Audio</label>
                </div>
                <div class="col-8">
                    <input type="file" name="audio" class="form-control" id="audio" accept="audio/*">
                </div>
            </div>
            <div class="row g-3">
                <button type="submit" class="btn submit btn-primary float-right">Save</button>
            </div>
        </form>
@stop
@endif
