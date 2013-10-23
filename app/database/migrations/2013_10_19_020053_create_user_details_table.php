<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_details', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 16);
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('address_line_1', 512);
            $table->string('address_line_2', 512);
            $table->string('address_line_3', 512);
            $table->string('city', 512);
            $table->string('country_name', 128);
            $table->string('country_iso', 3);
            $table->string('postcode', 16);
            $table->string('telephone_home', 32);
            $table->string('telephone_work', 32);
            $table->string('telephone_mobile', 32);
            $table->softDeletes();
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
		Schema::drop('user_details');
	}

}
