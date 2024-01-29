<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Classes Update </h3>
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
                <h4 class="card-title">Classes</h4>
                <p class="card-description"> </p>
                <form class="forms-sample" action="<?= base_url("years/save/{$years->id}") ?>" method="post">
                    <input type="hidden" id="custId" name="id" value="<?= $years->id ?>">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Set Yeers</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $years->name ?>">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>