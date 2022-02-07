<?php
if (isset($id)) {
    $id = $id;
    $required = '';
    $filled_signed_file = '<a href="'.base_url('assets/project_document/').$filled_signed_file.'" target="__blank">View</a>';
    $hamipatra_file = '<a href="'.base_url('assets/project_document/').$hamipatra_file.'" target="__blank">View</a>';
    $payment_advice_file = '<a href="'.base_url('assets/project_document/').$payment_advice_file.'" target="__blank">View</a>';
} else {
    $required = 'required="required"';
    $id = $filled_signed_file = $hamipatra_file = $payment_advice_file = '';
}

$limeman_sign_date = isset($limeman_sign_date) ? $limeman_sign_date : '';
$ae_je_sign_date = isset($ae_je_sign_date) ? $ae_je_sign_date : '';
$inward_date = isset($inward_date) ? $inward_date : '';
$ro_date = isset($ro_date) ? $ro_date : '';
$do_date = isset($do_date) ? $do_date : '';
$ho_date = isset($ho_date) ? $ho_date : '';
$act_dept_date = isset($act_dept_date) ? $act_dept_date : '';
$se_tbl_date = isset($se_tbl_date) ? $se_tbl_date : '';
$moved_to_ho_date = isset($moved_to_ho_date) ? $moved_to_ho_date : '';
$invoice_date = isset($invoice_date) ? $invoice_date : '';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ICR Movement</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Head</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Areamanager/add_icr_movement'); ?>">
                    <?php echo $this->session->flashdata('response'); ?>
                    <div class="err_datasse">
                        <?php echo validation_errors(); ?>
                    </div>

                    <input type="hidden" name="site_id" value="<?= $site_id ?>" />
                    <input type="hidden" name="id" value="<?= $id ?>" />

                <div class="card-body team-form">
                    <div class=" card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">ICR Movement</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Limeman signature on ICR report Date</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" value="<?= $limeman_sign_date ?>" name="limeman_sign_date" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>AE/JE signature on ICR report Date</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" value="<?= $ae_je_sign_date ?>" name="ae_je_sign_date" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>ICR filled & Singed Upload</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="filled_signed_file" <?= $required ?> />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <?= $filled_signed_file ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hamipatra Upload</label>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="hamipatra_file" <?= $required ?> />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <?= $hamipatra_file ?>
                                </div>
                            </div>
                        
                        <div class="form-group">
                            <label>File Inward Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="inward_date" value="<?= $inward_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File with RO Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="ro_date" value="<?= $ro_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File with HO Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="ho_date" value="<?= $ho_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File with DO Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="do_date" value="<?= $do_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File with Accounts Dept Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="act_dept_date" value="<?= $act_dept_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File with SE Table Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="se_tbl_date" value="<?= $se_tbl_date ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Moved to HO Date</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" name="moved_to_ho_date" value="<?= $moved_to_ho_date ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payment Advice upload</label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="payment_advice_file" <?= $required ?> />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <?= $payment_advice_file ?>
                            </div>
                        </div>
						</div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Complete</button>
                      </div>
                </div>
                <!-- /.card -->


                <!-- /.col (right) -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>