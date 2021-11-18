<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('areaId')->references('id')->on('areas')->onDelete('SET NULL');
            $table->unsignedBigInteger('typeId')->references('id')->on('real_estate_types')->onDelete('SET NULL');
            $table->unsignedBigInteger('userId')->references('id')->on('users')->onDelete('SET NULL');
            $table->string('name')->notnull();
            $table->boolean('sold')->nullable();
            $table->string('orientation')->nullable();
            $table->float('acreage')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('address')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('numberOfRoom')->nullable();
            $table->text('description')->nullable();
            $table->date('dateCreated')->nullable();
            $table->date('dateModified')->nullable();
            //$table->integer('bathRoom')->nullable();
            //$table->float('facade')->nullable(); //so met duong chinh
            //$table->string('mainLine')->nullable();
            //$table->float('length')->nullable();
            //$table->float('width')->nullable();
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
        Schema::dropIfExists('real_estates');
    }
}
