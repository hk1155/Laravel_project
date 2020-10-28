@extends('layout.Master')
@section('content')
<div>
    <form action="#" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" id="txtpname" name="txtpname" placeholder="Enter Product Name">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="password" class="form-control" id="txtprice" name="txtprice" placeholder="Enter Price">
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
    <script>

    </script>
</div>


@endsection