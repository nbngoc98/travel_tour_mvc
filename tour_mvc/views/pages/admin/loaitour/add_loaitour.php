  
 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Type Tour</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-6"><label>ID Type:</label>
                      <input type="text" class="form-control" placeholder="" name="MaLoai">
                    </div>
                   
                    <div class="col-xs-6"><label>Type Tour:</label>
                      <input type="text" class="form-control" placeholder="" name="TenLoai">
                    </div>
              
                  </div>
                </div>

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="add_loaitour">Submit</button>
                

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
