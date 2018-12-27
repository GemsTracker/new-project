<?php

use Gems\Rest\Legacy\LegacyFactory;
use Gems\Rest\Factory\ReflectionFactory;

defined('VENDOR_DIR') || define('VENDOR_DIR', GEMS_ROOT_DIR . '/vendor/');
defined('GEMS_LIBRARY_DIR') || define('GEMS_LIBRARY_DIR', VENDOR_DIR . '/gemstracker/gemstracker');
defined('MUTIL_LIBRARY_DIR') || define('MUTIL_LIBRARY_DIR', realpath(VENDOR_DIR . '/magnafacta/mutil/src'));
defined('APPLICATION_PATH') || define('APPLICATION_PATH', GEMS_ROOT_DIR . '/src/App');

defined('GEMS_PROJECT_NAME') || define('GEMS_PROJECT_NAME', 'newProject');
defined('GEMS_PROJECT_NAME_UC') || define('GEMS_PROJECT_NAME_UC', ucfirst(GEMS_PROJECT_NAME));

return [
    'dependencies' => [
        'factories' => [
            Gems_Loader::class => LegacyFactory::class,
            Gems_Project_ProjectSettings::class => LegacyFactory::class,
            Gems_Tracker::class => LegacyFactory::class,
            Gems_Events::class => LegacyFactory::class,
            Gems_Util::class => LegacyFactory::class,
            Gems_Util_BasePath::class => LegacyFactory::class,
            Gems_AccessLog::class => LegacyFactory::class,
            Gems_Agenda::class => LegacyFactory::class,
            Gems_Model::class => LegacyFactory::class,
            'LegacyCurrentUser' => LegacyFactory::class,
            Zend_Acl::class => LegacyFactory::class,
            Zend_Locale::class => LegacyFactory::class,
            Zend_Session_Namespace::class => LegacyFactory::class,
            'LegacyStaticSession' => LegacyFactory::class,
            Zend_Translate_Adapter::class => LegacyFactory::class,
            Zend_Translate::class => LegacyFactory::class,
            Gems_Log::class => LegacyFactory::class,
            Zend_Cache::class => LegacyFactory::class,
            Zend_View::class => LegacyFactory::class,
            Gems\Legacy\LegacyControllerMiddleware::class => ReflectionFactory::class,
        ],
        'aliases' => [
            'LegacyLoader' => Gems_Loader::class,
            'LegacyProject' => Gems_Project_ProjectSettings::class,
            'LegacyUtil' => Gems_Util::class,
            'LegacyAccessLog' => Gems_AccessLog::class,
            'LegacyAcl' => Zend_Acl::class,
            'LegacyAgenda' => Gems_Agenda::class,
            'LegacyBasepath' => Gems_Util_BasePath::class,
            'LegacyLocale' => Zend_Locale::class,
            'LegacyLogger' => Gems_Log::class,
            //'LegacyModel' => Gems_Model::class,
            'LegacySession' => Zend_Session_Namespace::class,
            'LegacyTracker' => Gems_Tracker::class,
            'LegacyEvents' => Gems_Events::class,
            'LegacyTranslate' => Zend_Translate::class,
            'LegacyTranslateAdapter' => Zend_Translate_Adapter::class,
            'LegacyCache' => Zend_Cache::class,
            'LegacyView' => Zend_View::class,
        ],
    ],
    'routes' => [
        [
            'name' => 'contact',
            'path' => '/contact',
            'middleware' => [
                Gems\Legacy\LegacyControllerMiddleware::class
            ],
            'options' => [
                'controller' => 'contact',
                'action' => 'index',
                'permission' => 'pr.all',
            ],
        ]
    ],
    'controllerDirs' => [
        'gems' => GEMS_LIBRARY_DIR . '/controllers',
    ],
];