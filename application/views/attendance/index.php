<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Students Attendance </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Attendance</h4>

                <form class="" method="post">
                    <div class="row ">
                        <div class="form-group col-md-3 my-2">
                            <label class="my-2"> Select Date</label>
                            <input class="form-control" type="date" id="date" value="<?= date("Y-m-d") ?>">
                        </div>
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

                <div class="alert alert-success" role="alert" id="success_alert">

                </div>
                <div class="alert alert-danger" role="alert" id="danger_alert">

                </div>

                <div class="float-right"><a href="<?= base_url('/attendance/create') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Attendance New</a></div>

                <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light">Name</th>
                            <th class="text-light">Date</th>
                            <th class="text-light">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attendance Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">

                    <div class="row ">
                        <input type="hidden" id="att_id" value="">
                        <input type="hidden" id="att_date" value="">
                        <div class="form-group col-md-12">
                            <label class="my-2">Select Attendance</label>
                            <select class="form-control" style="width:100%" id="att_name" name="att_name">

                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ************* Attendance History Model ************ -->
<div class="modal fade" id="attshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attendance History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ************* Attendance History ************ -->
                <div class="card-body">
                    <h5 class="card-title" id="stu-name"></h5>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Total Attend Day</h6>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0" id="attend-day"></h6>
                        </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Percentage</h6>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class=" mb-0" id="att-percentage"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#success_alert').hide();
    $('#danger_alert').hide();
    $(document).ready(function() {
        $('#filter-By,#date').change(function() {
            example_table.ajax.reload();
        })

        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/attendance/data_get") ?>`,
                type: 'get',
                data: function(d) {
                    d.class_id = $('#filter-By').val();
                    d.date = $('#date').val();
                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {

                            let = status = '';
                            if (d.status == 'attend') {
                                status = `<div class="text-success">${d.status}</div>`;
                            } else {
                                status = `<div class="text-danger">${d.status}</div>`;
                            }

                            return [
                                ++i,
                                `<a href="#" class="show-attendance" data-student_id="${d.student_id}">${d.name}</a>`,
                                d.date,
                                `<a href="#"class="editRecord" data-id="${d.id}" data-name="${d.status}" data-date="${d.date}"  data-toggle="modal" data-target="#exampleModal">${status}</a>`,
                            ];
                        });
                    }
                    return [];
                }
            }
        });


        // editRecord show
        $("body").on("click", ".editRecord", function() {
            $('#exampleModal').show();
            let id = $(this).data("id");
            let date = $(this).data("date");
            $.ajax({
                url: `<?= base_url("/attendance/recordshow") ?>`,
                type: "get",
                data: {
                    id,
                    date
                },
                dataType: "json",
                success: function(resp) {
                    if (resp.status == true) {
                        let status = resp.response.status;
                        let id = resp.response.id;
                        let date = resp.response.date;
                        $('#att_date').val(date);
                        $('#att_id').val(id);
                        if (status == 'attend') {
                            var option_data = `<option value="attend" selected >attend</option>
                        <option value="absent">absent</option>
                        `;
                            $("#att_name").html(option_data);
                        } else if (status == 'absent') {
                            var option_data = `<option value="attend"  >attend</option>
                        <option value="absent" selected>absent</option>
                        `;
                            $("#att_name").html(option_data);
                        }
                    }
                },
            });

        });

        // save edit record
        $('#editForm').on('submit', function() {
            var id = $('#att_id').val();
            var date = $('#att_date').val();
            var att_name = $('#att_name').val();

            $.ajax({
                type: "POST",
                url: `<?= base_url('/attendance/update') ?>`,
                dataType: "JSON",
                data: {
                    id: id,
                    date: date,
                    att_name: att_name
                },
                success: function(data) {
                    if (data.status == true) {
                        $("#att_id").val("");
                        $("#att_date").val("");
                        $("#att_name").val("");
                        $('#exampleModal').modal('hide');
                        example_table.ajax.reload();

                        $('#success_alert').text(data.message);
                        $('#success_alert').show();
                    } else {
                        $('#exampleModal').modal('hide');
                        $('#danger_alert').text(data.message);
                        $('#danger_alert').show();
                    }
                }
            });
            return false;
        });


        // show attendance
        $("body").on("click", ".show-attendance", function() {
            let id = $(this).data("student_id");
            $('#attshow').modal('show');

            $.ajax({
                type: 'get',
                url: `<?= base_url('/attendance/get_attendance') ?>`,
                dataType: 'json',
                data: {
                    sid: id
                },
                success: function(resp) {
                    if (resp.status == true) {
                        $('#stu-name').text('Name - ' + resp.response.name);
                        $('#attend-day').text(resp.response.attend_day);
                        $('#att-percentage').text(resp.response.percentage+' %');
                    }
                }
            });
            return false;
        });

    })
</script>