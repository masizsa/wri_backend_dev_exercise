<div class="w-[40rem] p-[16px] border-2 border-sky-500 rounded-xl">
    <h1 class="text-gray-700 text-center text-xl font-bold">Cek barang yang dapat dibeli oleh pembeli</h1>
    <br>
    <form action="product/showAvailableProducts" method="POST" class="space-y-4 flex flex-col gap-3">
        <!-- Input Nama -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama"
                class="mt-1 block h-[3rem] w-full px-3 rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                placeholder="Masukkan nama Anda" required>
        </div>

        <!-- Input Member -->
        <div>
            <span class="block text-sm font-medium text-gray-700">Apakah Anda anggota member?</span>
            <div class="mt-2 space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="is_member" value="Iya"
                        class="text-sky-600 focus:ring-sky-500 border-gray-300" required>
                    <span class="ml-2">Iya</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="is_member" value="Tidak"
                        class="text-sky-600 focus:ring-sky-500 border-gray-300">
                    <span class="ml-2">Tidak</span>
                </label>
            </div>
        </div>

        <div>
            <label for="total_uang" class="block text-sm font-medium text-gray-700">Total uang</label>
            <input type="number" id="total_uang" name="total_uang"
                class="mt-1 block h-[3rem] w-full px-3 rounded-md border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm"
                placeholder="Masukkan total uang Anda" required>
        </div>

        <!-- Tombol Submit -->
        <div>
            <button type="submit"
                class="w-full px-4 py-2 text-white bg-sky-600 rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                Submit
            </button>
        </div>
    </form>
    <br>
    <hr>
    <br>
    <div class="p-4 bg-gray-50 rounded-lg shadow-md">
        <!-- Peraturan -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Peraturan Challenge</h2>
        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
            <li>Tampilkan nama pembeli dan jumlah uang yang dimiliki.</li>
            <li>Tampilkan barang yang dapat dibeli dari uang tersebut dalam bentuk tabel.</li>
            <li>
                Jika pembeli merupakan member, maka akan diberi tambahan diskon sebesar 15% dari diskon pada tabel.
                <ul class="list-disc pl-5 mt-2">
                    <li>Contoh: Jika diskon barang adalah 50% dan pembeli merupakan member, maka diskon yang diperoleh
                        adalah:
                        <code>Harga Barang * 50% - ((Harga Barang * 50%) * 15%)</code>.
                    </li>
                </ul>
            </li>
        </ol>

        <!-- Contoh Tabel Barang -->
        <h3 class="text-lg font-medium text-gray-800 mt-6">Daftar Barang yang Dapat Dibeli</h3>
        <table class="min-w-full border-collapse border border-gray-200 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                    <th class="border border-gray-300 px-4 py-2">Harga</th>
                    <th class="border border-gray-300 px-4 py-2">Diskon</th>
                    <th class="border border-gray-300 px-4 py-2">Harga Setelah Diskon</th>
                    <th class="border border-gray-300 px-4 py-2">Harga Member</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Data Barang -->
                <tr>
                    <td class="border border-gray-300 px-4 py-2">Barang A</td>
                    <td class="border border-gray-300 px-4 py-2">Rp100.000</td>
                    <td class="border border-gray-300 px-4 py-2">50%</td>
                    <td class="border border-gray-300 px-4 py-2">Rp50.000</td>
                    <td class="border border-gray-300 px-4 py-2">Rp42.500</td>
                </tr>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">Barang B</td>
                    <td class="border border-gray-300 px-4 py-2">Rp200.000</td>
                    <td class="border border-gray-300 px-4 py-2">30%</td>
                    <td class="border border-gray-300 px-4 py-2">Rp140.000</td>
                    <td class="border border-gray-300 px-4 py-2">Rp119.000</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>