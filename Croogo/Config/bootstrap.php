<?php

namespace Croogo\Croogo\Config;

use Cake\Log\Log;
use Croogo\Event\CroogoEventManager;
use Croogo\Lib\Croogo;
use Croogo\Lib\CroogoNav;
require_once 'croogo_bootstrap.php';

if (Configure::read('Croogo.installed')) {
	return;
}

// Load Install plugin
if (Configure::read('Security.salt') == 'f78b12a5c38e9e5c6ae6fbd0ff1f46c77a1e3' ||
	Configure::read('Security.cipherSeed') == '60170779348589376') {
	$_securedInstall = false;
}
Configure::write('Install.secured', !isset($_securedInstall));
Configure::write('Croogo.installed',
	file_exists(APP . 'Config' . DS . 'database.php') &&
	file_exists(APP . 'Config' . DS . 'settings.json') &&
	file_exists(APP . 'Config' . DS . 'croogo.php')
);
if (!Configure::read('Croogo.installed') || !Configure::read('Install.secured')) {
	Plugin::load('Install', array('routes' => true));
}