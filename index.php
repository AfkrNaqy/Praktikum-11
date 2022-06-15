<?php
    // berfungsi untuk memasukkan perintah dari file lain
    include "koneksi.php";
    // berfungsi untuk mengambil data tabel menggunakan query
    $produk = mysqli_query($koneksi,"SELECT * from tb_barang");
    // melakukan looping untuk mengambil setiap data dari tabel
    while ($row = mysqli_fetch_array($produk)) {
        // mengambil data pada kolom barang
        $nama_produk[] = $row['barang'];

        $query = mysqli_query($koneksi,"SELECT sum(jumlah) as jumlah from tb_penjualan where id_barang = '".$row['id_barang']."'");
        $row  =$query->fetch_array();
        // mengambil data pada kolom jumlah
        $jumlah_produk[] = $row['jumlah'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Grafik mengunakan Chart JS</title>
    <!-- berfungsi untuk exposrt library dari chart.js -->
    <script type="text/javascript" src="chart.js"></script>
</head>

<body>
    <!-- berfungsi untuk membuat canvas pada html -->
    <div style="width: 800px; height: 800px;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    // mengakses canvas yang telah dibuat pada id yang dituju
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        // menginisilaisasi jenis chart
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nama_produk); ?>,
            datasets: [{
                label: 'Grafik Penjualan',
                // menampilkan data pada html canvas
                data: <?php echo json_encode($jumlah_produk); ?>,

                backgroundColor: 'rgba(255,99,132,0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        option: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</body>

</html>