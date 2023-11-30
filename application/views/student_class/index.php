
<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Classes </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Classes</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Classes</h4>
                <!-- <p class="card-description">
                    <a href="<?= base_url('student_class/save') ?>" class="btn btn-xs btn-danger ">Create New</a>
                </p> -->

                <div class="float-right"><a href="<?= base_url('student_class/save') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Add Class</a></div>

                <table id="example" class="table table-bordered" style="width:100%">
                    <!-- <table class="table table-bordered" style="width:100%"> -->
                        
                    <thead>
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light">Classes</th>
                            <th class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($class) :

                            foreach ($class as $k => $d) :
                        ?>
                                <tr>
                                    <td><?= ++$k ?></td>
                                    <td><?= $d->class ?></td>
                                    <td>
                                        <div class="btn-group btn-sm">
                                            <a class="btn  btn-success " href="<?= base_url("student_class/save/{$d->id}") ?>"><i class="bi bi-pencil-square"></i></a>
                                            </button>

                                            <a href="<?= base_url("student_class/delete/{$d->id}") ?>" class="btn  btn-danger del-record "><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        new DataTable('#example');
    });
</script>