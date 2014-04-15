<?php

require 'vendor/autoload.php';

$config = require 'config.php';

$app = new \Slim\Slim($config);

// Main Intro Closure
$execute = function ($path = array()) use ($app)
{
	// Get assets path
	$baseUri = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));

	$template = implode('/', $path);

	$template = $template ? : 'index';

	$data = array(
		'path'   => $path,
		'uri'    => array('base' => $baseUri),
		'helper' => new DI\Helper()
	);

	$app->render($template . '.twig', $data);
};

// For Home
$app->get('/', $execute);

// For inner pages
$app->get('/:path+', $execute);

$app->run();