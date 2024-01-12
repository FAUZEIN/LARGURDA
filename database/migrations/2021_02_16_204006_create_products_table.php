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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_weight');
            $table->string('product_tags');
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_price');
            $table->string('product_discount')->nullable();
            $table->string('product_short_desc');
            $table->string('product_long_desc');
            $table->string('product_thambnail');
            $table->integer('product_promo')->nullable();
            $table->integer('new_product')->nullable();
            $table->integer('new_arrival')->nullable();
            $table->integer('best_seller')->nullable();
            $table->integer('status')->default(0);
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
