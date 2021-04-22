<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('article');
            $table->string('purpose');
            $table->string('img');
            $table->integer('mark_id');
            $table->integer('model_id');
            $table->string('type');
            $table->string('mark')->nullable();;
            $table->string('model')->nullable();;
            $table->string('capacity');
            $table->integer('vv')->nullable();
            $table->string('amperes')->nullable();
            $table->string('polarity')->nullable();
            $table->string('terminals')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('depth')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('trade_price');
            $table->integer('price');
            $table->boolean('popular')->default(0);
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
        Schema::dropIfExists('products');
    }
}
