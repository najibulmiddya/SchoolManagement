<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Students </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admission</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Admission</h4>
                <p class="card-description">
                    <a href="<?= base_url('student_admission/save') ?>" class="btn btn-xs btn-success">Create New</a>
                </p>

                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead class="table-warning">
                            <tr>
                                <th class="text-light"> # </th>
                                <th class="text-light"> Name </th>
                                <th class="text-light"> Previous Classes </th>
                                <th class="text-light"> Current Classes </th>
                                <th class="text-light"> Remarks </th>
                                <th class="text-light">Academic Year</th>
                                <th class="text-light"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($students) :

                                foreach ($students as $k => $d) :
                            ?>
                                    <tr>
                                        <td><?= ++$k ?></td>
                                        <td><a href=" <?= base_url("student_admission/save/{$d->id}") ?>"><i class="bi bi-pencil-square"></i><?= $d->name ?></a></td>
                                        <td><?= $d->prev_class ?></td>
                                        <td><?= $d->current_class ?></td>
                                        <td><?= $d->remarks ?></td>
                                        <td><?= $d->academic_year ?></td>
                                        <td><a href="<?= base_url("student_admission/delete/{$d->id}") ?>" class="btn btn-xs btn-danger del-record" id="del-record"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title my-2">Students Get Filter By Class </h4>
        <form class="form-inline" method="post">
            <div class="row ">
                <div class="form-group col-md-6 my-2">
                    <label class="my-2">Set Years</label>
                    <select class="form-control" style="width:100%" id="set_year" name="set_year">
                        <<option value="">Set Years</option>
                            <?php foreach ($years as $d) : ?>
                                <option value="<?= $d->name ?>"><?= $d->name ?></option>
                            <?php endforeach; ?>
                    </select>
                    <p id="year_error" style="color: red;">** Please Select Years</p>
                </div>
                <div class="form-group col-md-6 my-2 ">
                    <label class="my-2">Set Classes</label>
                    <select class="form-control" style="width:100%" id="filter-By" name="filter-By">
                        <option value="">Filter By Class</option>
                        <?php foreach ($classes as $class) : ?>
                            <option value="<?= $class->id ?>"><?= $class->class ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-contextual">
                <thead class="table-success">
                    <tr>
                        <th class="text-light"> # </th>
                        <th class="text-light"> Name </th>
                        <th class="text-light"> Current Classes </th>
                        <th class="text-light"> Remarks </th>
                        <th class="text-light">Academic Year</th>
                    </tr>
                </thead>
                <tbody id=student-res>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        // year & Clasess by get data
        $('#year_error').hide();
        $('#filter-By').change(function() {
            var class_id = $(this).val();
            var year = $('#set_year').val();
            if (year == "") {
                $('#year_error').show();
                return false;
            } else {
                $('#year_error').hide();
            }
            $.ajax({
                "url": `<?= base_url("/student_admission/get") ?>/${class_id}/${year}`,
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
                                    '<td>' + resp[i].current_class + '</td>' +
                                    '<td>' + resp[i].remarks + '</td>' +
                                    '<td>' + resp[i].academic_year + '</td>' +
                                    '</tr>';
                            }
                            $('#student-res').html(html);
                        }
                        $('#student-res').html(html);
                        $('#year_error').hide();
                    } else {
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