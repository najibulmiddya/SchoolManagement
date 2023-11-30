<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Teacher Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('student') ?>">Teacher</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teacher</h4>
                <p class="card-description"> </p>
                <form class="forms-sample" action="<?= base_url("teacher/save") ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                            <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">DOB</label>
                            <input type="date" class="form-control" id="dob" name="dob">
                            <?php echo form_error('dob', '<div class="error">', '</div>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Photo</label>
                            <input type="file" name="photo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="file" name="photo" class="form-control file-upload-info" placeholder="Upload Image">
                                <?php echo form_error('photo', '<div class="error">', '</div>'); ?>

                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                            <?php echo form_error('address', '<div class="error">', '</div>'); ?>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>