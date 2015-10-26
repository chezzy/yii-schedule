<?php

class m151026_134254_users extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
			'id' => 'pk',
			'email' => 'string',
			'password' => 'string',
			'created' => 'integer',
			'updated' => 'integer'
		));	
		
		$this->createIndex('email_index', 'users', 'email', true);
	}

	public function down()
	{
		$this->dropTable('users');
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