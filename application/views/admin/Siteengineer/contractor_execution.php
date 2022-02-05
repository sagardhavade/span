<?php
$contractor_name = isset($contractor_name) ? $contractor_name : '';
$civil_start_date = isset($civil_start_date) ? $civil_start_date : '';
$civil_end_date = isset($civil_end_date) ? $civil_end_date : '';
$civil_file = isset($civil_file) ? $civil_file : '';
$installation_start_date = isset($installation_start_date) ? $installation_start_date : '';
$installation_end_date = isset($installation_end_date) ? $installation_end_date : '';
$installation_file = isset($installation_file) ? $installation_file : '';
$pump_no = isset($pump_no) ? $pump_no : '';
$pumpset_make = isset($pumpset_make) ? $pumpset_make : '';
$motor_no = isset($motor_no) ? $motor_no : '';
$motor_make = isset($motor_make) ? $motor_make : '';
$controller_no = isset($controller_no) ? $controller_no : '';
$controller_make = isset($controller_make) ? $controller_make : '';
$rms_no = isset($rms_no) ? $rms_no : '';
$panel_no = isset($panel_no) ? $panel_no : '';
$panel_capacity = isset($panel_capacity) ? $panel_capacity : '';
$panel_make = isset($panel_make) ? $panel_make : '';
$latitude = isset($latitude) ? $latitude : '';
$longitude = isset($longitude) ? $longitude : '';
$rms_communication_status = isset($rms_communication_status) ? $rms_communication_status : '';
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/logo.png" alt="span pumps" height="60" width="60">
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Main row -->
          <div class="row">

            <div class="col-sm-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><b>Contractor Execution</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Siteengineer/add_contractor_execution'); ?>">
                    <?php echo $this->session->flashdata('response'); ?>
                    <div class="err_datasse">
                        <?php echo validation_errors(); ?>
                    </div>

                  <div class="card-body team-form">
					<div class="form-group">
                      <label for="exampleInputEmail1">Contractor Name</label>
                      <input type="hidden" name="site_id" value="<?= $site_id ?>">
                      <input type="name" class="form-control" name="contractor_name" value="<?= $contractor_name ?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Civil Start Date</label>
                      <input type="date" class="form-control" name="civil_start_date" value="<?= $civil_start_date ?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Civil End Date</label>
                      <input type="date" class="form-control" name="civil_end_date" value="<?= $civil_end_date ?>">
                    </div>
					
					<div class="form-group">
                    <label>Civil Photos Upload</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="civil_file">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
					</div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Installation Start Date</label>
                      <input type="date" class="form-control" name="installation_start_date" value="<?= $installation_start_date ?>">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Installation End Date</label>
                      <input type="date" class="form-control" name="installation_end_date" value="<?= $installation_end_date ?>">
                    </div>
					
					<div class="form-group">
                    <label>Installation Photos Upload</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="installation_file">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
					</div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pump Number</label>
                      <input type="text" class="form-control" name="pump_no" value="<?= $pump_no ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pumpset Make</label>
                      <input type="text" class="form-control" name="pumpset_make" value="<?= $pumpset_make ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Motor Number</label>
                      <input type="text" class="form-control" name="motor_no" value="<?= $motor_no ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1"> Motor Make</label>
                      <input type="text" class="form-control" name="motor_make" value="<?= $motor_make ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Controller Number</label>
                      <input type="text" class="form-control" name="controller_no" value="<?= $controller_no ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Controller Make</label>
                      <input type="text" class="form-control" name="controller_make" value="<?= $controller_make ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">RMS Number</label>
                      <input type="text" class="form-control" name="rms_no" value="<?= $rms_no ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Panel Number</label>
                      <input type="text" class="form-control" name="panel_no" value="<?= $panel_no ?>">
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Panel Capacity </label>
                      <input type="text" class="form-control" name="panel_capacity" value="<?= $panel_capacity ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Panel Make</label>
                      <input type="text" class="form-control" name="panel_make" value="<?= $panel_make ?>">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Latitude </label>
                      <input type="text" class="form-control" name="latitude" value="<?= $latitude ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Longitude</label>
                      <input type="text" class="form-control" name="longitude" value="<?= $longitude ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">RMS Communication Status</label>
                      <input type="text" class="form-control" name="<?= $rms_communication_status ?>" value="<?= $rms_communication_status ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Complete</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>


          </div>
          <!-- /.row (main row) -->

          <div class="row">
            <div class="col-sm-12">
              <div class="team-table">

              </div>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>