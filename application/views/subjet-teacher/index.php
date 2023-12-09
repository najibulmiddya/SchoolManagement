<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Subject Teachers </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subject Teachers</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="card-description float-right">
                    <a href="<?= base_url('subject_teacher/save') ?>" class="btn btn-xs btn-success ">Create New</a>
                </div>

                <table id="example" class="table  table-bordered text-center" style="width:100%">
                    <thead class="table-warning">
                        <tr>
                            <th class="text-light text-center"> S.No </th>
                            <th class="text-light text-center"> Teachers </th>
                            <th class="text-light text-center"> Subject </th>
                            <th class="text-light text-center"> Classes</th>
                            <th class="text-center text-light"> Action </th>
                        </tr>
                    </thead>
                    <tbody class="table-sm">
                        <?php
                        if ($data) :

                            foreach ($data as $k => $d) :
                        ?>
                                <tr>
                                    <td><?= ++$k ?></td>
                                    <td><a href="<?= base_url("subject_teacher/save/{$d->id}") ?>"><?= $d->tname ?></a></td>
                                    <td><?= $d->name ?></td>
                                    <td><?= $d->class ?></td>
                                    <td><a href="<?= base_url("subject_teacher/delete/{$d->id}") ?>" class="btn  btn-danger del-record"><i class="bi bi-trash"></i></a></td>
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
    $(document).ready(function(){
        new DataTable('#example');
    });
</script>