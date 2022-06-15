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
    <title>Report Data Covid-19 BAR</title>
    <!-- berfungsi untuk exposrt library dari chart.js -->
    <script type="text/javascript" src="chart.js"></script>
</head>

<body>
    <!-- berfungsi untuk membuat canvas pada html -->
    <div style="width: 800px; height:800px;">
        <canvas id="myChart"></canvas>
        <br><br>
        <canvas id="myChart1"></canvas>
        <br><br>
        <canvas id="myChart2"></canvas>
        <br><br>
        <canvas id="myChart3"></canvas>
        <br><br>
        <canvas id="myChart4"></canvas>
        <br><br>
        <canvas id="myChart5"></canvas>
        <br><br>
        <canvas id="myChart6"></canvas>
    </div>

    <script>
    // mengakses canvas yang telah dibuat pada id yang dituju
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        // menentukan type dari chart yang diinginkan
        type: 'bar',
        // menampilkan data pada html canvas
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                    label: 'Total Case',
                    data: <?php echo json_encode($total_case);?>,

                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132,1)',
                    borderWidth: 1
                },
                {
                    label: 'new Case',
                    data: <?php echo json_encode($new_case);?>,

                    backgroundColor: 'rgba(255, 228, 228, 1)',
                    borderColor: 'rgba(255, 99, 132,1)',
                    borderWidth: 1
                },
                {
                    label: 'Total Death',
                    data: <?php echo json_encode($total_death);?>,

                    backgroundColor: 'rgba(231, 76, 60, 1)',
                    borderColor: 'rgba(231, 76, 60, 1)',
                    borderWidth: 1
                },
                {
                    label: 'New Death',
                    data: <?php echo json_encode($new_death);?>,

                    backgroundColor: 'rgba(231, 76, 60, 1)',
                    borderColor: 'rgba(236, 100, 75, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Total Recovered',
                    data: <?php echo json_encode($total_recovered);?>,

                    backgroundColor: 'rgba(200, 247, 197, 1)',
                    borderColor: 'rgba(46, 204, 113, 1)',
                    borderWidth: 1
                },
                {
                    label: 'New Recovered',
                    data: <?php echo json_encode($new_recovered);?>,

                    backgroundColor: 'rgba(147, 250, 165, 1)',
                    borderColor: 'rgba(46, 204, 113, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'Total Case',
                data: <?php echo json_encode($total_case);?>,

                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'New Case',
                data: <?php echo json_encode($new_case);?>,

                backgroundColor: 'rgba(255, 228, 228, 1)',
                borderColor: 'rgba(255, 99, 132,1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'Total Death',
                data: <?php echo json_encode($total_death);?>,

                backgroundColor: 'rgba(231, 76, 60, 1)',
                borderColor: 'rgba(231, 76, 60, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'New Death',
                data: <?php echo json_encode($new_death);?>,

                backgroundColor: 'rgba(231, 76, 60, 1)',
                borderColor: 'rgba(236, 100, 75, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart5").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'Total Recovered',
                data: <?php echo json_encode($total_recovered);?>,

                backgroundColor: 'rgba(200, 247, 197, 1)',
                borderColor: 'rgba(46, 204, 113, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx = document.getElementById("myChart6").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country);?>,
            datasets: [{
                label: 'New Recovered',
                data: <?php echo json_encode($new_recovered);?>,

                backgroundColor: 'rgba(147, 250, 165, 1)',
                borderColor: 'rgba(46, 204, 113, 1)',
                borderWidth: 1
            }]
        },
        options: {
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