<?php

class m140812_194557_custom_fields extends DbMigration
{
	public function up()
	{
        $this->createTable('{{custom_field_config}}',[
            'id'=>'pk',
            'entity'=>'VARCHAR(30) NOT NULL',
            'key'=>'VARCHAR(30) NOT NULL',
            'title'=>'VARCHAR(100) NOT NULL',
            'meta'=>'TEXT',
        ]);

        $this->createTable('{{custom_field}}',[
            'id'=>'pk',
            'entity'=>'VARCHAR(30) NOT NULL',
            'entity_id' => 'INT NOT NULL',
            'key'=>'VARCHAR(30) NOT NULL',
            'value'=>'VARCHAR(255) DEFAULT NULL',
        ]);

        $this->createIndex('cfc_eei','{{custom_field}}','entity, entity_id, key', true);

	}

	public function down()
	{
		$this->dropTable('{{custom_field}}');
		$this->dropTable('{{custom_field_config}}');
	}

}