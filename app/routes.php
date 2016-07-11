<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		["GET|POST", "/admin/", "Admin#admin", "admin_admin"]
	);