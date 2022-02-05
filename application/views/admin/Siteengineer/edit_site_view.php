<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Site Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Site</li>
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
                  <h3 class="card-title"><b>Site Data Gathering</b></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="<?php echo base_url('Siteengineer/updatesite/'.$site_detail['id']); ?>">
                  
				
                  <div class="card-body team-form">
				  <div class="form-group">
                    <label>Site Received Date</label>
                    <div class="custom-file">
                      <input type="date" value="<?php echo $site_detail['site_received_date']; ?>" name="site_received_date" class="form-control" />
                      
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Site Name</label>
                      <input type="name" name="site_name" value="<?php echo $site_detail['site_name']; ?>" class="form-control" id="" placeholder="">
                    </div>



                    <div class="form-group">
                      <label for="exampleInputEmail1">Habitation </label>
                      <input type="text" name="habitation" value="<?php echo $site_detail['habitation']; ?>" class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Block</label>
                      <input type="text" name="block" value="<?php echo $site_detail['block']; ?>" class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Beneficiary Id</label>
                      <input type="text" required name="beneficiary_id" value="<?php echo $site_detail['beneficiary_id'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Beneficiary Name</label>
                      <input type="text" required name="beneficiary_name" value="<?php echo $site_detail['beneficiary_name'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Type</label>
                      <input type="name" name="product_type" value="<?php echo $site_detail['product_type'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pump Type</label>
                      <input type="text" name="pump_type" value="<?php echo $site_detail['pump_type'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pump Load</label>
                      <input type="text" name="pump_load" value="<?php echo $site_detail['pump_load'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Aadhar NO</label>
                      <input type="number" name="aadhar_no" value="<?php echo $site_detail['aadhar_no'] ?>"  class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile Number</label>
                      <input type="number" name="mobilen_number" value="<?php echo $site_detail['mobilen_number'] ?>" class="form-control" id="" placeholder="">
                    </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Water Source</label>
                      <input type="name" class="form-control" value="<?php echo $site_detail['water_source'] ?>" name="water_source" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Land Address</label>
                      <input type="name" name="land_address" value="<?php echo $site_detail['land_address'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <input type="name" name="category" value="<?php echo $site_detail['category'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Circle Name</label>
                      <input type="name" name="circle_name" value="<?php echo $site_detail['circle_name'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Land Village</label>
                      <input type="name" name="land_village" value="<?php echo $site_detail['land_village'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Land Taluka</label>
                      <input type="name" name="land_taluka" value="<?php echo $site_detail['land_taluka'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Land District</label>
                      <input type="name" name="land_district" value="<?php echo $site_detail['land_district'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Land PIN</label>
                      <input type="number" name="land_pin" value="<?php echo $site_detail['land_pin'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">SubDivision Name</label>
                      <input type="name" name="subdivision_name" value="<?php echo $site_detail['subdivision_name'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Division Name</label>
                      <input type="name" name="division_name" value="<?php echo $site_detail['division_name'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Application Status</label>
                      <input type="name" name="application_status" value="<?php echo $site_detail['application_status'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">TENDER NO</label>
                      <input type="name" name="tender_no" value="<?php echo $site_detail['tender_no'] ?>" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">LOT</label>
                      <input type="name" name="lot" value="<?php echo $site_detail['lot'] ?>" class="form-control" id="" placeholder="">
                    </div>








                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
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