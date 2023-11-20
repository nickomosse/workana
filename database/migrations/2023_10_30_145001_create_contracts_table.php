<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod')->nullable();
            $table->string('name');
            $table->date('birthday');
            $table->date('date');
            $table->boolean('gender');
            $table->time('inittime');
            $table->time('endtime');
            $table->integer('age');
            $table->string('frespname');
            $table->string('frespcel');
            $table->string('frespemail');
            $table->string('srespname');
            $table->string('srespcel');
            $table->string('icomment');
            $table->string('ecomment');
            $table->string('total');
            $table->string('signal');
            $table->string('installments');
            $table->integer('division');
            $table->timestamps();

            $table->unsignedBigInteger('estimate_id');
            $table->unsignedBigInteger('referral_id');
            $table->unsignedBigInteger('package_id');


            $table->foreign('referral_id')
                ->references('id')
                ->on('referrals');
            $table->foreign('package_id')
                ->references('id')
                ->on('packages');
            $table->foreign('estimate_id')
                ->references('id')
                ->on('estimates');
        });

        Schema::create('contract_observations', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('observation_id');

            $table->foreign('contract_id')
                ->references('id')
                ->on('contracts')
                ->onDelete('cascade');
            $table->foreign('observation_id')
                ->references('id')
                ->on('observations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('contract_observation');
    }
}
