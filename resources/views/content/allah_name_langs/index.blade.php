@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Translation of Allah names</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Allah name ID</th>
                            <th>Name</th>
                            <th>Iso-code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allah_name_langs as $allah_name_lang)
                            <tr>
                                <td>{{$allah_name_lang->id}}</td>
                                <td>{{$allah_name_lang->allah_name_id}}</td>
                                <td>{{$allah_name_lang->name}}</td>
                                <td>{{$allah_name_lang->iso_code}}</td>
                                <td>
                                    <a  href="{{ route('allah_name_langs.edit',$allah_name_lang->id) }}" class="btn btn-info editInfo"><i class="fa fa-pen"></i></a>
                                    <button onclick="deleteTableRow()" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
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
