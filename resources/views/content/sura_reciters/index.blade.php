@if(session('token'))
@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Sura-reciter</h4>
                </div>
                <div class="card-body table-responsive p-0" >
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sura</th>
                            <th>Ayah</th>
                            <th>Reciter</th>
                            <th>Audio</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sura_reciters as $sura_reciter)
                            <tr>
                                <td>{{$sura_reciter->id}}</td>
{{--                                <td>{{$sura_reciter->sura->ayah}}</td>--}}
                                <td>{{$sura_reciter->sura->sura}}</td>
                                <td>{{$sura_reciter->reciter->title}}</td>
                                <td>{{$sura_reciter->audio}}</td>
                                <td>
                                    <a  href="{{ route('sura_reciters.edit',$sura_reciter->id) }}" class="btn btn-info editInfo"><i class="fa fa-pen"></i></a>
                                    <button onclick="deleteTableRow()" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('sura_reciters.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@endif
