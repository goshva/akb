<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('mark_id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('generation_id');
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
        Schema::dropIfExists('engines');
    }
}
