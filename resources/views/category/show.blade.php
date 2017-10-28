@extends('layout')
@section('content')
        <div class="content-right show-page" style="height: 100%">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách thể loại
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Tên thể loại</th>
                                <th style="text-align: center"></th>
                                <th style="text-align: center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <button class="btn btn-info"><a href="{{route('getEditCategory',$category->id)}}">Sửa</a></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"><a href="{{route('deleteCategory',$category->id)}}">Xóa</a></button>
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
            <button class="btn btn-info btn-add"><a href="{{route('getAddCategory')}}">Thêm thể loại</a></button>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
@endsection