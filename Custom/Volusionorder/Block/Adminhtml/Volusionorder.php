<?php
namespace Custom\Volusionorder\Block\Adminhtml;
class Volusionorder extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_volusionorder';/*block grid.php directory*/
        $this->_blockGroup = 'Custom_Volusionorder';
        $this->_headerText = __('Volusionorder');
        $this->_addButtonLabel = __('Add New Item'); 
        parent::_construct();
        $this->buttonList->remove('add');		
    }
}
