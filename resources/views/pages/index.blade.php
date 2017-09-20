@extends('layout')
@section('content')
    <div class="col-md-10">
        <div class="categories">
            <select name="" id="">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <br>
            <br>
        </div>
        <div class="form-page">
            <table class="table-hover">
                <tr>
                    <td>ID</td>
                    <td>Id page</td>
                    <td>Name page</td>
                    <td>Category page</td>
                    <td>Delete</td>
                </tr>
                @foreach($pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->page_id}}</td>
                        <td>{{$page->page_name}}</td>
                        <td>{{$page->category->name}}</td>
                        <td>
                            <button class="btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            <button>Add page</button>
        </div>
    </div>
@endsection