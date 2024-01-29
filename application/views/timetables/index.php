<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Classes TimeTabiles</h4>

                <!-- alerat message -->
                <div id="alert-m">

                </div>

                <!-- Filter by class name form -->
                <form class="" method="post">
                    <div class="row">
                        <div class="form-group col-md-3 my-2 ">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="filter-By" name="filter-By">

                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>

                <!-- button  -->
                <div class="float-right"><a href="javascript:void(0);" id="add-new" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add New</a></div>

                <div class="float-left">
                    <form id="download-pdf" method="get" action="<?= base_url('TimeTables/create_pdf') ?>">
                        <input type="hidden" name="c-id" id="c-id" value="">
                        <button type="submit" class="btn btn-success"><span class="fa fa-plus"></span>Download PDF</button>
                    </form>
                </div>

                <!-- data table -->
                <table id="example" class="table  table-bordered" style="width:100%">
                    <thead class="bg-info text-light">
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light">Class</th>
                            <th class="text-light">Teacher</th>
                            <th class="text-light">Subject</th>
                            <th class="text-light">Stating Time</th>
                            <th class="text-light">End Time</th>
                            <th class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody id="listRecords" class="bg-secondary text-dark">

                    </tbody>
                </table>

                <!-- add Time Tables Model  -->
                <form id="addTimeTabileForm" method="post">
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Class Time</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="name">Classes</label>
                                            <select class="form-control" name="class" id="class">
                                                <option value="">Select Class</option>
                                                <?php foreach ($classes as $d) : ?>
                                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <p id="class-error" class="text-danger">The Classs Fileld is Required. </p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Subject</label>
                                            <select class="form-control" name="subject" id="subject">
                                                <option value="">Select Subject</option>
                                            </select>
                                            <p id="subject-error" class="text-danger">The Subject Fileld is Required.</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Teacher</label>
                                            <select class="form-control" name="teacher" id="teacher" disabled>

                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="name">Class Starting Time</label>
                                            <input type="time" class="form-control" name="starting_time" id="starting_time">
                                            <p id="starting_time-error" class="text-danger">The This Fileld is Required.</p>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="name">Class End Time</label>
                                            <input type="time" class="form-control" name="end_time" id="end_time">
                                            <p id="end_time-error" class="text-danger">The This Fileld is Required.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- update Time Tables Model -->
                <form id="editTimeTabileForm" method="post">

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label for="name">Classes</label>
                                            <select class="form-control" name="edit_class" id="edit_class" disabled>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Subject</label>
                                            <select class="form-control" name="edit_subject" id="edit_subject" disabled>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="name">Teacher</label>
                                            <select class="form-control" name="edit_teacher" id="edit_teacher" disabled>

                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="name">Class Starting Time</label>
                                            <input type="text" value="" class="form-control" name="edit_starting_time" id="edit_starting_time">
                                            <p id="update-time1-error" class="text-danger">The This Fileld is Required.</p>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="name">Class End Time</label>
                                            <input type="text" value="" class="form-control" name="edit_end_time" id="edit_end_time">
                                            <p id="update-time2-error" class="text-danger">The This Fileld is Required.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="row_id" id="row_id" class="form-control">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function message_alart(type, message) {
        return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    <strong>${type} !</strong> ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
    }
    $('#class-error').hide();
    $('#subject-error').hide();
    $('#starting_time-error').hide();
    $('#end_time-error').hide();
    $('#update-time1-error').hide();
    $('#update-time2-error').hide();
    $(document).ready(function() {

        $('#filter-By').change(function() {
            example_table.ajax.reload();
        })

        // data tabile lod *****************
        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/TimeTables/view") ?>`,
                type: 'get',
                data: function(d) {
                    d.class_id = $('#filter-By').val();
                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {
                            return [
                                ++i,
                                d.cla_name,
                                d.tea_name,
                                `<a href="#"class="editRecord" data-id="${d.id}" data-toggle="modal" data-target="#editModal">${d.sub_name}</a>`,
                                d.starting_time,
                                d.end_time,
                                `<button type="button" id="delete-btn" data-id="${d.id}" class="btn btn-danger"><i class="bi bi-trash"></i></button>`,
                                $('#c-id').val(d.class_id),
                            ];

                        });
                    }

                    return [];
                }
            }
        });

        // data tabile end ****************

        //  subject get **************
        $('#class').change(function() {
            let class_id = $(this).val();
            $.ajax({
                url: `<?= base_url('TimeTables/subject_get') ?>`,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    class_id: class_id,
                },
                success: function(resp) {
                    let html = '';
                    if (resp.status == true) {
                        resp.response.map((d, i) => {
                            html = `<option value="${d.subject_id}">${d.name}</option>`;
                            $('#subject').append(html);
                        });

                    }
                }
            })

        })


        // teacher get **************
        $('#subject').change(function() {
            let sid = $(this).val();
            $.ajax({
                url: `<?= base_url('TimeTables/teacher_get') ?>`,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    sid: sid,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        $('#teacher').html(`<option value="${resp.response.teacher_id}">${resp.response.name}</option>`)
                    }
                }
            });
        });
        // teacher get ************** End

        // add model save data 
        $('#addTimeTabileForm').on('submit', function(e) {
            e.preventDefault();
            // $('#addEmpModal').modal('hide');
            let class_id = $('#class').val();
            let subject_id = $('#subject').val();
            let teacher_id = $('#teacher').val();
            let starting_time = $('#starting_time').val();
            let end_time = $('#end_time').val();

            if (class_id == '') {
                $('#class-error').show();
                return false;
            } else {
                $('#class-error').hide();

            }
            if (subject_id == '') {
                $('#subject-error').show();
                return false;
            } else {
                $('#subject-error').hide();

            }

            if (starting_time == '') {
                $('#starting_time-error').show();
                return false;
            } else {
                $('#starting_time-error').hide();

            }

            if (end_time == '') {
                $('#end_time-error').show();
                return false;
            } else {
                $('#end_time-error').hide();
            }

            $.ajax({
                url: `<?= base_url('TimeTables/create') ?>`,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    class_id: class_id,
                    subject_id: subject_id,
                    teacher_id: teacher_id,
                    starting_time: starting_time,
                    end_time: end_time,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        $('#class').val('');
                        $('#subject').val('');
                        $('#teacher').val('');
                        $('#starting_time').val('');
                        $('#end_time').val('');
                        $('#addModal').modal('hide');
                        let m = message_alart('success', resp.message)
                        $('#alert-m').html(m);
                        example_table.ajax.reload();

                    } else {
                        let m = message_alart('warning', resp.message)
                        $('#addModal').modal('hide');
                        $('#alert-m').html(m);
                    }
                },
                error: function(error) {
                    let m = message_alart('warning', error.message)
                    $('#alert-m').html(m);
                },
            })
        });

        // editRecord show
        $("body").on("click", ".editRecord", function() {
            let id = $(this).data("id");
            $.ajax({
                url: `<?= base_url("/TimeTables/recordshow") ?>`,
                type: "get",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(resp) {
                    if (resp.status == true) {
                        $('#editModal').show();
                        $('#edit_teacher').html(`<option value="">${resp.response.tea_name}</option>`);
                        $('#edit_subject').html(`<option value="">${resp.response.sub_name}</option>`);
                        $('#edit_class').html(`<option value="">${resp.response.cla_name}</option>`);
                        $('#row_id').val(resp.response.id);
                        $('#edit_starting_time').val(resp.response.starting_time);
                        $('#edit_end_time').val(resp.response.end_time);
                    } else {

                    }
                },
            });

        });

        // edit model save data
        $('#editTimeTabileForm').on('submit', function(e) {
            e.preventDefault();
            var id = $('#row_id').val();
            var edit_starting_time = $('#edit_starting_time').val();
            var edit_end_time = $('#edit_end_time').val();

            if (edit_starting_time == '') {
                $('#update-time1-error').show();
                return false;
            } else {
                $('#update-time1-error').hide();
            }
            if (edit_end_time == '') {
                $('#update-time2-error').show();
                return false;
            } else {
                $('#update-time2-error').hide();
            }

            $.ajax({
                type: "POST",
                url: `<?= base_url('/TimeTables/update') ?>`,
                dataType: "JSON",
                data: {
                    id: id,
                    starting_time: edit_starting_time,
                    end_time: edit_end_time
                },
                success: function(data) {
                    if (data.status == true) {
                        $("#edit_teacher").val("");
                        $("#edit_subject").val("");
                        $("#edit_class").val("");
                        $("#row_id").val("");
                        $("#edit_starting_time").val("");
                        $("#edit_end_time").val("");
                        $('#editModal').modal('hide');
                        example_table.ajax.reload();
                        let m = message_alart('success', data.message);
                        $('#alert-m').html(m);

                    } else {
                        let m = message_alart('warning', data.message);
                        $('#alert-m').html(m);
                        $('#editModal').modal('hide');

                    }
                }
            });
            return false;
        });

        // delete row
        $("body").on("click", "#delete-btn", function() {
            let id = $(this).data("id");
            if (confirm("Are you Sure I One to Delete This Recrod?")) {
                $.ajax({
                    url: `<?= base_url("/TimeTables/delete") ?>`,
                    type: "get",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(resp) {
                        if (resp.status == true) {
                            example_table.ajax.reload();
                            let m = message_alart('success', resp.message);
                            $('#alert-m').html(m);
                        } else {
                            let m = message_alart('warning', resp.message);
                            $('#alert-m').html(m);
                        }
                    },
                });
            }
            return false;


        });




    })
</script>