<?php

use Illuminate\Database\Migrations\Migration;

class CreateEtsyCallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('etsy_calls')) {
			Schema::table("etsy_calls", function($table) {
				$table->create();
				$table->increments("id");
				$table->integer('user_id')->unsigned();
				$table->string("rpc", 255)->collate('utf8_general_ci');
				$table->datetime("started");
				$table->datetime("finished")->nullable();
				$table->text('results')->collate('utf8_general_ci');
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
		Schema::dropIfExists('etsy_calls');
	}

}