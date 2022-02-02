@if(session('token'))
@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="col-sm-6">
                    <h4 class="m-2">System words</h4>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Language</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($system_words as $system_word)
                            <tr>
                                <td>{{$system_word->id}}</td>
                                <td>{{$system_word->title}}</td>
                                <td>{{$system_word->text}}</td>
                                <td>{{$system_word->language->name}}</td>
                                <td>
                                    <a  href="{{ route('system_words.edit',$system_word->id) }}" class="btn btn-info  editInfo"><i class="fa fa-pen"></i></a>
                                    <button onclick="deleteTableRow()" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i></button>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <a class="create-info" href="{{ route('system_words.create') }}"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>

                </div>
            </div>
        </div>
    </div>
    {{ $system_words->links() }}
@stop
@endif
