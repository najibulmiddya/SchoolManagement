<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Student Monthly Fee </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student Monthly Fee</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Payment</h4>
                <p class="card-description">
                    <!-- Large modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">PayNew</button>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual">
                        <thead class="table-warning">
                            <tr>
                                <th class="text-light"> # </th>
                                <th class="text-light"> Name </th>
                                <th class="text-light"> Academic Year </th>
                                <th class="text-light"> Months </th>
                                <th class="text-light"> Payment Method </th>
                                <th class="text-light"> Amount </th>
                                <th class="text-light"> Date & Time </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($data) :
                                foreach ($data as $k => $d) :
                            ?>
                                    <tr>
                                        <td><?= ++$k ?></td>
                                        <td><?= $d->name ?></td>
                                        <td><?= $d->academic_year ?></td>
                                        <td><?= $d->month ?></td>
                                        <td><?= $d->method ?></td>
                                        <td><?= $d->amount ?></td>
                                        <td><?= $d->created_at ?></td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bd-example-modal-lg" id="add_model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="card">

                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert_mes">
                    <strong>Success !</strong> your payment has been received successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Student Monthly Fee Payment</h4>
                    <p class="card-description"></p>

                    <form class="forms-sample" id="smpf" action="javascript:void(0);" method="">

                        <div class="row d-flex justify-content-center">

                            <div class="input-group col-md-6">
                                <input type="number" class="form-control" placeholder="Enter a Student id" id="Student_id" name="Student_id">
                                <div class="input-group-append">
                                    <button class="btn btn-sm btn-primary" name="form_submit" id="form_submit" type="submit">Search</button>
                                </div>
                                <p id="usercheck" style="color: red;">**Student Id is missing </p>
                            </div>

                        </div>
                    </form>

                    <form class="forms-sample" id="smpf" action="javascript:void(0);" method="">
                        <div class="row my-3" id="fff">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Student Name</label>
                                    <div class="col-sm-9">
                                        <span class="form-control" id="stu_name"></span>
                                    </div>
                                    <p id="stu_name_error" style="color: red;">** Please Select Month </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Class</label>
                                    <div class="col-sm-9">
                                        <span class="form-control" id="c_class"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Academic Year</label>
                                    <div class="col-sm-9">
                                        <span class="form-control" id="a_year"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Month *</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="month">
                                            <option selected value=''>--Select Month--</option>
                                            <option value='Janaury'>Janaury</option>
                                            <option value='February'>February</option>
                                            <option value='March'>March</option>
                                            <option value='April'>April</option>
                                            <option value='May'>May</option>
                                            <option value='June'>June</option>
                                            <option value='July'>July</option>
                                            <option value='August'>August</option>
                                            <option value='September'>September</option>
                                            <option value='October'>October</option>
                                            <option value='November'>November</option>
                                            <option value='December'>December</option>
                                        </select>
                                        <p id="month_error" style="color: red;">** Please Select Month </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 aaa">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Payment Method *</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="pay_method">
                                            <option selected value=''>--Select Payment Method--</option>
                                            <option value='Online'>Online</option>
                                            <option value='Cash'>Cash</option>
                                        </select>
                                        <p id="pay_method_error" style="color: red;">** Please Select Payment Method </p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6  aaa">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Amount *</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="Enter a Amount" id="amount" name="Amount">
                                        <p id="amount_error" style="color: red;">** Please Enter Amount</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mr-3">
                                <button type="submit" id="data_save" class="btn btn-primary ml-5 mr-2 ">Submit</button>
                                <button onclick="javascript:window.location='StudentMonthlyFee'" class="btn btn-dark mr-5">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#usercheck").hide();
        $("#month_error").hide();
        $("#fff").hide();
        $(".aaa").hide();
        $("#pay_method_error").hide();
        $("#amount_error").hide();
        $("#alert_mes").hide();
        $("#stu_name_error").hide();
        $("#form_submit").click(function(event) {
            let student_id = $('#Student_id').val();

            if (student_id.length == "") {
                $("#usercheck").show();
                usernameError = false;
                return false;
            } else {
                $("#usercheck").hide();
            }

            $.ajax({
                url: `<?= base_url("StudentMonthlyFee/get") ?>/${student_id}`,
                type: 'GET',
                dataType: 'JSON',
                success: function(resp) {
                    if (resp.status == true) {
                        $("#fff").show();
                        let sut_name = $("#stu_name").text(resp.response.name);
                        $("#c_class").text(resp.response.class);
                        $("#a_year").text(resp.response.academic_year);
                        let student_id = resp.response.student_id;
                        let academic_year = resp.response.academic_year;


                        $("#month").change(function() {
                            $(".aaa").show();
                            $("#month_error").hide();

                        });

                        $("#data_save").click(function(event) {
                            let month = $('#month').val();
                            let method = $('#pay_method').val();
                            let amount = $('#amount').val();
                            if (month == "") {
                                $("#month_error").show();
                                // $("#pay_method_error").show();
                                // $("#amount_error").show();
                                return false;
                            } else {
                                $("#month_error").hide();
                                // $("#pay_method_error").hide();
                                // $("#amount_error").hide();
                            }


                            $.ajax({
                                url: `<?= base_url("StudentMonthlyFee/create") ?>`,
                                type: 'POST',
                                dataType: "JSON",
                                data: {
                                    month: month,
                                    method: method,
                                    amount: amount,
                                    student_id: student_id,
                                    academic_year: academic_year,
                                },
                                success: function(resp) {
                                    if (resp.status == true) {
                                        $("#alert_mes").show();
                                        $('#Student_id').val('');
                                        $("#stu_name").text('');
                                        $("#c_class").text('');
                                        $("#a_year").text('');
                                        $('#month').val('');
                                        $('#pay_method').val('');
                                        $('#amount').val('');
                                    }
                                },
                            });
                        });
                    } else {
                        $("#alert_mes").show();
                        alert(resp.message);
                    }
                },
                error: function(eror) {
                    alert("Server internal error");
                }
            });
        });
    });
</script>