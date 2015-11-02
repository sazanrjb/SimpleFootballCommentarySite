<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('commentary');
			$table->integer('mid')->unsigned();
			$table->foreign('mid')->references('id')->on('matches')->onUpdate('cascade')->onDelete('cascade');;
			$table->integer('time');
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
		Schema::drop('commentaries');
	}

}
