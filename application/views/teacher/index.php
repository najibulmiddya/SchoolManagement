<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Teachers </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teachers</h4>

                <div class="float-right"><a href="<?= base_url('teacher/save') ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Add Teacher</a></div>


                <table id="example" class="table table-striped table-bordered " style="width:100%">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-light"> S.No </th>
                            <th class="text-light"> Name </th>
                            <th class="text-light"> Mobile </th>
                            <th class="text-light"> Email </th>
                            <th class="text-light"> Dob </th>
                            <th class="text-light"> Gender </th>
                            <th class="text-light"> Address </th>
                            <th class="text-light"> Action </th>
                        </tr>
                    </thead>
                    <tbody class="table-sm">
                        <?php
                        if ($teachers) :

                            foreach ($teachers as $k => $d) :
                        ?>
                                <tr>
                                    <td><?= ++$k ?></td>
                                    <td><a href="<?= base_url("teacher/save/{$d->id}") ?>"><?= $d->name ?></a></td>
                                    <td><?= $d->mobile ?></td>
                                    <td><?= $d->email ?></td>
                                    <td><?= $d->dob ?></td>
                                    <td><?= $d->gender ?></td>
                                    <td><?= $d->address ?></td>
                                    <td><a href="<?= base_url("teacher/delete/{$d->id}") ?>" class="btn btn-danger del-record"><i class="bi bi-trash"></i></a></td>
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