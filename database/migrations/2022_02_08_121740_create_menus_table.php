<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->bigInteger('price');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        $menu = [
            [
                'category_id' => 1,
                'name' => 'bubur ayam',
                'price' => 10000,
                'image' => 'makanan.jpg',
                'description' => 'dengan toping ayam tiren',
            ],

            [
                'category_id' => 2,
                'name' => 'teh manis',
                'price' => 10000,
                'image' => 'minuman.jpg',
                'description' => 'tidak semanis janji manis',
            ],
        ];

        \App\Models\Menu::insert($menu);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
