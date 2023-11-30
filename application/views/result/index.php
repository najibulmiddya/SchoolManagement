<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Result Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Result</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- add button -->
                <div><a href="javascript:void(0);" id="add-new" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span>Result Create</a></div>

                <!-- Result download button -->
                <div class="float-right download_btn">
                    <form action="<?= base_url("/Result/DownloadPDF") ?>" method="get">
                        <input type="hidden" name="s_id" id="s_id">
                        <button type="submit" id="GeneratePdf" class="btn btn-primary mr-1">download Routine</button>
                    </form>
                </div>

                <!-- data Filter By Student name form -->
                <form class="form-inline" method="post">

                    <div class="form-group col-md-3 my-2 ">
                        <label class="my-2">Set Student</label>
                        <select class="form-control" style="width:100%" id="filter-By" name="filter-By">
                            <option value="">Filter By Student</option>
                            <?php foreach ($student as $d) : ?>
                                <option value="<?= $d->student_id ?>"><?= $d->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>

                <!-- data show in Tabile -->
                <!-- <table class="table table-bordered table-contextual"> -->
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="table-success">
                        <tr>
                            <th class="text-light"> S.NO</th>
                            <th class="text-light">Student Name</th>
                            <th class="text-light">Exam Type</th>
                            <th class="text-light"> Class </th>
                            <th class="text-light"> Subjact </th>
                            <th class="text-light">Marks</th>
                            <th class="text-light">Total Marks </th>
                            <th class="text-center text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody id=student-res>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- tabile data show -->
<script>
    $('.download_btn').hide();
    $(document).ready(function() {

        let sid = $('#filter-By').val();

        // Student id by get data
        $('#filter-By').change(function() {
            var student_id = $(this).val();
            // example_table.ajax.reload();
            $.ajax({
                "url": `<?= base_url("/Result/get_result") ?>/${student_id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    if (resp.length > 0) {
                        var html = '';
                        var i;
                        for (i = 0; i < resp.length; i++) {
                            var html = '';
                            var i;
                            for (i = 0; i < resp.length; i++) {
                                html += '<tr id="' + resp[i].id + '">' +
                                    '<td>' + i + '</td>' +
                                    '<td>' + resp[i].name + '</td>' +
                                    '<td>' + resp[i].exam_name + '</td>' +
                                    '<td>' + resp[i].class + '</td>' +
                                    '<td>' + resp[i].sub_name + '</td>' +
                                    '<td>' + resp[i].sub_marks + '</td>' +
                                    '<td>' + resp[i].sub_total_marks + '</td>' +

                                    '<td>' +

                                    '<a href = "javascript:void(0);" id = "editRecord" class = "btn btn-success btn-xs" data-id =' + resp[i].id + '>Edit</a>' +

                                    '<a href = "javascript:void(0);" id = "deleteRecord" class = "btn btn-xs btn-danger"  data-id =' + resp[i].id + '>DELETE</a>'

                                '</td>' +

                                '</tr>';
                            }
                            $('#student-res').html(html);
                            $('.download_btn').show();
                        }
                        $('#student-res').html(html);
                        $('#s_id').val(student_id);

                    } else {
                        $('.download_btn').hide();
                        $('#student-res').html(`<tr class="text-center text-danger"><td colspan="8">Records not available</td></tr>`);
                    }
                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });

        })


        // var example_table = $("#example").DataTable({
        //     responsive: true,
        //     autoWidth: false,
        //     serverSide: false,
        //     processing: true,
        //     ajax: {
        //         url: `<?= base_url("//Result/get_result") ?>`,
        //         type: 'get',
        //         data: function(d) {
        //             d.student_id = $('#filter-By').val();
        //         },
        //         dataSrc: function(resp) {
        //             if (resp.status == true) {
        //                 return resp.response.map((d, i) => {
        //                     return [
        //                         ++i,
        //                         d.name,
        //                         d.exam_name,
        //                         d.class,
        //                         d.sub_name,
        //                         d.sub_marks,
        //                         d.sub_total_marks,
        //                         '<a href = "javascript:void(0);" id = "editRecord" class = "btn btn-success btn-xs" data-id =' + d.id + '>Edit</a>',
        //                         '<a href = "javascript:void(0);" id = "deleteRecord" class = "btn btn-xs btn-danger"  data-id =' + d.id + '>DELETE</a>',

        //                     ];
        //                 });
        //             } else {

        //             }
        //             return [];
        //         }
        //     }
        // });

        $('#set-year').change(function() {
            var year = $(this).val()
        });
    })
</script>


<!-- Create Modal -->
<form id="saveEmpForm" method="post">
    <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label>Classes</label>
                            <select class="form-control" id="class" name="class">
                                <option value="">Select Class</option>
                                <?php foreach ($classes as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="classes_errpr" style="color: red;">**Select Classes</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Students Name</label>
                            <select class="form-control" id="student_name" name="student_name">
                                <option value="">Select Student</option>
                            </select>
                            <div id='Stu_name_error'></div>
                            <p id="student_name_errpr" style="color: red;">**Select Students Name</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Exam Name</label>
                            <select class="form-control" id="exam_name" name="exam_name">
                                <option value="">Select Class</option>
                                <?php foreach ($exam_type as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->exam_name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="exam_name_errpr" style="color: red;">**Select Exam Name</p>
                        </div>

                        <input type="hidden" name="ex_marks" value="" id="ex_marks" class="form-control">

                        <div class="form-group col-md-4">
                            <label for="mobile">Total Marks</label>
                            <span class="form-control" id="Total_Marks"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Subjact</label>
                            <select class="form-control" id="subject_id" name="subject_id">
                                <option value="">Select Subjact</option>
                            </select>
                            <p id="subject_id_errpr" style="color: red;">**Select Subjact</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Marks">Marks</label>
                            <input type="number" class="form-control" id="marks" name="marks">
                            <p id="marks_errpr" style="color: red;">**Marks Fild is required</p>
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

<script>
    $(document).ready(function() {
        // class select to Students get
        $("#class").change(function() {
            let id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/Result/get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    if (resp.length > 0) {
                        for (let index = 0; index < resp.length; index++) {
                            let student_id = resp[index].student_id;
                            let name = resp[index].name;
                            var opt = $('<option>').val(student_id).text(name);
                            $('#student_name').append(opt);
                        }
                    } else {
                        var error = $('<p class="text-danger">').text('Students Not Available');
                        $('#Stu_name_error').html(error);
                    }
                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });
        });

        // Exam Name select to total marks get
        $("#exam_name").change(function() {
            let id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/Result/exam_type_get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    $('#Total_Marks').text(resp.response.total_number);
                    $('#ex_marks').val(resp.response.total_number);

                },

                error: function(eror) {
                    alert("Server internal error");
                }
            });
        });

        // class select to subjact get
        $("#class").change(function() {
            let id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/subject_teacher/get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    if (resp.response) {
                        for (let index = 0; index < resp.response.length; index++) {
                            let id = resp.response[index].id;
                            let name = resp.response[index].name;
                            var opt = $('<option>').val(id).text(name);
                            $('#subject_id').append(opt);
                        }
                    } else {
                        var error = $('<p class="text-danger">').text('This Class Subject not available');
                        $('#subject_id_error').html(error);
                    }
                },

                error: function(eror) {
                    alert("Server internal error");
                }
            });
        });

        // data insrt to DB
        $('#classes_errpr').hide();
        $('#student_name_errpr').hide();
        $('#exam_name_errpr').hide();
        $('#subject_id_errpr').hide();
        $('#marks_errpr').hide();

        $('#saveEmpForm').submit('click', function() {
            var class_id = $('#class').val();
            var student_name = $('#student_name').val();
            var exam_name = $('#exam_name').val();
            var ex_marks = $('#ex_marks').val();
            var subject_id = $('#subject_id').val();
            var sub_marks = $('#marks').val();

            if (class_id == '') {
                $('#classes_errpr').show();
                return false;
            } else {
                $('#classes_errpr').hide();
            }
            if (student_name == '') {
                $('#student_name_errpr').show();
                return false;
            } else {
                $('#student_name_errpr').hide();
            }
            if (exam_name == '') {
                $('#exam_name_errpr').show();
                return false;
            } else {
                $('#exam_name_errpr').hide();
            }
            if (subject_id == '') {
                $('#subject_id_errpr').show();
                return false;
            } else {
                $('#subject_id_errpr').hide();
            }
            if (sub_marks == '') {
                $('#marks_errpr').show();
                return false;
            } else {
                $('#marks_errpr').hide();
            }



            $.ajax({
                type: "POST",
                url: `<?= base_url("/Result/create") ?>`,
                dataType: "JSON",
                data: {
                    class_id: class_id,
                    student_name: student_name,
                    exam_name: exam_name,
                    ex_marks: ex_marks,
                    subject_id: subject_id,
                    sub_marks: sub_marks,
                },
                success: function(data) {
                    $('#class').val('');
                    $('#student_name').val('');
                    $('#exam_name').val('');
                    $('#ex_marks').val('');
                    $('#subject_id').val('');
                    $('#marks').val('');
                    $('#addEmpModal').modal('hide');
                    alert(data.message);
                }
            });
            return false;
        });
    });
</script>