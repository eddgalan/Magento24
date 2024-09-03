<?php
declare(strict_types=1);

namespace Alpha\MyModule\Controller\Adminhtml\Subscription;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Controller for the 'alpha/subscription/index' URL route.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'Alpha_MyModule::subscription';

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute controller action.
     *
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(self::ADMIN_RESOURCE);
        $resultPage->addBreadcrumb(__('Grid Subscriptions'), __('Grid Subscriptions'));
        $resultPage->addBreadcrumb(__('Manage Subscriptions'), __('Subscriptions'));
        return $resultPage;
    }

    /**
     * @return bool
     */
    public function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
        // return parent::_isAllowed();
    }
}
