<?php
    include "koneksi.php";

    $data = mysqli_query($koneksi,"SELECT * from tb_covid");
    while ($row = mysqli_fetch_array($data)) {
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
    <div type="canvas-holder" style="width:40%">
        <canvas id="chart-area"></canvas>
    </div>

    <script>
    var config = {

        type: 'pie',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_case); ?>,

                backgroundColor: [
                    'rgba(255, 71, 26,0.5)',
                    'rgba(255, 255, 0,0.5)',
                    'rgba(153, 255, 51,0.5)',
                    'rgba(51, 153, 255,0.5)',
                    'rgba(255,99,132,0.5)',
                    'rgba(204, 255, 179,0.5)',
                    'rgba(0, 0, 179,0.5)',
                    'rgba(153, 0, 255,0.5)',
                    'rgba(255, 51, 51,0.5)',
                    'rgba(128, 255, 0,0.5)'
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
    };

    window.onload = function() {
        var ctx = document.getElementById('chart-area').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };
    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });
    var colorNames = object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset' + config.data.datasets.length
        };
        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
            var colorName = colorNames[index % colorNames.length];
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
    </script>
</body>

</html>