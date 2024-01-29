<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Admission Update </h3>
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
                            <input type="hidden" class="form-control" name="student_id" value="<?= $students->student_id ?>" />
                            <span class="form-control"><?= $students->name ?></span>
                            <?php echo form_error('student_id', '<div class="error text-danger">', '</div>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="mobile">Previous Classes</label>
                            <span class="form-control" id="prev_class"><?= $students->prev_class ?></span>
                        </div>

                        

                        <div class="form-group col-md-6">
                            <label for="mobile">Current Classes</label>
                            <select class="form-control" id="current_class_id" name="current_class_id">
                                <?php foreach ($class as $c) : ?>
                                    <option value="<?= $c->id ?>" <?= $students->current_class_id == $c->id ? " selected " : "" ?>><?= $c->class ?></option>

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
                            <textarea class="form-control" name="remarks" id="remarks" rows="5"><?= $students->remarks ?></textarea>
                        </div>
                        <?php echo form_error('remarks', '<div class="error text-danger">', '</div>'); ?>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>