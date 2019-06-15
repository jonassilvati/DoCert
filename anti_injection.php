<?php

# Fun��o Anti MySQL Injection - Proteja suas aplica��es!
# Por Alexandro G. Correa - Porto Alegre - RS
# alex.linux (at) gmail.com
# 13/03/2009

function anti_injection($sql){
	$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$sql);
	$sql = trim($sql);
	$sql = strip_tags($sql);
	$sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
	return $sql;
}

?>