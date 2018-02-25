<?php

class database{
	function __construct(){
		$this->link = null;
		$this->result = null;
	}
	function connect($server, $user, $password, $db){
		$this->link = mysqli_connect($server, $user, $password, $db);
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		$this->result = mysqli_query($this->link, "sql_mode=\"\"");
	}
	function query($sql){
		$this->result = mysqli_query($this->link, $sql);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	function fetch(){
		 return  mysqli_fetch_assoc($this->result);
	}
	function free(){
		mysqli_free_result($this->result);
	}
	function close(){
		mysqli_close($this->link);
	}
}