<?php $this->load->view('admin/header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Nasabah</h1>
    <p class="mb-4"></p>
    <p class="mb-4"><a href="<?php echo base_url(); ?>user/add" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah User</span>
        </a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Nasabah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role_ID</th>
                            <th>User</th>
                            <th>Password</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($user as $key) {
                            # code...
                            echo "<tr>";
                            echo "<td>" . $key['id'] . "</td>";
                            echo "<td>" . $key['role_id'] . "</td>";
                            echo "<td>" . $key['user'] . "</td>";
                            echo "<td>" . $key['password'] . "</td>";
                            echo "<td><a href='nasabah/edit?AccountId=" . $key['id'] . "'>Edit</a> | <a href='nasabah/prcDelNasabah?AccountId=" . $key['id'] . "'>Hapus</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/footer'); ?>