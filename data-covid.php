<?php
    include "koneksi.php";

    $produk = mysqli_query($koneksi,"SELECT * from tb_covid");
    while ($row = mysqli_fetch_array($produk)) {
        $country[] = $row['country'];
        $total_case[] = $row['total_case'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Grafik mengunakan Chart JS</title>
    <script type="text/javascript" src="chart.js"></script>
</head>

<body>
    <div style="width: 800px; height: 800px;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [{
                label: 'Grafik Covid',
                data: <?php echo json_encode($total_case); ?>,

                backgroundColor: 'rgba(255,99,132,0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
        option: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZer: true
                    }
                }]
            }
        }
    });
    </script>
</body>

</html>