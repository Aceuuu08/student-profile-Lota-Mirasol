<?php
include_once("../db.php");
include_once("../student.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js">
</script>
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <canvas id="studentChart" width="150"height="50"></canvas>
</div>
  
    <script>
    // Assuming you have a PHP variable containing data, e.g., $studentData
    var maleCount = <?php echo $student->getGenderCount(1); ?>;
    var femaleCount = <?php echo $student->getGenderCount(0); ?>;
    // Chart.js code to create a bar chart
    var ctx = document.getElementById('studentChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Number of Students by Gender',
                data: [maleCount, femaleCount],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
</script>
  <div class="content">
        <h1>Number of Male and Female Students</h1>
        <p>There are more males in the school than females.</p>
    </div>
        <?php include('../templates/footer.html'); ?>


<p></p>
</body>
</html>