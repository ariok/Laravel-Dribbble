<?php

//Set Class autoloading with the map to dribbble.class.php file
Autoloader::map(array(
	'Dribbble' => Bundle::path('dribbble').'dribbble.class.php',
));
