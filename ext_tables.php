<?php
/**
 *   Copyright (c) 2018.  Lukas Niestroj <lukas.niestroj@werkraum.net>
 *   All rights reserved
 *   This script is part of the TYPO3 project. The TYPO3 project is
 *   free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 3 of the License, or
 *   (at your option) any later version.
 *   The GNU General Public License can be found at
 *   http://www.gnu.org/copyleft/gpl.html.
 *   This script is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *   This copyright notice MUST APPEAR in all copies of the script!
 *
 */
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR: EXT:' . $_EXTKEY . '/Configuration/TSConfig/Page" extensions="tsconfig">');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT: source="DIR: EXT:' . $_EXTKEY . '/Configuration/TSConfig/User" extensions="tsconfig">');
