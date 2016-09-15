<?php
	class displayItems {
		
		//Show the title for the section
		static function displayTitle($sectionName, $slideNum) {
			
			//Add a preamble if we're on slide 2+
			if ($slideNum > 0) {
				$preamble = ($slideNum > 1) ? 'Still ' : 'Also ';
			} else {
				$preamble = '';
			}
				
			//Display the section title
			echo '<div class="top">';
			echo '	<h2>'.$preamble.$sectionName.'</h2>';
			echo '</div>';
			
		}
		
		static function displaySlideStart($showSlides) {
			
			//Open the slide div if applicable
			if ($showSlides == 1) {
				echo '<div class="slide">';
			}
			
		}
		
		static function displaySlideEnd($showSlides) {
			
			//Close the slide div if applicable
			if ($showSlides == 1) {
				echo '</div>';
			}
			
		}
		
		static function displaySection($slideNum, $slides, $showSlides, $sectionName, $resume) {	
		
			//Open the slide div if applicable
			displayItems::displaySlideStart($showSlides);
			
			//Show the section's title
			displayItems::displayTitle($sectionName, $slideNum);
			
			//Display the content of each slide
			foreach($slides as $content) {
				echo '<div class="'.$resume[$sectionName]['class'].'">';
				echo $content['content'];
				echo '</div>';
			}
			
			//Close the slide div if applicable
			displayItems::displaySlideEnd($showSlides);
			
		}
	}
?>
