@if(session('token'))
@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">Styles of reciters</h4>
                </div>
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Language</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($styles as $style)
                            <tr>
                                <td>{{$style->id}}</td>
                                <td>{{$style->name}}</td>
                                <td>{{$style->language->name}}</td>
                                <td><a  href="{{ route('styles.edit',$style->id) }}" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('styles.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@endif
