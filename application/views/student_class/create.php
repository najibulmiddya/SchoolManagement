<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Class Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?= base_url('student_class') ?>">Class</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student</h4>
                <p class="card-description"> </p>
                <form class="forms-sample" action="<?= base_url("student_class/save") ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Class</label>
                            <input type="text" class="form-control" id="name" name="class" placeholder="Name">
                            <?php echo form_error('class', '<div class="error">', '</div>'); ?>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>