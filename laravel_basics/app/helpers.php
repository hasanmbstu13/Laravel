<?php 

function flash($message, $level = 'info')
{
	session()->flash('flash_message', 'Here is my status.');
	session()->flash('flash_message_level', 'error');
}