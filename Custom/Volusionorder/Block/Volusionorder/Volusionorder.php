<?php
/**
 * Copyright © 2015 Custom . All rights reserved.
 */
namespace Custom\Volusionorder\Block\Volusionorder;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Custom\Volusionorder\Model\ResourceModel\Volusionorder\CollectionFactory as ItemsCollectionFactory;

class Volusionorder extends Template
{
	protected $itemsCollectionFactory;
	
	protected $cmsCollectionFactory;
	
	protected $_customerSession;
	
	protected $_helperView;
	
	protected $currentCustomer;
	/** @var CustomerRepositoryInterface */
    protected $customerRepository;
    
    protected $httpContext;

    /**
     * @param \Sample\News\Model\Resource\Author\CollectionFactory $authorCollectionFactory
     * @param \Magento\Framework\UrlFactory $urlFactory
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        ItemsCollectionFactory $itemsCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Helper\Session\CurrentCustomer $currentCustomer,
        \Magento\Customer\Helper\View $helperView,
        \Magento\Framework\App\Http\Context $httpContext,
        Context $context,
        array $data = []
    )
    {
        $this->itemsCollectionFactory 	= $itemsCollectionFactory;  
        $this->currentCustomer = $currentCustomer;
        $this->_helperView = $helperView;
		$this->_customerSession = $customerSession;
		$this->httpContext = $httpContext;
        parent::__construct($context, $data);
    }
    
    public  function getVolusionOrder()
    {
        $valusionOrdercollection = array();
        if($this->customerLoggedIn())
        {       
           $customerEmail =  $this->currentCustomer->getCustomer()->getEmail();      

           if($customerEmail)
           {
               $valusionOrdercollection = $this->itemsCollectionFactory->create()->addFieldToSelect('*')
                ->addFieldToFilter(
                        'email',
                        $customerEmail
                    )->setOrder('order_id', 'ASC');
           }
        }
        return  $valusionOrdercollection;
    }
    
    public function customerLoggedIn()
    {
        return (bool)$this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
    }
    
    /**
     * Get the logged in customer
     *
     * @return \Magento\Customer\Api\Data\CustomerInterface|null
     */
    public function getCustomer()
    {
        try {
            return $this->currentCustomer->getCustomer();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }
    
    public function getName()
    {
        return $this->_helperView->getCustomerName($this->getCustomer());
    }
    /*
    public function beforeToHtml(\Magento\Theme\Block\Html\Topmenu $originalBlock) {
      $originalBlock->setTemplate('Custom_Megamenu::megamenu/topmenu.phtml');
    }*/
}
