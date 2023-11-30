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

                <div><a href="javascript:void(0);" id="add-new" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span>Routine Create</a></div>


                <div class="float-right download_btn">
                    <form action="<?= base_url("/Routine/DownloadPDF") ?>" method="get">
                        <input type="hidden" name="c_id" id="c_id">
                        <button type="submit" id="GeneratePdf" class="btn btn-primary mr-1">download Routine</button>
                    </form>
                    <!-- <a href="javascript:void(0);" type="submit" id="GeneratePdf" class="btn btn-primary mr-1">download Routine</a> -->
                </div>

                <form class="form-inline" method="post">

                    <div class="form-group col-md-3 my-2 ">
                        <label class="my-2">Set Classes</label>
                        <select class="form-control" style="width:100%" id="filter-By" name="filter-By">
                            <option value="">Filter By Class</option>
                            <?php foreach ($class as $d) : ?>
                                <option value="<?= $d->id ?>"><?= $d->class ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead class="table-success">
                            <tr>
                                <th class="text-light"> # </th>
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
                        <tbody id=student-res>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('.download_btn').hide();
    $(document).ready(function() {

        // Clasess by get data
        $('#filter-By').change(function() {
            var class_id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/Routine/get_all") ?>/${class_id}`,
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
                                    '<td>' + resp[i].exam_name + '</td>' +
                                    '<td>' + resp[i].class_name + '</td>' +
                                    '<td>' + resp[i].sub_name + '</td>' +
                                    '<td>' + resp[i].date + '</td>' +
                                    '<td>' + resp[i].week + '</td>' +
                                    '<td>' + resp[i].time + '</td>' +
                                    '<td>' + resp[i].time_to + '</td>' +
                                    '<td>' + resp[i].year + '</td>' +

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
                        $('#c_id').val(class_id);

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

        $('#set-year').change(function() {
            var year = $(this).val()
        });
    })
</script>

<!-- Roution Create Modal -->
<form id="saveEmpForm" method="post">
    <div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Routine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Exam Type</label>
                            <select class="form-control" id="exam_type" name="exam_type">
                                <option value="">Select Exam Type</option>
                                <?php foreach ($e_type as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->exam_name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="exam_type_error" style="color: red;">**Select Exam Type</p>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Classes</label>
                            <select class="form-control" id="class" name="class">
                                <option value="">Select Class</option>
                                <?php foreach ($class as $d) : ?>
                                    <option value="<?= $d->id ?>"><?= $d->class ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="classes_errpr" style="color: red;">**Select Classes</p>
                        </div>


                        <div class="form-group col-md-3">
                            <label>Subjact</label>
                            <select class="form-control" id="subjact" name="subjact">
                                <option value="">Select Subjact</option>
                            </select>
                            <p id="subjact_errpr" style="color: red;">**Select Subjact</p>
                            <div id='class_select'></div>
                            <div id='subject_id_error'></div>
                        </div>


                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" name="date1" id="date1" class="form-control">
                            <p id="date1_errpr" style="color: red;">**Select Date</p>
                        </div>

                        <div class="form-group col-md-3">
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


                        <div class="form-group col-md-3">
                            <label>Time</label>
                            <input type="time" name="time1" id="time1" class="form-control">
                            <p id="time1_error" style="color: red;">**Time is missing</p>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Time To</label>
                            <input type="time" name="time_to" id="time_to" class="form-control">
                            <p id="time_to_error" style="color: red;">**Time To is missing</p>
                        </div>

                        <div class="form-group col-md-3">
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
                }
            });
            return false;
        });


    });
</script>