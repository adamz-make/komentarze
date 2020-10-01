


<?php


function __autoload($class)
{
	include_once($class .".php");
}


$name =$_POST['name'];
$satisfaction= $_POST['satisfaction'];
$comment =$_POST['comment'];


$saveComment = new SaveComment($name,$satisfaction,$comment);

$saveComment->addComment();
?>


<?php
class SaveComment
{
	private $name;
	private $satisfaction;
	private $comment;
	
	function __construct ($name,$satisfaction,$comment)
	{
		$this->name = $name;
		$this->satisfaction = $satisfaction;
		$this->comment = $comment;
				
	}
	
	
	
	
	function addComment()
	{
		CommentInFile::saveToFile($this->name, $this->satisfaction,$this->comment);
		
	}
}	
	
?>
<?php






?>






	






