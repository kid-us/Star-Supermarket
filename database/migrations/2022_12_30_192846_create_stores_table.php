<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string("product");
            $table->string("category");
            $table->string("type")->nullable();
            $table->string("pricePer")->nullable();
            $table->string("price");
            $table->string("delPrice")->nullable();
            $table->string("productNo");
            $table->string("quantity");
            $table->string("description");
            $table->string("image");
            $table->string("sold")->nullable();
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
        Schema::dropIfExists('stores');
    }
};
