<?php

	// for this to work, all surveys must have a title (where user is supposed to put the question)
	// pattern is: the key pages, a number, the key elements, another number

	$name = 'results.json';
	if (file_exists($name)) {
		unlink($name);
		touch($name);
	} else {
		touch($name);
	}

	$file_name = 'r1.json';

	$fs = fopen($file_name, 'r');
	$json_data = json_decode(file_get_contents($file_name), true);
	fclose($fs);

	$temp = array();
	$temp2 = array();
	$innerCounter = 0;
  
	for ($i = 0; $i < count($json_data); $i++) { //count($json_data)
		for ($j = 0; $j < count($json_data[$i]['surveyJSON']['pages']); $j++) {
			for ($k = 0; $k < count($json_data[$i]['surveyJSON']['pages'][$j]['elements']); $k++) {
				$innerCounter++;
				$q = ($innerCounter);
				$temp2[] = 'question' . $q;
				$temp[] = $json_data[$i]['surveyJSON']['pages'][$j]['elements'][$k]['title'];
			}
		}
		$json_data[$i]['surveyJSON'] = '';
		$json_data[$i]['surveyJSON'] = array_combine($temp2, $temp);
		$temp = $temp2 = array();
		$innerCounter = 0;
	}

	$fp = fopen($name, 'a');
	fwrite($fp, json_encode($json_data, JSON_PRETTY_PRINT));
	fclose($fp);
	if (file_exists($file_name)) {
		unlink($file_name);
	}
?>
