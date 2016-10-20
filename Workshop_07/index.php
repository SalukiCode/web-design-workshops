<!DOCTYPE html>
<html>
	<head>
		<title>Saluki Code</title>
		<link href="http://salukicode.com/css/main.min.css" rel="stylesheet" type="text/css">
		<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.0.2.min.js"></script>
		<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<style>
			#draggable { width: 100%;  padding: 0.5em; }
			#teamName {
				text-align: center;
				background: maroon;
				color: white;
				margin: .3em;
			}
			#selectedTeam {
				list-style-type: none;
				text-align: left;
			}
			.teamProperty {
				font-weight: bold;
				font-size: 2em;
				background: maroon;
				border-radius: 1em;
				color: white;
				margin: 1em;
				padding: .2em;
			}
			#selectedTeam li {
				margin: 3em;
			}
		</style>
	</head>
	
	<body>
		<header class="draggy">
			<h1 style="font-size: 4em;">Saluki Code</h1>
		</header>
		<main>
			<section id="draggable">
				<h1 class="ui-widget-content draggy">Workshop Workspace</h1>
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
	if($team == $teams[0]) {
		echo '<option value="' . $team->teamName . '">' . $team->teamName . '</option>';
	} else {
		echo '<option value="' . $team->teamName . '">' . $team->teamName . '</option>';
	}
	
	
	
}

echo '</select>';

				?>
				<h1 class="shakey" id="teamName"></h1>
				<ul id="selectedTeam">
					<li class="shakey">Abbreviation: <span class="teamProperty" id="abbreviation"></span></li>
					<li class="shakey">Simple Name: <span class="teamProperty" id="simpleName"></span></li>
					<li class="shakey">Location: <span class="teamProperty" id="location"></span></li>
					<li class="shakey">Id: <span class="teamProperty" id="teamId"></span></li>
				</ul>
			</section>
		</main>
		
		
		<footer>
			&copy; Saluki Code, 2016
		</footer>
		<script type="text/javascript">
			$("#form1").hide();
			$("#dialog").on("click", function () {
				$('#dialogMsg').dialog();
			});
			$( "#date" ).datepicker();
			
      $( function() {
        $( "*" ).draggable();
        $( ".draggy" ).draggable();
        } );
        
        
        $( ".shakey" ).on("click",function() {
     $(this ).effect( "shake" );
            
        }); 
        
    $( ".explode" ).on("click",function() {
     $(this ).effect( "explode" );
     window.setTimeout(function () {
         $(".explode").fadeIn("slow");
     },2000);
     
    });
   </script>
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
