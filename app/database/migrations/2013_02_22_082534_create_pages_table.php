<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
        public function up()
	{
	Schema::create("pages",function($table){
			
			   $table->increments("id");
                           $table->string("category",100);
                           $table->string("name");
                           $table->string("country");
                           $table->string("province");
                           $table->string("city");
                           $table->string("street");
			   $table->string("picture");
			   $table->integer("user_id");
			   $table->text("about");  
                           $table->boolean('credit')->default(0);
                           $table->boolean('parking')->default(0);
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
		Schema::drop("pages");
	}

}