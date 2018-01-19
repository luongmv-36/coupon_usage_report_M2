<?php
/**
 * Luong Mai
 */
namespace Dtn\CouponReport\Controller\Adminhtml\Post;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_initAction()->_addBreadcrumb(__('Coupon Usage Report'), __('Coupon Usage Report'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Coupon Usage Report'));
        $this->_view->renderLayout();
    }

    /**
     * @return $this
     */
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu('Dtn_CouponReport::coupon_report');
        return $this;
    }
}

