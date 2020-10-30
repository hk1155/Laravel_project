@extends('layout.Master')
@section('content')
<br>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Company details</strong>
                <a href="javascript:void(0);" onclick="fncompanyshow()" style="float: right;" class="btn btn-primary">Add Company</a>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Company</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compdata as $row)
                        <tr>
                            <td>
                                {{$row->compid}}
                            </td>
                            <td>
                                {{$row->company}}
                            </td>
                            <td>
                              <a href="javascript:void(0);"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="display: none;" id="showcompanyinput">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Add Company</strong>
                <a href="javascript:void(0);" onclick="fnhide();" style="float: right;color:red;">X</a>
            </div>
            <div class="card-body">
                <form action="insertcompany" method="post">
                    @csrf
                    <div class="form-group-row">
                        <input type="text" name="txtcompany" class="form-control" placeholder="Enter Company Name">
                    </div>
                    <br>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add Company
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('myjs.customjs')
@include('myjs.mainjs')
@endsection