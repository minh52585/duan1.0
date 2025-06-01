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
              <h1>Quản lý tài khoản quản trị viên</h1>

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
                  <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">
                    <button class="btn btn-success">Thêm tài khoản</button>
                  </a>

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
                          <th>Email</th>
                          <th>Số điện thoại</th>
                          <th>Trạng thái</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($listQuanTri as $key => $quanTri) { ?>
                          <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $quanTri['ho_ten'] ?></td>
                            <td><?= $quanTri['email'] ?></td>
                            <td><?= $quanTri['so_dien_thoai'] ?></td>
                            <td><?= $quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>

                            <td>
                              <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id'] ?>"> <button class="btn btn-warning">Sửa</button></a>
                              <a href="<?= BASE_URL_ADMIN . '?act=reset-pass&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password không?')"><button class="btn btn-danger">Reset</button></a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>STT</th>
                          <th>Họ tên</th>
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
    <?php
    include "./views/layout/footer.php"
    ?>

    <!-- end footer -->
</body>

</html>