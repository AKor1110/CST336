<?php

rrmdir('inc/charts');

/**
 * Goal: Calculates the overall rating of a movie
 *       based on the total number of reviews and 
 *       corresponding ratings for 1, 2, 3 and 4 stars.
 * Parameters:
 *   $totalReviews - Integer
 *   $ratings - Array of integers, their sum must be 100
 * Returns $overallRating - decimal
 **/
function displayRatings($totalReviews, $ratings) {
    if (array_sum($ratings) != 100) {
        echo "Error: The sum of \$ratings must be 100!";
        return;
    }
    $overallRating  = 0;
    for ($i = 0; $i < 4; $i++) {
        $overallRating += ($totalReviews * ($ratings[$i]/100)) * ($i+1);
    }
    $c1 = array(255,255,255);
    $c2 = array(0,0,0);
    $barColor = array(255,215,0);
	$overallRating = round($overallRating/$totalReviews,2);
	$numStar = round($overallRating);
    $fileName =  microtime(true);
    $chartDesc = array("4 stars", "3 stars", "2 stars", "1 star");
	$ratings  = array_reverse($ratings); //reversing array to display chart
	bar_graph($ratings,$chartDesc,$overallRating,200,150,$c1, $c2, $barColor,"inc/charts/$fileName.png");
	echo "<img src='inc/charts/$fileName.png'>";
    return $overallRating;
}

function bar_graph($ary,$ardesc,$title,$x,$y,$bgc,$bdc,$brc,$img_file) {
	$canvas = imagecreate($x,$y);
	imagecolorallocate($canvas, $bgc[0],$bgc[1],$bgc[2]);
	$border=imagecolorallocate($canvas, $bdc[0],$bdc[1],$bdc[2]);
	$bar_color=imagecolorallocate($canvas,$brc[0],$brc[1],$brc[2]);
	$y=$y-40;
	imagerectangle($canvas, 1, 1, $x-2, $y-2, $border);
	$pct = 0.20; 
	$cnv_length = (($x-2)-2);
	$cnv_height = (($y-2)-2);
	$cnv_gap = floor($cnv_length / 11);
	
	$gap_height_total = floor(($cnv_height * $pct));
	$gap_height = floor(($cnv_height * $pct) / count($ary)+1);
	$bar_height = floor(($cnv_height - $gap_height_total) / count($ary));

	//** Horizontal Bar Graph, Percentage & Label
	$basemkr=2 + floor($gap_height/2);
	for($j=0;$j<=count($ary)-1;$j++) {
		$pct_rep = ($ary[$j]/100);
		if ($pct_rep > 1) {
			$pct_rep=1;
		}
		$pctlen = ($pct_rep)*($cnv_gap*10);
		
		imagefilledrectangle($canvas, 2, $basemkr, $pctlen, $basemkr+$bar_height, $bar_color);
		imagestring($canvas, 3, 10, $basemkr+floor($bar_height*.10), $ardesc[$j], $border);
		if ($pctlen < 55) {
			$pctlen = 65;
		}
		imagestring($canvas, 3, $pctlen+5, $basemkr+floor($bar_height*.10), "(".$ary[$j]."%)", $border);
		$basemkr = $basemkr+$bar_height+$gap_height;
	}//for
	
	$title="Overall Rating: $title ";
	imagestring($canvas, 5, 10, $y+10, $title, $border);
	imagepng($canvas, $img_file);
	imagedestroy($canvas);
}//function

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($dir); 
     mkdir($dir);
   } 
}//rrmdir
?>