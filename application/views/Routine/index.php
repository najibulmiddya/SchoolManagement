<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Routine Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Routine</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Filter By Class form -->
                <form>
                    <div class="row ">
                        <div class="form-group col-md-3 my-2 ">
                            <label class="my-2">Set Classes</label>
                            <select class="form-control" style="width:100%" id="filter-By" name="filter-By">
                                <?php foreach ($class as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                </form>

                <!-- add button -->
                <div class="float-right"><a href=" javascript:void(0);" id="add-new" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal">Add Routine</a></div>

                <!-- Routine download button -->
                <div class="float-left download_btn">
                    <form action="<?= base_url("/Routine/DownloadPDF") ?>" method="get">
                        <input type="hidden" name="c_id" id="c_id">
                        <button type="submit" id="GeneratePdf" class="btn btn-success mr-1">Download Routine</button>
                    </form>
                </div>

                <!-- data show in Tabile -->
                <table id="example" class="table table-bordered table-hover" style="width:100%">
                    <thead class="table-success">
                        <tr>
                            <th class="text-light"> S.No </th>
                            <th class="text-light">Exam Type</th>
                            <th class="text-light"> Class </th>
                            <th class="text-light"> Subjact </th>
                            <th class="text-light">Date</th>
                            <th class="text-light">Day</th>
                            <th class="text-light">Time </th>
                            <th class="text-light">To Time</th>
                            <th class="text-light">Year</th>
                            <th class="text-center text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-sm">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var class_id = $('#filter-By').val();
        $('#c_id').val(class_id);
        $('#filter-By').change(function() {
            example_table.ajax.reload();
            var class_id = $(this).val();
            $('#c_id').val(class_id);
        });

        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/Routine/get_all") ?>`,
                type: 'get',
                data: function(d) {
                    d.class_id = $('#filter-By').val();
                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        $('.download_btn').show();
                        return resp.response.map((d, i) => {
                            return [
                                ++i,
                                d.exam_name,
                                d.class_name,
                                d.sub_name,
                                d.date,
                                d.week,
                                d.time,
                                d.time_to,
                                d.year,

                                `<div class="btn-group btn-sm" id="data_sav">

                                    <button type="button" class="btn btn-success editRecord " data-id="${d.id}"><i class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-danger deleteRecord" data-id="${d.id}"><i class="bi bi-trash"></i></button>

                                </div>`,
                            ];
                        });
                    } else {
                        $('.download_btn').hide();
                    }
                    return [];
                }
            }
        });

    })
</script>

<!-- Roution Create Modal -->
<form id="saveEmpForm" method="post">
    <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Routine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Exam Type</label>
                            <select class="form-control" id="exam_type" name="exam_type">
                                <option value="">Select Exam Type</option>
                                <?php foreach ($e_type as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->exam_name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="exam_type_error" style="color: red;">**Select Exam Type</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Classes</label>
                            <select class="form-control" id="class" name="class">
                                <option value="">Select Class</option>
                                <?php foreach ($class as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="classes_errpr" style="color: red;">**Select Classes</p>
                        </div>


                        <div class="form-group col-md-6">
                            <label>Subjact</label>
                            <select class="form-control" id="subjact" name="subjact">
                                <option value="">Select Subjact</option>
                            </select>
                            <p id="subjact_errpr" style="color: red;">**Select Subjact</p>
                            <div id='class_select'></div>
                            <div id='subject_id_error'></div>
                        </div>


                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="date" name="date1" id="date1" class="form-control">
                            <p id="date1_errpr" style="color: red;">**Select Date</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Day</label>
                            <select class="form-control" id="week" name="week">
                                <option value="">Select Day</option>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                            <p id="day_error" style="color: red;">****Select Day</p>
                        </div>


                        <div class="form-group col-md-6">
                            <label>Time</label>
                            <input type="time" name="time1" id="time1" class="form-control">
                            <p id="time1_error" style="color: red;">**Time is missing</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Time To</label>
                            <input type="time" name="time_to" id="time_to" class="form-control">
                            <p id="time_to_error" style="color: red;">**Time To is missing</p>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="academic_year">Year</label>
                            <select class="form-control" id="year" name="year" required>
                                <?php
                                $year = (date("Y") - 1);
                                $ylimit = 3;
                                for ($i = 0; $i < $ylimit; $i++) : ?>
                                    <option value="<?= ($year + $i) ?>" <?= date("Y") == ($year + $i) ? " selected " : "" ?>><?= ($year + $i) ?></option>
                                <?php endfor; ?>
                            </select>
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

        //    only for error
        $('#subjact').click(function() {
            let sub = $(this).val();
            if (sub == null) {
                console.log(sub);
                var error = $('<p class="text-danger">').text('please select Class');
                $('#class_select').html(error);
            } else {
                $('#class_select').hide();
                $('#subject_id_error').hide();
            }
        })
        // class select to subjact get
        $("#class").change(function() {
            let id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/Routine/get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    if (resp.response) {
                        for (let index = 0; index < resp.response.length; index++) {
                            let id = resp.response[index].id;
                            let name = resp.response[index].name;
                            var opt = $('<option>').val(id).text(name);
                            $('#subjact').append(opt);
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
        $('#exam_type_error').hide();
        $('#classes_errpr').hide();
        $('#subjact_errpr').hide();
        $('#date1_errpr').hide();
        $('#day_error').hide();
        $('#time1_error').hide();
        $('#time_to_error').hide();

        $('#saveEmpForm').submit('click', function() {
            var exam_type = $('#exam_type').val();
            var classess = $('#class').val();
            var subjact = $('#subjact').val();
            var date1 = $('#date1').val();
            var week = $('#week').val();
            var time1 = $('#time1').val();
            alert(time1);
            var time_to = $('#time_to').val();
            var year = $('#year').val();

            if (exam_type == '') {
                $('#exam_type_error').show();
                return false;
            } else {
                $('#exam_type_error').hide();
            }
            if (classess == '') {
                $('#classes_errpr').show();
                return false;
            } else {
                $('#classes_errpr').hide();
            }
            if (subjact == '') {
                $('#subjact_errpr').show();
                return false;
            } else {
                $('#subjact_errpr').hide();
            }
            if (date1 == '') {
                $('#date1_errpr').show();
                return false;
            } else {
                $('#date1_errpr').hide();
            }
            if (week == '') {
                $('#day_error').show();
                return false;
            } else {
                $('#day_error').hide();
            }
            if (time1 == '') {
                $('#time1_error').show();
                return false;
            } else {
                $('#time1_error').hide();
            }
            if (time_to == '') {
                $('#time_to_error').show();
                return false;
            } else {
                $('#time_to_error').hide();
            }

            $.ajax({
                type: "POST",
                url: `<?= base_url("/Routine/create") ?>`,
                dataType: "JSON",
                data: {
                    exam_type: exam_type,
                    class: classess,
                    subjact: subjact,
                    class: classess,
                    date: date1,
                    week: week,
                    time: time1,
                    time_to: time_to,
                    year: year,
                },
                success: function(data) {
                    $('#exam_type').val('');
                    $('#class').val('');
                    $('#subjact').val('');
                    $('#date1').val('');
                    $('#week').val('');
                    $('#time1').val('');
                    $('#time_to').val('');
                    alert(data.message);
                    $('#addEmpModal').modal('hide');
                    example_table.ajax.reload();
                }
            });
            return false;
        });


    });
</script>