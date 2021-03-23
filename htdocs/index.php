<?php

/**
 * Project root file
 *
 * Gems specific startup
 * - Defines GEMS project constants
 * - Loads database login data
 * - Initiate the bootstrapping
 *
 * @author Matijs de Jong <mjong@magnafacta.nl>
 * @since 1.0
 * @package Gems
 * @subpackage Boot
 */

/**
 * The directory where the public server code runs.
 *
 * I.e. the directory where index.php is stored.
 */
define('GEMS_WEB_DIR', __DIR__);
define('GEMS_ROOT_DIR', dirname(GEMS_WEB_DIR));

// Internal pretty project name - no spaces etc., will be used for tags and IDs!
// @TODO: Set project name
define('GEMS_PROJECT_NAME', 'newProject');

/**
 * Load database login variables and optional local variables
 */
require realpath(GEMS_ROOT_DIR . '/var/settings/db.inc.php');
defined('DBPORT') || define('DBPORT', 3306);

/**
 * Define application environment for Erasmus MC
 */
//if (! defined('APPLICATION_ENV')) {
//    $env = getenv('APPLICATION_ENV');
//
//    if (! $env) {
//        // Erasmus MC processing
//        if (isset($_SERVER["HTTP_HOST"]) && (strpos($_SERVER["HTTP_HOST"], 'survey') === false)) {
//            $env = 'testing';
//        } else {
//            $env = 'production';
//        }
//    }
//
//    define('APPLICATION_ENV', $env);
//}

// Default values, required in index.php
defined('GEMS_TIMEZONE') || define('GEMS_TIMEZONE', 'Europe/Amsterdam');
defined('VENDOR_DIR') || define('VENDOR_DIR', GEMS_ROOT_DIR . '/vendor/');
defined('GEMS_LIBRARY_DIR') || define('GEMS_LIBRARY_DIR', VENDOR_DIR . '/gemstracker/gemstracker');

/**
 * Always set the system timezone!
 */
date_default_timezone_set(GEMS_TIMEZONE);

/**
 * Optional settings
 */
set_include_path('.');
ini_set('error_log', GEMS_ROOT_DIR . '/var/logs/php_errors.log');

/**
 * Start standard GEMS bootstrap.
 */
require GEMS_LIBRARY_DIR . '/pre_bootstrap.php';
