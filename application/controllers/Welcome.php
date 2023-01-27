<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo shell_exec('whoami');

		$git = new CzProject\GitPhp\Git;
		$repo = $git->cloneRepository('git@github.com:yllumi/nyoba.git', '/var/www/html/nyoba');
	}

	public function commit()
	{
		$git = new CzProject\GitPhp\Git;
		$repo = $git->open('/var/www/html/nyoba');
        if($repo->hasChanges()){
            $repo->addAllChanges();
            $repo->commit('Commit '.date("d F Y H:i:s"));
            echo "commited.";
        } else
            echo "nothing to commit.";
	}

	public function push()
	{
		$git = new CzProject\GitPhp\Git;
		$repo = $git->open('/var/www/html/nyoba');
		$repo->push(['origin', 'main']);
	}

	public function config()
	{
		$git = new CzProject\GitPhp\Git;
		$repo = $git->open('/var/www/html/nyoba');

		echo shell_exec('whoami');
		print_r($repo->execute('log'));
		print_r($repo->execute('config', '--global', 'user.name'));
		print_r($repo->execute('config', '--global', 'user.email'));
	}

}
