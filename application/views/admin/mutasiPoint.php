<?php $this->load->view('admin/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Point Nasabah</h1>
<p class="mb-4"></p>
<p class="mb-4">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Point Nasabah</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Account Id</th>
                        <th>Name</th>
                        <th>Total Point</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Account Id</th>
                        <th>Name</th>
                        <th>Total Point</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($nasabah as $key) {
                            # code...
                            echo "<tr>";
                                echo "<td>".$key['AccountId']."</td>";
                                echo "<td>".$key['Name']."</td>";
                                echo "<td>".$key['Point']."</td>";
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