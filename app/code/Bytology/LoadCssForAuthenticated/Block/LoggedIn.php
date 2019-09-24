<?php

namespace Bytology\LoadCssForAuthenticated\Block;

use Magento\Framework\View\Element\{Template, Template\Context};

/**
 * Class LoggedIn
 */
class LoggedIn extends Template
{
    /**
     * Extend the parent
     *
     * @return void
     */
    protected function _construct() {
      $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
      $page = $objectManager->get('Magento\Framework\View\Page\Config');
      $page->addPageAsset('Bytology_LoadCssForAuthenticated::css/color_homepage_search_input.css');
    }
}