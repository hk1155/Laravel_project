@extends('layout.Master')
@section('content')
<br>
<a href="/addproduct" class="btn btn-primary">Add Product</a>
<hr>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->pname}}</td>
            <td>{{$item->price}}</td>
            <td><a href="deleteprod/{{$item->id}}"><i class="fa fa-trash" style="color: red;"></i></a>&nbsp;&nbsp;
                <a href="editprod/{{$item->id}}"><i class="fa fa-edit" style="color: blue;"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</table>

@endsection