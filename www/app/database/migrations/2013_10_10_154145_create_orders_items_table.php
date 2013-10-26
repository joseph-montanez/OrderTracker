<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('orders_items')) {
			Schema::table("orders_items", function($table) {
				$table->create();
				$table->increments("id");
				$table->string("alt_id", 255)->collate('utf8_general_ci');
				$table->enum('typeof', array('revenue','expense'))->collate('utf8_general_ci')->default('revenue');
				$table->smallInteger('qty');
				$table->string("name", 255)->collate('utf8_general_ci');
				$table->text("description")->collate('utf8_general_ci');
				$table->decimal('cost', 12, 2);
				$table->integer('order_id')->unsigned();
				$table->integer('user_id')->unsigned();

				$table->index('order_id');
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
		Schema::dropIfExists('orders_items');
	}

}