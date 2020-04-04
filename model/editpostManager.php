<?php
require_once("model/Manager.php");
class EditPostManager extends Manager
{
	public function edit($article_title, $article_content)
	{
		$db = $this->dbconnect();
      	$inser = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
      	$inser->execute(array($article_title, $article_content));
      	return $inser;
	}
   
}
