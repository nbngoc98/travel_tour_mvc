 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Sales Promotion</h3>

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
       
      if ($result->num_rows > 0) {
         echo"
                    <tr style='width: 100%'>
                      <th style='width: 5%'>ID</th>
                      <th style='width: 5%'>Start Sale</th>
                      <th style='width: 5%'>Stop Sale</th>
                      <th style='width: 5%'>Type Tour</th>
                      <th style='width: 10%'>Title</th>
                      <th style='width: 8%'>Date</th>
                      <th style='width: 40%'>Content</th>
                      <th style='width: 15%'>Image</th>
                      <th style='width: 10%'>Adult Price</th>
                      <th style='width: 10%'>Children's Price</th>
                      <th style='width: 20%'>Departure Day</th>
                      <th style='width: 8%'>Departure Date</th>
                      <th style='width: 18%'>Departure Location</th>
                      <th style='width: 18%'>Created</th>
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['MaSale'];
          $image = 'public/uploads/sales/'.$row['image'];
          $noidung = $row['noidung'];
          $len = strlen($noidung);
          if($len > 100){
            $noidung1 = substr($noidung,  0, 100);
            $noidung2 = $noidung1." ...";
          }else if($len < 100){
            $noidung2 = substr($noidung,  0, 100);     
          }
          echo"
                    <tr>
                      <td>" . $row['MaSale']. "</td>
                      <td>" . $row['startSale']. "</td>
                      <td>" . $row['stopSale']. "</td>
                      <td>" . $row['TenLoai']. "</td>
                      <td>" . $row['title']. "</td>
                      <td>" . $row['tgian']. "</td>
                      <td>" . $noidung2."</td>
                      <td style='width: 20%'><img src='$image' width='70%'></td>
                      <td>" . $row['gianguoilon']."</td>
                      <td>" . $row['giatreem']."</td>
                      <td>" . $row['ngaykhoihanh']."</td>
                      <td>" . $row['giokhoihanh']."</td>
                      <td>" . $row['diemkhoihanh']."</td>
                      <td>" . $row['ngaythemSale']."</td>
                      <td><a href='admin.php?controller=sales&action=edit&id=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                      <td><a href='admin.php?controller=sales&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
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
