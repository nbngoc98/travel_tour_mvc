 <?php include "views/pages/admin/header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="row">
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Quản Lý Admin</h3>

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
                          <tr>
                            <th>ID</th>
                            <th>UserAdmin</th>
                            <th>PassAdmin(MD5)</th>
                            <th>EmailAdmin</th>
                            <th>Avata</th>
                            <th></th>
                            <th></th>
                          </tr>";
              while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $image = 'public/uploads/admin/'.$row['avata'];
                echo"
                          <tr style='width: 100%'>
                            <td style='width: 5%'>" . $row['id']. "</td>
                            <td style='width: 15%'>" . $row['userAdmin']. "</td>
                            <td style='width: 35%'>" . $row['passAdmin']. "</td>
                            <td style='width: 20%'>" . $row['emailAdmin']."</td>
                            <td style='width: 20%'><img src='$image' width='10%'></td>
                            <td><a href='edit_admin.php?idEdit=$id'><i class='fa fa-fw fa-pencil-square-o'></i></a></td>
                            <td><a href='delete_admin.php?idDelete=$id'><i class='fa fa-fw fa-close'></i></a></td>
                          </tr>";
                       
              }
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