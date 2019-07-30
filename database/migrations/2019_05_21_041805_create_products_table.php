<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('product_id');
            $table->Integer('category_id');
            $table->Integer('sub_category_id');
            $table->Integer('color_id');
            $table->Integer('size_id');
            $table->Integer('brand_id');
            $table->Integer('item_company_id');
            $table->string('product_name');
            $table->string('code');
            $table->double('purchase_price',8,2);
            $table->double('sale_price',8,2);
            $table->double('discount',8,2);
            $table->Integer('quantity');
            $table->tinyInteger('status')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
