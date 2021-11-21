<?php

namespace App\MyClasses;

class Mail implements Message
{
	public function send(){
		dd('something happens by Mail');
	}
}