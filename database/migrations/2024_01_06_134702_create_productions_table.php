<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produksi');
            $table->integer('qty_product');
            $table->unsignedBigInteger('product_id');
            $table->integer('qty_material');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('productions');
    }
}
