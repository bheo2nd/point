<?php $this->load->view('admin/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">List Mutasi Transaksi Nasabah</h1>
<p class="mb-4"></p>
<p class="mb-4">
<form method="GET" action="<?php echo base_url();?>mutasiNasabah">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Nasabah</label>
            <select class="form-control" id="namaNasabah" name="namaNasabah">
                <?php
                    foreach ($nasabah as $key) {
                        # code...
                        echo "<option value='".$key['AccountId']."'>".$key['Name']."-".$key['AccountId']."</option>";
                    }
                ?>
            </select>

        </div>
        <div class="form-group">
            <label for="tglAwal">Tanggal Awal</label>
            <input type="date" name="tglAwal" class="form-control" id="datepicker"  placeholder="Tanggal Awal">
        </div>
        <div class="form-group">
            <label for="tglAwal">Tanggal Akhir</label>
            <input type="date" name="tglAkhir" class="form-control" id="datepicker"  placeholder="Tanggal Akhir">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</p>

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
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Balance</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($transaksi as $key) {
                            # code...
                            echo "<tr>";
                                echo "<td>".date_format(date_create($key['TransactionDate']),"Y/m/d")."</td>";
                                echo "<td>".$key['Description']."</td>";
                                if($key['DebitCreditStatus'] == 'C'){
                                    echo "<td>".$key['Amount']."</td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                                if($key['DebitCreditStatus'] == 'D'){
                                    echo "<td>".$key['Amount']."</td>";
                                }else{
                                    echo "<td>-</td>";
                                }
                                echo "<td>".$key['Balance']."</td>";
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