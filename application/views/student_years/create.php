<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Yeers Create </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?= base_url('years') ?>">Yeers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">


        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Yeers</h4>
                <p class="card-description"> </p>
                <form class="forms-sample" action="<?= base_url("years/save") ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Set Years</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <?php echo form_error('name', '<div class="error danger">', '</div>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>