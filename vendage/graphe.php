
<?php
include('securite_page.php');//Securisation avec login
//connection
// $con = mysqli_connect("localhost","root","","gestio_viticulture");
// if (!$con) {
    # code...
//     echo "connection reussite";
// }
//Requette

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="admin/images/logo.jpg" type="image"/>
    <title>graphe</title>
    <script src="datatable/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="style_graph.css">
</head>
<body>

    <!-- <div id="background">

        <div id="page">

            

            <div id="content"> -->
                <div class="hero-unit-table">  
                    <?php include ('theme.php'); ?> 
    
                    <div>
                    <canvas id="myChart"></canvas>
                    </div>
                    <script>
                        const labels = [
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                        ];

                        const data = {
                            labels: labels,
                            datasets: [{
                            label: 'My First dataset',
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1 ,
                            data: [0, 10, 5, 2, 20, 30, 45],
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {}
                        };
                    </script>
                    <script>
                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    </script>
                </div>
            <!-- </div>
        </div>
    </div> -->
</body>
</html>