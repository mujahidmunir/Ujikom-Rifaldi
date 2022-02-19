<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(0);
            $table->timestamps();
        });

        $table = [
            ['name' => 'Meja 1'],['name' => 'Meja 2'],['name' => 'Meja 3'],['name' => 'Meja 4'],['name' => 'Meja 5'],['name' => 'Meja 6'],['name' => 'Meja 7']
        ];

        \App\Models\Table::insert($table);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
