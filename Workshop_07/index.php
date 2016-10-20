<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<title>PhpFiddle Initial Code</title>
		
		<script type="text/javascript" src="/js/jquery/1.7.2/jquery.min.js"></script>
		
		<script type="text/javascript">
			
		</script>
		
		<style type="text/css">
			
		</style>
		
	</head>
	
<body>
		<?php

		$url = "http://salukicode.com/tools/assets/test.json";
		
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);


class Team {
	var $teamId;
	var $abbreviation;
	var $teamName;
	var $simpleName;
	var $location;
	
	function Team($teamId = "John Doe", $abbreviation = "ECE", $teamName = "Senior", $simpleName = "Simple", $location = "Your mom's'") {
		$this->teamId = $teamId;
		$this->abbreviation = $abbreviation;
		$this->teamName = $teamName;
		$this->simpleName = $simpleName;
		$this->location = $location;
	}
	
}

$teams = json_decode($result);

echo '<script> var myTeams = [';

foreach ($teams as $team) {
	echo '["' . $team->abbreviation . '","' . $team->teamName . '","' . $team->simpleName . '","' . $team->location . '","' . $team->teamId .'"],';
}

echo '];</script>';



echo '<select id="team-selector">';

foreach ($teams as $team) {
	echo '<option value="' . $team->teamName . '">' . $team->teamName . '</option><br>';
}

echo '</select>';

		?>
		
		<h1 id="abbreviation"></h1>
		<ul>
			<li id="teamName"></li>
			<li id="simpleName"></li>
			<li id="location"></li>
			<li id="teamId"></li>
		</ul>
		<script>
			$("#team-selector").on("change load", function() {
				
				for (i = 0; i < myTeams.length; i++) {
					if($(this).val() == myTeams[i][1]) {
							$("#abbreviation").text(myTeams[i][0]);
							$("#teamName").text(myTeams[i][1]);
							$("#simpleName").text(myTeams[i][2]);
							$("#location").text(myTeams[i][3]);
							$("#teamId").text(myTeams[i][4]);
						}
				}
			});
		</script>
		
		
	</body>
</html>
