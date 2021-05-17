<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('account_number')->nullable();
            $table->string('registred_name');
            $table->string('trading_name');
            $table->string('vat_number');
            $table->text('physical_address');
            $table->string('contact_person');
            $table->string('mobile');
            $table->string('office_number');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
