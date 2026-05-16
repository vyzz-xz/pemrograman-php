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
        // Buat akses ke koneksi db
        global $koneksi;
        $query = "SELECT * FROM production_logs"; //Query buat ngambil data
        
        //Buat kondisi kalau ID-nya nggak 0, berarti kita mau ngambil data berdasarkan ID tertentu
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1";
        }
        
        // Array Kosong buat nampung data yang diambil
        $data = array();
        $result = $koneksi->query($query);
        
        // Loop buat masukin data yang diambil ke array $data
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        
        // Buat response dalam format JSON
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
        // Kita cek dulu apakah data yang dikirim lewat POST itu lengkap atau nggak
        global $koneksi;
        $arrcheckpost = array(
            'kode_mesin' => '', 
            'nama_barang' => '', 
            'jumlah_lulus' => '',
            'jumlah_reject' => ''
        );
        
        // Buat hitung berapa banyak data yang dikirim lewat POST
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));

        // Kalau data yang dikirim lewat POST itu lengkap, kita masukin ke database
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "INSERT INTO production_logs SET
                kode_mesin = '$_POST[kode_mesin]',
                nama_barang = '$_POST[nama_barang]',
                jumlah_lulus = '$_POST[jumlah_lulus]',
                jumlah_reject = '$_POST[jumlah_reject]'");
            
            // Kita cek apakah data berhasil masuk ke database atau nggak
            if ($result) {
                $response = array('status' => 1, 'message' => 'Log Added Successfully.');
            } else {
                $response = array('status' => 0, 'message' => 'Log Addition Failed.');
            }
        // Kalau data yang dikirim lewat POST nggak lengkap, kita kasih response error
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
        
        // Buat hitung berapa banyak data yang dikirim lewat POST
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        
        // Kalau data yang dikirim lewat POST itu lengkap, kita update data di database berdasarkan ID
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "UPDATE production_logs SET
                kode_mesin = '$_POST[kode_mesin]',
                nama_barang = '$_POST[nama_barang]',
                jumlah_lulus = '$_POST[jumlah_lulus]',
                jumlah_reject = '$_POST[jumlah_reject]'
                WHERE id='$id'");
            
            // Kita cek apakah data berhasil diupdate di database atau nggak
            if ($result) {
                $response = array('status' => 1, 'message' => 'Log Updated Successfully.');
            } else {
                $response = array('status' => 0, 'message' => 'Log Updation Failed.');
            }
        // Kalau data yang dikirim lewat POST nggak lengkap, kita kasih response error
        } else {
            $response = array('status' => 0, 'message' => 'Parameter Do Not Match');
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // Fungsi buat ngehapus data log
    function delete_log($id)
    {   
        // Buat akses ke koneksi db
        global $koneksi;
        $query = "DELETE FROM production_logs WHERE id=" . $id; //Query buat ngehapus data berdasarkan ID
        
        // Kita cek apakah data berhasil dihapus dari database atau nggak
        if (mysqli_query($koneksi, $query)) {
            $response = array('status' => 1, 'message' => 'Log Deleted Successfully.');
        // Kalau data gagal dihapus dari database, kita kasih response error
        } else {
            $response = array('status' => 0, 'message' => 'Log Deletion Failed.');
        }
        
        //Buat Header dan nampilin response dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}