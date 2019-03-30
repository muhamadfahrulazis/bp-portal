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

        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        
        <div class="card mb-3">
            <div class="card-header">
                <a href="<?php echo site_url('admin/sp/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
                
                <form action="<?php base_url('admin/sp/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sp_name">Name*</label>
                        <input class="form-control <?php echo form_error('sp_name') ? 'is-invalid':'' ?>"
                               type="text" name="sp_name" placeholder="Sp Name" />
                        <div class="invalid-feedback">
                            <?php echo form_error('sp_name') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="finished_order">Finished Order*</label>
                        <input class="form-control <?php echo form_error('finished_order') ? 'is-invalid':'' ?>"
                               type="number" name="finished_order" min="0" placeholder="Finished Order" />
                        <div class="invalid-feedback">
                            <?php echo form_error('finished_order') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Photo</label>
                        <input class="form-control-file <?php echo form_error('finished_order') ? 'is-invalid':'' ?>"
                               type="file" name="image" />
                        <div class="invalid-feedback">
                            <?php echo form_error('image') ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Domisili*</label>
                        <textarea class="form-control <?php echo form_error('domisili') ? 'is-invalid':'' ?>"
                                  name="domisili" min="0" placeholder="Domisili..." ></textarea>
                        <div class="invalid-feedback">
                            <?php echo form_error('domisili') ?>
                        </div>
                    </div>
                    
                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                    
                </form>
                
            </div>
            
            <div class="card-footer small text-muted">
                * required fields
            </div>
        </div>
        

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
