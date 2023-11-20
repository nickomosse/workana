<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
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
            $table->string('comment');
            $table->string('total');
            $table->string('signal');
            $table->string('installments');
            $table->integer('division');
            $table->timestamps();


            $table->unsignedBigInteger('referral_id');
            $table->unsignedBigInteger('package_id');


            $table->foreign('referral_id')
                ->references('id')
                ->on('referrals');
            $table->foreign('package_id')
                ->references('id')
                ->on('packages');
        });

        Schema::create('estimate_observations', function (Blueprint $table) {
            $table->unsignedBigInteger('estimate_id');
            $table->unsignedBigInteger('observation_id');

            $table->foreign('estimate_id')
                ->references('id')
                ->on('estimates')
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
        Schema::dropIfExists('estimates');
        Schema::dropIfExists('estimate_observation');
    }
}
