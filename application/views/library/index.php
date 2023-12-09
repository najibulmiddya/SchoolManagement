<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Library Book</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Alart message -->
                <div id="alert-m">

                </div>

                <!-- Filter By Class form -->
                <form>
                    <div class="row ">
                        <div class="form-group col-md-3 my-2 ">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="filter-class" name="filter-class">
                                <?php foreach ($classes as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </form>
                <!-- add button  -->
                <div class="float-right">
                    <button class="btn btn-primary" id="add-btn" data-toggle="modal" data-target="#addModal">Add New</button>
                </div>

                <!-- Data show in Tabile -->
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="table-success">
                        <tr>
                            <th class="text-light"> S.NO</th>
                            <th class="text-light">Student Name</th>
                            <th class="text-light">Book Name</th>
                            <th class="text-light"> Stating Dtte </th>
                            <th class="text-light"> Expiry Date </th>
                            <th class="text-light"> Status</th>
                            <th class="text-light"> Fine</th>
                            <th class="text-light"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ADD Model -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="class" name="class">
                                <option value="">Select Class</option>
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="text-danger" id="class_error">Class Fild is Required</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Select Students</label>
                            <select class="form-control" style="width:100%" id="students" name="students">
                                <option value="">Select Student</option>
                            </select>
                            <p class="text-danger" id="student_error">Student Fild is Required</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Select Book</label>
                            <select class="form-control" style="width:100%" id="book" name="book">
                                <option value="">Select Book</option>
                            </select>
                            <p class="text-danger" id="book_error">Book Fild is Required</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Date</label>
                            <input type="text" value="<?= date('d/m/Y') ?>" name="date" id="date" class="form-control">
                            <p class="text-danger" id="date_error">Date Fild is Required</p>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="my-2">End Date</label>
                            <input type="date" name="end-date" id="end-date" class="form-control">
                            <p class="text-danger" id="end-date_error">End-Date Fild is Required</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Model -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Recrod</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="Edit-form">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="edit-class" name="edit-class" disabled>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Select Students</label>
                            <select class="form-control" style="width:100%" id="edit-students" name="edit-students" disabled>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Select Book</label>
                            <select class="form-control" style="width:100%" id="edit-book" name="edit-book">

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Date</label>
                            <input type="text" value="" name="edit-date" id="edit-date" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="my-2">End Date</label>
                            <input type="date" value="" name="edit-end-date" id="edit-end-date" class="form-control" required>
                        </div>

                        <input type="hidden" id="recrod-id" name="recrod-id" value="">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        // <!-- Alart Message function -->
        function message_alart(type, message) {
            return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    <strong>${type} !</strong> ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
        }

        // Class Change Data Table load
        $('#filter-class').change(function() {
            example_table.ajax.reload();
        });

        // <!-- table data show -->
        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/library/get_all") ?>`,
                type: 'get',
                data: function(d) {
                    d.class_id = $('#filter-class').val();
                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {

                            let c = function GetTodayDate() {
                                var tdate = new Date();
                                var dd = tdate.getDate(); //yields day
                                var MM = tdate.getMonth(); //yields month
                                var yyyy = tdate.getFullYear(); //yields year
                                var currentDate = yyyy + "-" + (MM + 1) + "-" + dd;
                                return currentDate;
                            }

                            let a = "";
                            if (c === d.end_date) {
                                a = "expery";
                            } else {
                                a = "active";
                            }

                            return [
                                ++i,
                                d.name,
                                d.sub_name,
                                d.date,
                                d.end_date,
                                a,
                                '10',
                                `<button type="button" class="btn btn-success" data-id="${d.id}" id="edit-record" data-toggle="modal" data-target="#EditModal"><i class="bi bi-pencil-square"></i></button>

                               <button type="button" class="btn btn-danger" data-id="${d.id}" id="delete-record"><i class="bi bi-trash"></i></button>`,
                            ];
                        });

                    } else {
                        return false;
                    }
                    return [];
                }
            }
        });

        // Class by Students Get
        $('#class').change(function() {
            let class_id = $(this).val();
            $.ajax({
                url: `<?= base_url('library/student_get') ?>`,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    class_id: class_id,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        resp.response.map((d, i) => {
                            $('#students').append(`<option value="${d.student_id}">${d.name}</option>`);
                        });
                    } else {
                        return false;
                    }
                },
            });
            // Class by Subjects Get
            $.ajax({
                url: `<?= base_url('library/subject_get') ?>`,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    class_id: class_id,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        resp.response.map((d, i) => {
                            $('#book').append(`<option value="${d.id}">${d.name}</option>`);
                        });
                    } else {
                        return false;
                    }
                },
            });
        });

        // Create Model Error Sohw
        $('#class_error').hide();
        $('#student_error').hide();
        $('#book_error').hide();
        $('#date_error').hide();
        $('#end-date_error').hide();

        // Add Model Data Save
        $('#add-form').submit('click', function(e) {
            e.preventDefault();
            let class_id = $('#class').val();
            let student_id = $('#students').val();
            let book_id = $('#book').val();
            let date = $('#date').val();
            let end_date = $('#end-date').val();
            // alert(date);

            if (class_id == '') {
                $('#class_error').show();
                return false;
            } else {
                $('#class_error').hide();
            }
            if (student_id == '') {
                $('#student_error').show();
                return false;
            } else {
                $('#student_errpr').hide();
            }
            if (book_id == '') {
                $('#book_error').show();
                return false;
            } else {
                $('#book_error').hide();
            }
            if (date == '') {
                $('#date_errpr').show();
                return false;
            } else {
                $('#date_errpr').hide();
            }
            if (end_date == '') {
                $('#end-date_errpr').show();
                return false;
            } else {
                $('#end-date_errpr').hide();
            }

            $.ajax({
                url: `<?= base_url('library/save') ?>`,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    class_id: class_id,
                    student_id: student_id,
                    book_id: book_id,
                    date: date,
                    end_date: end_date,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        $('#class').val('');
                        $('#students').val('');
                        $('#book').val('');
                        // $('#date').val('');
                        $('#end-date').val('');
                        $('#addModal').modal('hide');
                        example_table.ajax.reload();
                        let m = message_alart('success', resp.message);
                        $('#alert-m').html(m);
                    } else {
                        let m = message_alart('warning', resp.message);
                        $('#alert-m').html(m);
                    }
                },
            });
        });

        // Delete Record
        $('body').on('click', '#delete-record', function() {
            let id = $(this).data("id");
            if (confirm("Are you Sure I One to Delete This Recrod?")) {
                $.ajax({
                    url: `<?= base_url("/library/delete") ?>`,
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

        // Edit Record Show
        $('body').on('click', '#edit-record', function() {
            let id = $(this).data("id");
            $.ajax({
                url: `<?= base_url("/library/edit") ?>`,
                type: "get",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(resp) {
                    if (resp.status == true) {
                        $('#edit-class').html(`<option value="${resp.response.class_id}" >${resp.response.class}</option>`);
                        $('#edit-students').html(`<option value="${resp.response.student_id}" >${resp.response.name}</option>`);
                        $('#edit-book').html(`<option value="${resp.response.book_id}" selected >${resp.response.sub_name}</option>`);
                        $('#edit-date').val(resp.response.date);
                        $('#edit-end-date').val(resp.response.end_date);
                        $('#recrod-id').val(resp.response.id);
                        // subject get by class
                        $.ajax({
                            url: `<?= base_url('library/subject_get') ?>`,
                            type: 'GET',
                            dataType: 'JSON',
                            data: {
                                class_id: resp.response.class_id,
                            },
                            success: function(resp) {
                                if (resp.status == true) {
                                    resp.response.map((d, i) => {
                                        $('#edit-book').append(`<option value="${d.id}">${d.name}</option>`);
                                    });
                                } else {
                                    return false;
                                }
                            },
                        });
                    } else {
                        let m = message_alart('warning', resp.message);
                        $('#alert-m').html(m);
                        return false;
                    }
                },
            });
        })

        // Edit Record Save
        $('#Edit-form').on('submit', function(e) {
            e.preventDefault();
            let id = $('#recrod-id').val();
            let book_id = $('#edit-book').val();
            let date = $('#edit-date').val();
            let end_date = $('#edit-end-date').val();

            $.ajax({
                url: `<?= base_url('library/update') ?>`,
                dataType: 'JSON',
                type: 'POST',
                data: {
                    id: id,
                    book_id: book_id,
                    date: date,
                    end_date: end_date,
                },
                success: function(resp) {
                    if (resp.status == true) {
                        $('#recrod-id').val('');
                        $('#edit-book').val('');
                        $('#edit-date').val('');
                        $('#edit-end-date').val('');
                        example_table.ajax.reload();
                        $('#EditModal').modal('hide');
                        let m = message_alart('success', resp.message);
                        $('#alert-m').html(m);
                    } else {
                        $('#EditModal').modal('hide');
                        let m = message_alart('info', resp.message);
                        $('#alert-m').html(m);
                        return false;
                    }
                }
            });

        });
    })
</script>