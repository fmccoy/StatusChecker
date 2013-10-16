<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public $tableName = 'users';

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
                $table->string('email');
                $table->string('password');
                $table->string('first_name');
                $table->string('last_name');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @access   public
     * @return   void
     */
    public function down()
    {
        Schema::drop($this->tableName);
    }
}