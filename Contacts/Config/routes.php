<?php

namespace Croogo\Contacts\Config;
// Contact
CroogoRouter::connect('/contact/*', array(
	'plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'view',
));
