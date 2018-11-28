 <?php
  while ($row = $resultt->fetch_assoc()) {
      $MaTV     = $row['MaTV'];
      $usename        = $row['usename'];
      $passTV    = $row['passTV'];
      $hoten      = $row['hoten'];
      $gioitinh  = $row['gioitinh'];
      $emailTV     = $row['emailTV'];
      $diachi = $row['diachi'];
      $soCMT = $row['soCMT'];
      $soDT       = $row['soDT'];
      
    }
 ?>

 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Sales Promotion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-3"><label>ID MaTV  :</label>
                      <input type="text" class="form-control" placeholder="" name="MaTV" value="<?php echo $MaTV?>">
                    </div>

                   
                    <div class="col-xs-4"><label>Title:</label>
                      <input type="text" class="form-control" placeholder="" name="usename" value="<?php echo $usename?>">
                    </div>
                    <div class="col-xs-5"><label>Introduce:</label>
                      <input type="text" class="form-control" placeholder="" name="passTV" value="<?php echo $passTV?>">
                    </div>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-3"><label>ID MaTV  :</label>
                      <input type="text" class="form-control" placeholder="" name="hoten" value="<?php echo $hoten?>">
                    </div>

                   
                    <div class="col-xs-4"><label>Title:</label>
                      <input type="text" class="form-control" placeholder="" name="gioitinh" value="<?php echo $gioitinh?>">
                    </div>
                   <div class="col-xs-5"><label>Introduce:</label>
                      <input type="text" class="form-control" placeholder="" name="emailTV" value="<?php echo $emailTV?>">
                    </div>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-3"><label>ID MaTV  :</label>
                      <input type="text" class="form-control" placeholder="" name="diachi" value="<?php echo $diachi?>">
                    </div>

                   
                    <div class="col-xs-4"><label>Title:</label>
                      <input type="text" class="form-control" placeholder="" name="soCMT" value="<?php echo $soCMT?>">
                    </div>
                    <div class="col-xs-5"><label>Introduce:</label>
                      <input type="text" class="form-control" placeholder="" name="soDT" value="<?php echo $soDT?>">
                    </div>
                  </div>
                </div>
                
                

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="edit_customer">Submit</button>
                

              </form>
            </div>
            <!-- /.box-body -->
          </div>        
        </div>
      </div>
    </section>
      </div>
  <!-- /.content-wrapper -->
  <?php include "views/pages/admin/footer.php" ?>
