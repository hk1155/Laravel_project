<script>
    function fnprodelete(id) {
        if (confirm('Are You Sure Delete Record ?')) {
            alert("prodid: "+id);
            $.ajax({
                url: '/myajax/' + id,
                method: 'GET',
                success: function(result) {
                    //alert(result);
                    if (result == 1) {
                        $("#trprod" + id).hide('slow');
                    }

                }
            });
        }

    }

    function fntoglecat(id) {
        //alert(id);

        $.ajax({

            url: 'cattogle/' + id,
            type: 'GET',
            dataType: "json",
            success: function(data) {
                if(data.success == "1")
                {
                    if(data.response == '0')
                    { 
                        $("#toglediv"+id+" i").addClass("fa-toggle-off");
                        $("#toglediv"+id+" i").removeClass("fa-toggle-on");
                        $("#toglediv"+id+" i").css("color","red");
                    }
                    else if(data.response == '1')
                    {
                        $("#toglediv"+id+" i").addClass("fa-toggle-on");
                        $("#toglediv"+id+" i").removeClass("fa-toggle-off");
                        $("#toglediv"+id+" i").css("color","green");
                    }
                }
                else
                {
                    alert(data.error);
                }
            }


        });

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