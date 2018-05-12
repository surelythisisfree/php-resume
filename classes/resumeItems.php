<?php
class resumeItems {
	
	public $resumeContent = array();
	
	public $sectionDetails = array();
	
	//Get the resume content from the database
	public function getResume() {
		
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
					`item_order`,
					`item_slide`
					from section, item
					where section_id = item_section
					order by section_id, item_order asc";
		
		//Run the query
		if ($result = $mysqli->query($query, MYSQLI_STORE_RESULT)) {
			
			//Keep track of what section we're in
			$currentSection = '';
			
			//Cycle through the results and create an array of content
			while($resultRow = $result->fetch_array(MYSQLI_ASSOC)) {
				
				//If we're in a new section, add it's details to the array
				if ($currentSection != $resultRow['section_name']) {
					$currentSection = $resultRow['section_name'];
					
					//Send unique section details into an array
					$this->sectionDetails['names'][] = $resultRow['section_name'];
					$this->sectionDetails['anchors'][] = $resultRow['section_anchor'];
					$this->sectionDetails['bgrounds'][] = $resultRow['section_bground'];
					$this->sectionDetails[$currentSection]['slide'] = $resultRow['section_slide'];
					$this->sectionDetails[$currentSection]['class'] = $resultRow['section_class'];
				}
				
				//Add the resume content to the array
				$this->resumeContent[$currentSection]['content'][$resultRow['item_slide']][]['content'] = $resultRow['item_content'];
			}

			// Free DB results
			$result->free();
			
			//Close connection to DB
			$mysqli->close();
		}
	}
}
?>
