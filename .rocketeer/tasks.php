<?php
	use Rocketeer\Facades\Rocketeer;

	Rocketeer::task('composer', 'composer install');
	Rocketeer::task('create database', 'php bin/console d:d:c --if-not-exists');
	Rocketeer::task('update database', 'php bin/console d:s:u');
	Rocketeer::task('clear cache', 'php bin/console cache:clear e=prod');