<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$git = new CzProject\GitPhp\Git;
		$repo = $git->cloneRepository('git@github.com:yllumi/nyoba.git', '/var/www/html/nyoba');
	}
}
