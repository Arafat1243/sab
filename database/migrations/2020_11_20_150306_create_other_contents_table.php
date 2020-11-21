<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_contents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee');
            $table->bigInteger('client');
            $table->longText('whatweare');
            $table->string('image');
            $table->longText('about');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_contents');
    }
}
