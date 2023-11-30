<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Student Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('student') ?>">Students</a></li>
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
                <form action="<?= base_url("student/save") ?>" method="post" enctype="multipart/form-data" class="forms-sample">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            <?php echo form_error('name', '<div class="error text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <?php echo form_error('email', '<div class="error text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            <?php echo form_error('mobile', '<div class="error text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                            <?php echo form_error('dob', '<div class="error text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Classes</label>
                            <select class="form-control" name="class_id" style=" width:100%">
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- <div class="form-group col-md-12">
                            <label for="file">File</label>
                            <input id="file" name="stu_file" type="file" />
                            <?php if (isset($upload_error)) {
                                echo $upload_error;
                            } ?>
                        </div> -->

                        <div class="col-md-12 mb-3">
                            <label for="formFile" class="form-label">Photo upload</label>
                            <input class="form-control" type="file" id="formFile" name="stu_file">
                            <span>
                                <?php if (isset($upload_error)) {
                                    echo $upload_error;
                                } ?>
                            </span>
                        </div>




                        <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                            <?php echo form_error('address', '<div class="error text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>