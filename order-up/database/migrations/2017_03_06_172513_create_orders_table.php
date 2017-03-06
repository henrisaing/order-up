<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->longText('items')->nullable();
            $table->longText('notes')->nullable();
            $table->string('total')->nullable();
            $table->boolean('paid')->nullable();
            $table->boolean('in_progress')->nullable();
            $table->boolean('ready')->nullable();
            $table->boolean('recieved')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
