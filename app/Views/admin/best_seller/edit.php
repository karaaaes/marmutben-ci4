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
          <h1>Form Edit Best Seller Widget <?= $id[0]; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Form Edit Best Seller Widget <?= $id[0]; ?></li>
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
              <h3 class="card-title">Form Form Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url() . "admin/best_seller/action_edit" ?>" method="post" enctype="multipart/form-data">
              <input type="text" name="widget_id" class="form-control" value="<?= $marmutWidget[0]['id']; ?>" hidden>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Marmut</label>
                  <select class="form-control" name="jenis_marmut">
                    <option value="<?= $getMarmut[0]['id'];?>" selected>
                      <?= $getMarmut[0]['jenis_marmut'] . " - " . $getMarmut[0]['categories'] . " (Current Choice)"; ?>
                    </option>
                    <?php
                    foreach($marmutBestSeller as $bestSeller) :
                    ?>
                    <option value="<?= $bestSeller['id']; ?>">
                      <?= $bestSeller['jenis_marmut'] . " - " . $bestSeller['categories']; ?></option>
                    <?php
                    endforeach
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jumlah Terjual</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                      </span>
                    </div>
                    <input type="number" name="jumlah_terjual" class="form-control"
                      value="<?= $marmutWidget[0]['jumlah_terjual']; ?>" placeholder="Jumlah Terjual">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submitBestSeller" class="btn btn-primary">Submit</button>
                </div>
            </form>
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