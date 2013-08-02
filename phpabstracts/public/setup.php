<?php 
/********************************************************
 *
 *	phpAbstracts
 *  http://www.phpabstracts.com
 *
 *  For copyright and license information, see readme.txt
 *
*********************************************************/



	
	// If form was submitted
	if ($_POST['DBHost']) 
	{
		//If admin variables were submitted
		if ($_POST['admin_user'] && $_POST['admin_email'] && $_POST['admin_pass']) 
		{
			// Check that their config file is writable
			if(is_writable('db.php'))
			{
				// Test the connection
				if(@mysql_connect($_POST['DBHost'], $_POST['DBUser'], $_POST['DBPass']))
				{
					if(@mysql_select_db($_POST['DBName']))
					{
						$status = "Success";
										
								// Content that will be written to the config file
								$content = "<?php\n";
								$content.= "\$host = '".addslashes($_POST['DBHost'])."';\n";
								$content.= "\$database = '".addslashes($_POST['DBName'])."';\n";
								$content.= "\$username = '".addslashes($_POST['DBUser'])."';\n";
								$content.= "\$password = '".addslashes($_POST['DBPass'])."';\n";
								$content.= "\n";
								$content.= "?>";
							
								// Open the includes/config.php for writting
								$handle = fopen('db.php', 'w');
								// Write the config file
								fwrite($handle, $content);
								// Close the file
								fclose($handle);
	
								mysql_query("CREATE TABLE `abstracts` (  `abstract_id` int(11) NOT NULL auto_increment,  `date` varchar(40) NOT NULL default '',  `title` varchar(255) NOT NULL default 'none',  `author1` varchar(40) NOT NULL default 'none',  `organization1` varchar(100) NOT NULL default 'none',  `author2` varchar(40) NOT NULL default 'none',  `organization2` varchar(100) NOT NULL default 'none',  `author3` varchar(40) NOT NULL default 'none',  `organization3` varchar(100) NOT NULL default 'none',  `author4` varchar(40) NOT NULL default 'none',  `organization4` varchar(100) NOT NULL default 'none',  `author5` varchar(40) NOT NULL default 'none',  `organization5` varchar(100) NOT NULL default 'none',  `author6` varchar(40) NOT NULL default 'none',  `organization6` varchar(100) NOT NULL default 'none',  `format` varchar(15) NOT NULL default 'none',  `language` varchar(15) NOT NULL default 'none',  `presenter` varchar(40) NOT NULL default 'none',  `background` text NOT NULL,  `purpose` text NOT NULL,  `methods` text NOT NULL,  `findings` text NOT NULL,  `conclusion` text NOT NULL,  `word_count` int(3) NOT NULL default '0',  `name` varchar(40) NOT NULL default 'none',  `email1` varchar(40) NOT NULL default 'none',  `email2` varchar(40) NOT NULL default '',  `phone1` varchar(40) NOT NULL default '',  `phone2` varchar(40) NOT NULL default '',  `fax` varchar(40) NOT NULL default 'none',  `address` text NOT NULL,  `topic` varchar(40) NOT NULL,  `country` varchar(40) NOT NULL,  `master_status` varchar(40) NOT NULL default 'Unfiled',  `scholarship` varchar(20) NOT NULL,  `last_edit` varchar(50) NOT NULL,  PRIMARY KEY  (`abstract_id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1418 ;");			
								
								mysql_query("CREATE TABLE `reviews` (  `review_id` int(11) NOT NULL auto_increment,  `abstract_id` int(11) NOT NULL default '0',  `user_id` int(11) NOT NULL default '0',  `status` varchar(20) NOT NULL,  `relevance` varchar(15) NOT NULL default '0',  `quality` varchar(15) NOT NULL default '0',  `comments` text NOT NULL,  `recommendation` varchar(25) NOT NULL,  PRIMARY KEY  (`review_id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=749 ;");

								mysql_query("CREATE TABLE `users` (  `user_id` int(11) NOT NULL auto_increment,  `login` varchar(40) NOT NULL default '',  `password` varchar(40) NOT NULL default '',  `name` varchar(75) NOT NULL default '',  `email` varchar(40) NOT NULL default '',  `role` varchar(10) NOT NULL default '',  PRIMARY KEY  (`user_id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;");
								
								mysql_query("INSERT INTO `users` VALUES (1, '".addslashes($_POST['admin_user'])."', '" . 
									addslashes($_POST['admin_pass']) . "', 'Administrator', '" . 
									addslashes($_POST['admin_email']) . "', 'ADMIN');");
									
								$status = "Complete!";
					}//dbname
					else 
						$status = "This database does not exist.";
				}//dbhost etc
				else 
					$status = "Connection failed.";
			}//writable
			else 
				$status = "The file db.php is not writable.";
		}//If admin variables
		else
			$status = "Please enter an admin user";
	}//If form was submitted
		
		
			
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

    <title><?php echo $site_title; ?></title>
    <link href="css/abstracts.css" rel="stylesheet" type="text/css" />
    
</head>


<body>
    
    <div id="header" class="top_container">
        <img src="images/logo.gif" />
    </div>
    
            
    <div class="centering_container" id="main_container" >

        <div class="leftcol">
        
        <h1>Setup</h1>
        
        <? 
			if ($status) 
				echo "<div class='status'>" . $status . "</div>";
							
			if ($status == "Complete!") {
				echo "<p>Your system is now properly setup. You may <a href='login.php'>login</a> to begin using it.</p>";
			}
			else {
					
        
		?>
        
        
        
        <p style="width:420px;">Please fill in your database connection variables below.</p>       
        
        <form method="post" action="setup.php" class="aform">
        
            <label for = "DBHost">Database Host</label>
            	<input type="text" id="DBHost" name="DBHost" size="30" /><br />
            <label for = "DBUser">Database Username</label>
            	<input type="text" id="DBUser" name="DBUser" size="30" /><br />
            <label for = "DBPass">Database Password</label>
            	<input type="text" id="DBPass" name="DBPass" size="30" /><br />
 
        	<p style="width:420px;">Type in the name of your database (this must already exist).</p>
       
            <label for = "DBName">Database Name</label>
            	<input type="text" id="DBName" name="DBName" size="30" /><br /> 
                
       	 	<p style="width:420px;">You must also create an master admin user.<br />Please enter this information below, and save for your records.</p>
       
            <label for = "admin_user">Admin User</label>
            	<input type="text" id="admin_user" name="admin_user" size="30" /><br />     
            <label for = "admin_pass">Admin Password</label>
            	<input type="text" id="admin_pass" name="admin_pass" size="30" /><br />
            <label for = "admin_email">Admin Email</label>
            	<input type="text" id="admin_email" name="admin_email" size="30" /><br />            
       
            <br /><br  />
            
            <label>&nbsp;</label>
            	<input type="submit" value="Submit" />
        
        </form>

		<?php
				}//end else
		?>
        </div>
    
    
    	<div class="rightcol">
        	<h2>Initial Setup</h2>
            <p>Welcome to phpAbstracts.</p>
            <p>Using this form, you will be able to automatically setup your database
            for use with this system.</p>
            <p style="font-weight:bold;">Before you begin</p>
            <p>You must manually create an empty database before you run this script!</p>
            <p> Please create an empty database 
	           (for example: through your web host or by using phpMyAdmin), and then then type in the name of the database where specified.</p>
        </div>
        
        <div class="breaker">&nbsp;</div>
        
    </div>
    
    <div class="footer" style="margin-top:10px;">Powered by <a href="http://www.phpabstracts.com">phpAbstracts</a>, licensed under the GNU GPL.</div>
    
    

</body>


</html>














