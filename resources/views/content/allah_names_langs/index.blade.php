@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">

                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>active</th>
                            <th>iso-code</th>
                            <th>allah_name_lang-code</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allah_name_langs as $allah_name_lang)
                            <tr>
                                <td>{{$allah_name_lang->id}}</td>
                                <td>{{$allah_name_lang->name}}</td>
                                <td>{{$allah_name_lang->active}}</td>
                                <td>{{$allah_name_lang->iso_code}}</td>
                                <td>{{$allah_name_lang->allah_name_lang_code}}</td>
                                <td><a  href="{{ route('allah_name_langs.edit',$allah_name_lang->id) }}" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('allah_name_langs.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
