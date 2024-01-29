<!-- Page header -->
<div class="page-header">
    <h3 class="page-title"> Students </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('student') ?>">Students</a></li>
            <li class="breadcrumb-item active" aria-current="page">Send Mail</li>
        </ol>
    </nav>
</div>

<div class="col-md-12 mx-auto grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Send Mail for <?= $student->name ?></h4>

            <form class="forms-sample" action="" method="post" id="email_send_from">

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">From</label>
                    <div class="col-sm-9">
                        <input type="email" name="from_email" class="form-control" id="from_mail" value="najibulmiddya00@gmail.com" required="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">To</label>
                    <div class="col-sm-9">
                        <span class="form-control" id="to_email"><?= $student->email ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">subject</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required id="subject" name="subject" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required id="Message" name="message" rows="8"><?= $student->name ?>,,</textarea>
                    </div>
                </div>

                <button type="submit" id="sub_btn" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-success" type="submit" disabled id="load_btn">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Sending...
                </button>
                <a href="<?= base_url('student') ?>" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>

<script>
    $("#load_btn").hide();
    $("#email_send_from").submit('click', function() {
        $("#sub_btn").hide();
        $("#load_btn").show();
    });
</script>