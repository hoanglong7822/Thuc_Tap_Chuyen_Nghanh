<?php
session_start();
include("config/connection.php"); 

?>
<!DOCTYPE html>
<html lang="en-US">
<body>

<h1>My Web Page</h1>
<?php
$sql="SELECT MAX(soluong) as sl, tenSP FROM `tbl_sanpham`;";
$san_pham = $con -> query($sql);
$row = $san_pham ->fetch_assoc();
var_dump($row);
?>
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Work', 8],
  ['<?php echo $row['tenSP'];?>', <?php echo $row['sl'];?>],
  ['TV', 4],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</body>
</html>
