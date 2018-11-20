 <?php include "views/pages/admin/header.php" ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Trả lời Comment</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="AddProduct" action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputEmail1"  name="reply">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg" name="reply_cmt">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>

  </div>
  <!-- /.content-wrapper -->
    <?php include "views/pages/admin/footer.php" ?>