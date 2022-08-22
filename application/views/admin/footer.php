<!--== BOTTOM FLOAT ICON ==-->
<!-- <section>
    <div class="fixed-action-btn vertical">
        <a class="btn-floating btn-large red pulse"> <i class="large material-icons">mode_edit</i> </a>
        <ul>
            <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a> </li>
            <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a> </li>
            <li><a class="btn-floating green"><i class="material-icons">publish</i></a> </li>
            <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a> </li>
        </ul>
    </div>
</section> -->

<script src="assets/admin/js/jquery.min.js"></script>
<script src="assets/admin/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/admin/js/materialize.min.js" type="text/javascript"></script>
<script src="assets/admin/js/custom.js"></script>
<script src="assets/admin/js/newcustom.js"></script>
<script src="assets/admin/js/angular.min.js"></script>
<script src="assets/admin/js/fileup.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    var allnames = [];
    var allnames1 = [];


    $.fileup({
        // url: 'example.com/your/path?file_upload=1',
        url: '<?php echo base_url("imagepreview"); ?>?file_upload=1',
        inputID: 'upload-2',
        dropzoneID: 'upload-2-dropzone',
        queueID: 'upload-2-queue',
        onSelect: function(file) {
            $('#multiple .control-button').show();
        },
        onRemove: function(file, total) {
            // remove_array_element(allnames,file.file.name);
            remove_array_element(allnames1, file.file.name);

            // $('#all_docs').val(allnames);
            $('#all_docs1').val(allnames1);
            // if (file === '*' || total === 1) {
            //     $('#multiple .control-button').hide();
            // }
        },
        onSuccess: function(response, file_number, file) {
            response = JSON.parse(response);
            if (response.status == "fail") {
                swal("Cancelled", response.message, "error");
                $('#fileup-upload-2-' + file_number).css('display', 'none');
            } else {
                allnames.push(response.name)
                allnames1.push(file.name);
                $('#all_docs').val(allnames);
                $('#all_docs1').val(allnames1);
            }
        },
        onError: function(event, file, file_number) {
            $.growl.error({
                message: "Upload error!"
            });
        }
    });

    function remove_array_element(array, n) {
        var index = array.indexOf(n);

        if (index > -1) {
            array.splice(index, 1);
            allnames.splice(index, 1);
            $('#all_docs').val(allnames);
        }
        return array;
    }
</script>
<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#city').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'citylist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>
<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#country').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'countrylist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>


<script type="text/javascript">
    if ($("#Action_addmanageform").length > 0) {
        $("#Action_addmanageform").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Action_addmanageform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    if ($("#updatemanageform").length > 0) {
        $("#updatemanageform").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#updatemanageform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#usertable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'userlist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>



<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#Inquiryusertable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'AllUserInquiry'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>

<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#Reviewusertable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'AllUserReview'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>

<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#cattable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'Allcategory'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });


        table = $('#lantable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'languageList'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });
    });
</script>

<script type="text/javascript">
    $(document.body).on('change', '.select_field_type', function() {
        var id = this.id;

        if (this.value == 1) {
            $('#file_added_' + id).append('<label for="un_contactno">*Text Box Label :  </label><input type="hidden"  value="text" name="form_type[]"><input type="text"  placeholder="Enter lable Name"  value="text" name="lable_name[]">');
        } else if (this.value == 2) {
            $('#file_added_' + id).append('<label for="un_contactno">*Textarea Box Label :  </label><input type="hidden"  value="textarea" name="form_type[]"><input type="text" placeholder="Enter textarea lable Name" value="" name="lable_name[]"></input>');
        } else if (this.value == 3) {
            $('#file_added_' + id).append('<label for="un_contactno">*Radio Box Label :  </label><input type="hidden"   value="radio" name="form_type[]"><input type="text" placeholder="Enter radio lable  Name"  value="" name="lable_name[]"></input>');

        } else {
            $('#file_added_' + id).append('<label for="un_contactno">*Checkbox Box Label :  </label><input type="hidden"  value="checkbox" name="form_type[]"><input type="text" placeholder="Enter lable Name"  value="" name="lable_name[]"></input>');

        }
    });


    $('.add-more').on('click', function() {
        var id = this.id;
        var counter = $('#counter').val();
        counter = parseInt(counter) + 1;
        $('#select_field').append('<div  class="file_remove_' + counter + '"><div class="col s12"><label>*Field type:</label><select id="' + counter + '" class="form-control select_field_type"><option value="">Select Field type</option><option value="1">Text Box</option><option value="2">Textarea</option><option value="3">Radio</option><option value="4">checkbox</option></select></div><div   id="file_added_' + counter + '"  class="col s12 colors 1"></div> <button  class="btn delete button-yellow uppercase" type="button">Remove</button></div>');



        $("body").on("click", ".delete", function(e) {
            $(this).parents('.file_remove_' + counter).remove();
            //the above method will remove the user_data div
        });

        $('#counter').val(counter);


    });



    $(document).on('click', '.Activeinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'changecountrystatus'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>


<script type="text/javascript">
    $(document).on('click', '.ReviewActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'ChangeReviewystatus'; ?>",
                method: "POST",
                data: {
                    rat_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.homeActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'homeActiveinactive'; ?>",
                method: "POST",
                data: {
                    rat_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>";
    if ($("#adminChangePassword").length > 0) {
        $("#adminChangePassword").validate({
            errorClass: 'errors',
            rules: {
                password: {
                    required: true,

                },

                npassword: {
                    required: true,

                },
                cpassword: {
                    required: true,
                    equalTo: "#npassword",
                },
            },
            messages: {
                password: {
                    required: "Please Enter password",
                    minlength: "The name should be greater than 3 characters"
                },
                npassword: {
                    required: "Please Enter New password"
                },
                cpassword: {
                    required: 'Please enter Confirm password'
                },
            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#adminChangePassword').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            console.log(base_url + response.url);
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 3000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    $(document).on('click', '.deletestetuscountry', function() {

        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'deletestetuscountry'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.deletestetuscategory', function() {

        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'deletestetuscategory'; ?>",
                method: "POST",
                data: {
                    cat_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.deleteFormfield', function() {

        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            var key_id = $(this).attr("key_attr");
            $.ajax({
                url: "<?php echo base_url() . 'deleteFormfield'; ?>",
                method: "POST",
                data: {
                    cat_id: user_id,
                    key_id: key_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>


<script type="text/javascript">
    $(document).on('click', '.UserActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'UserActiveinactive'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>





<script type="text/javascript">
    $(document).on('click', '.deletestetususer', function() {


        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'deletestetususer'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>




<!-- ---------------------------------------Subadmin --------------------------------->




<script type="text/javascript" language="javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#admintable').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'Subadminist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>


<script type="text/javascript">
    $(document).on('click', '.adminActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'adminActiveinactive'; ?>",
                method: "POST",
                data: {
                    admin_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>



<script type="text/javascript">
    $(document).on('click', '.deletestetusadmin', function() {


        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'deletestetusadmin'; ?>",
                method: "POST",
                data: {
                    admin_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>



<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#Add_subadmin").length > 0) {
        $("#Add_subadmin").validate({
            errorClass: 'errors',
            rules: {
                admin_rnpassword: {
                    required: true,
                    equalTo: "#admin_password",
                },
            },
            messages: {
                admin_rnpassword: {
                    required: 'Please enter Confirm password'
                },

            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Add_subadmin').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<!-- -------------------------------------End subamdin ----------------------------- -->

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#Action_Edit_Subadmin").length > 0) {
        $("#Action_Edit_Subadmin").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Action_Edit_Subadmin').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>




<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#registerform").length > 0) {
        $("#registerform").validate({
            errorClass: 'errors',
            rules: {
                user_name: {
                    required: true,
                    minlength: 3,
                },

                user_first_name: {
                    required: true,
                    minlength: 3,
                },

                rnpassword: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: "The name should be greater than 3 characters"
                },
                rnpassword: {
                    required: 'Please enter Confirm password'
                },
            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#registerform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<!-- home page manag form -->
<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#Homepageform").length > 0) {
        $("#Homepageform").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Homepageform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#updateregisterform").length > 0) {
        $("#updateregisterform").validate({
            errorClass: 'errors',
            rules: {
                user_name: {
                    required: true,
                    minlength: 3,
                },

                user_first_name: {
                    required: true,
                    minlength: 3,
                },


            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: "The name should be greater than 3 characters"
                },
                rnpassword: {
                    required: 'Please enter Confirm password'
                },
            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#updateregisterform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#Edit_admin_profile").length > 0) {
        $("#Edit_admin_profile").validate({
            errorClass: 'errors',
            rules: {
                admin_name: {
                    required: true,
                    minlength: 3,
                },

                admin_email: {
                    required: true,

                },
                phone: {
                    required: true,
                    minlength: 10,
                },

            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: "The name should be greater than 3 characters"
                },

            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Edit_admin_profile').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#actionupdatecity").length > 0) {
        $("#actionupdatecity").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#actionupdatecity').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);

                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#universityform").length > 0) {
        $("#universityform").validate({

            errorClass: 'errors',
            rules: {
                un_email: {
                    required: true,
                    email: true,
                },

            },
            messages: {
                un_emails: {
                    required: "Please Enter valid Email ",
                },

            },
            submitHandler: function(form) {
                toastr.clear();
                let action = $('#universityform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);

                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>


<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var country_id = $('#country').val();

            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>fetchCity",
                    method: "POST",
                    data: {
                        country_id: country_id
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        console.log(response.length)
                        if (response.length == 0) {
                            var option = "<option value=''>-- Select Sub Category --</option>";

                            $("#categt").html(option);
                        }
                        var len = 0;
                        if (response != null) {
                            len = response.length;
                        }



                        $("#categt").html('');
                        if (len >= 0) {
                            //Read data and create <option>
                            for (var i = 0; i <= (len - 1); i++) {

                                var id = response[i].country_id;
                                var title = response[i].country_name;
                                //console.log(id)
                                var option = "<option value='" + id + "'>" + title + "</option>";
                                console.log(option);

                                $("#categt").append(option);
                            }

                            $('select').material_select();
                        }

                    }

                });

            }

        });



    });
</script>

<script>
    $(document).ready(function() {
        ctiddata = $('#category1').val();

        $.ajax({
            url: "<?php echo base_url(); ?>fetchsubcat",
            method: "POST",
            data: {
                cat_id: ctiddata
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response.length)
                if (response.length == 0) {
                    var option = "<option value=''>-- Select Sub Category --</option>";

                    $("#subcategt").html(option);
                }
                var len = 0;
                if (response != null) {
                    len = response.length;
                }



                $("#subcategt").html('');
                if (len >= 0) {
                    //Read data and create <option>
                    for (var i = 0; i <= (len - 1); i++) {

                        var id = response[i].cat_id;
                        var title = response[i].cat_name;
                        //console.log(id)
                        var option = "<option value='" + id + "'>" + title + "</option>";
                        console.log(option);

                        $("#subcategt").append(option);
                    }

                    $('select').material_select();
                }

            }

        });


        $('#category1').change(function() {

            var country_id = $('#category1').val();

            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>fetchsubcat",
                    method: "POST",
                    data: {
                        cat_id: country_id
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        console.log(response.length)
                        if (response.length == 0) {
                            var option = "<option value=''>-- Select Sub Category --</option>";

                            $("#subcategt").html(option);
                        }
                        var len = 0;
                        if (response != null) {
                            len = response.length;
                        }



                        $("#subcategt").html('');
                        if (len >= 0) {
                            //Read data and create <option>
                            for (var i = 0; i <= (len - 1); i++) {

                                var id = response[i].cat_id;
                                var title = response[i].cat_name;
                                //console.log(id)
                                var option = "<option value='" + id + "'>" + title + "</option>";
                                console.log(option);

                                $("#subcategt").append(option);
                            }

                            $('select').material_select();
                        }

                    }

                });

            }

        });



    });
</script>

<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#Universitylist').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'Universitylist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>
<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#accomodationlist').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'accomodationlist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>
<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#Tourismlist').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url() . 'Tourismlist'; ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

    });
</script>


<script type="text/javascript">
    $(document).on('click', '.UnActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url() . 'UnActiveinactive'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.catActiveinactive', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url() . 'catActiveinactive'; ?>",
                method: "POST",
                data: {
                    cat_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>

<script type="text/javascript">
    $(document).on('click', '.publicstatus', function() {

        if (confirm('Are you sure to Change status this record ?')) {
            var user_id = $(this).attr("id");

            $.ajax({
                url: "<?php echo base_url() . 'un_publicstatus'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>



<script type="text/javascript">
    $(document).on('click', '.deletestatusUn', function() {


        if (confirm('Are you sure to remove this record ?')) {
            var user_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url() . 'deletestatusUn'; ?>",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        toastr.success(data.message, 'Success', {
                            timeOut: 3000
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    } else {
                        toastr.error(data.message, 'Error', {
                            timeOut: 3000
                        });
                    }

                }
            })
        }
    });
</script>


<script type="text/javascript">
    var base_url = "<?php echo base_url() ?>"; // Base url
    if ($("#Edituniversityform").length > 0) {
        $("#Edituniversityform").validate({

            submitHandler: function(form) {
                toastr.clear();
                let action = $('#Edituniversityform').attr('action-attr');
                var formData = new FormData(form);
                $.ajax({
                    url: "<?php echo base_url() ?>" + action,
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == true) {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });

                            setTimeout(function() {
                                window.location = base_url + response.url;
                            }, 4000);
                        } else {
                            toastr.error(response.message, 'Error', {
                                timeOut: 3000
                            });
                        }

                    }
                });
            }
        })
    }
</script>
<script type="text/javascript">
    $(function() {
        $('.upload-video-file').on('change', function() {
            if (isVideo($(this).val())) {
                $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
                $('.video-prev').show();
            } else {
                $('.upload-video-file').val('');
                $('.video-prev').hide();
                alert("Only video files are allowed to upload.")
            }
        });
    });

    // If user tries to upload videos other than these extension , it will throw error.
    function isVideo(filename) {
        var ext = getExtension(filename);
        switch (ext.toLowerCase()) {
            case 'm4v':
            case 'avi':
            case 'mp4':
            case 'mov':
            case 'mpg':
            case 'mpeg':
                // etc
                return true;
        }
        return false;
    }

    function getExtension(filename) {
        var parts = filename.split('.');
        return parts[parts.length - 1];
    }
</script>
</body>

</html>