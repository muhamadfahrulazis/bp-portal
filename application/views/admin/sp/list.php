<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view('admin/_partials/head.php') ?>

</head>

<body id="page-top">

  <?php $this->load->view('admin/_partials/navbar.php') ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('admin/_partials/sidebar.php') ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view('admin/_partials/breadcrumb.php') ?>

        <!-- DataTables-->
        <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('admin/sp/add') ?>"><i class="fas fa-plus"> Add New</i></a>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Finished Order</th>
                            <th>Photo</th>
                            <th>Alamat Domisili</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sp as $sps): ?>
                        <tr>
                            <td width="150">
                                <?php echo $sps->sp_name ?>
                            </td>
                            <td>
                                <?php echo $sps->finished_order ?>
                            </td>
                            <td>
                                <img src="<?php echo base_url('upload/sp/'.$sps->image) ?>" width="64"/>
                            </td>
                            <td class="small">
                                <?php echo substr($sps->domisili, 0, 120) ?>...
                            </td>
                            <td width="250">
                                <a href="<?php echo site_url('admin/sp/edit/'.$sps->sp_id) ?>"
                                   class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('<?php echo site_url('admin/sp/delete/'.$sps->sp_id) ?>')"
                                    href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <script>
                            function deleteConfirm(url){
                                $('#btn-delete').attr('href', url);
                                $('#deleteModal').modal();
                            }
                        </script>
                    </tbody>
                </table>
            </div>
        </div>
        

        <!-- Area Chart Example-->
        

        <!-- DataTables Example -->
        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view('admin/_partials/footer.php') ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view('admin/_partials/scrolltop.php') ?>

  <!-- Logout Modal-->
  <?php $this->load->view('admin/_partials/modal.php') ?>

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view('admin/_partials/js.php') ?>

</body>

</html>
