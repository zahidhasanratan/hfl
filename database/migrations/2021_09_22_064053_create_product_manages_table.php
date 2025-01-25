<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_manages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->nullable();
            $table->string('t_cat_id')->nullable();
            $table->string('g_cat_id')->nullable();
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->text('short_summary')->nullable();
            $table->text('shot')->nullable();
            $table->string('first_ch')->nullable();
            $table->string('brand_image')->nullable();
            $table->string('pdf')->nullable();
            $table->string('pdf1')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_des')->nullable();
            // $table->string('Presntation ')->nullable();
            $table->text('presntation')->nullable();
            $table->text('indications')->nullable();
            $table->text('dosage_administration')->nullable();
            $table->text('contrainidications')->nullable();
            $table->text('side_effects')->nullable();
            $table->text('warning_precautions')->nullable();
            $table->text('drug_interaction')->nullable();
            $table->text('use_in_special_groups')->nullable();
            $table->text('packing')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
            $table->string('home_status')->nullable();
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
        Schema::dropIfExists('product_manages');
    }
}
