<?php $this->load->view('admin/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Nasabah</h1>
<p class="mb-4"></p>
<p class="mb-4"><a href="<?php echo base_url();?>nasabah/add" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Nasabah</span>
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
                        <th>Aksi</th>
                        <th>AccountId</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Aksi</th>
                        <th>AccountId</th>
                        <th>Nama</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($nasabah as $key) {
                            # code...
                            echo "<tr>";
                                echo "<td><a href='nasabah/edit?AccountId=".$key['AccountId']."'>Edit</a> | <a href='nasabah/prcDelNasabah?AccountId=".$key['AccountId']."'>Hapus</a></td>";
                                echo "<td>".$key['AccountId']."</td>";
                                echo "<td>".$key['Name']."</td>";
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

<?php $this->load->view('admin/footer');?>