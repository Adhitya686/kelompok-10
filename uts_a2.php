<?php
// Data barang dan transaksi
$barang = [
    ['nama' => 'Minyak Telon', 'stok' => 20, 'harga' => 31790],
    ['nama' => 'Diapers', 'stok' => 25, 'harga' => 51880],
    ['nama' => 'Baby Oil', 'stok' => 15, 'harga' => 16780],
    ['nama' => 'Shampo Baby', 'stok' => 20, 'harga' => 20670],
    ['nama' => 'Bedak', 'stok' => 15, 'harga' => 15890],
    ['nama' => 'Baju Bayi', 'stok' => 20, 'harga' => 35500],
    ['nama' => 'Jumper', 'stok' => 25, 'harga' => 50999]
];

$transaksi = [
    ['nama' => 'Minyak Telon', 'jumlah_terjual' => 3],
    ['nama' => 'Diapers', 'jumlah_terjual' => 5],
    ['nama' => 'Baby Oil', 'jumlah_terjual' => 7],
    ['nama' => 'Shampo Baby', 'jumlah_terjual' => 1],
    ['nama' => 'Bedak', 'jumlah_terjual' => 4],
    ['nama' => 'Baju Bayi', 'jumlah_terjual' => 7],
    ['nama' => 'Jumper', 'jumlah_terjual' => 2]
];

// Total pembelian
$total_pembelian = 0;
$diskon = 0.2; // 20% diskon

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .struk { inline-size: 300px; margin: 0 auto; }
        .struk h2 { text-align: center; }
        .struk table { inline-size: 100%; }
        .struk th, .struk td { padding: 5px; text-align: start; }
        .struk .total { font-weight: bold; }
        .struk .align-right { text-align: end; }
    </style>
</head>
<body>

<div class="struk">
    <h2>Struk Pembayaran</h2>
    <p>Tanggal Transaksi: 29 Oktober 2024</p>
    <table border="0">
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php foreach ($transaksi as $t): ?>
            <?php
            // Cari harga barang berdasarkan nama
            foreach ($barang as $b) {
                if ($b['nama'] == $t['nama']) {
                    $harga = $b['harga'];
                    break;
                }
            }
            $total_harga = $harga * $t['jumlah_terjual'];
            $total_pembelian += $total_harga;
            ?>
            <tr>
                <td><?php echo $t['nama']; ?></td>
                <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
                <td><?php echo $t['jumlah_terjual']; ?></td>
                <td>Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" class="align-right">Total Pembelian:</td>
            <td>Rp <?php echo number_format($total_pembelian, 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td colspan="3" class="align-right">Diskon 20%:</td>
            <td>Rp <?php echo number_format($total_pembelian * $diskon, 0, ',', '.'); ?></td>
        </tr>
        <tr class="total">
            <td colspan="3" class="align-right">Total Pembayaran:</td>
            <td>Rp <?php echo number_format($total_pembelian * (1 - $diskon), 0, ',', '.'); ?></td>
        </tr>
    </table>
    <p style="text-align: center;">Terima kasih atas kunjungan Anda!</p>
</div>

</body>
</html>