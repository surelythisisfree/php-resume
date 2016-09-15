<?php
//Include necessary PHP elements
include('./includes/phpheader.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>My Resume</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <link href="./css/site.css" rel="stylesheet" type="text/css">
        <link href="./css/jquery.fullPage.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="./js/scrolloverflow.min.js"></script>
        <script type="text/javascript" src="./js/jquery.fullPage.min.js"></script>
        <script>
        	$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['<?php echo implode("','",$sectionInfo['bgrounds']); ?>'],
				anchors: ['<?php echo implode("','",$sectionInfo['anchors']); ?>'],
				navigation: true,
				menu: '#menu',
				css3: true,
				scrollingSpeed: 1000,
				navigationTooltips: ['<?php echo implode("','",$sectionInfo['names']); ?>'],
				scrollOverflow: true,
				loopBottom: true
			});
		});
        </script>
	</head>
	<body>
        <div id="fullpage">
			<?php
            //Cycle through the list of sections and create a div for each
			foreach($sectionInfo['names'] as $sectionName) {
				
				//Open the div
				echo '<div class="section">';
				
				//Cycle through the slides in the section
                foreach($resume[$sectionName]['content'] as $slideNum=>$slides) {
					
					//Display the content for this slide
					displayItems::displaySection($slideNum, $slides, $resume[$sectionName]['slide'], $sectionName, $resume);
					
                }
				
				//Close the div
                echo '</div>';
            }
            ?>
        </div>
	</body>
</html>
