<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersUuidsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('users_uuids')) {
			Schema::table("users_uuids", function($table) {
				$table->create();
				$table->increments("id");
				$table->integer('user_id')->unsigned();
				$table->string("uuid", 255)->collate('utf8_general_ci');
				$table->text("session")->collate('utf8_general_ci');
				$table->timestamps();

				$table->index('user_id');
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
		Schema::dropIfExists('users_uuids');
	}

}