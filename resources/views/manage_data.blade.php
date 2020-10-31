@extends('layout.Master')
@section('content')
<br>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Category details</strong>
                <select style="float: right;" id="selectcomp">
                    <option value="">--Select Company--</option>
                    @foreach($compdata as $item)
                    <option value="{{$item->compid}}">{{$item->company}}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered categorydata">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@include('myjs.mainjs')
<script>
    $(document).on('change', "#selectcomp", function() {
        var selectedValue = $(this).val();
        //alert(selectedValue);
        tbl.ajax.url("getData/" + $("#selectcomp").val()).load();

    });

    var tbl = $('.categorydata').DataTable({
        "responsive": true,
        "processing": true,
        "destroy": true,
        "ordering": false,
        "autoWidth": false,
        "ajax": {
            url: "{{ url('getData')}}",
            dataSrc: ""
        },
        "columns": [{
                data: 'cid'
            },
            {
                data: 'category'
            },
            {
                "data": "CarerID",
                "render": function(data, type, row) {
                    return '<a href="javascript:void(0)">Delete</a>';
                }
            }

        ],
    });

    function fndeletedata(id) {

    }
    // $(document).on('change', "#selectcomp", function() {
    //     var selectedValue = $(this).val();

    //     $.ajax({

    //         url: 'getData/' + selectedValue,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(result) {
    //             // alert(result);

    //             if (result.success == 1) {
    //                 $("#tablebody").html(result.response);
    //             } else {

    //                 alert(result.error);
    //             }
    //         }

    //     })

    // });
</script>
@endsection