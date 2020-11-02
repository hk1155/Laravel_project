@extends('layout.Master')
@section('content')

<h3>Session Id: {{ Session::getid()}}</h3>

@include('myjs.customjs')
@endsection

