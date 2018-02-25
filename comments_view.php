<?php
require_once "view.php";

class comments_view extends view {
	static function show_all($db){
		 while ($row = $db->fetch()){
			 //print_r($row);
			 foreach($row as $item)
			 	echo $item." ";
			 echo "<a href=\"?task=edit&id={$row["comment_ID"]}\">szerkeszt</a>";
			 echo "<a href=\"?task=delete&id={$row["comment_ID"]}\">töröl</a>";
			 echo "<br/>";
		 }
		 echo "<br/>";
		 echo "<a href=\"?task=add\">hozzáad</a>";
	}
	static function add($db){
		if(!isset($_POST["comment_ID"])){
			echo " <form action=\"?task=add\" method=\"post\">
			<input type=\"hidden\" name=\"comment_ID\"><br>
		  Author: <input type=\"text\" name=\"comment_author\"><br>
		  Content: <input type=\"text\" name=\"comment_content\"><br>
		  <input type=\"submit\" value=\"Submit\">
			</form> ";
		}else{
			echo "sikeres elem felvétele: ";
			echo "<a href=\"\">vissza</a>";		
		}
	}
	static function edit($db,$id){
		if(!isset($_POST["comment_ID"])){
			$row = $db->fetch();
			print_r($row);
			echo "<form action=\"?task=edit&id=$id\" method=\"post\">
			<input type=\"hidden\" name=\"comment_ID\" value=\"{$row["comment_ID"]}\"><br>
		  Author: <input type=\"text\" name=\"comment_author\" value=\"{$row["comment_author"]}\"><br>
		  Content: <input type=\"text\" name=\"comment_content\" value=\"{$row["comment_content"]}\"><br>
		  <input type=\"submit\" value=\"Submit\">
			</form> ";
		}else{
			echo "sikeres módositás ";
			echo "<a href=\"\">vissza</a>";
		}
	}
	static function delete($db,$id){
		if(!isset($_POST["comment_ID"])){
			echo "<form action=\"?task=delete&id=$id\" method=\"post\">
			<input type=\"hidden\" name=\"comment_ID\" value=\"$id\"><br>
		  <input type=\"submit\" value=\"Törlés\">
			</form> ";
		}else{
			echo "<a href=\"\">vissza</a>";
		}
	}
}
?>