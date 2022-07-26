<?php 
$title = 'Info Graph';
include('include/header.php'); 

$query = "
    SELECT 
        COUNT(*) AS total, language 
    FROM 
        tbl_students 
    GROUP BY 
        language
";

$result = mysqli_query($conn, $query);
// foreach($result as $row){
//     echo '<pre>' . print_r($row, true) . '</pre>';
// }
// die;

$langs = [];
$total = [];
foreach ($result as $row) {
    $langs[] = $row['language'];
    $total[] = $row['total'];
}
// echo '<pre>' . print_r($langs, true) . '</pre>'; 
// echo '<pre>' . print_r($total, true) . '</pre>';
// die;
?>

<div class="container py-5">
	 <div class="row justify-content-center">
	 	<div class="col-12">
	        <div class="card">
	            <div class="card-header">
                    Student Languages
	            </div>

	            <div class="card-body">
                    <canvas id="graphCanvas"></canvas>
	            </div>
	        </div>
    	</div>
	 </div>
</div>

<?php include('include/footer.php'); ?>
<script>
    var ctx = document.getElementById("graphCanvas").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($langs); ?>,
            datasets: [{
                backgroundColor: [
                    "#8892BE",
                    "#e34f26",
                    "#6CC24A",
                    "#4584B6"
                ],
                data: <?php echo json_encode($total); ?>,
            }]
        },
        options: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: "XYZ Programming Students",
            },
            scales: { 
                yAxes: [{ 
                    ticks: { 
                        beginAtZero: true 
                    } 
                }] 
            },
        }
    });
</script>

