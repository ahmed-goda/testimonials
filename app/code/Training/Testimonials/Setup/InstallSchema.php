<?php

namespace Training\Testimonials\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Db\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable(
            $setup->getTable('testimonials')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity'=> true, 'nullable'=> false, 'primary'=> true],
            'Record ID'
        )
        ->addColumn(
            'full_name',
            Table::TYPE_TEXT,
            255,
            ['nullable'=> false],
            'NAME OF THE PERSON GIVING THE TESTIMONIAL'
        )
        ->addColumn(
            'testimonial_text',
            Table::TYPE_TEXT,
            255,
            ['nullable'=> false],
            'THE TESTIMONIAL DATA'
        )
        ->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable'=> false, 'default'=> Table::TIMESTAMP_INIT],
            'TIME CREATED'
        )
        ->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable'=> false, 'default'=> Table::TIMESTAMP_INIT_UPDATE],
            'TIME UPDATED'
        )
        ->setComment('Testimonials Table');
        
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}