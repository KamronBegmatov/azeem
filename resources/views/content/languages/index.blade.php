@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Languages</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>active</th>
                            <th>iso-code</th>
                            <th>language-code</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{$language->id}}</td>
                                <td>{{$language->name}}</td>
                                <td>{{$language->active}}</td>
                                <td>{{$language->iso_code}}</td>
                                <td>{{$language->language_code}}</td>
                                <td>
                                    <a  href="{{ route('languages.edit',$language->id) }}" class="btn btn-info editInfo"><i class="fa fa-pen"></i></a>
                                    <button type="submit" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('languages.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
