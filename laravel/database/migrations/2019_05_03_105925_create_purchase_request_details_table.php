<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Foreign Key Integers
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('purq_id');
            $table->integer('quantity');
            $table->double('estimate_unit_cost', 8, 2);
            $table->double('estimated_cost', 8, 2);

            // Foreign Key Constraints
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('purq_id')->references('id')->on('purchase_requests');            
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
        Schema::dropIfExists('purchase_request_details');
    }
}
