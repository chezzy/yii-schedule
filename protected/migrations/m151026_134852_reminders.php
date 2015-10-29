<?php

class m151026_134852_reminders extends CDbMigration
{
	public function up()
	{
		$this->createTable('reminders', array(
			'id' => 'pk',
			'event_id' => 'integer',
			'offset' => 'integer',
			'time' => 'integer',
			'created' => 'integer',
			'updated' => 'integer'
		));

		$this->addForeignKey('reminder_events', 'reminders', 'event_id', 'event', 'id', NULL, 'CASCADE', 'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('event_users', 'event');
		$this->dropForeignKey('reminder_events', 'reminders');
		$this->dropTable('event');
		$this->dropTable('reminders');
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