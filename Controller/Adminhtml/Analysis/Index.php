<?php
/**
 * Copyright (C) EC Brands Corporation - All Rights Reserved
 * Contact Licensing@ECInternet.com for use guidelines
 */
declare(strict_types=1);

namespace ECInternet\Analysis\Controller\Adminhtml\Analysis;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Adminhtml Analysis controller
 */
class Index extends Action implements HttpGetActionInterface
{
    const MENU_ID = 'ECInternet_Analysis::index';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Index constructor.
     *
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);

        $this->_resultPageFactory = $resultPageFactory;
    }

    protected function _isAllowed()
    {
        return true;
    }

    /**
     * Load the page defined in view/adminhtml/layout/analysis_index_index.xml
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();

        // Active menu
        $resultPage->setActiveMenu(static::MENU_ID);

        // Page title
        $resultPage->getConfig()->getTitle()->prepend(__('Magento Analysis Tools'));

        return $resultPage;
    }
}
