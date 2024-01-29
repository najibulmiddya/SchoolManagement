<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">


        <section class="content">
            <div class="container-fluid">
                <?php if (session()->has('message')) : ?>
                    <div class="alert <?= session()->getFlashdata('alert-class') ?> mb-1 mt-1">
                        <?= session()->getFlashdata('message') ?>
                    </div>

                <?php endif; ?>

                <?php if (session()->has('insert_id')) : ?>
                    <div class="alert <?= session()->getFlashdata('alert-class') ?> mb-1 mt-1">
                        <?= session()->getFlashdata('insert_id') ?>
                    </div>
                <?php endif; ?>


                <div class="row">
                    <div class="col-md-12">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>

            </div><!--/. container-fluid -->
        </section>




        