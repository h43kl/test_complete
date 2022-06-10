<?php



$usiaA=13;
$tahunA=12;
	
$usiaB=18;
$tahunB=17;

$orangA=$tahunA-$usiaA;
$orangB=$tahunB-$usiaB;

echo (hitung($orangA)+hitung($orangB))/2;

function hitung($n)
{
	$data = [];
	
	for($i=1;$i<($n+1);$i++)
	{ 
		if($i == 1)
		{
			$data[] = $i;
			$v = $i;
		}
		else
		{
			$data[] = $v;
			$v = $v+$data[count($data)-2];
		}		
	}
	
	return array_sum($data);

}