<?php
if($_SERVER['QUERY_STRING'] === 'source'){
	$file = file_get_contents($_SERVER['SCRIPT_FILENAME']);
	preg_replace_callback('@/\*HIDE(?:=(.+?))?\*/.*?/\*HIDE\*/@g', function($match){
		return empty($match[1]) ? '' : "/*{$match[1]}*/";
	}, $file);
	highlight_string($file);
	die;
}
?>
