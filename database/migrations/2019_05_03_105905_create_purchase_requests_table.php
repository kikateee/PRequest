<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->bigIncrements('id', true);

            // Foreign Key Integers
            $table->unsignedBigInteger('costcenter_id');
            $table->unsignedBigInteger('fundsource_id');

            // Attributes
            $table->integer('sai_number');
            $table->date('date'); 
            $table->string('purpose', 256);
            $table->string('request_origin', 256);
            $table->string('approved_by', 256);
            $table->string('type', 256);
            $table->string('quarter', 256);
            $table->boolean('deleted')->default('false');
            $table->timestamps();
        });

        Schema::table('purchase_requests', function($table) {
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
        Schema::dropIfExists('purchase_requests');
    }
}
