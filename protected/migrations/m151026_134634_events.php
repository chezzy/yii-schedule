<?php

class m151026_134634_events extends CDbMigration
{
	public function up()
	{
		$this->createTable('event', array(
			'id' => 'pk',
			'user_id' => 'integer',
			'title' => 'string',
			'data' => 'text',
			'time' => 'integer',
			'created' => 'integer',
			'updated' => 'integer'
		));

		$this->addForeignKey('event_users', 'event', 'user_id', 'users', 'id', NULL, 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		echo "m151026_134634_events does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}