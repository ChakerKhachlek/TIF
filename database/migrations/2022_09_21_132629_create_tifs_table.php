<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tifs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->text('title')->nullable();
            $table->text('reference')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->text('tif_img_url')->nullable();
            $table->text('status')->nullable();
            $table->text('realisation_date')->nullable();
            $table->text('auction_end_date')->nullable();
            $table->text('auction_end_date_time')->nullable();
            $table->text('auction_top_biding_price')->nullable();

            $table->bigInteger('views')->unsigned()->default(0)->index();

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owner');
            $table->unsignedBigInteger('style_id');
            $table->foreign('style_id')->references('id')->on('style');
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
        Schema::dropIfExists('tifs');
    }
}
