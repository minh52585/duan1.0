<!-- header -->
<?php
include "./views/layout/header.php"
?>
<!-- end header -->

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include "./views/layout/navbar.php"
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include "./views/layout/sidebar.php"
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Quản lý tài khoản khách hàng</h1>

            </div><!-- /.container-fluid -->
          </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="dt-buttons btn-group flex-wrap">

                        </div>
                      </div>

                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Họ tên</th>
                          <th>Ảnh đại diện</th>
                          <th>Email</th>
                          <th>Số điện thoại</th>
                          <th>Trạng thái</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listKhachHang as $key => $khachHang) { ?>
                          <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $khachHang['ho_ten'] ?></td>
                            <td>
                              <img src="<?= BASE_URL . $khacHang['anh_dai_dien'] ?>" alt="" style="width: 100px;" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png'">
                            </td>
                            <td><?= $khachHang['email'] ?></td>
                            <td><?= $khachHang['so_dien_thoai'] ?></td>
                            <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>

                            <td>
                              <div class="btn-group">
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"> <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"> <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=reset-pass&id_quan_tri=' . $khachHang['id'] ?>" onclick="return confirm('Bạn có muốn reset password không?')"><button class="btn btn-danger"><i class="fas fa-circle-notch"></i></button></a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>STT</th>
                          <th>Họ tên</th>
                          <th>Ảnh đại diện</th>
                          <th>Email</th>
                          <th>Số điện thoại</th>
                          <th>Trạng thái</th>
                          <th>Thao tác</th>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="row">


                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!--footer-->

    <!-- Code injected by live-server -->
    <!-- footer -->
    <?php
    include "./views/layout/footer.php"
    ?>

    <!-- end footer -->
</body>

</html>