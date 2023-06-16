<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('comics_table', function (Blueprint $table) 
        {
            $table->id();
            $table->string('title',100);
            $table->text('description')->nullable();
            $table->text('thumb_url')->nullable();
            $table->decimal('price',5,2);
            $table->string('series',50)->nullable();
            $table->date('sale_date');
            $table->string('type',50);
            // $table->string('artists');
            // $table->string('writers');
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
        Schema::dropIfExists('comics_table');
    }
};
