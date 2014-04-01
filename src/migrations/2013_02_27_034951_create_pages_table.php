<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('platform_pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->string('layout')->nullable();
			$table->longText('content');
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
		Schema::drop('platform_pages');
	}

}