<?php

use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration {

	public $tableName = 'status';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if( ! Schema::hasTable($this->tableName)){

			Schema::create($this->tableName, function($table){
				$table->increments('id');
				$table->string('request_id');
				$table->string('error_id');
				$table->string('error_resolved');
				$table->string('response_code');
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->tableName);
	}

}