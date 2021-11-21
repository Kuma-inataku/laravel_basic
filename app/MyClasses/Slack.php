<?php

namespace App\MyClasses;

class Slack implements Message
{
	public function send(){
		dd('something happens by Slack');
	}
}