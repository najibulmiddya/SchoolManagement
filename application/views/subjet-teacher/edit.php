<!-- Page header -->
<div class="page-header">
    <h3 class="page-title">Subject Teacher Edit </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('subject_teacher') ?>">Subject Teacher</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <form action="<?= base_url("subject_teacher/save/{$subject_teacher->id}") ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                    <div class="row">

                        <input type="hidden" value="<?= $subject_teacher->id ?>">
                        <div class="form-group col-md-6">
                            <label for="name">Teacher Name</label>
                            <input type="hidden" name="teacher_id" value=" <?= $subject_teacher->teacher_id ?>">
                            <select disabled class="form-control" name="teacher_id" style=" width:100%">

                                <?php foreach ($teacher as $d) : ?>
                                    <?php if ($subject_teacher->teacher_id == $d->id) { ?>

                                        <option value=" <?= $d->id ?>" <?= $subject_teacher->teacher_id == $d->id ? " selected " : "" ?>><?= $d->name ?></option>

                                    <?php  } ?>
                                <?php endforeach; ?>

                            </select>
                            <?php echo form_error('teacher_id', '<div class="error text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Classes</label>
                            <select class="form-control" id="class_id" name="class_id" style=" width:100%">
                                <option value="">Select Class</option>
                                <?php foreach ($clasess as $d) : ?>
                                    <option value="<?= $d->id ?>" <?= $subject_teacher->class_id == $d->id ? " selected " : "" ?>><?= $d->class ?></option>

                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('class_id', '<div class="error text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email">Subject</label>
                            <select class="form-control" name="subject_id" id="subject_id" style=" width:100%">


                            </select>
                            <?php echo form_error('subject_id', '<div class="error text-danger">', '</div>'); ?>
                            <div id='subject_id_error'></div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $sub_id = $subject_teacher->subject_id ?>


<script>
    $(document).ready(function() {
        let id = $("#class_id").val();
        $.ajax({
            "url": `<?= base_url("/subject_teacher/get") ?>/${id}`,
            "type": "get",
            "dataType": "json",
            success: function(resp) {
                console.log(resp);
                if (resp.response) {
                    for (let index = 0; index < resp.response.length; index++) {
                        let id = resp.response[index].id;
                        let name = resp.response[index].name;
                        if (id == <?php echo $sub_id ?>) {
                            var a = 'selected';
                        } else {
                            var a = '';
                        }
                        var opt = $('<option ' + a + '>').val(id).text(name);
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
</script>

