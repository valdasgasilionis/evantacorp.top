<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedinteger('requisition_id');
            $table->unsignedinteger('technologist_id');
            $table->unsignedinteger('slides')->nullable();
            $table->string('description')->nullable();
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('immunos');
    }
}
