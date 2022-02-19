<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategotiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        $cat = [
            ['name' => 'makanan'],['name' => 'minuman']
        ];
        \App\Models\Categoty::insert($cat);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoties');
    }
}
