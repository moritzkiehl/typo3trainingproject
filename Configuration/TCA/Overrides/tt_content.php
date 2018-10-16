<?php
defined('TYPO3_MODE') or die('Access denied.');
$fields = [

    'fewo-gallery' => [
        'label' => 'Gallery',
        'config' => [
            'type' => 'textmedia'
        ]
    ],
    'category-filter' => [
        'label' => 'Select',
        'config' => [
            'type' => 'Header'
        ]
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);

// Ferienwohnung Gallery
$typeName = 'fewo-gallery';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Bildergalerie',
        $typeName,
    ),
    'CType',
    'typo3trainingproject'
);

$GLOBALS['TCA']['tt_content']['types'][$typeName] = array(
    'showitem' => '
        --palette--;;general,
        --palette--;Header;header,
        bodytext;Text,
        categories;Kategorien,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,


    
');
//category-filter
$typeName = 'category-filter';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'CategoryFilter',
        $typeName,
    ),
    'CType',
    'typo3trainingproject'
);

$GLOBALS['TCA']['tt_content']['types'][$typeName] = array(
    'showitem' => '
        --palette--;;general,
        --palette--;Header;header,
        categories;Kategorien,
    
');