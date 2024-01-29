<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Classroom </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Classroom</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Classroom</h4>


                <!-- alert message -->
                <div class="alert alert-success" role="alert" id="success_alert">

                </div>
                <div class="alert alert-danger" role="alert" id="danger_alert">

                </div>

                <!-- add button  -->
                <div class="float-right">
                    <button class="btn btn-primary" id="add-btn" data-toggle="modal" data-target="#exampleModal">Add New</button>
                </div>

                <!-- **************** data table **************** -->
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-light">S.No</th>
                            <th class="text-light">Class</th>
                            <th class="text-light">Room No</th>
                            <th class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-secondary text-dark">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- ADD Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Classroom Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-form">
                <div class="modal-body">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="class" name="class">
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Class Room No</label>
                            <input type="number" class="form-control" value="" id="class-room">
                            <p class="text-danger" id="class-room-error">Class Room No is Required</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- edit Model -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Classroom Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-form">
                <div class="modal-body">

                    <div class="row">

                        <input type="hidden" id="edit-id" value="" name="edit-id" class="form-control">
                        <div class="form-group col-md-6">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="edit-class" name="edit-class" disabled>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Class Room No</label>
                            <input type="number" class="form-control" value="" id="edit-class-room">
                            <p class="text-danger" id="edit-class-room-error">Class Room No is Required</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#success_alert').hide();
    $('#danger_alert').hide();
    $('#class-room-error').hide();

    $(document).ready(function() {

        // =================  data table load   ================
        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/classroom/get_all") ?>`,
                type: 'get',
                data: function(d) {

                },
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {

                            return [
                                ++i,
                                d.class_name,
                                d.room_no,
                                `<div class="btn-group btn-sm" id="data_sav">
                                    
                                    <button type="button" class="btn btn-success editRecord" data-id="${d.id}" data-toggle="modal" data-target="#editModal"><i class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-danger deleteRecord" data-id="${d.id}"><i class="bi bi-trash"></i></button>

                                </div>`,
                            ];
                        });
                    }
                    return [];
                }
            }
        });
        example_table.ajax.reload();

        // save data
        $('#add-form').on('submit', function() {
            let class_id = $('#class').val();
            let room_no = $('#class-room').val();
            if (room_no == '') {
                $('#class-room-error').show();
                return false;
            } else {
                $('#class-room-error').hide();
            }
            $.ajax({
                type: "POST",
                url: `<?= base_url('/classroom/save') ?>`,
                dataType: "JSON",
                data: {
                    class_id: class_id,
                    room_no: room_no,
                },
                success: function(data) {
                    if (data.status == true) {
                        $("#class-room").val("");
                        $('#exampleModal').modal('hide');
                        example_table.ajax.reload();
                        $('#success_alert').text(data.message);
                        $('#success_alert').show();
                    } else {
                        $('#exampleModal').modal('hide');
                        $('#danger_alert').text(data.message);
                        $('#danger_alert').show();
                    }
                }
            });
            return false;
        });

        // edit model data show
        $("body").on("click", ".editRecord", function() {
            let id = $(this).data("id");
            $.ajax({
                url: `<?= base_url("/classroom/get") ?>`,
                type: "get",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(resp) {
                    if (resp.status == true) {
                        $('#editModal').show();
                        $('#edit-id').val(resp.response.id);
                        $('#edit-class-room').val(resp.response.room_no);
                        $('#edit-class').html(`<option value="${resp.response.class_id}">${resp.response.class_name}</option>`)
                    } else {

                    }
                },
            });

        });

        $('#edit-class-room-error').hide();

        // edit model save data
        $('#edit-form').on('submit', function(e) {
            e.preventDefault();
            let room_no = $('#edit-class-room').val();
            let id = $('#edit-id').val();
            if (room_no == '') {
                $('#edit-class-room-error').show();
                return false;
            } else {
                $('#edit-class-room-error').hide();
            }

            $.ajax({
                type: "POST",
                url: `<?= base_url('/classroom/update') ?>`,
                dataType: "JSON",
                data: {
                    room_no: room_no,
                    id: id,
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#edit-class-room').val('');
                        $('#edit-id').val('');
                        $('#editModal').modal('hide');
                        example_table.ajax.reload();
                        $('#success_alert').text(data.message);
                        $('#success_alert').show();

                    } else {
                        $('#danger_alert').text(data.message);
                        $('#danger_alert').show();
                        $('#editModal').modal('hide');

                    }
                }
            });
            return false;
        });

        // delete row
        $("body").on("click", ".deleteRecord", function() {
            let id = $(this).data("id");
            if (confirm("Are you Sure I One to Delete This Recrod?")) {
                $.ajax({
                    url: `<?= base_url("/classroom/delete") ?>`,
                    type: "get",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(resp) {
                        if (resp.status == true) {
                            example_table.ajax.reload();
                            $('#success_alert').text(resp.message);
                            $('#success_alert').show();
                        } else {
                            $('#danger_alert').text(resp.message);
                            $('#danger_alert').show();
                        }
                    },
                });
            }
            return false;


        });

    })
</script>