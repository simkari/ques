		<?php
		include "koneksi.php";
		error_reporting(1);
		$result=mysqli_query($conni, "SELECT catquesid from catques group by catquesid ");
		$kolom = 2;
		$array=array();
		while ($sql=mysqli_fetch_array($result)) 
		{
			array_push($array, $sql);
		}
		$chunks=array_chunk($array, $kolom);

			foreach ($chunks as $chunk) {
			    foreach ($chunk as $data) {
			        echo "<div class='col-md-6'style='padding-left:0px;padding-right:0px;'>";
			        $data2=mysqli_fetch_array(mysqli_query($conni, "SELECT * from catques where catquesid='$data[catquesid]' group by catquesid "));
			        ?>
					<div class="panel panel-primary" style='margin-left:10px'>
						<div class="panel-heading">
							<div class="panel-title"><?php echo $data2['categori']; ?></div>
						</div>


						<div class="panel-body">
							<!-- table id="imyHTMLTable<?php echo $data2['groupId']; ?>" border="0" cellpadding="5" class="table table-striped">

								<tr>
								<th><font size=2 face=tahoma>Data</font></th> 
								<th><font size=2 face=tahoma>Jawaban A</font></th>
								<th><font size=2 face=tahoma>Jawaban B</font></th>
								<th><font size=2 face=tahoma>Jawaban C</font></th>
								<th><font size=2 face=tahoma>Jawaban D</font></th>
								<th><font size=2 face=tahoma>Jawaban E</font></th>
								</tr -->
							<?php

							$sql = mysqli_query($conni, "SELECT SUM(jawabA) As TotalA,
													SUM(jawabB) As TotalB,
													SUM(jawabC) As TotalC,
													SUM(jawabD) As TotalD,
													SUM(jawabE) As TotalE
													FROM ques where catquesid='$data2[catquesid]' ");
							$nom = mysqli_num_rows(mysqli_query($conni, "SELECT * FROM ques where catquesid='$data2[catquesid]'"));
							
							$noo=1;
							$oke = mysqli_fetch_array($sql);
								$a = $oke[TotalA];
								$b = $oke[TotalB];
								$c = $oke[TotalC];
								$d = $oke[TotalD];
								$e = $oke[TotalE];
								$tot = $a+$b+$c+$d+$e;
								
								$pa = ROUND(($a / $tot) * 100);
								$pb = ROUND(($b / $tot) * 100);
								$pc = ROUND(($c / $tot) * 100);
								$pd = ROUND(($d / $tot) * 100);
								$pe = ROUND(($e / $tot) * 100);
									echo "<!-- tr >
										<td><font size=3 face=tahoma>Jumlah Jawaban</font></td>
										<td><font size=2 face=tahoma>$a</font></td>
										<td><font size=2 face=tahoma>$b</font></td>
										<td><font size=2 face=tahoma>$c</font></td>
										<td><font size=2 face=tahoma>$d</font></td>
										<td><font size=2 face=tahoma>$e</font></td>
									  </tr>
									  <tr >
										<td><font size=3 face=tahoma>Prosentase</font></td>
										<td><font size=2 face=tahoma>$pa%</font></td>
										<td><font size=2 face=tahoma>$pb%</font></td>
										<td><font size=2 face=tahoma>$pc%</font></td>
										<td><font size=2 face=tahoma>$pd%</font></td>
										<td><font size=2 face=tahoma>$pe%</font></td>
									  </tr -->
									  ";	 
							?>

						<!-- div id="chart-container2">Render chart didieu cuk</div -->
						<div id="chartdiv<?php echo $data2['catquesid']; ?>">crutz</div>
						
							<!-- /table -->
				<!--  tambahan -->
<!-- center>
    <table id="data2<?php echo $data2['groupId']; ?>">
        <tr class="">
            <th rowspan="2">Hasil Survey</th>
        </tr>

        <th><?php echo $data2['groupName']; ?></th>
        <tr></tr>
        <tr>
            <td>Baik Sekali</td>
            <td><?=$a?></td>
        </tr>
        <tr>
            <td>Baik</td>
            <td><?=$b?></td>

        </tr>
        <tr>
            <td>Cukup</td>
            <td><?=$c?></td>

        </tr>
        <tr>
            <td>Kurang Cukup</td>
            <td><?=$d?></td>

        </tr>
        <tr>
            <td>Jelek</td>
            <td><?=$e?></td>

        </tr>
    </table --> 

					<!--  tambahan -->

<script src="./lib/core.js"></script>
<script src="./lib/charts.js"></script>
<script src="./lib/animated.js"></script>		
			

<!-- tambahan 2 -->			
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv<?php echo $data2['catquesid']; ?>", am4charts.PieChart);
    chart.data = [ {
      "label": "Baik Sekali",
      "data": "<?=$a?>" }, {
      "label": "Baik",
      "data": "<?=$b?>"  }, {
      "label": "Cukup",
      "data": "<?=$c?>"}, {
      "label": "Kurang",
      "data": "<?=$d?>"   } ];
// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "data";
pieSeries.dataFields.category = "label";
pieSeries.slices.template.stroke = am4core.color("#fff");
// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(20);
// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);
pieSeries.ticks.template.disabled = true;
// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;
// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists
// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;
// Add a legend
chart.legend = new am4charts.Legend();
}); // end am4core.ready()
</script>

<!-- HTML -->

<!-- eof tambahan2 -->

							
						</div>
					</div>
			        <?php
			        echo '</div>';
			    }
			    
			}
			
		?>
