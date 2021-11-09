<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishListRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list_real_estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wishListId')->references('id')->on('wish_lists')->onDelete('SET NULL');
            $table->unsignedBigInteger('realEstateId')->references('id')->on('real_estates')->onDelete('SET NULL');
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
        Schema::dropIfExists('wish_list_real_estates');
    }
}
