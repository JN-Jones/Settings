<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveIsUserSettingFromSettingsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('settings', function (Blueprint $table) {
			$table->dropColumn('is_user_setting');
		});

		Schema::table('setting_values', function (Blueprint $table) {
			$table->unique(['setting_id', 'user_id'], 'setting_values_setting_id_user_id_unique');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('settings', function (Blueprint $table) {
			$table->boolean('is_user_setting')->default(false);
		});

		Schema::table('setting_values', function (Blueprint $table) {
			$table->dropForeign('setting_values_setting_id_foreign');
			$table->dropUnique('setting_values_setting_id_user_id_unique');
			$table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
		});
	}

}
