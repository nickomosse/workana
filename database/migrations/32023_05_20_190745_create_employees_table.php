<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('nick')->nullable();
            $table->string('cpf');
            $table->string('rg');
            $table->string('email');
            $table->string('cell');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_cell');
            $table->string('gender');
            $table->unsignedBigInteger('type');
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('type')
                ->references('id')
                ->on('employee_types');
        });

        Schema::create('employee_functions', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('function_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->foreign('function_id')
                ->references('id')
                ->on('job_functions')
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
        Schema::dropIfExists('job_functions');
        Schema::dropIfExists('employees');
    }
}
