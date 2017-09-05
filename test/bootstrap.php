<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author 175780
 */
define('GEMS_PROJECT_NAME', 'NewProject');

defined('GEMS_TIMEZONE') || define('GEMS_TIMEZONE', 'Europe/Amsterdam');
date_default_timezone_set(GEMS_TIMEZONE);

defined('GEMS_ROOT_DIR') || define('GEMS_ROOT_DIR', dirname(__DIR__));

/**
 * Load database login variables, Erasmus MC way.
 */
require realpath(GEMS_ROOT_DIR . '/var/settings/db.inc.php');

/**
 * Load location dependent test values
 */
require realpath(GEMS_ROOT_DIR . '/var/settings/testing.inc.php');

include GEMS_ROOT_DIR . '/vendor/gemstracker/gemstracker/tests/library/project-bootstrap.php';

// Needed for url output while checking for errors, etc...
$_SERVER['SERVER_NAME'] = SERVER_NAME;
