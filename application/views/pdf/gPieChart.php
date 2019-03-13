<?php

$pie3dChart = new gchart\gPieChart();
$pie3dChart->addDataSet(array(112,315,66,40));
$pie3dChart->setLegend(array("first", "second", "third","fourth"));
$pie3dChart->setLabels(array("first", "second", "third","fourth"));
$pie3dChart->setColors(array("ff3344", "11ff11", "22aacc", "3333aa"));

//Save the image
imagepng($pie3dChart->renderImage());

$data = ob_get_clean();
file_put_contents('assets/img/' . $fileName, $data);
