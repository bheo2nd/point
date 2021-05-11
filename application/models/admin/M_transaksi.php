<?php
class M_transaksi extends CI_Model
{

    public function getTransaksi()
    {
        $this->db->order_by("TransactionId", "desc");
        $query = $this->db->get('Transaksi')->result_array();

        return $query;
    }

    public function getNasabah()
    {
        $query = $this->db->get('Nasabah')->result_array();

        return $query;
    }

    public function addTransaksi($data)
    {

        if ($data['tipeTransaksi'] == 'BAYARLISTRIK') {

            $nilaiTrx = $data['jumlahTransaksi'];

            $CreditDebitStatus = 'D';
            $Deskripsi = "Bayar Listrik";

            if ($nilaiTrx <= 90000) {
                $point = ($nilaiTrx / 2000) * 0;
            }
            if ($nilaiTrx >= 100000) {
                $x = $nilaiTrx - 100000;
                if ($x <= 0) {
                    $point = ($nilaiTrx - 100000) / 2000 * 1;
                } else {
                    $point = ($nilaiTrx - 100000 - $x) / 2000 * 1;
                }
            }
            if ($nilaiTrx > 100000) {
                $point = $point + ($nilaiTrx - 100000) / 2000 * 2;
            }
        } elseif ($data['tipeTransaksi'] == 'BELIPULSA') {

            $nilaiTrx = $data['jumlahTransaksi'];

            $CreditDebitStatus = 'D';
            $Deskripsi = "Beli Pulsa";


            if ($nilaiTrx <= 20000) {
                $point = ($nilaiTrx / 1000) * 0;
            }
            if ($nilaiTrx >= 30000) {
                $x = $nilaiTrx - 30000;
                if ($x <= 0) {
                    $point = ($nilaiTrx - 30000) / 1000 * 1;
                } else {
                    $point = ($nilaiTrx - 30000 - $x) / 1000 * 1;
                }
            }
            if ($nilaiTrx > 30000) {
                $point = $point + ($nilaiTrx - 30000) / 1000 * 2;
            }
        } elseif ($data['tipeTransaksi'] == 'SETORTUNAI') {

            $CreditDebitStatus = 'C';
            $Deskripsi = "Setor Tunai";
            $point = 0;
        } elseif ($data['tipeTransaksi'] == 'TARIKTUNAI') {
            $CreditDebitStatus = 'D';
            $Deskripsi = "Tarik Tunai";
            $point = 0;
        }

        $this->db->where("AccountId", $data['namaNasabah']);
        $this->db->limit(1);
        $_nasabah = $this->db->get('Nasabah');
        $_nasabahArray = $_nasabah->row_array();

        $newPoint = $_nasabahArray['Point'] + $point;

        $updatePoin = array(
            'Point' => $newPoint
        );

        $this->db->where("AccountId", $data['namaNasabah']);
        $this->db->order_by("Transactionid", "desc");
        $this->db->limit(1);
        $_nasabahTrx = $this->db->get('Transaksi');
        $_nasabahTrxArray = $_nasabahTrx->row_array();

        if ($CreditDebitStatus == 'D') {
            if ($data['jumlahTransaksi'] >= $_nasabahTrxArray['Balance']) {
                $return = array(
                    "point" => 0,
                    "sukses" => false
                );

                return $return;
            }
        }

        $this->db->set($updatePoin);
        $this->db->where('AccountId', $data['namaNasabah']);
        $this->db->update('Nasabah');

        if ($CreditDebitStatus == 'C') {
            $balance = $data['jumlahTransaksi'] + $_nasabahTrxArray['Balance'];
        } elseif ($CreditDebitStatus == 'D') {
            $balance = $_nasabahTrxArray['Balance'] - $data['jumlahTransaksi'];
        }

        $dataTrx = array(
            'AccountId' => $data['namaNasabah'],
            'TransactionDate' => date('Y-m-d H:i:s'),
            'Description' => $Deskripsi,
            'DebitCreditStatus' => $CreditDebitStatus,
            'Amount' => $data['jumlahTransaksi'],
            'Balance' => $balance
        );

        $this->db->insert('Transaksi', $dataTrx);

        $return = array(
            "point" => $point,
            "sukses" => ($this->db->affected_rows() != 1) ? false : true
        );

        return $return;
    }
}
