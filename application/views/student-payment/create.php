<!-- Page header -->
<div class="page-header">
    <h3 class="page-title">Payment</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Payment') ?>">Payment</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<!-- Content -->
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Payment Create</h4>
                <p class="card-description"> </p>
                <form class="forms-sample" id="payment-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="my-2">Select Class</label>
                            <select class="form-control" style="width:100%" id="filter-class" name="filter-class">
                                <?php foreach ($classes as $class) : ?>
                                    <option value="<?= $class->id ?>"><?= $class->class ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="my-2">Select Name</label>
                            <select class="form-control" style="width:100%" id="student-name" name="student-name">

                            </select>
                        </div>

                        <input type="hidden" value="" id="cid">

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#filter-class').change(function() {
            let class_id = $(this).val();
            $.ajax({
                url: `<?= base_url('payment/student_get') ?>`,
                type: 'GET',
                dataType: 'JSON',
                data: {
                    cid: class_id,
                },
                success(resp) {
                    if (resp.status == true) {
                        resp.response.map((d, i) => {
                            let option = `<option value="${d.student_id}">${d.name}</option>`;
                            $('#student-name').append(option);
                            $('#cid').val(d.current_class_id);

                        });
                    }
                },
            })

        })

        $('#payment-form').on('submit',function(){
            alert('yes');
        });

    });
</script>