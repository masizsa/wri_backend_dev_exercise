<?php
class Product extends Controller{
    public $db;

    public function __construct()
    {
        // Menginisialisasi koneksi database menggunakan singleton pattern
        $this->db = Database::getInstance();
    }

    // Fungsi untuk mendapatkan semua produk
    public function index() {
        $data = array();
        $data['products'] = $this->getAllProducts();
        
        $this->view("templates/header");
        $this->view("pages/products/index", $data);
        $this->view("templates/header");
    }
    public function getAllProducts(){
        $conn = $this->db->getConnection();
        $products = new ProductModel($conn);

        return $products->getAllProducts();
    }
    
    public function showAvailableProducts(){

        $conn = $this->db->getConnection();
        $products = new ProductModel($conn);

        $data = array();
        $data['nama'] = $_POST['nama'];
        $data['is_member'] = $_POST['is_member'] == 'Iya';
        $data['total_uang'] = $_POST['total_uang'];
        $data['products'] = $products->getAvailableProducts($data['is_member'], $data['total_uang']);

        $this->view("templates/header");
        $this->view("pages/products/index", $data);
        $this->view("templates/header");
    }
}