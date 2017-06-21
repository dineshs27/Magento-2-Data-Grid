<?php
namespace Custom\Volusionorder\Block\Adminhtml\Volusionorder\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('checkmodule_volusionorder_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Volusionorder Information'));
    }
}
