<?php

/**
 * Default GemsTracker project Respondent Model
 *
 * Normal practice is to change all NewProject references to the project name
 *
 * @package    NewProject
 * @subpackage Model
 * @copyright  Copyright (c) 2021 Project
 * @license    No free license, do not copy
 */

namespace NewProject\Model;

/**
 *
 * @package    NewProject
 * @subpackage Model
 * @copyright  Copyright (c) 2021 Project
 * @license    No free license, do not copy
 */
class RespondentModel extends \Gems_Model_RespondentNlModel
{
   /**
     * Set those settings needed for the browse display
     *
     * @return \Gems_Model_RespondentModel
     * /
    public function applyBrowseSettings()
    {
        parent::applyBrowseSettings();

        $this->applyProjectSettings();

        return $this;
    }

    /**
     * Set those settings needed for the detailed display
     *
     * @return \Gems_Model_RespondentModel
     * /
    public function applyDetailSettings()
    {
        parent::applyDetailSettings();

        $this->applyProjectSettings();

        return $this;
    }

    /**
     * Set those values needed for editing
     *
     * @param boolean $create True when creating
     * @return \Gems_Model_RespondentModel
     * /
    public function applyEditSettings($create = false)
    {
        parent::applyEditSettings($create);

        // parent::applyEditSettings($create) calls parent::applyDetailSettings() which may call applyProjectSettings()
        // $this->applyProjectSettings();

        return $this;
    }

    /**
     * Set those settings needed for the detailed display
     *
     * @return \Gems_Model_RespondentModel
     * /
    protected function applyProjectSettings()
    {
        //$this->del();

        $echo = array(
            'Yes' => $this->_('Yes'),
            'No'  => $this->_('No'),
            ''    => $this->_('Unknown'),
        );
        $this->set('gr2o_echo', 'label', $this->_('Echo'),
                'description', $this->_('Patient consents to echo'),
                'elementClass', 'Radio',
                'multiOptions', $echo,
                'order', $this->getOrder('gr2o_consent') + 1,
                'separator', ' '
                );
    } // */
}
