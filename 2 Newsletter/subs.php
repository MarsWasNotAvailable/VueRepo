<?php

//the table I worked with looked like that:
//CREATE TABLE IF NOT EXISTS `newsletter`.`subscribed` (`Mail` TEXT NOT NULL , `Date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB; 

	$HostNameOrIP = "localhost";
	$MySQLUserName = "root";
	$MySQLPassWord = "";
	$DataBaseName = "newsletter";

	try{
		$MySQL = new mysqli($HostNameOrIP, $MySQLUserName, $MySQLPassWord, $DataBaseName);
	
		if ($MySQL->connect_errno){
			echo "failed to connect to MySQL" . $MySQL -> connect_errno;
			exit();
		}

		//TODO: can you react accordingly to below todoes, using connect_errno above
		//>https://dev.mysql.com/doc/mysql-errors/8.0/en/server-error-reference.html
		//TODO: or we could use CREATE TABLE IF NOT EXISTS
		//>this seems simpler

		//TODO: DataBase name shouldnt be hardcoded, there's a variable $DataBaseName above
		$CreateStatement = $MySQL->prepare("CREATE TABLE IF NOT EXISTS newsletter.subscribed (Mail TEXT NOT NULL , Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;");
		//$CreateStatement->bind_param('s', $DataBaseName);
		$CreateStatement->execute();
		$CreateStatement->close();

		$UserMail = $_POST["Mail"];
		$FormIntent = $_POST["FormIntent"];
		
		echo $FormIntent;
		

		if ($FormIntent == "Unregister")
		{
			//Normally, one should notify the mail address and generate some unique link to remove mail from database
			//Because as it is currently, anybody could script something to send any e-mail address to this server
			//and it would result in destruction of the list.
			
			$DeleteStatement = $MySQL->prepare("DELETE FROM subscribed WHERE Mail = ?");
			$DeleteStatement->bind_param('s', $UserMail);
			$DeleteStatement->execute();
			$DeleteStatement->close();
			
			header("Location: index.html?subscribed=False");
			exit;
		}
		else if ($FormIntent == "Register")
		{
			$MySQLStatement = $MySQL->prepare("SELECT * FROM subscribed WHERE Mail= ?");
			//first argument is type: i(nt), d(ouble), s(tring), b(lob) -> 'sss' for three strings
			$MySQLStatement->bind_param('s', $UserMail);
			$MySQLStatement->execute();
			
			if ( ($MySQLStatement->get_result()->num_rows) < 1 )
			{
				//there's a REPLACE command one could use as a insert unique only, but some claims it's slower than SELECT + UPDATE
				//>it's actually deleting the record if it exists already
				
				$MySQLStatement->prepare("INSERT INTO subscribed (Mail, Date) VALUES (?, current_timestamp())");
//				$MySQLStatement->prepare("INSERT INTO subscribed (Mail, Date) VALUES (?, current_timestamp()) ON DUPLICATE KEY UPDATE Date = current_timestamp()");
				$MySQLStatement->bind_param('s', $UserMail);
				$MySQLStatement->execute();
				$MySQLStatement->close();
				
				header("Location: index.html?subscribed=True");
				exit;
			}
			else
			{
				header("Location: index.html?subscribed=Already");
			}
		}

	} catch (PDOException $e){
		echo "Exception Thrown : " . $e.getMessage();
	}
?>
