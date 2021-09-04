<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactInfoTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ContactInfoTest', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('date_birth', 155);
            $table->string('phone', 155);
            $table->string('address', 255);
            $table->string('credcard', 155);
            $table->string('franchise', 155);
            $table->string('email', 155);
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
        Schema::dropIfExists('ContactInfoTest');
    }
}
