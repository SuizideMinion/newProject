<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('sub_menu_items', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->unsignedBigInteger('menu_item_id');
             $table->string('link');
             $table->boolean('status');
             $table->boolean('target');
             $table->unsignedInteger('position')->nullable();
             $table->string('icon')->nullable();
             $table->timestamps();
         });
         DB::statement("ALTER TABLE sub_menu_items AUTO_INCREMENT = 100;");
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_menu_items');
    }
}
