@if(session('token'))
@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Reciters</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reciters as $reciter)
                            <tr>
                                <td>{{$reciter->title}}</td>
                                <td>{{$reciter->image}}</td>
                                <td>
                                    <a  href="{{ route('reciters.edit',$reciter->id) }}" class="btn btn-info editInfo"><i class="fa fa-pen"></i></a>
                                    <button onclick="deleteTableRow()" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('reciters.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@endif
