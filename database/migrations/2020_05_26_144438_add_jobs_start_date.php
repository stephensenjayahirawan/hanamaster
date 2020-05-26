<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobsStartDate extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobs', function (Blueprint $table) {
			$table->date('valid_from');
			$table->boolean('is_deleted');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobs', function (Blueprint $table) {
			$table->dropColumn('valid_from');
			$table->dropColumn('is_deleted');
		});
	}
}
