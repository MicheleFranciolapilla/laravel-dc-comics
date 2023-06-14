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
        Schema::create('comics_table', function (Blueprint $table) {
            $table->id();
            $table->string('title',30);
            $table->text('description')->nullable();
            $table->string('thumb_url');
            $table->decimal('price',4,2);
            $table->string('series',30)->nullable();
            $table->date('sale_date');
            $table->string('type',20);
            $table->string('artists');
            $table->string('writers');
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
        Schema::dropIfExists('_comics_table_migration');
    }
};
