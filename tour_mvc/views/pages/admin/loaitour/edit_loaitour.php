 <?php

 while ($row = $resultt->fetch_assoc()) {
      $MaLoai     = $row['MaLoai'];
      $TenLoai        = $row['TenLoai'];
      
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
              <h3 class="box-title">Edit Type Tour</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-6"><label>ID Type:</label>
                      <input type="text" class="form-control" placeholder="" name="MaLoai" value="<?php echo $MaLoai; ?>">
                    </div>
                   
                    <div class="col-xs-6"><label>Type Tour:</label>
                      <input type="text" class="form-control" placeholder="" name="TenLoai" value="<?php echo $TenLoai; ?>">
                    </div>
              
                  </div>
                </div>

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="edit_loaitour">Submit</button>
                

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
