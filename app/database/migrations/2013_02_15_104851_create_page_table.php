<?php

use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("pages",function($table){
			
			   $table->increments("id");
                           $table->string("name");
			   $table->string("picture");
			   $table->integer("user_id");
			   $table->text("about");               
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
		Schema::drop("page");
	}

}