<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */
namespace Custom\Volusionorder\Model\ResourceModel;

/**
 * Megamenu resource
 */
class Volusionorder extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('custom_volusionorder_volusionorder', 'id');
    }

  
}
