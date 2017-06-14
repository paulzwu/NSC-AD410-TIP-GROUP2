<?php
$outcome1 =[];
$outcome2 =[];
$outcome3 =[];
$outcome4 =[];
$outcome5 =[];
$outcome6 =[];
$outcome7 =[];
$outcome8 =[];
$outcome9 =[];
$outcome10 =[];
$outcome11 =[];
$outcome12 =[];

$outcome1 = getDummyData($outcome1);
$outcome2 = getDummyData($outcome2);
$outcome3 = getDummyData($outcome3);
$outcome4 = getDummyData($outcome4);
$outcome5 = getDummyData($outcome5);
$outcome6 = getDummyData($outcome6);
$outcome7 = getDummyData($outcome7);
$outcome8 = getDummyData($outcome8);
$outcome9 = getDummyData($outcome9);
$outcome10 = getDummyData($outcome10);
$outcome11 = getDummyData($outcome11);
$outcome12 = getDummyData($outcome12);

$out1 = makeJson($outcome1, 1);
$out2 = makeJson($outcome2, 2);
$out3 = makeJson($outcome3, 3);
$out4 = makeJson($outcome4, 4);
$out5 = makeJson($outcome5, 5);
$out6 = makeJson($outcome6, 6);
$out7 = makeJson($outcome7, 7);
$out8 = makeJson($outcome8, 8);
$out9 = makeJson($outcome9, 9);
$out10 = makeJson($outcome10, 10);
$out11 = makeJson($outcome11, 11);
$out12 = makeJson($outcome12, 12);

$outcomeJSON = '{"name": "Outcomes", "children": ['.$out1.','.$out2.','.$out3.','.$out4.
','.$out5.','.$out6.','.$out7.','.$out8.','.$out9.','.$out10.','.$out11.','.$out12.
']}';



function getDummyData($outcomeArray){
	for ($i = 0; $i <= 5; $i++){
	$rand = rand (100 ,500 );
	$outcomeArray[] = $rand;
	}
return $outcomeArray;
}

function makeJson ($outcome, $outcomeNum){
	
	$out = $parent.'{ "name": '.$outcomeNum.', "children": [';
	
	if ($outcome[0] > 0){
		$tempString = '{ "name": "AHSS", "size": '.$outcome[0].'},';
		$out = $out.$tempString;
	}

	if ($outcome[1] > 0){
		$tempString = '{ "name": "BEIT", "size": '.$outcome[1].'},';
		$out = $out.$tempString;
	}

	if ($outcome[2] > 0){
		$tempString = '{ "name": "BTS", "size": '.$outcome[2].'},';
		$out = $out.$tempString;
	}

	if ($outcome[3] > 0){
		$tempString = '{ "name": "HHS", "size": '.$outcome[3].'},';
		$out = $out.$tempString;
	}

	if ($outcome[4] > 0){
		$tempString = '{ "name": "LIB", "size": '.$outcome[4].'},';
		$out = $out.$tempString;
	}

	if ($outcome[5] > 0){
		$tempString = '{ "name": "M&S", "size": '.$outcome[5].'}';
		$out = $out.$tempString;
	}
	
	$out = $out.'] }';
	return $out;
}

echo $outcomeJSON;
echo '<br>';
$fp = fopen('flare.json', 'w');
fwrite($fp, $outcomeJSON);
fclose($fp);
echo 'JSON updated';

?>