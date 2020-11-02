@extends('layout.Master')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category</div>

                <div class="card-body">
                    <form method="post" id="addcategoryform" action="{{url('updatecat')}}">
                        <div class="form-group row">
                            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                            <input type="hidden" name="txthid" value="{{$catdata->cid}}">
                            <label for="txtcategory" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                                <select autofocus name="ddcompany" id="ddcompany" class="form-control">
                                    <option value="">--Select Company--</option>
                                    @foreach($compdata as $item)
                                    <option value="{{ $item->compid }}" {{ $item->company == $catdata->company ? "selected=''" : "" }}>{{$item->company}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtcategory" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="txtcategory" value="{{$catdata->category}}" name="txtcategory" required autocomplete="name" autofocus>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btninsertcategory" class="btn btn-primary">
                                    Update Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#addcategoryform").validate({
        rules: {
            ddcompany: {
                required: true,
            },
            txtcategory: {
                required: true,
                minlength: 2
            }

        },
        messages: {

            ddcompany: {

                required: 'Please Select The Copmpany',


            },
            txtcategory: {
                required: "Please enter category Name",
                minlength: "Your Product Name must consist at least 2 characters"
            }

        },
        submitHandler: function() {
            return true;
        }
    });
</script>

@endsection