<?php

/**
 * Copyright (c) 2011, Erasmus MC
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *    * Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the
 *      documentation and/or other materials provided with the distribution.
 *    * Neither the name of Erasmus MC nor the
 *      names of its contributors may be used to endorse or promote products
 *      derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

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
 * @version $Id$
 * @package Gems
 * @subpackage boot
 */

/**
 * The directory where the public server code runs.
 *
 * I.e. the directory where index.php is stored.
 */
define('GEMS_WEB_DIR', dirname(__FILE__));
define('GEMS_ROOT_DIR', realpath(GEMS_WEB_DIR . '/../'));

// Internal pretty project name - no spaces etc., will be used for tags and IDs!
// @TODO: Set project name
define('GEMS_PROJECT_NAME', 'newProject');

/**
 * Load database login variables and optional local variables
 */
require realpath(GEMS_ROOT_DIR . '/var/settings/db.inc.php');


/**
 * Define application environment
 */
if (! defined('APPLICATION_ENV')) {
    $env = getenv('APPLICATION_ENV');

    if (! $env) {
        // Erasmus MC processing
        if (isset($_SERVER["HTTP_HOST"]) && (strpos($_SERVER["HTTP_HOST"], 'survey') === false)) {
            $env = 'testing';
        } else {
            $env = 'production';
        }
    }

    define('APPLICATION_ENV', $env);
}

defined('GEMS_TIMEZONE') || define('GEMS_TIMEZONE', 'Europe/Amsterdam');
defined('VENDOR_DIR') || define('VENDOR_DIR', realpath(GEMS_ROOT_DIR . '/vendor/'));
defined('GEMS_LIBRARY_DIR') || define('GEMS_LIBRARY_DIR', realpath(VENDOR_DIR . '/gemstracker/gemstracker'));
defined('MUTIL_LIBRARY_DIR') || define('MUTIL_LIBRARY_DIR', realpath(VENDOR_DIR . '/magnafacta/mutil/src'));

/**
 * Always set the system timezone!
 */
date_default_timezone_set(GEMS_TIMEZONE);

/**
 * Start standard GEMS bootstrap.
 */
require GEMS_LIBRARY_DIR . '/pre_bootstrap.php';
