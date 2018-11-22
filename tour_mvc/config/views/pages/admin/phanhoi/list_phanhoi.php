 <?php include "views/pages/admin/header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Feedback List</h3>

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
                                        <th style='width: 10%'>ID Feedback</th>
                                        <th style='width: 15%'>Sender's Name</th>
                                        <th style='width: 20%'>Sender'sEmail</th>
                                        <th style='width: 10%'>Title</th>
                                        <th style='width: 35%'>Content</th>
                                        <th style='width: 8%'>Sent Date</th>
                                        <th></th>
                                      </tr>";
                          while ($row = $result->fetch_assoc()) {
                            $id = $row['MaPH'];
                            echo"
                                      <tr>
                                        <td>" . $row['MaPH']. "</td>
                                        <td>" . $row['TenNguoiGui']. "</td>
                                        <td>" . $row['EmailNguoiGui']. "</td>
                                        <td>" . $row['TieuDe']."</td>
                                        <td>" . $row['NoiDung']."</td>
                                        <td>" . $row['NgayGui']."</td>
                                        <td><a href='admin.php?controller=phanhoi&action=delete&id=$id'><i class='fa fa-fw fa-close'></i></a></td>
                                      </tr>";
                                   
                          }
                        } else {
                          echo "No Feedback!";
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