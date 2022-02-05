 <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Project List</h1>
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
			   <?php echo $this->session->flashdata('response'); ?>
				<div class="team-table">
					<table id="example1" class="table table-bordered table-striped datatable_sets">
                  <thead>
                  <tr>
                    <th>State</th>
                    <th>Project Name</th>
                    <th>phase wise perameters</th>
                    <th>Number of Sites</th>
                    <th>Scope Of Work</th>
					<th>Uploaded Document</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  foreach($project_list as $list)
				  {
					  $user_id=$this->session->userdata('ses_userlogin_id');
					  $where['project_id']=$list['id'];
					  $where['site_engineer']=$user_id;
					  $count_data=$this->Common_models->counts_data('sites_tbl',$where);
					  $project_manager=$list['project_manager'];
					  $pro_arr=array();
					  if($project_manager)
					  {
						  $pro_arr=explode(",",$project_manager);
					  }
				  ?>
                  <tr>
                    <td><?= $list['state']; ?></td>
                    <td><?= $list['project_name']; ?></td>
                    <td><?= $list['define_phase']; ?></td>
                    <td><?= $count_data; ?></td>
                    <td><?= $list['scope_deadlines']; ?></td>
					<td>
					<?php 
					if($list['survey_file'])
					{
						?>
						<a target="_blank" href="<?php echo base_url("assets/project_document/".$list['survey_file']); ?>">Survey Document</a>
						<br>
						<?php
					}
					if($list['icr_file'])
					{
						?>
						<a target="_blank" href="<?php echo base_url("assets/project_document/".$list['icr_file']); ?>">ICR Document</a>
						<?php
					}
					?>
					
					</td>
					<td>
					<a href="<?php echo base_url('Siteengineer/sites/'.$list['id']); ?>" type="button" class="btn btn-block btn-danger">View sites</a>
					</td>
                  </tr>
				 <?php
				
				  }
				  ?>
				  
				  </tbody>
				  </table>
				</div>
			</div>
		</div>
		

		
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>