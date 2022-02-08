@if(session('token'))
    @extends('layout.default')

@section('content')
    <div class="edit row">
        <div class="col-12">
            <form class="fill-form" method="POST" action="{{ url('reciter_langs', $reciter_lang) }}">
                @method('PATCH')
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword1" class="col-form-label">Name</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="name" id="inputPassword1" class="form-control"
                                 value="{{ $reciter_lang->name }}" disabled>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword2" class="col-form-label">Info</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="info" id="inputPassword2" class="form-control"
                                 value="{{ $reciter_lang->info }}" disabled>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword3" class="col-form-label">Reciter_id</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="reciters_id" id="inputPassword3">
                            @foreach($reciter_langs as $reciter_lang)
                                <option value="{{$reciter_lang->reciter_id}}">{{$reciter_lang->reciter_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword4" class="col-form-label">Style_id</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="style_id" id="inputPassword4">
                            @foreach($reciter_langs as $reciter_lang)
                                <option value="{{$language->id}}">{{$reciter_lang->style_id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword5" class="col-form-label">Language_id</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="language_id" id="inputPassword5">
                            @foreach($reciter_langs as $reciter_lang)
                                <option value="{{$reciter_lang->language_id}}">{{$reciter_lang->language_id}}</option>
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
