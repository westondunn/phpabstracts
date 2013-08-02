<?php
/********************************************************
 *
 *	phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  For copyright and license information, see readme.txt
 *
*********************************************************/



	//Include header template
	include('header.php');
	
	//Only ADMINs can view this page
	if ($admin) {
	
		//Grab abstract_id passed in
		$abstract_id = $_POST['abstract_id'];
		
		//Database Connection Variables
		include('db.php');
		
		//Connect to database	
		mysql_connect($host,$username,$password);
		@mysql_select_db($database) or die( "Unable to select database");
		
		//Select all users	
		$query = "SELECT * FROM abstracts WHERE abstract_id = '$abstract_id'";
		$result = mysql_query($query);
		
		$i = 0;
		$title = mysql_result($result,$i,"title");
		$author1 = mysql_result($result,$i,"author1");
		$organization1 = mysql_result($result,$i,"organization1");
		$author2 = mysql_result($result,$i,"author2");
		$organization2 = mysql_result($result,$i,"organization2");
		$author3 = mysql_result($result,$i,"author3");
		$organization3 = mysql_result($result,$i,"organization3");
		$author4 = mysql_result($result,$i,"author4");
		$organization4 = mysql_result($result,$i,"organization4");
		$author5 = mysql_result($result,$i,"author5");
		$organization5 = mysql_result($result,$i,"organization5");
		$author6 = mysql_result($result,$i,"author6");
		$organization6 = mysql_result($result,$i,"organization6");
		$format = mysql_result($result,$i,"format");
		$language = mysql_result($result,$i,"language");
		$presenter = mysql_result($result,$i,"presenter");
		$background = mysql_result($result,$i,"background");
		$purpose = mysql_result($result,$i,"purpose");
		$methods = mysql_result($result,$i,"methods");
		$findings = mysql_result($result,$i,"findings");
		$conclusion = mysql_result($result,$i,"conclusion");
		$word_count = mysql_result($result,$i,"word_count");
		$name = mysql_result($result,$i,"name");
		$email1 = mysql_result($result,$i,"email1");
		$email2 = mysql_result($result,$i,"email2");
		$phone1 = mysql_result($result,$i,"phone1");
		$phone2 = mysql_result($result,$i,"phone2");
		$fax = mysql_result($result,$i,"fax");
		$address = mysql_result($result,$i,"address");
		$country = mysql_result($result,$i,"country");
		$topic = mysql_result($result,$i,"topic");
		$master_status = mysql_result($result, $i, "master_status");
		$last_edit = mysql_result($result,$i,"last_edit");
		
		//Output breadcrumbs
		$goback_abstract = 	"<form method='post' style='display:inline;' action='detail.php' name='goback_abstract_form' id='goback_abstract_form'>" . 
								"<input type='hidden' id='abstract_id' name='abstract_id' value='" . $abstract_id . "' />" . 
								"<a href='#' onclick='javascript:document.goback_abstract_form.submit();'>View Abstract " . $abstract_id . "</a>" .
							"</form>";
		echo "<div class='breadcrumbs'><a href='list.php'>" . $home_title . "</a> /" . $goback_abstract . " /Edit Abstract</div>";
		
		
		//Output title
		echo "<h1>Edit Abstract " . $abstract_id . "</h1>";

		//Output date of last edit
		if ($last_edit) echo "<p>Last Edited: " . $last_edit . "</p>";
?>


	
                            <br />
                            
                            <form method="post" action="edit_abstract_process.php" class="aform">

                            	<h3>Abstract Title</h3>
                                
                                <p>Enter the title of the abstract.</p>
                            
                                    <label for="title">Title</label>
                                        <input type="text" name="title" id="title" size="60" maxlength="250" value="<?php echo $title; ?>" />
                                    <br />
                                
                                <br />
                                
                                <h3>Author(s)</h3>
                                
                                <p>Enter in format: Family Name, Given Name</p>
                            
                                    <label for = "author1">author1</label>
                                        <input type="text" id="author1" name="author1" size="50" value="<?php echo $author1; ?>" /><br />
                                    
                                    <label for = "organization1">organization1</label>
                                        <input type="text" id="organization1" name="organization1" size="50" value="<?php echo $organization1; ?>" /><br />
                                    
                                    <label for = "author2">author2</label>
                                        <input type="text" id="author2" name="author2" size="50" value="<?php echo $author2; ?>" /><br />
                                    
                                    <label for = "organization2">organization2</label>
                                        <input type="text" id="organization2" name="organization2" size="50" value="<?php echo $organization2; ?>" /><br />
                                    
                                    <label for = "author3">author3</label>
                                        <input type="text" id="author3" name="author3" size="50" value="<?php echo $author3; ?>" /><br />
                                    
                                    <label for = "organization3">organization3</label>
                                        <input type="text" id="organization3" name="organization3" size="50" value="<?php echo $organization3; ?>" /><br />
                                    
                                    <label for = "author4">author4</label>
                                        <input type="text" id="author4" name="author4" size="50" value="<?php echo $author4; ?>" /><br />
                                    
                                    <label for = "organization4">organization4</label>
                                        <input type="text" id="organization4" name="organization4" size="50" value="<?php echo $organization4; ?>" /><br />
                                    
                                    <label for = "author5">author5</label>
                                        <input type="text" id="author5" name="author5" size="50" value="<?php echo $author5; ?>" /><br />
                                    
                                    <label for = "organization5">organization5</label>
                                        <input type="text" id="organization5" name="organization5" size="50" value="<?php echo $organization5; ?>" /><br />
                                    
                                    <label for = "author6">author6</label>
                                        <input type="text" id="author6" name="author6" size="50" value="<?php echo $author6; ?>" /><br />
                                    
                                    <label for = "organization6">organization6</label>
                                        <input type="text" id="organization6" name="organization6" size="50" value="<?php echo $organization6; ?>" /><br />
                               
                                <br />
                                <br />
                                
								<h3>Presentation</h3>
                                
                                <p>Enter information about the presentation at the conference.</p>
								
                                <label for="format">Preferred Format</label>
							  		<select id="format" name="format">
                                        <option value="Poster" <?php if ($format == "Poster") echo "selected"; ?>>Poster</option>
                                        <option value="Panel" <?php if ($format == "Panel") echo "selected"; ?>>Panel</option>
                                    </select>
								<br /><br />
								<label for="language">Language of Presentation</label>
									<select id="language" name="language">
                                    	<?php
										$t = 1;
										while ($custom_language[$t]) {
											echo "<option value='" . $custom_language[$t] . "'";
												if ($language == $custom_language[$t]) echo " selected";
												echo ">" . $custom_language[$t] . "</option>";	
											$t = $t+1;
										}		
									?>		
                                    </select>
								<br /><br />
								<label for="presenter">Name of Presenting Author</label>
									<input type="text" name="presenter" id="presenter" size="40" value="<?php echo $presenter; ?>" />
								<br />
								
                                
                                
                                <br />
                                <br />
                                <br />
                                
                                <h3>Abstract Content</h3>
                                
                                <p>Please select the main topic area of your abstract, and the location where the 
                                primary work was carried out.</p>
                                
                                <label for="topic">Topic</label>
									<select id="topic" name="topic">
                                    <?php
										$t = 1;
										while ($custom_topic[$t]) {
											echo "<option value='" . $custom_topic[$t] . "'";
												if ($topic == $custom_topic[$t]) echo " selected";
												echo ">" . $custom_topic[$t] . "</option>";	
											$t = $t+1;
										}		
									?>		
                                    </select>
                                    
                                <br /><br />

                                <label for="country">Location</label>
                                    <select id="country" name="country">
                                    <?php
										$t = 1;
										while ($custom_country[$t]) {
											echo "<option value='" . $custom_country[$t] . "'";
												if ($country == $custom_country[$t]) echo " selected";
												echo ">" . $custom_country[$t] . "</option>";	
											$t = $t+1;
										}		
									?>
                                    </select>
                                <br /><br />

                                
                                <p>Briefly describe the context for the work and explain why this study or programme was needed.</p>
                                
								<label for="background">Background
									<span class="suggested_words">Suggested<br /><?php echo $background_words_limit; ?> words</span>
								</label>
								<textarea name="background" wrap="hard" cols="50" rows="10"><?php echo $background; ?></textarea>
								<br /><br />
                                
								<p>What did you aim to achieve with this study or programme?</p>
								
                                <label for="purpose">Purpose of Study or Programme
									<span class="suggested_words">Suggested<br /><?php echo $purpose_words_limit; ?> words</span>
								</label>
								<textarea name="purpose" wrap="hard" cols="50" rows="10"><?php echo $purpose; ?></textarea>
								<br /><br />
                                
								<p>Describe the key activities that define the work. For example, provide
                                information that answers questions such as: With whom did you work?
                                How did you identify / select these people? What was your intervention? How did you
                                measure it?</p>
								
                                <label for="methods">Study or Programme Design and Methods
									<span class="suggested_words">Suggested:<br /><?php echo $methods_words_limit; ?> words</span>
								</label>
								<textarea name="methods" wrap="hard" cols="50" rows="12"><?php echo $methods; ?></textarea>
								<br /><br />
								
								<p>What did you discover from doing this work?</p>
                                
                                <label for="findings">Findings of Study or Programme
									<span class="suggested_words">Suggested<br /><?php echo $findings_words_limit; ?> words</span>
								</label>
								<textarea name="findings" wrap="hard" cols="50" rows="15"><?php echo $findings; ?></textarea>
								<br /><br />
                                
								<p>What can you conclude about this field? How might this information be used by other organisations?</p>
								
                                <label for="conclusion">Conclusions and Programme Implications
									<span class="suggested_words">Suggested<br /><?php echo $conclusion_words_limit; ?> words</span>
								</label>
								<textarea name="conclusion" wrap="hard" cols="40" rows="10"><?php echo $conclusion; ?></textarea>
								<br /><br />
								
								<p>Note: the complete abstract should not exceed <?php echo $total_words_limit; ?> words</p>
                                
                                <span style="color:gray">Suggested Total: <?php echo $total_words_limit; ?> words</span>
								
								<br /><br />
								
								<h3>Contact Person</h3>
                                
                                <p>Enter contact details for corresponding author.</p>
								
									<label for="name">Name</label>
                                        <input type="text" name="name" id="name" size="40" value="<?php echo $name; ?>" />
                                    <br />
									<label for="email1">E-mail #1</label>
                                        <input type="text" name="email1" id="email1" size="40" value="<?php echo $email1; ?>" />
                                    <br />
                                    <label for="email2">E-mail #2</label>
                                        <input type="text" name="email2" id="email2" size="40" value="<?php echo $email2; ?>" />
                                    <br />
                                 	<label for="phone1">Office Phone</label>
                                        <input type="text" name="phone1" id="phone1" size="40" value="<?php echo $phone1; ?>" />
                                    <br />
                                    <label for="phone2">Cell Phone</label>
                                        <input type="text" name="phone2" id="phone2" size="40" value="<?php echo $phone2; ?>" />
                                    <br />
									<label for="fax">Fax</label>
                                        <input type="text" name="fax" id="fax" size="40" value="<?php echo $fax; ?>" />
                                    <br />
									<label for="address">Mailing Address</label>
                                        <textarea name="address" id="address" wrap="hard" cols="40" rows="3"><?php echo $address; ?></textarea>
                                    <br />
								
								<br /><br /><br />
                                                                
                                <p>Please note that once you click on the button below, the changes above will overwrite the previous abstract permanently. </p>
                                
                                <br />
                                
                                <input type='hidden' id='abstract_id' name='abstract_id' value="<?php echo $abstract_id; ?>" />
                                
								<input id="submitform" name="submit" type="submit" value="Save Changes" 
								style="width:250px;height:25px;color:black;" />
                            
                            </form>
                            
                            <br /><br /><br /><br />
                            
<?php

	} //end if

	//Include footer template
	include('footer.php');          