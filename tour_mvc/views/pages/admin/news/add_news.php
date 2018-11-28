  
 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-3"><label>ID News:</label>
                      <input type="text" class="form-control" placeholder="" name="MaTinTuc">
                    </div>
                    
                    <div class="col-xs-4"><label>News Name:</label>
                      <input type="text" class="form-control" placeholder="" name="TenTinTuc">
                    </div>
                    
                  </div>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Content</label>
                  <textarea type="text" class="form-control" rows="3" placeholder="" name="NoiDung"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">File Image</label>
                  <input type="file" id="exampleInputFile" name="AnhTT">
                </div>
              

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="them_tintuc">Submit</button>
                

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
