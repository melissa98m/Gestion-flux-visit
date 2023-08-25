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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_firstname',50); // je precise la longeur des données attendues pour renforcer la sécurité 
            $table->string('visitor_lastname',50);
            $table->longText('visitor_address');
            $table->string('visitor_phone',15);
            $table->string('visitor_email',100);
            $table->bigInteger('company_id')->unsigned(); // je créée ma clé étrangere avec comme reference l'id 
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
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
        Schema::dropIfExists('visitors');
    }
};
