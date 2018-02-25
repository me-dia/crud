<?php

abstract class view{
	abstract static function show_all($db);
	abstract static function add($db);
	abstract static function edit($db,$id);
	abstract static function delete($db,$id);
}
?>