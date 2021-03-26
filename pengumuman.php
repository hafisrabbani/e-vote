<?php
require_once 'admin/query/conn.php';
$conn = new koneksi();
$result = mysqli_query($conn->conn(), "SELECT * FROM kandidat");

?>
<!DOCTYPE html>
<html>

<head>
  <title>Grafik Perolehan Suara</title>
  <script type="text/javascript" src="chart/Chart.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <style type="text/css">
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%); width:700px; height:auto;">
    <h1 style="text-align:center;">Total Perolehan Suara</h1>
    <br>
    <canvas id="myChart"></canvas>
    <small class="text-center">*Harap Refresh Untuk Melihat Data Terbaru Karena data belum realtime</small>
  </div>


  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: [<?php foreach ($result as $nama) : ?> "<?= $nama["nama"]; ?> (<?= $nama["perolehan"]; ?> Suara)", <?php endforeach; ?>],
        datasets: [{
          data: [<?php foreach ($result as $hasil) : ?> <?= $hasil["perolehan"]; ?>, <?php endforeach; ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        font: {
          size: 26
        }
      }
    });
  </script>
</body>

</html>