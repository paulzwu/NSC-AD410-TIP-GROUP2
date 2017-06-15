<?php 
//Make and array of all the possible outcomes from the quiz.
$learningOuts = array(
				'Facts, theories, perspectives, and methodologies within and across disciplines',
				'Critical thinking and problem solving',
				'Communication and self-expression',
				'Quantitative reasoning',
				'Information literacy',
				'Technological proficiency',
				'Collaboration: group and team work',
				'Civic engagement: local, global, and environmental',
				'Intercultural knowledge and competence',
				'Ethical awareness and personal integrity',
				'Lifelong learning and personal well-being',
				'Synthesis and application of knowledge, skills, and responsibilities to new settings and problems',
				);

//Make arrays for each of the outcomes.

//Facts, theories, perspectives, and methodologies within and across disciplines
$outcome1 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Critical thinking and problem solving
$outcome2 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Communication and self-expression
$outcome3 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Quantitative reasoning
$outcome4 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Information literacy
$outcome5 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Technological proficiency
$outcome6 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Collaboration: group and team work
$outcome7 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Civic engagement: local, global, and environmental
$outcome8 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Intercultural knowledge and competence
$outcome9 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Ethical awareness and personal integrity
$outcome10 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Lifelong learning and personal well-being
$outcome11 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);

//Synthesis and application of knowledge, skills, and responsibilities to new settings and problems
$outcome12 = array('AHSS'=>0,'BEIT'=>0,'BTS'=>0,'HHS'=>0,'LIB'=>0,'MS'=>0);


try {
	$conn = new PDO("sqlite:db.sqlite");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	echo "Can't connet to DB: ".$e->getMessage();
	}
	
	
	
//sql statement
$sql = "SELECT answerJSON FROM ANSWER;";

//query
$result = $connection->query($sql);
foreach($result as $row) {
			$answerJSON = $row['answerJSON'];
			$json = $answerJSON;
			$getOutcome = findOutcome($json,$learningOuts);
			
			switch ($getOutcome){
				case 0:
					$outcome1 = findDivisions($json,$outcome1);
					break;
				case 1:
					$outcome2 = findDivisions($json,$outcome2);
					break;
				case 2:
					$outcome3 = findDivisions($json,$outcome3);
					break;
				case 3:
					$outcome4 = findDivisions($json,$outcome4);
					break;
				case 4:
					$outcome5 = findDivisions($json,$outcome5);
					break;
				case 5:
					$outcome6 = findDivisions($json,$outcome6);
					break;
				case 6:
					$outcome7 = findDivisions($json,$outcome7);
					break;
				case 7:
					$outcome8 = findDivisions($json,$outcome8);
					break;
				case 8:
					$outcome9 = findDivisions($json,$outcome9);
					break;
				case 9:
					$outcome10 = findDivisions($json,$outcome10);
					break;
				case 10:
					$outcome11 = findDivisions($json,$outcome11);
					break;
				case 11:
					$outcome12 = findDivisions($json,$outcome12);
					break;
			}
}

//*****************DELETE ON RELEASE*****************
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
function getDummyData($outcomeArray){
	$rand = rand (100 ,500 );
	$outcomeArray['AHSS'] = $outcomeArray['AHSS'] + $rand;
	
	$rand = rand (100 ,500 );
	$outcomeArray['BEIT'] = $outcomeArray['BEIT'] + $rand;
	
	$rand = rand (100 ,500 );
	$outcomeArray['BTS'] = $outcomeArray['BTS'] + $rand;
	
	$rand = rand (100 ,500 );
	$outcomeArray['HHS'] = $outcomeArray['HHS'] + $rand;
	
	$rand = rand (100 ,500 );
	$outcomeArray['LIB'] = $outcomeArray['LIB'] + $rand;
	
	$rand = rand (100 ,500 );
	$outcomeArray['MS'] = $outcomeArray['MS'] + $rand;
return $outcomeArray;
}
//*****************DELETE ON RELEASE*****************

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

echo $outcomeJSON;

function makeJson ($outcome, $outcomeNum){
	
	$out = $parent.'{ "name": '.$outcomeNum.', "children": [';
	
	$tempString = '{ "name": "AHSS", "size": '.$outcome['AHSS'].'},';
	$out = $out.$tempString;

	$tempString = '{ "name": "BEIT", "size": '.$outcome['BEIT'].'},';
	$out = $out.$tempString;

	$tempString = '{ "name": "BTS", "size": '.$outcome['BTS'].'},';
	$out = $out.$tempString;
	
	$tempString = '{ "name": "HHS", "size": '.$outcome['HHS'].'},';
	$out = $out.$tempString;

	$tempString = '{ "name": "LIB", "size": '.$outcome['LIB'].'},';
	$out = $out.$tempString;

	$tempString = '{ "name": "M&S", "size": '.$outcome['MS'].'}';
	$out = $out.$tempString;
	
	$out = $out.'] }';
	
	return $out;
}

function findDivisions($string,$array){
	$answers = json_decode($string);
	$divisions = $answers->{'requiredQuestion1'};
	switch ($divisions){
				case 'AHSS':
				
					$array['AHSS'] = $array['AHSS'] + 1;
					return $array;
					break;
				
				case 'BEIT':
				
					$array['BEIT'] = $array['BEIT'] + 1;
					return $array;
					break;
					
				case 'BTS':
				
					$array['BTS'] = $array['BTS'] + 1;
					return $array;
					break;
				
				case 'HHS':
				
					$array['HHS'] = $array['HHS'] + 1;
					return $array;
					break;
				
				case 'LIB':
				
					$array['LIB'] = $array['LIB'] + 1;
					return $array;
					break;
				
				case 'MS':
				
					$array['MS'] = $array['MS'] + 1;
					return $array;
					break;
				
			}
}

function findOutcome ($string,$array){
	for ($i = 0; $i <= 11; $i++){
		$find = strpos($string, $array[$i]);
		
		if ($find !== false){
				return $i;
				break;
		}
	}
}
	?>
