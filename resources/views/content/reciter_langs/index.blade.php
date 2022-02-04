@if(session('token'))
@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Reciter's Language</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Info</th>
                            <th>Reciter_id</th>
                            <th>Style_id</th>
                            <th>Language_id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reciter_langs as $reciter_lang)
                            <tr>
                                <td>{{$reciter_lang->name}}</td>
                                <td>{{$reciter_lang->info}}</td>
                                <td>{{$reciter_lang->reciter_id}}</td>
                                <td>{{$reciter_lang->style_id}}</td>
                                <td>{{$reciter_lang->language_id}}</td>
                                <td>
                                    <a  href="{{ route('reciter_langs.edit',$reciter_lang->id) }}" class="btn btn-info editInfo"><i class="fa fa-pen"></i></a>
                                    <button onclick="deleteTableRow()" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('reciter_langs.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@endif
