<?php
	
	//Include commonly used variables
	include('vars.php');
		
?>

<!DOCTYPE html>
<html>

<!--
/************************************************************************
 *
 *  phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  Copyright (c) 2008 Omar Qazi
 *
 *  phpAbstracts is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  phpAbstracts is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with phpAbstracts.  If not, see <http://www.gnu.org/licenses/>. 
 *
************************************************************************/
-->

<head>

    <title><?php echo $site_title; ?></title>
    <link href="css/abstracts.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/submit_form.js"></script>
    <script type="text/javascript">
		//for submit_form.js
		var countsuffix = "_words";
		var remainingwords = "words_remaining";
        total_limit = <?php echo $total_words_limit; ?>;
    </script>
 
</head>


<body>

	 <div id="header" class="top_container">
        <img src="images/logo.gif" />
    </div>


	 <div class="centering_container" id="main_container" >

        <h1>Submit an Abstract</h1>
        
        <p>Abstracts are limited to 400 words. Text and author information should be entered into the fields below. 
        It is NOT possible to save partially completed abstracts. Therefore, it is recommended that the complete document 
        be prepared and finalised in a word processor, then cut and pasted into the appropriate fields.</p>
        
        <p style="font-weight:bold;">Please note that it will not be possible to edit an abstract after it has been 
        submitted.</p>
        
        <br />
        
        <form id="abstract_submit_form" name="abstract_submit_form" method="post" action="submit_process.php" 
        class="aform" onsubmit="return validate(this)">
        
            <h3>Abstract Title</h3>
            
            <p>Enter the title of your abstract.</p>
        
                <label for="title">Title</label>
                    <input type="text" name="title" id="title" size="40" maxlength="250" />
                <br />
            
            <br />
            
            <h3>Author(s)</h3>
            
            <p>You may enter up to six authors here by clicking on "Add". Enter in format: Family Name, Given Name</p>
        
                <div id="author1" class="conf_form_author">
                    <label for="author1">Author</label>
                    <input name="author1" type="text" id="author1" size="40" />
                    <br />
                    <label for="organization1">Organisation</label>
                    <input type="text" name="organization1" id="organization1" size="40" />
                    <br />
                    <label id="author2add"><a onclick="add_author('author2');" 
                    style="text-decoration:underline;cursor:hand;cursor:pointer;">Add</a></label>
                </div>   
                <div id="author2" class="conf_form_author" style="display:none;visibility:hidden;">
                    <label for="author2">Author</label>
                    <input name="author2" type="text" id="author2" size="40" />
                    <br />
                    <label for="organization2">Organisation</label>
                    <input type="text" name="organization2" id="organization2" size="40" />
                    <br />
                    <label id="author3add"><a onclick="add_author('author3');" 
                    style="text-decoration:underline;cursor:hand;cursor:pointer;">Add</a></label>
                </div>  
                <div id="author3" class="conf_form_author" style="display:none;visibility:hidden;">
                    <label for="author3">Author</label>
                    <input name="author3" type="text" id="author3" size="40" />
                    <br />
                    <label for="organization3">Organisation</label>
                    <input type="text" name="organization3" id="organization3" size="40" />
                    <br />
                    <label id="author4add"><a onclick="add_author('author4');" 
                    style="text-decoration:underline;cursor:hand;cursor:pointer;">Add</a></label>
                </div>  
                <div id="author4" class="conf_form_author" style="display:none;visibility:hidden;">
                    <label for="author4">Author</label>
                    <input name="author4" type="text" id="author4" size="40" />
                    <br />
                    <label for="organization4">Organisation</label>
                    <input type="text" name="organization4" id="organization4" size="40" />
                    <br />
                    <label id="author5add"><a onclick="add_author('author5');" 
                    style="text-decoration:underline;cursor:hand;cursor:pointer;">Add</a></label>
                </div>  
                <div id="author5" class="conf_form_author" style="display:none;visibility:hidden;">
                    <label for="author5">Author</label>
                    <input name="author5" type="text" id="author5" size="40" />
                    <br />
                    <label for="organization5">Organisation</label>
                    <input type="text" name="organization5" id="organization5" size="40" />
                    <br />
                    <label id="author6add"><a onclick="add_author('author6');" 
                    style="text-decoration:underline;cursor:hand;cursor:pointer;">Add</a></label>
                </div> 
                <div id="author6" class="conf_form_author" style="display:none;visibility:hidden;">
                    <label for="author6">Author</label>
                    <input name="author6" type="text" id="author6" size="40" />
                    <br />
                    <label for="organization6">Organisation</label>
                    <input type="text" name="organization6" id="organization6" size="40" />
                </div> 
           
            <br />
            <br />
            
            <h3>Presentation</h3>
            
            <p>Enter information about your desired presentation at the conference.</p>
            
            <label for="format">Preferred Format</label>
                <select id="format" name="format">
                    <option value="Poster">Poster</option>
                    <option value="Panel">Panel</option>
                </select>
            <br /><br />
            <label for="language">Language of Presentation</label>
                <select id="language" name="language">
                    <?php
						$t = 1;
						while ($custom_language[$t]) {
							echo "<option value='" . $custom_language[$t] . "'";
								echo ">" . $custom_language[$t] . "</option>";	
							$t = $t+1;
						}		
					?>	
                </select>
            <br /><br />
            <label for="presenter">Name of Presenting Author</label>
                <input type="text" name="presenter" id="presenter" size="40" />
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
								echo ">" . $custom_country[$t] . "</option>";	
							$t = $t+1;
						}		
					?>
                </select>
            <br /><br />

            
            <p>Briefly describe the context for the work and explain why this study was needed.</p>
            
            <label for="background">Background
                <span class="suggested_words">Suggested<br /><?php echo $background_words_limit; ?> words</span>
                <span id="background_your_words" class="your_words">
                    Your count<br /><span id="background_words">0</span> words
                </span>
            </label>
            <textarea name="background" wrap="hard" cols="40" rows="10" 
            onkeyup="check_length(this, purpose, methods, findings, conclusion, <?php echo $background_words_limit; ?>);" 
            onkeydown="check_length(this, purpose, methods, findings, conclusion, <?php echo $background_words_limit; ?>);" 
            onmouseout="check_length(this, purpose, methods, findings, conclusion, <?php echo $background_words_limit; ?>);"></textarea>
            <br /><br />
            
            <p>What did you aim to achieve with this study?</p>
            
            <label for="purpose">Purpose of Study or Programme
                <span class="suggested_words">Suggested<br /><?php echo $purpose_words_limit; ?> words</span>
                <span id="purpose_your_words" class="your_words">
                    Your count<br /><span id="purpose_words">0</span> words
                </span>
            </label>
            <textarea name="purpose" wrap="hard" cols="40" rows="10" 
            onkeyup="check_length(this, background,  methods, findings, conclusion, <?php echo $purpose_words_limit; ?>);" 
            onkeydown="check_length(this, background,  methods, findings, conclusion, <?php echo $purpose_words_limit; ?>);" 
            onmouseout="check_length(this, background,  methods, findings, conclusion, <?php echo $purpose_words_limit; ?>);"></textarea>
            <br /><br />
            
            <p>Describe the key activities that define the work. For example, provide
            information that answers questions such as: With whom did you work?
            How did you identify / select these people? What was your intervention? How did you
            measure it?</p>
            
            <label for="methods">Study or Programme Design and Methods
                <span class="suggested_words">Suggested:<br /><?php echo $methods_words_limit; ?> words</span>
                <span id="methods_your_words" class="your_words">
                    Your count:<br /><span id="methods_words">0</span> words
                </span>
            </label>
            <textarea name="methods" wrap="hard" cols="40" rows="12" 
            onkeyup="check_length(this, background, purpose, findings, conclusion, <?php echo $methods_words_limit; ?>);" 
            onkeydown="check_length(this, background, purpose, findings, conclusion, <?php echo $methods_words_limit; ?>);" 
            onmouseout="check_length(this, background, purpose, findings, conclusion, <?php echo $methods_words_limit; ?>);"></textarea>
            <br /><br />
            
            <p>What did you discover from doing this work?</p>
            
            <label for="findings">Findings of Study or Programme
                <span class="suggested_words">Suggested<br /><?php echo $findings_words_limit; ?> words</span>
                <span id="findings_your_words" class="your_words">
                    Your count<br /><span id="findings_words">0</span> words
                </span>
            </label>
            <textarea name="findings" wrap="hard" cols="40" rows="15" 
            onkeyup="check_length(this, background, purpose, methods, conclusion, <?php echo $findings_words_limit; ?>);" 
            onkeydown="check_length(this, background, purpose, methods, conclusion, <?php echo $findings_words_limit; ?>);" 
            onmouseout="check_length(this, background, purpose, methods, conclusion, <?php echo $findings_words_limit; ?>);"></textarea>
            <br /><br />
            
            <p>What can you conclude about this field? How might this information be used by other organisations?</p>
            
            <label for="conclusion">Conclusions and Programme Implications
                <span class="suggested_words">Suggested<br /><?php echo $conclusion_words_limit; ?> words</span>
                <span id="conclusion_your_words" class="your_words">
                    Your count<br /><span id="conclusion_words">0</span> words
                </span>
            </label>
            <textarea name="conclusion" wrap="hard" cols="40" rows="10" 
            onkeyup="check_length(this, background, purpose, methods, findings, <?php echo $conclusion_words_limit; ?>);" 
            onkeydown="check_length(this, background, purpose, methods, findings, <?php echo $conclusion_words_limit; ?>);" 
            onmouseout="check_length(this, background, purpose, methods, findings, <?php echo $conclusion_words_limit; ?>);"></textarea>
            <br /><br />
            
            <p>Note: the complete abstract should not exceed <?php echo $total_words_limit; ?> words</p>
            
            <span style="color:gray">Suggested Total: <?php echo $total_words_limit; ?> words</span>
            
            <span style="padding:0px 20px 0px 20px;"> | </span>

            <span id="total_words_remaining" style="color:#009900;">
                Your Total: <span id="words_remaining">0</span> words
            </span>
            
            <input type="hidden" id="word_count" name="word_count" value="0" />
            
            <br /><br />
            
            <h3>Contact Person</h3>
            
            <p>Enter contact details for corresponding author.</p>
            
                <label for="name">Name</label>
                    <input type="text" name="name" id="name" size="40" />
                <br />
                <label for="email">E-mail #1</label>
                    <input type="text" name="email1" id="email1" size="40" />
                <br />
                <label for="email">E-mail #2</label>
                    <input type="text" name="email2" id="email2" size="40" />
                <br />
                <label for="phone">Office Phone</label>
                    <input type="text" name="phone1" id="phone" size="40" />
                <br />
                <label for="phone">Cell Phone</label>
                    <input type="text" name="phone2" id="phone" size="40" />
                <br />
                <label for="fax">Fax</label>
                    <input type="text" name="fax" id="fax" size="40" />
                <br />
                <label for="address">Mailing Address</label>
                    <textarea name="address" id="address" wrap="hard" cols="40" rows="2"></textarea>
                <br />
            
            <br /><br /><br />
            <p>Accepted abstracts will be compiled into the <em>Book of Abstracts and Conference Proceedings</em> 
            for wide distribution.  Abstracts that do not follow the above format may not be included. By submitting 
            an abstract, you authorize its inclusion in these publications with minor edits as needed.</p>

            <p>
            <input type="checkbox" name="agree" value="agree">
            I accept the terms and conditions for abstract submission.
            </p>
            
            <p>Please note that once you click on the button below, your abstract will be submitted and no further 
            changes can be made. We appreciate your interest in this conference.</p>
            
            <br />
            
            <input id="submitform" name="submit" type="submit" value="Submit this Abstract" 
            style="width:250px;height:25px;color:black;" />
        
        </form>
        
        
    	<br /><br />
        
	</div>       
    
        
</body>


</html>