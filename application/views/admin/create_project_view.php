 <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Project</h1>
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
		
			<div class="col-sm-12">
				<!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Project Creation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Projects/add_project'); ?>">
			    <?php echo $this->session->flashdata('response'); ?>
			    <div class="err_datasse">
				 <?php echo validation_errors(); ?>

				 </div>
                <div class="card-body">
				  <div class="form-group">
                        <label>Select State</label>
                        <select name="state" required id="state" class="form-control">
						<?php 
						foreach($statelists as $list)
						{
							?>
							<option><?= $list['name']; ?></option>
							<?php
						}
						?>
						</select>
                      </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <input type="text" name="project_name" required class="form-control" id="exampleInputName1" placeholder="Project Name">
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputMobile1">Defining project Manager</label>
                    <div class="select2-purple">
                    <select class="select2" required name="project_manager[]" multiple="multiple" data-placeholder="Select" data-dropdown-css-class="select2-purple" style="width: 100%;">
					 <?php 
					 foreach($project_managers as $manager)
					 {
						 ?>
						 <option value="<?= $manager['id']; ?>"><?= $manager['name']; ?> (Project Manager)</option>
						 <?php
					 }
					 ?>
                      
                    </select>
                  </div>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Defining phase wise perameters</label>
                    <select name="define_phase" required class="form-control">
				    <?php 
					for($ij=1;$ij<=15;$ij++)
					{
						?>
						<option><?= $ij; ?></option>
						<?php
					}
					?>
                     </select>
                  </div>
                  
				
				  
				  <div class="form-group">
                    <label for="exampleInputFile">Upload sites (excel Formate - csv)*</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" accept=".csv" name="site_file" required class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Survey Form Format</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="survey_file" required class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

				  <div class="form-group">
                    <label for="exampleInputFile">Uplaod ICR Form Format</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" required name="icr_file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Scope Of Work With Deadlines</label>
                    <textarea class="form-control" name="work_deadlines" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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