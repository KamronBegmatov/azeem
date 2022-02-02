@if(session('token'))
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
                               aria-describedby="passwordHelpInline" value="{{ $allah_name_lang->id }}" disabled>
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword2" class="col-form-label">Allah name</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="allah_name_id">
                            <option selected value="{{$allah_name_lang->allah_name_id}}">{{$allah_name_lang->allahName->name}}</option>
                            @foreach($allah_names as $allah_name)
                                @if(!($allah_name->id == $allah_name_lang->allahName->id))
                                    <option value="{{$allah_name->id}}">{{$allah_name->name}}</option>
                                @endif
                            @endforeach
                        </select>
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
                        <label for="inputPassword4" class="col-form-label">Language</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="language_id">
                            <option selected>{{$allah_name_lang->language->name}}</option>
                            @foreach($languages as $language)
                                @if(!($language->id == $allah_name_lang->language->id))
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
