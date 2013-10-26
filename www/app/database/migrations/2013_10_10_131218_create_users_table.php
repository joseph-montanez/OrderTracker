<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasColumn('users', 'first_name')) {
			Schema::table('users', function($table) {
				$table->string('etsy_token', 255)->collate('utf8_general_ci')->nullable();
				$table->string('etsy_token_secret', 255)->collate('utf8_general_ci')->nullable();
				$table->string('first_name', 255)->collate('utf8_general_ci')->nullable();
				$table->string('last_name', 255)->collate('utf8_general_ci')->nullable();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function($table) {
			$table->dropColumn('first_name', 'last_name', 'etsy_token', 'etsy_token_secret');
		});
	}

}
