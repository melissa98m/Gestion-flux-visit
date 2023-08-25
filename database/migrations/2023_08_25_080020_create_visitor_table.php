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
            $table->string('vistor_firstname' , 50); // je precise la longeur des données attendues pour renforcer la sécurité 
            $table->string('vistor_lastname' , 50);
            $table->longText('vistor_address');
            $table->string('vistor_phone' , 15);
            $table->string('vistor_email' , 100);
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
