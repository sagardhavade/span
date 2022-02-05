 <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order (Project name & Title)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Operation Head</li>
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
                <h3 class="card-title"><b>Submit Order Details</b> (Project name & Title Goes here with status)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo site_url('Workorder/add_order'); ?>" >
                <div class="card-body team-form">
				  <?php echo $this->session->flashdata('response'); ?>
				  <div class="form-group">
                    <label for="exampleInputEmail1">LOI Number</label>
                    <input type="text" name="loi_number" required class="form-control" id="exampleInputName1" placeholder="">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">LOI Date</label>
                    <div class="input-group date reservationdate" id="reservationdate" data-target-input="nearest">
                        <input type="text" name="loi_date" required class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Work Order Number</label>
                    <input type="text" name="workorder_no" required class="form-control" id="exampleInputName1" placeholder="">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Work Order Date</label>
                    <div class="input-group date reservationdate" id="reservationdate1" data-target-input="nearest">
                        <input type="text" name="workorder_date" required class="form-control datetimepicker-input" data-target="#reservationdate1">
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Work Order Deadline</label>
                    <input type="number" name="order_deadline" required class="form-control" id="exampleInputName1" placeholder="">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputMobile1">Assign to Project Head</label>
                    <div class="select2-purple">
                    <select class="select2" name="project_head[]" multiple="multiple" data-placeholder="Select" data-dropdown-css-class="select2-purple" style="width: 100%;">
					<?php foreach($project_heads as $list) { ?>
                      <option value="<?= $list['id']; ?>"><?= $list['name']; ?></option>
					  <?php 
					}
					?>
                    </select>
                  </div>
                  </div>
                  
                 
				  
                  

				  
				  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit Order Details</button>
                </div>
              </form>
			  <div class="content-header">
      <!-- /.container-fluid -->
    </div>
            </div>
            <!-- /.card -->
			</div>
			
          
        </div>
        <!-- /.row (main row) -->
		<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0">Recent Orders</h2>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div>
		<div class="row">
			<div class="col-sm-12">
				<div class="team-table">
					<table id="example1" class="table table-bordered table-striped datatable_sets">
                  <thead>
                  <tr>
                    <th>LOI Number</th>
                    <th>LOI Date</th>
                    <th>Work Order Number</th>
                    <th>Work Order Date</th>
                    <th>Work Order Deadline</th>
					<th>Status</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  foreach($workorder_list as $list)
				  {
				  ?>
                  <tr>
                    <td><?= $list['loi_no']; ?></td>
                    <td><?= $list['loi_date']; ?></td>
                    <td><?= $list['workorder_no']; ?></td>
                    <td><?= $list['workorder_date']; ?></td>
                    <td><?= $list['order_deadline']; ?></td>
                    <td><?php 
					if($list['status']=='0')
					{
						echo "Pending";
					}
					else if($list['status']=='1')
					{
						echo "Approved";
					}
					else if($list['status']=='2')
					{
						echo "Rejected";
					}
					
					?></td>
					<td><a href="<?= base_url('workorder/edit_order/'.$list['id']); ?>" class="btn btn-block btn-success">Edit</a></td>
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