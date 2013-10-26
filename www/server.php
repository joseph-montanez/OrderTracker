<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

$paths = require __DIR__.'/bootstrap/paths.php';

$requested = $paths['public'].$uri;

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' and file_exists($requested))
{
	$parts = explode('.', $requested);
	$ext = strtolower(array_pop($parts));
	$type = 'text/plain';
	switch ($ext) {
		case 'css':
			$type = 'text/css';
			break;
		case 'js':
			$type = 'text/javascript';
			break;
	}
	header('Content-Type: ' . $type);
	die(file_get_contents($requested));
}

require_once $paths['public'].'/index.php';
