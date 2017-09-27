@extends('layout')
@section('content')
    <div class="col-md-12">
        <div class="content-right show-group">
            <h3 class="title-content-right">Danh sách group</h3>
            <hr>
            <table class="table-hover" style="width: 100%">
                <tr>
                    <td>ID</td>
                    <td>Post ID</td>
                    <td>Người đăng</td>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->post_id}}</td>
                        <td>{{$post->users->name}}</td>
                    </tr>
                @endforeach
            </table>
            <button class="btn btn-info btn-add"><a href="{{route('getAddGroup')}}">Add group</a></button>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                <strong>{{session('message')}}</strong>
            </div>
        @endif
    </div>
@endsection