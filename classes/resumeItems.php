<?php
class resumeItems {
	
	//Get the resume content from the database
	static public function getResume() {
		
		//Bring in the mySQL connection
		global $mysqli;
		
		//Define the query
		$query = "select
					`section_anchor`,
					`section_bground`,
					`section_name`,
					`section_slide`,
					`section_class`,
					`item_content`,
					`item_id`,
					`item_slide`
					from section, item
					where section_id = item_section
					order by section_id, item_id asc";
		
		//Run the query
		if ($result = $mysqli->query($query, MYSQLI_STORE_RESULT)) {
			$resumeContent = array();
			
			//Keep track of what section we're in
			$currentSection = '';
			
			//Cycle through the results and create an array of content
			while($resultRow = $result->fetch_array(MYSQLI_ASSOC)) {
				
				//If we're in a new section, add it's details to the array
				if ($currentSection != $resultRow['section_name']) {
					$currentSection = $resultRow['section_name'];				
					$resumeContent[$currentSection]['anchor'] = $resultRow['section_anchor'];
					$resumeContent[$currentSection]['bground'] = $resultRow['section_bground'];
					$resumeContent[$currentSection]['slide'] = $resultRow['section_slide'];
					$resumeContent[$currentSection]['class'] = $resultRow['section_class'];
				}
				
				//Add the resume content to the array
				$resumeContent[$currentSection]['content'][$resultRow['item_slide']][]['content'] = $resultRow['item_content'];
			}

			// Free DB results
			$result->free();
			
			//Close connection to DB
			$mysqli->close();
			
			//Send it back
			return $resumeContent;
		}
	}
	
	//Send section details into an array
	static function getSectionInfo($resume) {
		
		//For each section, array it's details
		foreach ($resume as $key=>$value) {
			$sectionArray['names'][] = $key;
			$sectionArray['anchors'][] = $value['anchor'];
			$sectionArray['bgrounds'][] = $value['bground'];
		}
		
		//Send it back
		return $sectionArray;
	}
}
?>