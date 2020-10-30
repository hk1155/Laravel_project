@extends('layout.Master')
@section('content')
<br>
<a href="/addproduct" class="btn btn-primary">Add Product</a>
<hr>
@if (session('errmsg'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{Session::get('errmsg')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr id="trprod{{$item->pid}}">
            <td>{{$item->pid}}</td>
            <td>{{$item->category}}</td>
            <td>{{$item->pname}}</td>
            <td>{{$item->price}}</td>
            <td>
                <!--<a href="deleteprod/{{$item->pid}}"><i class="fa fa-trash" style="color: red;"></i></a>&nbsp;&nbsp; -->
                <a href="javascript:void(0);" onclick="fnprodelete('{{$item->pid}}')"><i class="fa fa-trash" style="color: red;"></i></a>&nbsp;&nbsp;

                @if($item->prodstatus==1)
                <a href="statustogle/{{$item->pid}}"><i class="fa fa-toggle-on" style="color: green;"></i></a>
                @else
                <a href="statustogle/{{$item->pid}}"><i class="fa fa-toggle-off" style="color: red;"></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('myjs.customjs')
@endsection