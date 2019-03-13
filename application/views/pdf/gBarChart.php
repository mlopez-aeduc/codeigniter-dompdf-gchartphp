<?php

$barChart = new gchart\gBarChart(500, 150, 'g');
$barChart->addDataSet(array(112,315,66,40));
$barChart->addDataSet(array(212,115,366,140));
$barChart->addDataSet(array(112,95,116,140));
$barChart->setColors(array("ff3344", "11ff11", "22aacc"));
$barChart->setLegend(array("first", "second", "third"));

$barChart->setAutoBarWidth();
//Save the image
imagepng($barChart->renderImage());

$data = ob_get_clean();
file_put_contents('assets/img/' . $fileName, $data);
