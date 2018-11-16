<?php

namespace Moritzkiehl\Typo3trainingproject\ViewHelpers;


use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * This viewhelper returns the categories a elements has.
 */
class HelloWorldViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;
    /**
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument("text", "String", "Text to output and transform uppercase", true);
    }

    /**
     * @return mixed
     */
//SELECT title from sys_category JOIN sys_category_record_mm on sys_category.uid = sys_category_record_mm.uid_local where sys_category_record_mm.uid_foreign = 1
    public function render()
    {
        return strtoupper($this->arguments["text"]);
    }
}

