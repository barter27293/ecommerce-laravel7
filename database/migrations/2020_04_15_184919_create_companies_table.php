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
            $table->unsignedBigInteger('user_id');
            $table->string('name', 250)->nullable()->default(null);
            $table->string('address1', 255)->nullable()->default(null);
            $table->string('address2', 255)->nullable()->default(null);
            $table->string('county', 255)->nullable()->default(null);
            $table->string('city', 255)->nullable()->default(null);
            $table->string('tin', 100)->nullable()->default(null)->comment('Tax Identification Number');
            $table->string('trn', 100)->nullable()->default(null)->comment('Trade Registry Number');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
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
