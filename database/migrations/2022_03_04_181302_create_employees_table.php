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
            $table->id();
            $table->string('name');
            $table->integer('status');
            $table->timestamps();
        });

        $employee = [
            ['name' => 'Asep','status' => '1'],
            ['name' => 'dudung','status' => '1'],
            ['name' => 'agus','status' => '2'],
            ['name' => 'udin', 'status' => '2'],
            ['name' => 'ajeng', 'status' => '3'],
            ['name' => 'amel', 'status' => '3']
        ];
        \App\Models\Employee::insert($employee);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
