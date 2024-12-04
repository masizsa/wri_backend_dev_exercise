<div class="container mx-auto p-4">
    <!-- Informasi Pembeli -->
    <div class="bg-gray-100 p-4 rounded-md shadow-md mb-6">
        <h2 class="text-lg font-bold mb-2">Informasi Pembeli</h2>
        <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
        <p><strong>Member:</strong> <?php echo $data['is_member'] ? "Iya" : "Tidak"; ?></p>
        <p><strong>Total Uang:</strong> Rp <?php echo number_format($data['total_uang'], 0, ',', '.'); ?></p>
    </div>

    <!-- Tabel Barang -->
    <table class="min-w-full border-collapse border border-gray-200 mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2 text-left">Nama Barang</th>
                <th class="border border-gray-300 px-4 py-2 text-right">Harga</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Diskon</th>
                <th class="border border-gray-300 px-4 py-2 text-right">Harga Setelah Diskon</th>
                <th class="border border-gray-300 px-4 py-2 text-right">Harga Member</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['products'])) : ?>
                <?php foreach ($data['products'] as $product) : ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $product['name']; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-right">Rp
                            <?php echo number_format($product['harga'], 0, ',', '.'); ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-center"><?php echo $product['diskon']; ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-right">Rp
                            <?php echo number_format($product['harga_setelah_diskon'], 0, ',', '.'); ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-right">
                            <?php
                            // Cek apakah pembeli adalah member
                            if ($data['is_member']) {
                                echo "Rp " . number_format($product['harga_member'], 0, ',', '.');
                            } else {
                                echo "-";
                            }
                            ?>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Tidak ada barang yang
                        tersedia untuk dibeli.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>