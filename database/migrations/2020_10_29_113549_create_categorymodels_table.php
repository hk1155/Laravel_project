<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorymodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category', function (Blueprint $table) {
            //$table->id();
            $table->integer('cid')->autoIncrement();
            $table->integer('cmpid');
            $table->string('category');
            $table->enum('status', ['1', '0']);
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
        Schema::dropIfExists('tbl_category');
    }
}
