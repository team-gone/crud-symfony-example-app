<?php
	use Rocketeer\Facades\Rocketeer;
	
	Rocketeer::task('composer', 'composer install');
	Rocketeer::task('php bin/console', 'd:d:c --if-not-exists');
	Rocketeer::task('php bin/console', 'd:s:u');
	Rocketeer::task('php bin/console', 'cache:clear e=prod');