 <?php
  while ($row = $resultt->fetch_assoc()) {
      $MaTour1  = $row['MaTour'];
      $TenTour        = $row['TenTour'];
      $tgian    = $row['tgian'];
      $NoiDungTour      = $row['NoiDungTour'];
      $GiaNguoiLon  = $row['GiaNguoiLon'];
      $GiaTreEm     = $row['GiaTreEm'];
      $diemkhoihanh = $row['DiemKhoiHanh'];
      $MaLoai       = $row['MaLoai'];
      $imageEdit    = 'public/uploads/tour/'.$row['AnhTour'];

    }
 ?>
<!-- tour(`MaTour`, `MaLoai`, `TenTour`, `tgian`, `NoiDungTour`, `AnhTour`, `GiaNguoiLon`, `GiaTreEm`, `DiemKhoiHanh`, `NgayThem`) -->
 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Tour Promotion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" name="AddSale" action="#" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-1"><label>ID Sales:</label>
                      <input type="text" class="form-control" placeholder="" name="MaTour" value="<?php echo $MaTour1?>">
                    </div>
                    <div class="col-xs-2"><label>Type Tour:</label>
                      <div class="form-group">
                          <select class="form-control" name="MaLoai">
                            <?php 
                                while ($row = $result->fetch_assoc()) {
                                  $id   = $row['MaLoai']; 
                                   $selected = ($MaLoai == $id)?'selected':'';
                                  $name = $row['TenLoai'];
                                  echo "<option value='$id'>$name</option>";
                                }
                            ?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-4"><label>Title:</label>
                      <input type="text" class="form-control" placeholder="" name="TenTour" value="<?php echo $TenTour?>">
                    </div>
                    <div class="col-xs-5"><label>Date:</label>
                      <input type="text" class="form-control" placeholder="" name="tgian" value="<?php echo $tgian?>">
                    </div>
                  </div>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Content</label>
                  <textarea type="text" class="form-control" rows="3" placeholder="" name="NoiDungTour"><?php echo $NoiDungTour?></textarea>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-xs-2"><label>Adult Price:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="GiaNguoiLon" value="<?php echo $GiaNguoiLon?>">
                            <span class="input-group-addon" style="color: red">VNÐ</span>
                        </div>
                    </div>
                    <div class="col-xs-2"><label>Children's Price:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="GiaTreEm" value="<?php echo $GiaTreEm?>">
                            <span class="input-group-addon" style="color: red">VNÐ</span>
                        </div>
                    </div>
                    
                    <div class="col-xs-5"><label>Departure Location:</label>
                      <input type="text" class="form-control" placeholder="" name="DiemKhoiHanh" value="<?php echo $diemkhoihanh?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File Image</label>
                  <input type="file" id="exampleInputFile" name="imageee">
                   <img src="<?php  echo $imageEdit?>" width='10%'>
                </div>
                

              <button type="submit" class="btn btn-block btn-primary btn-lg" name="edit_tour">Submit</button>
                

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
