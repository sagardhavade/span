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
					  $where['project_id']=$list['id'];
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
					
					<?php 
					
					if($list['assigned_sites'])
					{
						?>
						<p class="text-success"><b>Assigned</b></p>
						<a href="<?php echo base_url('Projectmanager/sites/'.$list['id']); ?>" type="button" class="btn btn-block btn-danger">View sites</a>
						<?php
					}
					else 
					{
					?>
						<a href="<?php echo base_url('Projectmanager/sites/'.$list['id']); ?>" type="button" class="btn btn-block btn-danger">Assign site</a>
					<?php 
					}
					?>
					</td>
                  </tr>
				 <?php
				 if(!$list['assigned'])
				 {
				  ?>
				  <!-- Modal -->
<div class="modal fade" id="exampleModal_assing<?php echo $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?php echo $list['id']; ?>">Assign</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="POST" action="<?= site_url('Projects/assign_manager/'.$list['id']); ?>" >
      <div class="modal-body">
        <div class="form-group">
                    <label for="exampleInputMobile1">Defining project Manager</label>
                    <div class="select2-purple">
                    <select class="select2" required name="assign_project_manager[]" multiple="multiple" data-placeholder="Select" data-dropdown-css-class="select2-purple" style="width: 100%;">
					<?php
                     foreach($project_managers as $manager)
					 {
						 ?>
						 <option <?php if(in_array($manager['id'],$pro_arr)) echo "selected"; ?> value="<?= $manager['id']; ?>"><?= $manager['name']; ?> (Project Manager)</option>
						 <?php
					 }
					 ?>
                      
                    </select>
                  </div>
                  </div>
				    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
				  <?php
				 }
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