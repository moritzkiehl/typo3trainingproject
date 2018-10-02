<?php
defined('TYPO3_MODE') or die('Access denied.');
$fields = [

    'fewo-gallery' => [
        'label' => 'Gallery',
        'config' => [
            'type' => 'textmedia'
        ]
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);


$typeName = 'fewo-gallery';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Bildergalerie',
        $typeName,
    ),
    'CType',
    'uebungs_template'
);

$GLOBALS['TCA']['tt_content']['types'][$typeName] = array(
    'showitem' => '
        --palette--;;general,
        --palette--;Header;header,
        bodytext;Text,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
    
');