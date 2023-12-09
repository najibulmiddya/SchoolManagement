<!-- Page header -->
<div class="page-header">
	<h3 class="page-title"> Students </h3>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Admission</li>
		</ol>
	</nav>
</div>

<!-- Content -->
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Admission</h4>
				
				<div class="float-right"><a href="<?= base_url('student_admission/save') ?>" class="btn btn-success">Create New</a></div>

				<table id="example2" class="table table-bordered" style="width:100%">
					<thead class="table-warning">
						<tr>
							<th class="text-light">S.No</th>
							<th class="text-light"> Name </th>
							<th class="text-light"> Previous Classes </th>
							<th class="text-light"> Current Classes </th>
							<th class="text-light"> Remarks </th>
							<th class="text-light">AcademicYear</th>
							<th class="text-light"> Action </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($students) :

							foreach ($students as $k => $d) :
						?>
								<tr>
									<td><?= ++$k ?></td>
									<td><a href=" <?= base_url("student_admission/save/{$d->id}") ?>"><?= $d->name ?></a></td>
									<td><?= $d->prev_class ?></td>
									<td><?= $d->current_class ?></td>
									<td><?= $d->remarks ?></td>
									<td><?= $d->academic_year ?></td>
									<td><a href="<?= base_url("student_admission/delete/{$d->id}") ?>" class="btn btn-danger del-record"><i class="bi bi-trash"></i></a></td>
								</tr>
						<?php endforeach;
						endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div id="alert-m">

		</div>

		<!-- Filter By Class form -->
		<form class="" method="post">
			<div class="row ">
				<div class="form-group col-md-3 my-2 ">
					<label class="my-2">Select Class</label>
					<select class="form-control" style="width:100%" id="filter-By" name="filter-By">
						<?php foreach ($classes as $class) : ?>
							<option value="<?= $class->id ?>"><?= $class->class ?></option>
						<?php endforeach; ?>
					</select>
				</div>

			</div>
		</form>
		<!-- ******************* Filter By Class form end *********************** -->

		<table id="example" class="table table-bordered" style="width:100%">
			<thead class="table-success">
				<tr>
					<th class="text-light"> S.No </th>
					<th class="text-light"> Name </th>
					<th class="text-light"> Current_class </th>
					<th class="text-light"> Current Classes </th>
					<th class="text-light"> Remarks </th>
					<th class="text-light">Academic Year</th>
					<th class="text-light">Action</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>


<script>
	$(document).ready(function() {

		new DataTable('#example2')

		function message_alart(type, message) {
			return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    <strong>${type} !</strong> ${message}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>`;
		}


		$('#filter-By').change(function() {
			example_table.ajax.reload();
		});
		var example_table = $("#example").DataTable({
			responsive: true,
			autoWidth: false,
			serverSide: false,
			processing: true,
			ajax: {
				url: `<?= base_url("/student_admission/get") ?>`,
				type: 'get',
				data: function(d) {
					d.class_id = $('#filter-By').val();
				},
				dataSrc: function(resp) {
					if (resp.status == true) {
						return resp.response.map((d, i) => {
							return [
								++i,
								d.name,
								d.current_class,
								d.current_class,
								d.remarks,
								d.academic_year,
								` <button type="button" class="btn btn-danger del-record" data-id="${d.id}"><i class="bi bi-trash"></i></button>`
							];
						});
					}
					return [];
				}
			}
		});

		// *************data delete *********
		$('body').on('click', '.del-record', function() {
			var id = $(this).data('id');
			if (confirm("Are you sure you want to delete this Recrod?")) {
				$.ajax({
					url: `<?= base_url("student_admission/delete") ?>`,
					type: 'get',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function(resp) {
						if (resp.status == true) {
							let m = message_alart('success', resp.message)
							$('#alert-m').html(m);
							example_table.ajax.reload();
						} else {
							let m = message_alart('danger', resp.message)
							$('#alert-m').html(m);
						}
					}
				})
			} else {
				return false;
			}
		});


	});
</script>