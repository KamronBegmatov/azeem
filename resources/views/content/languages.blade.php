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
                                <th>language-code</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Uzbek</td>
                                <td>1</td>
                                <td>uz</td>
                                <td>uz-uz</td>
                                <td><a  href="/editLanguages" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Русский</td>
                                <td>1</td>
                                <td>ru</td>
                                <td>ru-ru</td>
                                <td><a href="/editLanguages" class="btn editInfo"><i class="fa fa-pen"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
