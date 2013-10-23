<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->string('profile_picture');
            $table->text('bio');
            $table->string('signature', 512);
            $table->string('website_url', 256);
            $table->string('facebook_url', 256);
            $table->string('twitter_url', 256);
            $table->string('linkedin_url', 256);
            $table->string('instagram_url', 256);
            $table->string('google_plus_url', 256);
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
		Schema::drop('user_profiles');
	}

}
