<!-- alart message -->
<div id="success_alert" class='alert alert-success' role='alert'> </div>
<div id="danger_alert" class='alert alert-danger' role='alert'> </div>


<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Students </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Students</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Students</h4>

                <!-- ******************button************** -->
                <div class="float-right">
                    <a href="<?= base_url('student/save') ?>" class="btn btn-success ">Add Student</a>
                </div>

                <div class="float-left">
                    <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#exampleModal">
                        <i class="bi bi-envelope"></i> Send Mail
                    </button>
                </div>

                <div class="float-left">
                    <a href="<?= base_url('student/export') ?>" id="Export" class="btn btn-success mr-1"> Export</a>
                </div>

                <div class="float-left">
                    <a href="<?= base_url('GeneratePdfController') ?>" id="GeneratePdf" class="btn btn-primary mr-1">Generate Pdf</a>
                </div>

                <!-- =====================   data table   ========================= -->
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="table-warning">
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light"> Photo </th>
                            <th class="text-light"> Name </th>
                            <th class="text-light"> Mobile </th>
                            <th class="text-light"> Email </th>
                            <th class="text-light"> Gender </th>
                            <th class="text-center text-light"> Action </th>
                        </tr>
                    </thead>
                    <tbody id="listRecords" class="table-sm">
                        <?php
                        if ($students) :
                            $a = 1;
                            foreach ($students as $k => $d) :
                        ?>
                                <tr>
                                    <td><?= $a++ ?></td>

                                    <td>
                                        <img style="width: 50px; height:50px;" src="<?php if ($d->photo == "") {
                                                                                        echo base_url('uploads/download.png');
                                                                                    } else {
                                                                                        echo base_url('uploads/' . $d->photo);
                                                                                    } ?>" />
                                    </td>

                                    <td><a href="<?= base_url("student/save/{$d->id}") ?>"><?= $d->name ?></a></td>
                                    <td><?= $d->mobile ?></td>

                                    <td><a href="<?= base_url("student/send_mail/{$d->id}") ?>"><?= $d->email ?></a></td>

                                    <td><?= $d->gender ?></td>

                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-success view-record" data-id="<?= $d->id ?>"><i class="bi bi-eye"></i></a>

                                        <a href="<?= base_url("student/delete/{$d->id}") ?>" class="btn  btn-danger del-record"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>

                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<!-- All Students Send Mail -->
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All Students Send Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="forms-sample" id="saveEmpForm" method="post">

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">From</label>
                        <div class="col-sm-9">
                            <input type="email" name="from_email" class="form-control" id="from_mail">
                            <?php echo form_error('from_email', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">subject</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="subject" name="subject" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message" name="message" rows="8"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="sub_btn" class="btn btn-success">Send</button>

                        <button class="btn btn-success" type="submit" disabled id="load_btn">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Sending...
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- Student view model  -->
<div class="modal fade" id="view_model" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Student View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-contextual">
                    <thead class="table-warning">
                        <tr>
                            <th class="text-light"> Id </th>
                            <th class="text-light"> Name </th>
                            <th class="text-light"> Mobile </th>
                            <th class="text-light"> Email </th>
                            <th class="text-light"> Date Of Birth </th>
                            <th class="text-light"> Gender </th>
                            <th class="text-light"> Address </th>
                            <th class="text-light"> Address </th>
                        </tr>
                    </thead>
                    <tbody id="viewRecords">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#success_alert").hide();
    $("#danger_alert").hide();
    $("#load_btn").hide();

    $(document).ready(function() {
        new DataTable('#example');
        // Sending mail
        $('#saveEmpForm').submit('click', function() {
            $("#sub_btn").hide();
            $("#load_btn").show();
            var from_mail = $('#from_mail').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            if (from_mail == null || from_mail == "") {
                alert("Error: This From field is required");
                $("#load_btn").hide();
                $("#sub_btn").show();
                return false;
            } else if (subject == null || subject == "") {
                alert("Error: This Subject field is required");
                $("#load_btn").hide();
                $("#sub_btn").show();
                return false;
            } else if (message == null || message == "") {
                alert("Error: This Message field is required");
                $("#load_btn").hide();
                $("#sub_btn").show();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: `<?= base_url("/Student/sending_mail") ?>`,
                    dataType: "JSON",
                    data: {
                        from_mail: from_mail,
                        subject: subject,
                        message: message,
                    },
                    success: function(data) {
                        if (data.status == true) {
                            $('#from_mail').val('');
                            $('#subject').val('');
                            $('#message').val('');
                            $("#success_alert").html(data.message);
                            $("#success_alert").show();
                            $('#exampleModal').modal('hide');
                            $("#load_btn").hide();
                            $("#sub_btn").show();
                        } else {
                            $('#danger_alert').html(data.message)
                            $("#danger_alert").hide();
                        }
                    },
                    error: function(eror) {
                        alert("Server internal error");
                    }
                });
                return false;
            }

        });



        //  student records view
        $('#listRecords').on('click', '.view-record', function() {
            var id = $(this).data('id');
            $.ajax({
                "url": `<?= base_url("/student/get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(data) {
                    var html =
                        '<tr >' +
                        '<td>' + data.response.id + '</td>' +
                        '<td>' + data.response.name + '</td>' +
                        '<td>' + data.response.mobile + '</td>' +
                        '<td>' + data.response.email + '</td>' +
                        '<td>' + data.response.dob + '</td>' +
                        '<td>' + data.response.gender + '</td>' +
                        '<td>' + data.response.address + '</td>' +
                        '<td>' + data.response.class + '</td>' +
                        '</tr>';
                    $('#viewRecords').html(html);
                    $('#view_model').modal('show');

                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });

        });

    });
    // confirm("");
    $("#Export").click(function() {
        if (!confirm("Press ok to download record")) {
            return false;
        }
    });
    $("#GeneratePdf").click(function() {
        if (!confirm("Press ok to Generate Pdf")) {
            return false;
        }
    });
</script>