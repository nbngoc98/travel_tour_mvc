 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Customer</h3>

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
                      <th style='width: 10%'>User Name</th>
                      <th style='width: 10%'>Password</th>
                      <th style='width: 15%'>Name</th>
                      <th style='width: 10%'>Sex</th>
                      <th style='width: 10%'>Email</th>
                      <th style='width: 10%'>Localtion</th>
                      <th style='width: 20%'>Identity Card</th>
                      <th style='width: 20%'>Phone</th>
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['MaTV'];
          // $image = 'public/uploads/sales/'.$row['image'];
          echo"
                    <tr>
                      <td>" . $row['MaTV']. "</td>
                      <td>" . $row['usename']. "</td>
                      <td>" . $row['passTV']. "</td>
                      <td>" . $row['hoten']. "</td>
                      <td>" . $row['gioitinh']."</td>
      
                      <td>" . $row['emailTV']."</td>
                      <td>" . $row['diachi']."</td>
                      <td>" . $row['soCMT']."</td>
                      <td>" . $row['soDT']."</td>
                      <td><a href='admin.php?controller=thanhVien&action=edit&id=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                      <td><a href='admin.php?controller=thanhVien&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
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
