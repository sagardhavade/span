  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Team</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Teams</li>
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
                <h3 class="card-title">Add Team Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= site_url('Teams/add_team'); ?>">
			   
                <div class="card-body team-form"> 
				<?php echo $this->session->flashdata('response'); ?>
				<div class="err_datasse">
				 <?php echo validation_errors(); ?>

				 </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" value="<?php echo set_value('name'); ?>" required name="name" class="form-control" id="exampleInputName1" placeholder="Enter Name">
                  </div>
				  <div class="form-group">
                        <label>Select Position</label>
                        <select required="" name="position_type" class="form-control">
						
						<option value="project_head">Project head</option>
						<option value="operation_head">Operation head</option>
						<option value="account_head">Account head</option>
						<option value="logistic_head">Logistic head</option>
						<option value="project_manager">Project manager</option>
						<option value="site_engineer">Site Engineer </option>
						<option value="area_manager">Area manager </option>
						<option value="contractor">Contractor</option>
					  </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail12">Email address</label>
                    <input type="email" value="<?php echo set_value('email'); ?>" name="email" required class="form-control" id="exampleInputEmail12" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMobile13">Mobile Number</label>
                    <input type="number" value="<?php echo set_value('mobile'); ?>" name="mobile" class="form-control" id="exampleInputMobile13" placeholder="Enter Mobile">
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
				<table id="" class="table table-bordered table-striped datatable_sets">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>User Id</th>
					<th>Password</th>
					<th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				  foreach($userslist as $list)
				  {
					  $role=$list['position_type'];
					  $role=ucfirst(str_replace("_", " ", $role));
				  ?>
                  <tr>
                    <td><?php echo $list['name']; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $list['email']; ?></td>
                    <td><?php echo $list['mobile']; ?></td>
                    <td><?php echo $list['user_id']; ?></td>
					<td><?php echo $list['password']; ?></td>
					<td>
					<?php 
					if($list['status']==1)
					{
					?>
						<a onclick="return confirm('Are you sure you want to deactivate this account?');" href="<?php echo base_url('Teams/deactivate_team/'.$list['id']); ?>" class="btn btn-block btn-success">Activate</a>
					<?php 
					}
					else 
					{
						?>
						<a onclick="return confirm('Are you sure you want to activate this account?');" href="<?php echo base_url('Teams/activate_team/'.$list['id']); ?>" class="btn btn-block btn-danger">Deactivate</a>
						<?php
					}
					?>
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
  <!-- /.content-wrapper -->