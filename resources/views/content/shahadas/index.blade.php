@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Shahadas</h4>
                </div>
                <div class="card-body table-responsive p-0" >
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Iso-code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shahadas as $shahada)
                            <tr>
                                <td>{{$shahada->id}}</td>
                                <td>{{$shahada->text}}</td>
                                <td>{{$shahada->iso_code}}</td>
                                <td><a  href="{{ route('shahadas.edit',$shahada->id) }}" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('shahadas.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
