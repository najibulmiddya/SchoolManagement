<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Admission Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('student') ?>">Student</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('student_admission') ?>">Admission</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Admission</h4>
                <p class="card-description"> </p>

                <form class="forms-sample" method="post">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Student Name</label>
                            <select class="form-control" style="width:100%" id="student_id" name="student_id">
                                <option value="">Select</option>
                                <?php foreach ($students as $student) : ?>
                                    <option value="<?= $student->id ?>"><?= $student->name ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('student_id', '<div class="error text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mobile">Previous Classes</label>
                            <span class="form-control" id="prev_class"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Current Classes</label>
                            <select class="form-control" id="current_class_id" name="current_class_id">
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php echo form_error('current_class_id', '<div class="error text-danger">', '</div>'); ?>

                        <div class="form-group col-md-6">
                            <label for="academic_year">Adademic Year</label>
                            <select class="form-control" id="academic_year" name="academic_year" required>
                                <?php
                                $year = (date("Y") - 1);
                                $ylimit = 3;
                                for ($i = 0; $i < $ylimit; $i++) : ?>
                                    <option value="<?= ($year + $i) ?>" <?= date("Y") == ($year + $i) ? " selected " : "" ?>><?= ($year + $i) ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <?php echo form_error('academic_year', '<div class="error text-danger">', '</div>'); ?>

                        <div class="form-group col-md-12">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control" name="remarks" id="remarks" rows="5"></textarea>
                        </div>
                        <?php echo form_error('remarks', '<div class="error text-danger">', '</div>'); ?>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#student_id").change(function() {
            let id = $(this).val();
            $.ajax({
                "url": `<?= base_url("/student/get") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(resp) {
                    if (resp.status == true) {
                        $("#prev_class").text(resp.response.class);
                        var class_id=resp.response.id;
                    } else {
                        // alert("");
                    }
                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });
        });

    });
</script>