<?php
if($_SERVER['QUERY_STRING'] === 'source'){
	$file = file_get_contents($pathtothisfile); //I know this isn't correct, but I'll figure it out later, I'm kinda drunk at the moment and really should sleep soon.
	preg_replace('@/\*HIDE(?:=(.*?))?\*/.*?/\*HIDE\*/@', '$1', $file);  //Again with the regex, drunk, don't care, I'll figure it out later.
	highlight_string($file);  //This is right. I'm 99% sure it's right damnit.
}
?>