<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Exam Type</h4>

                <!-- Button trigger modal -->
                <div class="float-right">
                    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModalCenter">
                        Create
                    </button>
                </div>
                
                <!-- Tabile data -->
                <table id="example" class="table table-bordered" style="width:100%">
                    <thead class="table-success">
                        <tr>
                            <th class="text-light"> S.No </th>
                            <th class="text-light"> Exam Name </th>
                            <th class="text-light"> Total Number </th>
                            <th class="text-light"> Months </th>
                            <th class="text-light">Year</th>
                            <th class="text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody id=listRecords>

                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ExamType Create</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="forms-sample" method="post" id="examType_form">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Exam Name</label>
                                            <input type="text" name="exam_name" id="exam_name" class="form-control">
                                            <p id="exam_name_error" style="color: red;">**Exam Name is missing</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Total Number</label>
                                            <input type="number" name="exam_number" id="exam_number" class="form-control">
                                            <p id="exam_number_error" style="color: red;">**Total Number is missing</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Months</label>
                                            <select class="form-control" id="exam_months" name="exam_months">
                                                <option value="">Select Months</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                            <p id="exam_months_error" style="color: red;">**Select Months</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="academic_year">Year</label>
                                            <select class="form-control" id="exam_year" name="exam_year" required>
                                                <?php
                                                $year = (date("Y") - 1);
                                                $ylimit = 3;
                                                for ($i = 0; $i < $ylimit; $i++) : ?>
                                                    <option value="<?= ($year + $i) ?>" <?= date("Y") == ($year + $i) ? " selected " : "" ?>><?= ($year + $i) ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" name="save" class="btn btn-primary mr-2">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- update data modal -->
                <div class="modal fade update_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ExamType Update</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="forms-sample" method="post" id="update_examType_form">
                                    <div class="row">
                                        <input type="hidden" name="eid" id="eid" class="form-control" value="">


                                        <div class="form-group col-md-6">
                                            <label>Exam Name</label>
                                            <input type="text" name="exam_name" id="edit_exam_name" class="form-control" value="">
                                            <p id="edit_exam_name_error" style="color: red;">**Exam Name is missing</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Total Number</label>
                                            <input type="number" name="exam_number" id="edit_exam_number" class="form-control" value="">
                                            <p id="edit_exam_number_error" style="color: red;">**Total Number is missing</p>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Months</label>
                                            <select class="form-control" id="edit_exam_months" name="edit_exam_months">
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                            <p id="edit_exam_months_error" style="color: red;">**Select Months</p>
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="academic_year">Year</label>
                                            <input class="form-control" id="edit_exam_year" name="exam_year" required>
                                        </div>
                                    </div>

                                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delete data -->
                <form id="deleteEmpForm" method="post">
                    <div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Exam Type</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <strong>Are you sure to delete this record?</strong>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="delete_id" id="delete_id" class="form-control">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- tabile data end -->

<script>
    $(document).ready(function() {

        var example_table = $("#example").DataTable({
            responsive: true,
            autoWidth: false,
            serverSide: false,
            processing: true,
            ajax: {
                url: `<?= base_url("/ExamType/all_data") ?>`,
                type: 'get',
                dataSrc: function(resp) {
                    if (resp.status == true) {
                        return resp.response.map((d, i) => {
                            return [
                                ++i,
                                `<a href="javascript:void(0);" class="update-record" data-id="${d.id}">${d.exam_name}</a>`,
                                d.total_number,
                                d.months,
                                d.year,
                                `<a href="javascript:void(0);" id="deleteRecord" class="btn btn-xs btn-danger" data-id="${d.id}">Delete</a>`
                            ];
                        });
                    }
                    return [];
                }
            }
        });

        example_table.ajax.reload();

        // data insrt into databash
        $('#exam_name_error').hide();
        $('#exam_number_error').hide();
        $('#exam_months_error').hide();

        $('#examType_form').submit('click', function(e) {
            e.preventDefault();
            var name = $('#exam_name').val();
            var number = $('#exam_number').val();
            var months = $('#exam_months').val();
            var year = $('#exam_year').val();
            if (name == '') {
                $('#exam_name_error').show();
                return false;
            } else {
                $('#exam_name_error').hide();

            }
            if (number == '') {
                $('#exam_number_error').show();
                return false;
            } else {
                $('#exam_number_error').hide();
            }
            if (months == '') {
                $('#exam_months_error').show();
                return false;
            } else {
                $('#exam_months_error').hide();
            }
            $.ajax({
                type: "POST",
                url: `<?= base_url("/ExamType/create") ?>`,
                dataType: "JSON",
                data: {
                    name: name,
                    number: number,
                    months: months,
                    year: year,
                },
                success: function(data) {
                    example_table.ajax.reload();
                    $('#exam_name').val('');
                    $('#exam_number').val('');
                    $('#exam_months').val('');
                    alert(data.message);
                    $('#exampleModalCenter').modal('hide');
                }
            });
            return false;
        });

        // update data show

        $('#listRecords').on('click', '.update-record', function() {
            var id = $(this).data('id');
            $.ajax({
                "url": `<?= base_url("/ExamType/edit") ?>/${id}`,
                "type": "get",
                "dataType": "json",
                success: function(data) {

                    $("#eid").val(data.response.id);
                    $('#edit_exam_name').val(data.response.exam_name);
                    $('#edit_exam_number').val(data.response.total_number);
                    $('#edit_exam_year').val(data.response.year);
                    var months = data.response.months;
                    var option_data = "<option value='" + months + "'>" + months + "</option>";
                    $("#edit_exam_months").html(option_data);
                    var html = `
                    <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                    `;
                    $("#edit_exam_months").append(html);

                    $('.update_modal').modal('show');

                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });

        });

        // update data save

        $('#edit_exam_name_error').hide();
        $('#edit_exam_number_error').hide();
        $('#edit_exam_months_error').hide();

        $('#update_examType_form').submit('click', function(e) {
            e.preventDefault();
            var id = $('#eid').val();
            var name = $('#edit_exam_name').val();
            var number = $('#edit_exam_number').val();
            var months = $('#edit_exam_months').val();
            var year = $('#edit_exam_year').val();
            if (name == '') {
                $('#edit_exam_name_error').show();
                return false;
            } else {
                $('#edit_exam_name_error').hide();
            }
            if (number == '') {
                $('#edit_exam_number_error').show();
                return false;
            } else {
                $('#edit_exam_number_error').hide();
            }
            if (months == '') {
                $('#edit_exam_months_error').show();
                return false;
            } else {
                $('#edit_exam_months_error').hide();
            }
            $.ajax({
                type: "POST",
                url: ` <?= base_url("/ExamType/update") ?>/${id}`,
                dataType: "JSON",
                data: {
                    id: id,
                    name: name,
                    number: number,
                    months: months,
                    year: year,
                },
                success: function(data) {
                    example_table.ajax.reload();
                    $('#exam_name').val('');
                    $('#exam_number').val('');
                    $('#exam_months').val('');
                    alert(data.message);
                    $('.update_modal').modal('hide');
                }
            });
            return false;
        });


        // show delete form
        $('#listRecords').on('click', '#deleteRecord', function() {
            var d_id = $(this).data('id');
            $('#deleteEmpModal').modal('show');
            $('#delete_id').val(d_id);
        });

        // delete emp record
        $('#deleteEmpForm').on('submit', function() {
            var id = $('#delete_id').val();
            $.ajax({
                type: "POST",
                url: `<?= base_url("/ExamType/delete") ?>/${id}`,
                dataType: "JSON",
                success: function(data) {
                    example_table.ajax.reload();
                    $("#" + id).remove();
                    $('#delete_id').val("");
                    $('#deleteEmpModal').modal('hide');
                    alert(data.message);
                }
            });
            return false;
        });

    })
</script>