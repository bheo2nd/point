<?php $this->load->view('admin/header'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah User</h1>
    <p class="mb-4"></p>


    <!-- DataTales Example -->
    <div class="card shadow mb-2 col-7">
        <div class="card-body col-9">
            <form method="POST" action="<?php echo base_url(); ?>user/prcAddUser">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6 class="m-8 font-weight-bold text-primary">Username</h6>
                        <input type="text" class="form-control form-control-user" id="user" name="user" placeholder="">
                        <p class="mb-2"></p>
                        <h6 class="m-8 font-weight-bold text-primary">Password</h6>
                        <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="">
                        <p class="mb-2"></p>
                        <h6 class="m-8 font-weight-bold text-primary">Role_ID</h6>
                        <input type="text" class="form-control form-control-user" id="role_id" name="role_id" placeholder="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php $this->load->view('admin/footer'); ?>