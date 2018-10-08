    <?php
    $EM_CONF[$_EXTKEY] = [
        'title' => 'Typo3trainingproject',
        'description' => 'Extension um den Umgang mit TYPO3 zu verbessern',
        'category' => 'template',
        'constraints' => [
            'depends' => [
                'typo3' => '9.5.0',
            ],
            'conflicts' => [
            ],
        ],
        'autoload' => [
        ],
        'state' => 'stable',
        'uploadfolder' => 0,
        'createDirs' => '',
        'clearCacheOnLoad' => 1,
        'author' => 'Moritz Kiehl',
        'author_email' => 'moritz.kiehl@werkraum.net',
        'author_company' => 'werkraum GmbH',
        'version' => '0.0.1',
    ];