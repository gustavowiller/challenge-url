<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status', function (Blueprint $table) {
            $table->smallInteger('status_code')->nullable()->after('url');
            $table->text('body_response')->nullable()->after('status_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status', function (Blueprint $table) {
            $table->dropColumn('status_code');
            $table->dropColumn('body_response');
        });
    }
}
