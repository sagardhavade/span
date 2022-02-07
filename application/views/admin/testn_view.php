<?php 
if (isset($id)) {
    $id = $id;
    $required = '';
    $filled_yield_test_form_img = '<a href="'.base_url('assets/project_document/').$filled_yield_test_form.'" target="__blank">View</a>';
    $filled_site_survey_form_img = '<a href="'.base_url('assets/project_document/').$filled_site_survey_form.'" target="__blank">View</a>';
} else {
    $required = 'required="required"';
    $id = $filled_yield_test_form_img = $filled_site_survey_form_img = '';
}

$site_survey_actual_date = isset($site_survey_actual_date) ? $site_survey_actual_date : '';
$source_depth = isset($source_depth) ? $source_depth : '';
$source_dia = isset($source_dia) ? $source_dia : '';
$static_water_level = isset($static_water_level) ? $static_water_level : '';
$pumping_water_level = isset($pumping_water_level) ? $pumping_water_level : '';
$pump_head_recommended = isset($pump_head_recommended) ? $pump_head_recommended : '';
$length_of_hdpe_pipe_required = isset($length_of_hdpe_pipe_required) ? $length_of_hdpe_pipe_required : '';
$cable_length_required = isset($cable_length_required) ? $cable_length_required : '';
$wire_rope_length_required = isset($wire_rope_length_required) ? $wire_rope_length_required : '';
$yield_test_required = isset($yield_test_required) ? $yield_test_required : '';
$yield_test_start_date = isset($yield_test_start_date) ? $yield_test_start_date : '';
$yield_test_end_date = isset($yield_test_end_date) ? $yield_test_end_date : '';
$yield_of_borewell = isset($yield_of_borewell) ? $yield_of_borewell : '';
$yield_test_status = isset($yield_test_status) ? $yield_test_status : '';
$site_feasible_status = isset($site_feasible_status) ? $site_feasible_status : '';
?>

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
                  <h3 class="card-title"><b>Site Survey</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Siteengineer/add_site_survey'); ?>">
                  
                    <?php echo $this->session->flashdata('response'); ?>
                    <div class="err_datasse">
                        <?php echo validation_errors(); ?>
                    </div>
                    
                    <input type="hidden" name="site_id" value="<?= $site_id ?>" />
                    <input type="hidden" name="id" value="<?= $id ?>" />

                  <div class="card-body team-form">
					<div class="form-group">
                      <label for="exampleInputEmail1">Site Survey Actual Date</label>
                      <input type="date" class="form-control" name="site_survey_actual_date" value="<?= $site_survey_actual_date ?>" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Source Depth</label>
                      <input type="number" class="form-control" name="source_depth" value="<?= $source_depth ?>" min="0" max="100" required />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Source Dia </label>
                      <input type="number" class="form-control" name="source_dia" value="<?= $source_dia ?>" min="0" max="32" required />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Static Water Level</label>
                      <input type="number" class="form-control" name="static_water_level" value="<?= $static_water_level ?>" min="0" max="100" required />
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pumping Water Level</label>
                      <input type="number" class="form-control" name="pumping_water_level" value="<?= $pumping_water_level ?>" min="0" max="100" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pump Head Recommended</label>
                      <input type="number" class="form-control" name="pump_head_recommended" value="<?= $pump_head_recommended ?>" min="0" max="100" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Length of HDPE Pipe Required</label>
                      <input type="number" class="form-control" name="length_of_hdpe_pipe_required" value="<?= $length_of_hdpe_pipe_required ?>" min="0" max="115" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cable Length required(Mtrs)</label>
                      <input type="number" class="form-control" name="cable_length_required" value="<?= $cable_length_required ?>" min="0" max="115" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Wire rope length required (Mtrs)</label>
                      <input type="number" class="form-control" name="wire_rope_length_required" value="<?= $wire_rope_length_required ?>" min="0" max="115" required />
                    </div>
					<div class="form-group">
                    <label>Filled Site Survey Form</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="filled_site_survey_form" <?= $required ?> />
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <?= $filled_site_survey_form_img ?>
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Yield Test required </label>
                      <input type="number" class="form-control" name="yield_test_required" value="<?= $yield_test_required ?>" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Yield test Start Date</label>
                      <input type="date" class="form-control" name="yield_test_start_date" value="<?= $yield_test_start_date ?>" required />
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Yield Test End Date</label>
                      <input type="date" class="form-control" name="yield_test_end_date" value="<?= $yield_test_end_date ?>" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Yield of Borewell (LPH)</label>
                      <input type="number" class="form-control" name="yield_of_borewell" value="<?= $yield_of_borewell ?>" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Yield Test Status</label>
                      <input type="name" class="form-control" name="yield_test_status" value="<?= $yield_test_status ?>" required />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Feasible Status</label>
                      <input type="name" class="form-control" name="site_feasible_status" value="<?= $site_feasible_status ?>" required />
                    </div>
					<div class="form-group">
                    <label>Filled Yield Test Form</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="filled_yield_test_form" <?= $required ?> />
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      <?= $filled_yield_test_form_img ?>
                    </div>
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
    <!-- /.content-wrapper -->