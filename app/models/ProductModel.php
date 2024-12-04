<?php
class ProductModel
{
    private $conn;

    private $id;
    private $name;
    private $jenis;
    private $kadaluarsa;
    private $stok;
    private $harga;
    private $diskon;
    private $deskripsi;

    public function __construct($dbConnection)
    {
        // Mengatur koneksi database dari parameter konstruktor
        $this->conn = $dbConnection;
    }

    // Getter dan setter untuk setiap properti
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function setJenis($jenis)
    {
        $this->jenis = $jenis;
    }

    public function getKadaluarsa()
    {
        return $this->kadaluarsa;
    }

    public function setKadaluarsa($kadaluarsa)
    {
        $this->kadaluarsa = $kadaluarsa;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function setStok($stok)
    {
        $this->stok = $stok;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getDeskripsi()
    {
        return $this->deskripsi;
    }

    public function setDeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }

    // Fungsi untuk mendapatkan semua produk
    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $productArray = array();
            while ($row = $result->fetch_assoc()) {
                $productArray[] = $row;
            }
            return $productArray;
        } else {
            return array();
        }
    }

    // Fungsi untuk mendapatkan produk berdasarkan ID
    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Fungsi untuk menambahkan produk baru
    public function addProduct($name, $jenis, $kadaluarsa, $stok, $harga, $diskon, $deskripsi)
    {
        $sql = "INSERT INTO product (name, jenis, kadaluarsa, stok, harga, diskon, deskripsi) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssddds", $name, $jenis, $kadaluarsa, $stok, $harga, $diskon, $deskripsi);

        if ($stmt->execute()) {
            return "Produk berhasil ditambahkan.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    // Fungsi untuk memperbarui produk
    public function updateProduct($id, $name, $jenis, $kadaluarsa, $stok, $harga, $diskon, $deskripsi)
    {
        $sql = "UPDATE product 
                SET name = ?, jenis = ?, kadaluarsa = ?, stok = ?, harga = ?, diskon = ?, deskripsi = ? 
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssdddsi", $name, $jenis, $kadaluarsa, $stok, $harga, $diskon, $deskripsi, $id);

        if ($stmt->execute()) {
            return "Produk berhasil diperbarui.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    // Fungsi untuk menghapus produk berdasarkan ID
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return "Produk berhasil dihapus.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
