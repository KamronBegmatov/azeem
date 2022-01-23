@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Suras</h4>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sura</th>
                            <th>Aya</th>
                            <th>Text</th>
                            <th>Iso-code</th>
                            <th>name</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sura_langs as $sura_lang)
                            <tr>
                                <td>{{$sura_lang->id}}</td>
                                <td>{{$sura_lang->sura}}</td>
                                <td>{{$sura_lang->aya}}</td>
                                <td>{{$sura_lang->text}}</td>
                                <td>{{$sura_lang->iso_code}}</td>
                                <td>{{$sura_lang->name}}</td>
                                <td>{{$sura_lang->location}}</td>
                                <td><a  href="{{ route('sura_langs.edit',$sura_lang->id) }}" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('sura_langs.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
