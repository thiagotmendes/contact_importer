<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterContactTableAddRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_info', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_franchise');
            $table->foreign('id_franchise')->references('id')->on('franchise_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_info', function (Blueprint $table) {
            //
            $table->dropForeign('id_franchise');
        });
    }
}
