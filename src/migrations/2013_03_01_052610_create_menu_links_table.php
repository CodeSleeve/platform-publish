<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuLinksTable extends Migration{

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('platform_menu_links', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('menu_id');
			$table->integer('page_id')->nullable();
			$table->string('title');
			$table->string('url');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('platform_menu_links');
	}

}