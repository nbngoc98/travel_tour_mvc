 <?php include "views/pages/admin/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Type Tour</h3>

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
                      <th style='width: 30%'>ID News</th>
                      <th style='width: 30%'>Type Tour</th>
                      
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['MaLoai'];
          
          echo"
                    <tr>
                      <td>" . $row['MaLoai']. "</td>
                      <td>" . $row['TenLoai']. "</td>
                    
                      <td><a href='admin.php?controller=loaitour&action=edit&id=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                      <td><a href='admin.php?controller=loaitour&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
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
