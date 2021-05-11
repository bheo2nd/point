<?php $this->load->view('admin/header');?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Transaksi Nasabah</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi Nasabah</h6>
    </div>
    <div class="card-body">
    <form method="POST" action="<?php echo base_url();?>transaksi/prcAddTransaksi">
        <div class="form-group">
            <label for="exampleInputEmail1">AccountId</label>
            <select class="form-control" id="namaNasabah" name="namaNasabah">
                <?php
                    foreach ($nasabah as $key) {
                        # code...
                        echo "<option value='".$key['AccountId']."'>".$key['AccountId']." - ".$key['Name']."</option>";
                    }
                ?>
            </select>

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Transaksi</label>
            <select class="form-control" id="tipeTransaksi" name="tipeTransaksi">
                <option value="SETORTUNAI">Setor Tunai</option>
                <option value="TARIKTUNAI">Tarik Tunai</option>
                <option value="BELIPULSA">Beli Pulsa</option>
                <option value="BAYARLISTRIK">Bayar Listrik</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Amount</label>
            <input type="number" name="jumlahTransaksi" class="form-control" id="exampleInputEmail1"  placeholder="Input jumlah transaksi">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?php $this->load->view('admin/footer');?>