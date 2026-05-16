<?php
require_once "koneksi.php"; //Buat koneksi ke database

class Produksi
{
    // Fungsi buat nampilin semua data log produksi
    public function get_logs()
    {
        global $koneksi; //Buat akses ke koneksi db
        $query = "SELECT * FROM production_logs"; //Query buat ngambil semua data
        $data = array(); // Array Kosong buat nampung data yang diambil
        $result = $koneksi->query($query); // Eksekusi query
        
        // Loop buat masukin setiap baris data ke array $data
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        
        // Buat response dalam format JSON
        $response = array(
            'status' => 1,
            'message' => 'Get All Production Logs Successfully.',
            'data' => $data
        );
        
        //Buat Header dan nampilin response dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Fungsi buat nampilin 1 data aja berdasarkan ID
    public function get_log($id = 0)
    {
        global $koneksi;
        $query = "SELECT * FROM production_logs";
        
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        
        $data = array();
        $result = $koneksi->query($query);
        
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        
        $response = array(
            'status' => 1,
            'message' => 'Get Production Log Successfully.',
            'data' => $data
        );
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Fungsi buat nambahin data log baru
    public function insert_log()
    {
        global $koneksi;
        $arrcheckpost = array(
            'kode_mesin' => '', 
            'nama_barang' => '', 
            'jumlah_lulus' => '',
            'jumlah_reject' => ''
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "INSERT INTO production_logs SET
                kode_mesin = '$_POST[kode_mesin]',
                nama_barang = '$_POST[nama_barang]',
                jumlah_lulus = '$_POST[jumlah_lulus]',
                jumlah_reject = '$_POST[jumlah_reject]'");
            
            if ($result) {
                $response = array('status' => 1, 'message' => 'Log Added Successfully.');
            } else {
                $response = array('status' => 0, 'message' => 'Log Addition Failed.');
            }
        } else {
            $response = array('status' => 0, 'message' => 'Parameter Do Not Match');
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Fungsi buat ngubah data log yang udah ada
    function update_log($id)
    {
        global $koneksi;
        $arrcheckpost = array(
            'kode_mesin' => '', 
            'nama_barang' => '', 
            'jumlah_lulus' => '',
            'jumlah_reject' => ''
        );
        
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "UPDATE production_logs SET
                kode_mesin = '$_POST[kode_mesin]',
                nama_barang = '$_POST[nama_barang]',
                jumlah_lulus = '$_POST[jumlah_lulus]',
                jumlah_reject = '$_POST[jumlah_reject]'
                WHERE id='$id'");
            
            if ($result) {
                $response = array('status' => 1, 'message' => 'Log Updated Successfully.');
            } else {
                $response = array('status' => 0, 'message' => 'Log Updation Failed.');
            }
        } else {
            $response = array('status' => 0, 'message' => 'Parameter Do Not Match');
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Fungsi buat ngehapus data log
    function delete_log($id)
    {
        global $koneksi;
        $query = "DELETE FROM production_logs WHERE id=" . $id;
        
        if (mysqli_query($koneksi, $query)) {
            $response = array('status' => 1, 'message' => 'Log Deleted Successfully.');
        } else {
            $response = array('status' => 0, 'message' => 'Log Deletion Failed.');
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}