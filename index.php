<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("server","localhost");
define("user","root");
define("password","root");
define("db","bitnami_wordpress");

require_once "comments_model.php";
require_once "comments_view.php";
require_once "database.php";

$db = new database();
$db->connect(server, user, password, db);
//list
if(isset($_GET['task']) && $_GET['task'] == 'add'){
	comments_model::add($db);
	comments_view::add($db);	
}elseif(isset($_GET['task']) && $_GET['task'] == 'edit'){
	$id = $_GET['id'];
	comments_model::edit($db,$id);
	comments_view::edit($db,$id);	
}elseif(isset($_GET['task']) && $_GET['task'] == 'delete'){
	$id = $_GET['id'];
	comments_model::delete($db,$id);
	comments_view::delete($db,$id);	
}else{
	comments_model::show_all($db);
	comments_view::show_all($db);
}
$db->close();

?>