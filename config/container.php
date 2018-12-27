<?php

use Zend\ServiceManager\Config;
//use Zend\ServiceManager\ServiceManager;
use Zalt\Loader\ProjectOverloader;
use Gems\Rest\Legacy\ProjectOverloaderSourceContainer;

// Load configuration
$config = require __DIR__ . '/config.php';

/**
 * Define application environment
 */


if (! defined('APPLICATION_ENV')) {

    if (isset($config['project']) && isset($config['project']['environment'])) {
        $env = $config['project']['environment'];
    } else {
        $env = getenv('APPLICATION_ENV');
    }

    if (! $env) {
        $env = 'production';
    }

    define('APPLICATION_ENV', $env);
}

// Build container
$loader = new ProjectOverloaderSourceContainer([
	$config['project']['name'],
    'Gems',
    'MUtil',
]);



$loader->legacyClasses = true;
$loader->legacyPrefix = 'Legacy';

$container = $loader->createServiceManager();
(new Config($config['dependencies']))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);

// Inject the ProjectOverloader
$container->setService(ProjectOverloader::class, $loader);

// Set the used namespaces and a registry source in the \MUtil_Model
$source = new \Gems\Rest\Legacy\ServiceManagerRegistrySource($container);
\MUtil_Model::addNameSpace('Gems');
\MUtil_Model::addNameSpace($config['project']['name']);
\MUtil_Model::setSource($source);


return $container;
