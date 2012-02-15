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
 *
 *
 * @package    Gems
 * @subpackage Events
 * @author     Matijs de Jong <mjong@magnafacta.nl>
 * @copyright  Copyright (c) 2011 Erasmus MC
 * @license    New BSD License
 * @version    $Id: Sample.php 203 2011-07-07 12:51:32Z matijs $
 */

/**
 * This events look for a previous copy of the same
 *
 *
 * @package    Gems
 * @subpackage Events
 * @copyright  Copyright (c) 2011 Erasmus MC
 * @license    New BSD License
 * @since      Class available since version 1.4.4
 */
class GetPreviousAnswers extends MUtil_Registry_TargetAbstract implements Gems_Event_SurveyBeforeAnsweringEventInterface
{
    /**
     * Set as this is a MUtil_Registry_TargetInterface
     *
     * @var Zend_Translate $translate
     */
    protected $translate;

    /**
     * A pretty name for use in dropdown selection boxes.
     *
     * @return string Name
     */
    public function getEventName()
    {
        return $this->translate->_('Previous Version Answers Lookup');
    }

    /**
     * Process the data and return the answers that should be filled in beforehand.
     *
     * Storing the changed values is handled by the calling function.
     *
     * @param Gems_Tracker_Token $token Gems token object
     * @return array Containing the changed values
     */
    public function processTokenInsertion(Gems_Tracker_Token $token)
    {
        if ($token->hasSuccesCode() && (! $token->isCompleted())) {
            // Preparation for a more general object class
            $surveyId   = $token->getSurveyId();

            $prev = $token;
            while ($prev = $prev->getPreviousToken()) {

                if ($prev->hasSuccesCode() && $prev->isCompleted()) {
                    // Check first on survey id and when that does not work by name.
                    if ($prev->getSurveyId() == $surveyId) {
                        return $prev->getRawAnswers();
                    }
                }
            }
        }
    }
}
