<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('model')->nullable();
            $table->integer('serial_number')->nullable();
            $table->integer('year')->nullable();
            $table->integer('price')->default(0);
            $table->string('photo')->nullable();
            $table->string('description')->nullable();
            $table->integer('brand_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_type_id_foreign');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_brand_id_foreign');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::drop('products');
    }
}
