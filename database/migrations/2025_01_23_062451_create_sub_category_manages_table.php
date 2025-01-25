<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoryManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_manages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->string('image');
            $table->string('category_manage_id'); // Foreign key to CategoryManage (assuming it's a string)
            $table->foreign('category_manage_id') // Reference the correct foreign key
            ->references('category_manages') // Reference the custom primary key in the parent table
            ->on('category_manages')
                ->onDelete('cascade'); // Cascading delete
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
        Schema::dropIfExists('sub_category_manages');
    }
}
