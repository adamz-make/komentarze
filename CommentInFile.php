<?php
 class CommentInFile
{
	private const path = "Comments.txt";
	
	
	
	static function saveToFile($name,$satisfaction,$comment)
	{
		$file = fopen(self::path,"a");
		fwrite($file,"Poczatek \n Imię: $name \n Data: ".date("Y-m-d H:i:s") ."\n satisf: $satisfaction \n komentarz: $comment \n koniec\n");
		fclose($file);
		
		
	}
	
	static function readComments()
	{
	$date="";
	$name="";
	$satisfaction="";
	$comment="";
	
	$file = fopen(self::path,"r");
	do
	{
		$koniec= true;
		CommentInFile::rFile($file,$date,$name,$satisfaction,$comment,$koniec);
		echo "<table BORDER = 5> <td>$date $name $satisfaction</td></table>";
		echo "<table BORDER = 5><td>$comment</td></table>";
		echo "<br>";
	
	}while ($koniec== false);	
	

	fclose($file);
	
	}
	
	static function rFile($file,&$date,&$name,&$satisfaction,&$comment, &$koniec)
	{
		
		$koniec = false;
		static $pointer;
		fseek($file,$pointer);
		$linia = fgets($file);
		do		
		{
			if (substr($linia,0,strlen(" koniec")) ==" koniec")
			{
				break;
			}
			if (substr($linia,0,strlen(" Imię:")) == " Imię:")
			{
				$name = substr($linia,strlen(" Imię:")+1);
			}
			elseif (substr($linia,0,strlen(" Data:")) == " Data:")
			{
				$date = substr($linia,strlen(" Data:")+1);
			}
			elseif (substr($linia,0,strlen(" satisf:")) == " satisf:")
			{
				$satisfaction = substr($linia,strlen(" satisf:")+1);
			}
			elseif (substr($linia,0,strlen(" komentarz:")) == " komentarz:")
			{
				$comment = substr($linia,strlen(" komentarz:")+1);
			}
			$linia = fgets($file);
		}while ($linia!=false && $linia!=" koniec");
		
		$pointer = ftell($file);
		if ($pointer==filesize(self::path))
		{
			$koniec= true;
		}
	}

}

?>
