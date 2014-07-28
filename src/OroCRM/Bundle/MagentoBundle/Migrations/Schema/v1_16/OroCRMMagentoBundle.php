<?php

namespace OroCRM\Bundle\MagentoBundle\Migrations\Schema\v1_16;

use Doctrine\DBAL\Schema\Schema;

use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class OroCRMMagentoBundle implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $table = $schema->getTable('orocrm_magento_customer');
        $table->addColumn('organization_id', 'integer', ['notnull' => false]);
        $table->addIndex(['organization_id'], 'IDX_2A61EE7D32C8A3DE', []);
        $table->addForeignKeyConstraint($schema->getTable('oro_organization'), ['organization_id'],
            ['id'], ['onDelete' => 'SET NULL', 'onUpdate' => null]
        );

        $table = $schema->getTable('orocrm_magento_order');
        $table->addColumn('organization_id', 'integer', ['notnull' => false]);
        $table->addIndex(['organization_id'], 'IDX_4D09F30532C8A3DE', []);
        $table->addForeignKeyConstraint($schema->getTable('oro_organization'), ['organization_id'],
            ['id'], ['onDelete' => 'SET NULL', 'onUpdate' => null]
        );

        $table = $schema->getTable('orocrm_magento_cart');
        $table->addColumn('organization_id', 'integer', ['notnull' => false]);
        $table->addIndex(['organization_id'], 'IDX_96661A8032C8A3DE', []);
        $table->addForeignKeyConstraint($schema->getTable('oro_organization'), ['organization_id'],
            ['id'], ['onDelete' => 'SET NULL', 'onUpdate' => null]
        );
    }
}
