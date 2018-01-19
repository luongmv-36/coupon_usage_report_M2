<?php
/**
 * luong Mai
 */
namespace Dtn\CouponReport\Model\ResourceModel\Coupon\Report;

class Collection extends \Magento\Sales\Model\ResourceModel\Order\Collection
{

    /**
     * Minimize usual count select
     *
     * @return \Magento\Framework\DB\Select
     */
    public function getSelectCountSql()
    {
        /* @var $countSelect \Magento\Framework\DB\Select */
        $countSelect = parent::getSelectCountSql();
        $countSelect->resetJoinLeft();
        return $countSelect;
    }

    /**
     * Custom Join table by luong
     */
    protected function _renderFiltersBefore() {
        $select = $this->getSelect();

        $couponCondition = array('neq'=>'');
        $couponBind = 'main_table.coupon_code';
        $this->addAttributeToFilter('coupon_code', $couponCondition);
        $select->joinLeft(array('r' => $this->getTable('salesrule_coupon')),
            $couponBind . ' = r.code',
            array('rule_id'=> 'r.rule_id'))
        ;
        $this->_joinFields['rule_id'] = array(
            'table'=> 'r',
            'field'=>'rule_id',
        );
        $select->joinLeft(array('c' => $this->getTable('salesrule')),
        'r.rule_id = c.rule_id',
            array('rule_name'=> 'c.name'))
        ;
        $this->_joinFields['rule_name'] = array(
            'table'=> 'c',
            'field'=>'name',
        );
        $select->joinLeft(array('t' => $this->getTable('sales_shipment_track')),
            'main_table.entity_id = t.order_id',
            array('track_number'=> 't.track_number'))
        ;
        $this->_joinFields['track_number'] = array(
            'table'=> 't',
            'field'=>'track_number',
        );
        $select->group('main_table.entity_id');
        $select->order('main_table.entity_id DESC');

        parent::_renderFiltersBefore();
    }


}