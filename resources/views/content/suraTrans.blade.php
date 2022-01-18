@extends('layout.default')

@section('content')
    <div class="row m-2">
        <div class="col-sm-6">
            <h4 class="m-2">Название товара</h4>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>sura</th>
                                <th>aya</th>
                                <th>text</th>
                                <th>iso-code</th>
                                <th>name</th>
                                <th>location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>1</td>
                                <td>1</td>
                                <td>sura's text</td>
                                <td>ru</td>
                                <td>Al-fotiha</td>
                                <td>Makka</td>
                                <td><a href="/editLanguages" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        </tbody>
                        <a class="create-info" href="/createLanguages"><i class="fas fa-plus"></i> Добавить данные</a>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@stop