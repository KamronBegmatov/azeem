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
                            <th>system_word-code</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($system_words as $system_word)
                            <tr>
                                <td>{{$system_word->id}}</td>
                                <td>{{$system_word->name}}</td>
                                <td>{{$system_word->active}}</td>
                                <td>{{$system_word->iso_code}}</td>
                                <td>{{$system_word->system_word_code}}</td>
                                <td><a  href="{{ route('system_words.edit',$system_word->id) }}" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('system_words.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
