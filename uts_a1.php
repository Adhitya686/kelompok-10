<?php
// Array data produk: [nama produk, stok, harga satuan]
$products = [
    ["Minyak Telon", 20, 31790],
    ["Diapers", 25, 51880],
    ["Baby Oil", 15, 16780],
    ["Shampoo Baby", 20, 20670],
    ["Baju Bayi", 20, 35500],
    ["Bedak", 15, 15890],
    ["Jumper", 25, 50999]
];

// Array pembelian: [nama produk, jumlah yang dibeli]
$purchases = [
    ["Baju Bayi", 7],
    ["Diapers", 20],
    ["Bedak", 11],
    ["Minyak Telon", 17],
    ["Baby Oil", 7]
];

// Menghitung total pembelian
$total = 0;
$purchaseDetails = []; // Array untuk menyimpan detail pembelian

foreach ($purchases as $purchase) {
    foreach ($products as $product) {
        if ($product[0] === $purchase[0]) {
            $jumlah = $purchase[1];
            $hargaSatuan = $product[2];
            $totalHarga = $jumlah * $hargaSatuan;
            $total += $totalHarga;

            // Menyimpan detail pembelian
            $purchaseDetails[] = [
                "name" => $product[0],
                "quantity" => $jumlah,
                "unit_price" => $hargaSatuan,
                "total_price" => $totalHarga
            ];
            break;
        }
    }
}

// Menghitung diskon
$discount = 0;
if ($total > 300000) {
    $discount = 0.20 * $total;
} elseif ($total > 200000) {
    $discount = 0.10 * $total;
}

$totalAfterDiscount = $total - $discount;

// Menampilkan tabel pembelian dan hasil perhitungan
echo "<h3>Tanggal Transaksi: " . date("d F Y") . "</h3>";
echo "<table border='1'>
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </tr>";

foreach ($purchaseDetails as $detail) {
    echo "<tr>
            <td>{$detail['name']}</td>
            <td>{$detail['quantity']}</td>
            <td>" . number_format($detail['unit_price'], 0, ',', '.') . "</td>
            <td>" . number_format($detail['total_price'], 0, ',', '.') . "</td>
        </tr>";
}

echo "<tr>
        <td colspan='3'><strong>Total</strong></td>
        <td>" . number_format($total, 0, ',', '.') . "</td>
    </tr>";
echo "<tr>
        <td colspan='3'><strong>Diskon</strong></td>
        <td>" . number_format($discount, 0, ',', '.') . "</td>
    </tr>";
echo "<tr>
        <td colspan='3'><strong>Total Setelah Diskon</strong></td>
        <td>" . number_format($totalAfterDiscount, 0, ',', '.') . "</td>
    </tr>";
echo "</table>";
?>