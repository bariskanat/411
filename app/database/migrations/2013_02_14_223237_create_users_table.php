<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users",function($table){
			
                   $table->increments("id");
                   $table->string("username");
                   $table->string("firstname");
                   $table->string("lastname");
                   $table->text("about");
                   $table->string("email")->unique();
                   $table->string("password");
                   $table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("users");
	}

}