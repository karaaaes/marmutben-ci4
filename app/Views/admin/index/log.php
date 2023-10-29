<?php
  include('templates_admin/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Log List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Log List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 mb-4">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Log List</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="row">
                <form class="mb-3" action="<?= base_url() . "admin/log/filter" ?>" method="POST" enctype="multipart/form-data" style="width: 100%;">
                  <div class="range-date" style="display:flex !important;">
                    <div class="col-md-3">
                      <div class="form-group" style="margin-bottom: 0;">
                        <label for="exampleInputEmail1">First Date</label>
                        <div class="input-group">
                          <input type="date" name="first_date" class="form-control" placeholder="Date">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group" style="margin-bottom: 0;">
                        <label for="exampleInputEmail1">Last Date</label>
                        <div class="input-group">
                          <input type="date" name="last_date" class="form-control" placeholder="Date">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                        <button type="submit" name="submitFilter" class="btn btn-primary mt-2">Filter</button>
                        <a href="<?= base_url() . "admin/log" ?>" class="btn btn-secondary mt-2">Clear Filter</a>
                  </div>
                </form>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Menu</th>
                    <th>Item</th>
                    <th>Log</th>
                    <th>Timestamp</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $i = 0;
                      foreach($dataLog as $data) :
                        $i += 1;
                    ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['type']; ?></td>
                    <td><?= $data['menu']; ?></td>
                    <td><?= $data['item']; ?></td>
                    <td><?= $data['log']; ?></td>
                    <td><?= $data['timestamp']; ?></td>
                  </tr>
                  <?php 
                    endforeach
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>Menu</th>
                    <th>Item</th>
                    <th>Log</th>
                    <th>Timestamp</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('templates_admin/footer.php');
?>