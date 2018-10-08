<?php
defined('TYPO3_MODE') || die();

call_user_func(function()
{
    /**
     * Temporary variables
     */

    /**
     * Default TypoScript for Bob
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'typo3trainingproject',
        'Configuration/TypoScript',
        'Moritz Übungsextension'
    );
});
