<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->string('vin_number')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedInteger('category_id');
            $table->string('cof');
            $table->string('brand');
            $table->string('model');
            $table->string('manufacturer');
            $table->string('year_of_manufacture');
            $table->string('main_color');
            $table->boolean('new_used')->default(1);
            $table->unsignedTinyInteger('condition')->default(5);
            $table->unsignedTinyInteger('province');
            $table->unsignedInteger('city');
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->double('retail_price')->nullable();
            $table->boolean('is_feature')->default(0);
            $table->double('special_price')->nullable();
            $table->date('special_start')->nullable();
            $table->date('special_end')->nullable();
            $table->boolean('viewed')->default(0);
            $table->string('weight')->nullable();
            $table->string('loa')->nullable();
            $table->string('beam')->nullable();
            $table->string('draft')->nullable();
            $table->tinyInteger('crew')->nullable();
            $table->tinyInteger('passengers')->nullable();
            $table->tinyInteger('fuel_type')->nullable();
            $table->string('fuel_tank')->nullable();
            $table->smallInteger('max_speed')->nullable();
            $table->string('hull_construction')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('fb_link')->nullable();
            $table->boolean('is_sold')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boats');
    }
}
