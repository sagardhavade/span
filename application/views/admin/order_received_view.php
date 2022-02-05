<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        
        <!-- /.row (main row) -->
		<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			<br/>
            <h2 class="m-0">Recent Orders</h2>
			<br/>
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
					<td>
					<a href="<?= base_url('Projects/create'); ?>" type="button" class="btn btn-block btn-primary">Create Project</a>
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