  
 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Add Sales Promotion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-1"><label>ID Sales:</label>
                      <input type="text" class="form-control" placeholder="" name="MaSale">
                    </div>
                    <div class="col-xs-2"><label>Type Tour:</label>
                      <div class="form-group">
                          <select class="form-control" name="MaLoai">
                            <?php 
                                while ($row = $result->fetch_assoc()) {
                                  $id   = $row['MaLoai']; 
                                  $name = $row['TenLoai'];
                                  echo "<option value='$id'>$name</option>";
                                }
                            ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-4"><label>Title:</label>
                      <input type="text" class="form-control" placeholder="" name="title">
                    </div>
                    <div class="col-xs-5"><label>Introduce:</label>
                      <input type="text" class="form-control" placeholder="" name="gioithieu">
                    </div>
                  </div>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Content</label>
                  <input type="text" class="form-control" rows="3" placeholder="" name="noidung"></input>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-2"><label>Adult Price:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="gianguoilon">
                            <span class="input-group-addon" style="color: red">VNÐ</span>
                        </div>
                    </div>
                    <div class="col-xs-2"><label>Children's Price:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="giatreem">
                            <span class="input-group-addon" style="color: red">VNÐ</span>
                        </div>
                    </div>
                    <div class="col-xs-3"><label>Departure Day:</label>
                      <div class="form-group">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="ngaykhoihanh">
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-5"><label>Departure Location:</label>
                      <input type="text" class="form-control" placeholder="" name="diemkhoihanh">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File Image</label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File Image Slideshow</label>
                  <input type="file" id="exampleInputFile" name="slideshow">
                </div>

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="add_sale">Submit</button>
                

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
