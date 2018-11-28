 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List News</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
        <?php 
       
      if ($news->num_rows > 0) {
         echo"
                    <tr style='width: 100%'>
                      <th style='width: 10%'>ID News</th>
                      <th style='width: 15%'>News Name</th>
                      <th style='width: 10%'>Images</th>
                      <th style='width: 35%'>Content</th>
                      <th style='width: 10%'>Created</th>
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $news->fetch_assoc()) {
          $id = $row['MaTinTuc'];
          $noidung = $row['NoiDung'];
          $image = 'public/uploads/tintuc/'.$row['AnhTT'];
          $len = strlen($noidung);
          if($len > 100){
            $noidung1 = substr($noidung,  0, 100);
            $noidung2 = $noidung1." ...";
          }else if($len < 100){
            $noidung2 = substr($noidung,  0, 100);     
          }
          echo"
                    <tr>
                      <td>" . $row['MaTinTuc']. "</td>
                      <td>" . $row['TenTinTuc']. "</td>
                      <td style='width: 20%'><img src='$image' width='70%'></td>
                      <td>" . $noidung2. "</td>
                      <td>" . $row['NgayGuiTT']."</td>       
                      <td><a href='admin.php?controller=tintuc&action=edit&id=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                      <td><a href='admin.php?controller=tintuc&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
                    </tr>";
                 
        }
      } else {
        echo "No promotion!";
      }
      ?>
    </table>
        </div>
      </div>
    </div>
  </div>
</section>
  </div>
  <!-- /.content-wrapper -->
  <?php include "views/pages/admin/footer.php" ?>
