<?php

namespace Moritzkiehl\Typo3trainingproject\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;

/**
 * This viewhelper returns the categories a elements has.
 */
class CategoriesViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    /**
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument("elementID", "int", "The ID of the Element which should be checked for Categories", true);
    }

    /**
     * @return mixed
     */
//SELECT title from sys_category JOIN sys_category_record_mm on sys_category.uid = sys_category_record_mm.uid_local where sys_category_record_mm.uid_foreign = 1
    public function render()
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_categorie');

        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add(GeneralUtility::makeInstance(DeletedRestriction::class));
        $categories = $queryBuilder->select("title")
            ->from("sys_category")
            ->join("sys_category","sys_category_record_mm","sys_category_record_mm","sys_category.uid = sys_category_record_mm.uid_local")
            ->where("sys_category_record_mm.uid_foreign = ".$this->arguments["elementID"])
            ->execute()
            ->fetchAll();
        return $categories;

    }

}

