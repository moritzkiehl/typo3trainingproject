<?php

namespace Moritzkiehl\Typo3trainingproject\ViewHelpers;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Category\Collection\CategoryCollection;

/**
 * This viewhelper returns the categories a elements has.
 */
class CategoriesViewHelper extends AbstractViewHelper

    /**
     * @return void
     */
{
    public function initializeArguments()
    {
        $this->registerArgument("elementID", "mixed", "The ID of the Element which should be checked for Categories", true);
    }

    public function render(){
        $categoryCollection = new CategoryCollection("tt_content", "categories" );
        $categories = $categoryCollection::load($this->arguments[elementID],false,"sys_category","uid");
        return $categories;
    }

}

