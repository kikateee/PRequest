<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Foreign Key Integers
            $table->unsignedBigInteger('costcenter_id');
            $table->unsignedBigInteger('fundsource_id');
    
            // Attributes
            $table->string('description', 256);
            $table->integer('stock');
            $table->string('unit_of_issue', 256);
            $table->string('quarter', 128);
            $table->string('type', 128);
            $table->string('remark', 128)->default('Pending');
            $table->timestamps();
        });

        Schema::table('items', function($table) {
            $table->foreign('costcenter_id')->references('id')->on('cost_centers');
            $table->foreign('fundsource_id')->references('id')->on('fund_sources');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
