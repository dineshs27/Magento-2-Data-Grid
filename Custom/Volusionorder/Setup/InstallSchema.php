<?php
/**
 * Copyright © 2015 Custom. All rights reserved.
 */

namespace Custom\Volusionorder\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
	
        $installer = $setup;

        $installer->startSetup();

		/**
         * Create table 'megamenu_megamenu'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('custom_volusionorder_volusionorder')
        )
		->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Id'
        )
		->addColumn(
            'order_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Order ID'
        )
        ->addColumn(
            'order_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            '64k',
            [],
            'Order Date'
        )
		->addColumn(
            'customer_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            '64k',
            [],
            'Customer Id'
        )
		
        ->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Email'
        )
		->addColumn(
            'shipping_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Shipping Name'
        )        
     	->addColumn(
            'total_amount',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '64k',
            [],
            'Total Amount'
        )
		
		
        
        
		/*{{CedAddTableColumn}}}*/
		
		
        ->setComment(
            'Custom Volusionorder volusionorder_volusionorder'
        );
		
		$installer->getConnection()->createTable($table);
		/*{{CedAddTable}}*/

        $installer->endSetup();

    }
}
