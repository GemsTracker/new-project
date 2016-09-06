<?php

/**
 * Default Gemstracker project Escort class
 *
 * This is the class that is started for every execution
 *
 * Normal practice is to change all NewProject references to the project name
 *
 * @package    NewProject
 * @subpackage Escort
 * @copyright  Copyright (c) 2016 Reward
 * @license    No free license, do not copy
 */
class NewProject_Escort extends \GemsEscort implements
    \Gems_Project_Layout_SingleLayoutInterface,
    // \Gems_Project_Layout_MultiLayoutInterface,
    \Gems_Project_Tracks_MultiTracksInterface
    // \Gems_Project_Tracks_SingleTrackInterface
{
    public $useBootstrap = true;

    public $useHtml5 = true;
}