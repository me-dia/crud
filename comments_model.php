<?php
require_once "model.php";

class comments_model extends model {
	static function show_all($db){
		$sql = "select * from wp_comments";
		$db->query($sql);
	}
	
	static function add($db){
		if(isset($_POST["comment_ID"])){
			$sql = "insert into wp_comments (comment_author,comment_content) values (\"{$_POST['comment_author']}\",\"{$_POST['comment_content']}\");";
			echo $sql;
			$db->query($sql);
		}
	}
	static function edit($db,$id){
		if(!isset($_POST["comment_ID"])){
			$sql = "select * from wp_comments where comment_ID = $id";
			$db->query($sql);
		}else{
			$id = $_POST["comment_ID"];
			
			$sql = "update wp_comments SET comment_author = \"{$_POST["comment_author"]}\" ,comment_content = \"{$_POST["comment_content"]}\"  where comment_ID = $id";
			echo $sql;
			$db->query($sql);
		}
	}
	static function delete($db,$id){
		if(!isset($_POST["comment_ID"])){
			$sql = "delete from wp_comments where comment_ID = $id";
			$db->query($sql);
		}
	}
}
?>