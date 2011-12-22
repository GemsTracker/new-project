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
 * Gemms specific startup
 * - Defines GEMS project constants using Erasmus MC directory setup.
 * - Loads database login data.
 * - Goto pre_bootstrap.php
 *
 * @author Matijs de Jong <mjong@magnafacta.nl>
 * @since 1.0
 * @version 0.9
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
define('GEMS_LIBRARY_DIR', realpath(GEMS_ROOT_DIR . '/library/Gems'));

// Pretty project name
define('GEMS_PROJECT_NAME', 'newProject');
defined('GEMS_PROJECT_NAME_UC') || define('GEMS_PROJECT_NAME_UC', ucfirst(GEMS_PROJECT_NAME));

/**
 * Define application environment
 */
if (! defined('APPLICATION_ENV')) {
    if (getenv('APPLICATION_ENV')) {
        $env = getenv('APPLICATION_ENV');
    } else {
        // Erasmus MC processing
        if (strpos($_SERVER["HTTP_HOST"], 'survey') === false) {
            $env = 'testing';
        } else {
            $env = 'production';
        }
    }

    define('APPLICATION_ENV', $env);
}

/**
 * Load database login variables, Erasmus MC way.
 */
// require realpath(GEMS_ROOT_DIR . '/var/settings/db.inc.php');

/**
 * Start standard GEMS bootstrap.
 */
require GEMS_LIBRARY_DIR . '/pre_bootstrap.php';
