<?php

/**
 * Default GemsTracker project Escort class
 *
 * This is the class that is started for every execution
 *
 * Normal practice is to change all NewProject references to the project name
 *
 * @package    NewProject
 * @subpackage Escort
 * @copyright  Copyright (c) 2021 Project
 * @license    No free license, do not copy
 */

namespace NewProject;

/**
 *
 * @package    NewProject
 * @subpackage Escort
 * @copyright  Copyright (c) 2021 Project
 * @license    No free license, do not copy
 */
class Escort extends \GemsEscort implements
    \Gems_Project_Layout_SingleLayoutInterface,
    // \Gems_Project_Layout_MultiLayoutInterface,
    \Gems_Project_Tracks_MultiTracksInterface
    // \Gems_Project_Tracks_SingleTrackInterface
{
    /**
     * Set to true for bootstrap projects. Needs html5 set to true as well
     * @var boolean
     */
    public $useBootstrap = true;

    /**
     * Set to true for html 5 projects
     *
     * @var boolean
     */
    public $useHtml5 = true;
}