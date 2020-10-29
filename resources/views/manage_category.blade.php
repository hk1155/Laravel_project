@extends('layout.Master')
@section('content')
<br>
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">category details</strong>
                <a href="home" style="float: right;" class="btn btn-primary">Add category</a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('myjs.mainjs')
@endsection