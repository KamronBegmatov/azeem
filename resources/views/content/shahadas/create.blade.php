@if(session('token'))
    @extends('layout.default')

@section('content')
    <div class="create row">
        <div class="col-12">
            <form class="fill-form" method="POST" action="{{ url('shahadas') }}">
                @csrf
                {{--    <div class="row g-3 align-items-center">
                        <div class="col-4">
                            <label for="inputPassword1" class="col-form-label">ID</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="id" id="inputPassword1" class="form-control"
                                 >
                        </div>
                    </div>--}}
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword2" class="col-form-label"> Text</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="text" id="inputPassword2" class="form-control"
                                >
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-4">
                        <label for="inputPassword3" class="col-form-label">Language</label>
                    </div>
                    <div class="col-8">
                        <select class="form-select" name="language_id">
                            @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <button type="submit" class="btn submit btn-primary float-right">Save</button>
                </div>

            </form>
            <div>
            </div>
@stop
@endif
