<?php $this->load->view('admin/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List Transaksi Nasabah</h1>
<p class="mb-4"></p>
<p class="mb-4"><a href="<?php echo base_url();?>transaksi/add" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Transaksi Nasabah</span>
                                    </a></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Transaksi Nasabah</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>AccountId</th>
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Debit Credit</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>AccountId</th>
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Debit Credit</th>
                        <th>Amount</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($transaksi as $key) {
                            # code...
                            echo "<tr>";
                                echo "<td>".$key['AccountId']."</td>";
                                echo "<td>".$key['TransactionDate']."</td>";
                                echo "<td>".$key['Description']."</td>";
                                echo "<td>".$key['DebitCreditStatus']."</td>";
                                echo "<td>".number_format($key['Amount'],0,',','.')."</td>";
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