CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- ID unik untuk setiap produk
    name VARCHAR(255) NOT NULL,                 -- Nama produk
    jenis ENUM('makanan', 'minuman', 'lainnya') NOT NULL, -- Jenis produk dengan pilihan tertentu
    kadaluarsa DATE,                            -- Tanggal kadaluarsa (opsional untuk produk non-kadaluarsa)
    stok INT DEFAULT 0,                         -- Jumlah stok produk
    harga DECIMAL(10, 2) NOT NULL,              -- Harga produk dalam format desimal
    diskon DECIMAL(5, 2) DEFAULT 0.00,          -- Diskon dalam persentase (0-100)
    deskripsi TEXT,                             -- Deskripsi singkat produk
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Waktu pembuatan data
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Waktu terakhir pembaruan data
);
