<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Students Attendance </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('attendance') ?>">Attendance</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Attendance Now <?= 'Date - ', date('d:m:Y l') ?> </h4>

                <form class="" method="post">
                    <div class="row ">
                        <div class="form-group col-md-3 my-2 ">
                            <label class="my-2">Date</label>
                            <input type="date" class="form-control" id="filter_date" value="<?= date("Y-m-d") ?>" />
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
                <form id="att_form">
                    <table id="example" class="table table-bordered text-center" style="width:100%">
                        <thead>
                            <tr id="t_thead">
                                <th class="text-light text-center"> S.No </th>
                                <th class="text-light text-center"> Name </th>
                                <th class="text-light text-center"> Status </th>
                                <th class="text-light text-center"> Attendance </th>
                            </tr>
                        </thead>
                        <tbody id="student-res">
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $('#success_alert').hide();
    $('#danger_alert').hide();
    $(document).ready(function() {

        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/attendance/get") ?>`,
                type: 'get',
                data: function(d) {
                    d.class_id = $("#filter-By").val();
                    d.date = $("#filter_date").val();
                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {

                            let action = "";
                            if (d.status == "" || d.status == null) {
                                action = `<div class="btn-group btn-sm" id="data_sav">
                                    
                                        <button type="button" class="btn btn-success attendance_save_btn " data-status="attend" data-student_id="${d.student_id}" data-class_id="${d.current_class_id}" >Present</button>

                                        <button type="button" class="btn btn-danger attendance_save_btn" data-status="absent" data-student_id="${d.student_id}" data-class_id="${d.current_class_id}" >Absent</button>

                                    </div>`
                            }

                            return [
                                ++i,
                                d.name,
                                d.status || "",
                                action
                            ];
                        });
                    }
                    return [];
                }
            }
        });

        $('#filter-By,#filter_date').change(function() {
            example_table.ajax.reload();
        })

        $("body").on("click", ".attendance_save_btn", function() {
            // let status = $(this).attr("data-status");
            let status = $(this).data("status");
            let student_id = $(this).data("student_id");
            let class_id = $(this).data("class_id");
            let date = $("#filter_date").val();

            $.ajax({
                url: `<?= base_url("/attendance/save_new") ?>`,
                type: "get",
                data: {
                    status,
                    student_id,
                    class_id,
                    date
                },
                dataType: "json",
                success: function(resp) {
                    example_table.ajax.reload();
                    if (resp.status == true) {
                        // alert(resp.message);
                        $('#success_alert').text(resp.message);
                        $('#success_alert').show();
                    } else {
                        // alert(resp.message);
                        $('#danger_alert').text(resp.message);
                        $('#danger_alert').show();

                    }
                },
            });

        });

    })
</script>