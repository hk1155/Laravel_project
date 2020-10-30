@extends('layout.Master')
@section('content')
<br>
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">category details</strong>
                <a href="addcategory" style="float: right;" class="btn btn-primary">Add category</a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>

                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catdata as $item)
                        <tr>
                            <td>{{$item->category}}</td>
                            <td>
                                @if($item->status==1)
                                <div id="toglediv{{$item->cid}}">
                                    <a href="javascript:void(0);" onclick="fntoglecat('{{$item->cid}}')"><i class="fa fa-toggle-on" style="color: green;"></i></a>
                                </div>
                                @else
                                <div id="toglediv{{$item->cid}}">
                                    <a href="javascript:void(0);" onclick="fntoglecat('{{$item->cid}}')"><i class="fa fa-toggle-off" style="color: red;"></i></a>
                                </div>
                                @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('myjs.customjs')
@include('myjs.mainjs')
@endsection