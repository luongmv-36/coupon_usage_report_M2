<?php
/**
 * Luong Mai.
 * See COPYING.txt for license details.
 */
namespace Dtn\CouponReport\Block\Adminhtml\Coupon;

/**
 * Class Report
 * @package Dtn\CouponReport\Block\Adminhtml\Coupon
 */
class Report extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->removeButton('add');
    }
}
