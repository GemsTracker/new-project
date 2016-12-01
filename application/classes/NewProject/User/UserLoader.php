<?php

/**
 *
 *
 * @package    NewProject
 * @subpackage User
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 * @copyright  Copyright (c) 2015 Project
 * @license    Not licensed, do not copy
 */

namespace NewProject\User;

/**
 *
 *
 * @package    NewProject
 * @subpackage User
 * @copyright  Copyright (c) 2015 Project
 * @license    Not licensed, do not copy
 * @since      Class available since version 1.7.2 Mar 14, 2016 4:03:49 PM
 */
class UserLoader extends \Gems_User_UserLoader
{
    /**
     * When true a user is allowed to login to a different organization then the
     * one that provides an account. See GetUserClassSelect for the possible options
     * but be aware that duplicate accounts could lead to problems. To avoid
     * problems you can always use the organization switch AFTER login.
     *
     * @var boolean
     */
    public $allowLoginOnOtherOrganization = false;
}
