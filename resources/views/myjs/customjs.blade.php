<script>
    function fnprodelete(id) {
        if (confirm('Are You Sure Delete Record ?')) {
            //alert(id);
            $.ajax({
                url: '/myajax/' + id,
                method: 'GET',
                data: {
                    pid: id
                },
                success: function(result) {
                    //alert(result);

                    if (result == 1) {
                        $("#trprod" + id).hide('slow');
                    }

                }
            });
        }

    }
    // $(document).on('click', ".deleteprod", function() {

    //     // if (confirm('Are u Sure Delete ?')) {
    //         var id=this.val();
    //         alert(id);


    //         $.ajax({

    //             url: '/myajax',
    //             method: 'POST',
    //             data: {
    //                 pid: id
    //             },
    //             success: function(result) {
    //                 alert(result);
    //             }
    //         });
    //     // }

    // });
</script>