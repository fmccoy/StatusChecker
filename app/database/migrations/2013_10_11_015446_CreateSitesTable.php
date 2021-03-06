<?php

use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration {

	public $tableName = 'sites';

	public function __construct(){
		$this->tableName;
	}

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
				$table->string('created_by');
				$table->string('url');
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