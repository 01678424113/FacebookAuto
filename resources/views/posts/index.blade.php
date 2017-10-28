@extends('layout')
@section('content')
    <div class="content-right show-group" style="height: 100%">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách bài đăng
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">ID bài đăng</th>
                            <th style="text-align: center">Người đăng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            @if($post->users->id == Session::get('id_user'))
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->post_id}}</td>
                                    <td>{{$post->users->name}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        {{$posts->links()}}
        <button class="btn btn-info btn-add"><a href="{{route('getAddGroup')}}">Add group</a></button>
    </div>
    @if(session('message'))
        <div class="alert alert-success">
            <strong>{{session('message')}}</strong>
        </div>
    @endif
@endsection