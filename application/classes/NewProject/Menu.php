<?php

/**
 * Default Gemstracker project Menu class
 *
 * Normal practice is to change all NewProject references to the project name
 *
 * @package    NewProject
 * @subpackage Menu
 * @copyright  Copyright (c) 2016 Project
 * @license    No free license, do not copy
 */

namespace NewProject;

/**
 *
 * @package    NewProject
 * @subpackage Menu
 * @copyright  Copyright (c) 2016 Project
 * @license    No free license, do not copy
 */
class Menu extends \Gems_Menu {

    public function loadProjectMenu()
    {
        /**
         * This is where you add your own controllers and actions to the menu
         * take a look at the loadDefaultMenu() action to see how it is done
         * Keep in mind that menu items and privileges are tightly connected so a
         * new privilege means you have to update the New_project/Roles.php too!
         */
    }
}