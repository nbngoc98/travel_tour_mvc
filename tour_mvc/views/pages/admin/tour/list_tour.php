 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Tour</h3>

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
                      <th style='width: 5%'>ID Tour</th>
                      <th style='width: 5%'>Type Tour</th>
                      <th style='width: 20%'>Title</th>
                      <th style='width: 10%'>Date</th>
                      <th style='width: 10%'>Departure Day</th>
                      <th style='width: 50%'>Content</th>
                      <th style='width: 10%'>Image</th>
                      <th style='width: 10%'>Adult Price</th>
                      <th style='width: 20%'>Children's Price</th>
                      <th style='width: 18%'>Departure Localtion</th>
                      <th style='width: 18%'>Created</th>
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['MaTour'];
          $image = 'public/uploads/tour/'.$row['AnhTour'];
          $noidung = $row['NoiDungTour'];
          $len = strlen($noidung);
          if($len > 100){
            $noidung1 = substr($noidung,  0, 100);
            $noidung2 = $noidung1." ...";
          }else if($len < 100){
            $noidung2 = substr($noidung,  0, 100);     
          }
          // SELECT tour.MaTour,loaitour.TenLoai,tour.TenTour,tour.tgian,khoihanh.ngaykhoihanh,tour.NoiDungTour,tour.AnhTour,tour.GiaNguoiLon,tour.GiaTreEm,tour.DiemKhoiHanh FROM `tour` inner join khoihanh on tour.MaTour=khoihanh.MaTour INNER join loaitour on tour.MaLoai = loaitour.MaLoai
          echo"
                    <tr>
                      <td>" . $row['MaTour']. "</td>
                      <td>" . $row['TenLoai']. "</td>
                      <td>" . $row['TenTour']. "</td>
                     
                      <td>" . $row['tgian']. "</td> 
                      <td>" . $row["ngaykhoihanh"]. "</td>
                      <td>" . $noidung2."</td>
                      <td style='width: 20%'><img src='$image' width='70%'></td>
                      <td>" . $row['GiaNguoiLon']."</td>
                      <td>" . $row['GiaTreEm']."</td>
                      <td>" . $row['DiemKhoiHanh']."</td>
                      <td>" . $row['NgayThem']."</td>
                      <td><a href='admin.php?controller=tour&action=edit&id=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                      <td><a href='admin.php?controller=tour&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
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

