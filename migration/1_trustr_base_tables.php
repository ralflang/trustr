<?php
/**
 * Create Trustr base tables.
 *
 * Copyright 2012-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.horde.org/licenses/gpl.
 *
 * @author  Ralf Lang <lang@b1-systems.de>
 * @category Horde
 * @package  Trustr
 */
class TrustrBaseTables extends Horde_Db_Migration_Base
{
    /**
     * Upgrade
     */
    public function up()
    {
        $t = $this->createTable('trustr_items', array('autoincrementKey' => 'item_id'));
        $t->column('item_owner', 'string', array('limit' => 255, 'null' => false));
        $t->column('item_data', 'string', array('limit' => 64, 'null' => false));
        $t->end();

        $this->addIndex('trustr_items', array('item_owner'));
    }

    /**
     * Downgrade
     */
    public function down()
    {
        $this->dropTable('trustr_items');
    }
}
