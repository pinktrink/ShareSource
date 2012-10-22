<?php
/* Copyright 2011 Eric Kever
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Basically what ShareSource does is it allows anyone to view the PHP source code of a file.
// Now obviously there are security risks that go along with this.
// To mitigate that, there are a few options:
//
// /*HIDE*/important code here/*HIDE*/ will hide the code entirely.
//
// /*HIDE=you can't see this*/important code here /*HIDE*/ will display /*you can't see this*/ instead of the code.
//
// /*HIDE=!##you can't see this##*/important code here/*HIDE*/ will display ##you can't see this## instead of the code.
//
// Essentially, if you add ! in front of the display string, it will not wrap the display string with /* and */
//
// Have fun!
if($_SERVER['QUERY_STRING'] === 'source'){
	$file = file_get_contents($_SERVER['SCRIPT_FILENAME']);
	if($_SERVER['SCRIPT_FILENAME'] !== __FILE__){
		$file = preg_replace_callback('@/\*HIDE(?:=(.+?))?\*/.*?/\*HIDE\*/@', function($match){
			return empty($match[1]) ? '' : ($match[1][0] === '!' ? substr($match[1], 1) : "/*{$match[1]}*/");
		}, $file);
	}
	highlight_string($file);
	die;
}
?>
