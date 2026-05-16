<?php
// File ini yang ngatur kapan harus nampilin, nambah, atau ngehapus data
require_once "method.php";

$obj_produksi = new Produksi(); //Buat objek dari class Produksi
$request_method = $_SERVER["REQUEST_METHOD"]; // Ambil jenis request (GET, POST, DELETE, dll)

switch ($request_method) {
    case 'GET': // Kalau request-nya GET (mau ngambil data)
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_produksi->get_log($id);
        } else {
            $obj_produksi->get_logs();
        }
        break;

    case 'POST': // Kalau request-nya POST (mau nambah/ngubah data)
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $obj_produksi->update_log($id);
        } else {
            $obj_produksi->insert_log();
        }
        break;

    case 'DELETE': // Kalau request-nya DELETE (mau ngehapus)
        $id = intval($_GET["id"]);
        $obj_produksi->delete_log($id);
        break;

    // Buat response kalau request-nya bukan GET, POST, atau DELETE
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}