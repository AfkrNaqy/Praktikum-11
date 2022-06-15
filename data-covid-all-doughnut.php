<?php
    // berfungsi untuk memasukkan perintah dari file lain
    include "koneksi.php";
    // berfungsi untuk mengambil data tabel menggunakan query
    $query = mysqli_query($koneksi,"SELECT * from tb_covid_all");
    // melakukan looping untuk mengambil setiap data dari tabel
    while ($row = mysqli_fetch_array($query)) {
        // mengambil data dari setiap kolom pada tabel
        $country[] = $row['country'];
        $total_case[] = $row['total_case'];
        $new_case[] = $row['new_case'];
        $total_death[] = $row['total_death'];
        $new_death[] = $row['new_death'];
        $total_recovered[] = $row['total_recovered'];
        $new_recovered[] = $row['new_recovered'];
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Data Covid-19 PIE</title>
    <!-- berfungsi untuk exposrt library dari chart.js -->
    <script type="text/javascript" src="chart.js"></script>
</head>

<body>
    <!-- berfungsi untuk membuat canvas pada html -->
    <div style="width:40%">
        <h1 align="center">TOTAL CASE</h1>
        <canvas id="total_case"></canvas>
        <br><br>
        <h1 align="center">NEW CASE</h1>
        <canvas id="new_case"></canvas>
        <br><br>
        <h1 align="center">TOTAL DEATH</h1>
        <canvas id="total_death"></canvas>
        <br><br>
        <h1 align="center">NEW DEATH</h1>
        <canvas id="new_death"></canvas>
        <br><br>
        <h1 align="center">TOTAL RECOVERED</h1>
        <canvas id="total_recovered"></canvas>
        <br><br>
        <h1 align="center">NEW RECOVERED</h1>
        <canvas id="new_recovered"></canvas>
    </div>

    <script>
    // TOTAL CASE ============

    var ctx = document.getElementById('total_case').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_case); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'

            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });

    // NEW CASES =============
    var ctx = document.getElementById('new_case').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($new_case); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'
            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });

    // TOTAL DEATH ==============
    var ctx = document.getElementById('total_death').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_death); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'
            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });

    // NEW DEATH ============
    var ctx = document.getElementById('new_death').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($new_death); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'
            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });

    // TOTAL RECOVERED =============
    var ctx = document.getElementById('total_recovered').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_recovered); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'
            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });


    // NEW RECOVERED ============
    var ctx = document.getElementById('new_recovered').getContext('2d');
    window.myPie = new Chart(ctx, {

        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($new_recovered); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.75)',
                    'rgba(255, 255, 0,0.75)',
                    'rgba(153, 255, 51,0.75)',
                    'rgba(51, 153, 255,0.75)',
                    'rgba(255, 0, 255,0.75)',
                    'rgba(0, 230, 172,0.75)',
                    'rgba(0, 0, 179,0.75)',
                    'rgba(153, 0, 255,0.75)',
                    'rgba(0, 0, 230,0.75)',
                    'rgba(128, 255, 0,0.75)'
                ],
                borderColor: [
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                    'rgba(0, 0, 51,1)',
                ],
                label: 'Grafik Covid'
            }],
            labels: <?php echo json_encode($country); ?>,
            options: {
                responsive: true
            }
        }
    });
    </script>
</body>

</html>