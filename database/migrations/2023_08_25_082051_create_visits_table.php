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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->dateTime('visit_start');
            $table->dateTime('visit_end');
            $table->longText('visit_purpose');
            $table->longText('visit_comment');
            $table->bigInteger('visitor_id')->unsigned();
            $table->foreign('visitor_id')
                ->references('id')
                ->on('visitors');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')
                ->on('status');
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
        Schema::dropIfExists('visits');
    }
};
