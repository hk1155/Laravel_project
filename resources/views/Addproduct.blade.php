@extends('layout.Master')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Product</div>

                <div class="card-body">
                    <form method="POST" id="addproductform" action="insertproduct">
                        @csrf
                        <div class="form-group row">
                            <label for="txtpname" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="txtpname" name="txtpname" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="txtprice" type="number" class="form-control" name="txtprice" required autocomplete="email">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Product
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
    $("#addproductform").validate({
        rules: {
            txtpname: {
                required: true,
                minlength: 2
            },
            txtprice: {
                required: true,
                number: true,
                min: 0
            },
        },
        messages: {

            txtpname: {
                required: "Please enter Product Name",
                minlength: "Your Product Name must consist at least 2 characters"
            },
            txtprice: {
                required: "Please enter Price",
                min: 'Price should be greater than 0'
            },
        },
        submitHandler: function() {
            return true;
        }
    });
</script>

@endsection