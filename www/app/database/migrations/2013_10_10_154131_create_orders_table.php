<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('orders')) {
			Schema::table("orders", function($table) {
				$table->create();
				$table->increments("id");
				$table->string("alt_id", 255)->collate('utf8_general_ci');
				$table->enum('typeof', array('revenue','expense'))->collate('utf8_general_ci')->default('revenue');
				$table->string("company", 255)->collate('utf8_general_ci');
				$table->string("name", 255)->collate('utf8_general_ci');
				$table->string("email", 255)->collate('utf8_general_ci');
				$table->string("pp_email", 255)->collate('utf8_general_ci');
				$table->string("pp_customer_name", 255)->collate('utf8_general_ci');
				$table->date('order_date');
				$table->enum('paid', array('off','on'))->collate('utf8_general_ci')->default('off');
				$table->enum('delivered', array('off','on'))->collate('utf8_general_ci')->default('off');
				$table->date('due_date');
				$table->decimal('subtotal', 12, 2);
				$table->decimal('tax', 12, 2);
				$table->decimal('total', 12, 2);
				$table->integer('user_id')->unsigned();
				$table->timestamps();

				$table->index('user_id');
				$table->index('alt_id');
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
		Schema::dropIfExists('orders');
	}

}