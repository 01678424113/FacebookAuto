@extends('layout')
@section('content')
    <div class="col-md-12">
        <div class="content-right show-page">
            <h3 class="title-content-right">Danh sách group</h3>
            <hr>
            <table class="table-hover" style="width: 100%">
                <tr>
                    <td>ID</td>
                    <td>Id group</td>
                    <td>Name group</td>
                    <td>Category group</td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach($groups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->group_id}}</td>
                        <td>{{$group->group_name}}</td>
                        <td>{{$group->category->name}}</td>
                        <td>
                            <button class="btn btn-info"><a href="{{route('getEditGroup',$group->id)}}">Edit</a></button>
                        </td>
                        <td>
                            <button class="btn btn-danger"><a href="{{route('deleteGroup',$group->id)}}">Delete</a></button>
                        </td>
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