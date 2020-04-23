<?php
namespace OpenClassrooms\Blog\Model;
//chargement de la class Manager
require_once("model/Manager.php");

class ConnexionManager extends Manager
{
	public function connexion($pseudoconnect)
	{
		$db = $this->dbconnect();
      $requser = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
      $requser->execute(array($pseudoconnect));
      return $requser;
	}
   
}