@extends('layout')
@section('content')
    <div class="col-md-12 ">
        <div class="content-right show-page">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách page
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">ID page</th>
                                <th style="text-align: center">Tên page</th>
                                <th style="text-align: center">Thể loại page</th>
                                <th style="text-align: center"></th>
                                <th style="text-align: center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->id}}</td>
                                    <td>{{$page->page_id}}</td>
                                    <td>{{$page->page_name}}</td>
                                    <td>{{$page->category->name}}</td>
                                    <td>
                                        <button class="btn btn-info"><a
                                                    href="{{route('getEditPage',$page->id)}}">Sửa</a></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"><a href="{{route('deletePage',$page->id)}}">Xóa</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <button class="btn btn-info btn-add"><a href="{{route('getAddPage')}}">Add page</a></button>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
    </div>
@endsection