<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Site List (<?= $project_detail['state']; ?> / <?= $project_detail['project_name']; ?> / <?= count($sites_list); ?>)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
		    
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
					<table id="example1" class="table table-bordered table-striped datatable_sets_server">
                  <thead>
                  <tr>
					<th>Number</th>
                    <th>Circle Name</th>
					<th>Land District</th>
					<th>Land Village</th>
					<th>Land Taluka</th>
					<th>WORKORDER NO</th>
					<th>Beneficiary Id</th>
					<th>Beneficiary Name</th>
					<th>Mobile Number</th>
					<th>Land Address</th>
                    <th>Pump Load</th>
                    <th>Category</th>
                    <th>Work Order Dt</th>
                    <th>Application Status</th>
					<th>Installation Status</th>
					<th>Installation Date</th>
					<th>Remarks</th>
					<th>Lot</th>
					<th>Site Engineers</th>
					<th>Area Manager</th>
					<th>Contractor</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  /*
				  $ii=0;
				  foreach($sites_list as $list)
				  {
					  $ii++;
				  ?>
                  <tr>
                    <td><?= $ii; ?></td>
					<td><?= $list['circle_name']; ?></td>
					<td><?= $list['land_district']; ?></td>
					<td><?= $list['land_village']; ?></td>
					<td><?= $list['land_taluka']; ?></td>
					<td><?= $list['workorder_no']; ?></td>
					<td><?= $list['beneficiary_id']; ?></td>
					<td><?= $list['beneficiary_name']; ?></td>
					<td><?= $list['mobilen_number']; ?></td>
					<td><?= $list['land_address']; ?></td>
					<td><?= $list['pump_load']; ?></td>
					<td><?= $list['category']; ?></td>
					<td><?= $list['work_order_date']; ?></td>
					<td><?= $list['application_status']; ?></td>
					<td><?= $list['installation_status']; ?></td>
					<td><?= $list['installation_date']; ?></td>
					<td><?= $list['remarks']; ?></td>
					<td><?= $list['lot']; ?></td>                    
                  </tr>
				 <?php 
				  }
				  */
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
 <script>
$(function() {
	var table_news = $('.datatable_sets_server').DataTable({
		"processing":true,
		"serverSide":true,  
		'searching': false,
		"ordering": false,
		//"responsive": true,
		"order":[], 
		"ajax": {
			url :'<?php echo base_url("Siteengineer/sites_server/".$project_detail['id']); ?>',
			type: "GET"  
		},
		"columnDefs":[  
			{  
				"targets":[0],  
				"orderable":false,
			},  
		], 
	});
});
 </script>