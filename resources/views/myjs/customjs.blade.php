<script>
    // Delete product 
    function fnprodelete(id) {
        if (confirm('Are You Sure Delete Record ?')) {
            //alert("prodid: " + id);
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

    // category Toggle
    function fntoglecat(id) {
        $.ajax({
            url: 'cattogle/' + id,
            type: 'GET',
            dataType: "json",
            success: function(data) {

                if (data.success == "1") {
                    if (data.response == '0') {
                        // $("#toglediv" + id + " i").addClass("fa-toggle-off");
                        // $("#toglediv" + id + " i").removeClass("fa-toggle-on");
                        // $("#toglediv" + id + " i").css("color", "red");
                        $("#t" + id).addClass("fa-toggle-off");
                        $("#t" + id).removeClass("fa-toggle-on");
                        $("#t" + id).css("color", "red");
                    } else if (data.response == '1') {
                        $("#t" + id).addClass("fa-toggle-on");
                        $("#t" + id).removeClass("fa-toggle-off");
                        $("#t" + id).css("color", "green");
                    }
                } else {
                    alert(data.error);
                }
            }

        });

    }

    function fncompanyshow() {
        $("#showcompanyinput").show();
    }

    function fnhide() {
        $("#showcompanyinput").hide();
    }

    function fnshowcat() {
        var compid = $("#ddcompany").val();
        if (compid != "") {
            $.ajax({
                url: 'showcat/' + compid,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    //alert(result);
                    if (result.success == 1) {
                        $('#ddcategory').prop('disabled', false);
                        $("#ddcategory").html(result.response);
                    } else {
                        alert(result.error);
                    }
                }
            });
        }
        else
        {
            $('#ddcategory').val("");
            $('#ddcategory').prop('disabled', true);
            alert('Please Select Company');
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