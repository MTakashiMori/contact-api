<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_attributes', function (Blueprint $table) {
            $table->id();

            $table->string('key')->comment('Custom attribute key ');
            $table->string('value')->comment('CUstom attribute value');

            $table->foreignId('contact_id')->comment('Contact id FK')->constrained();

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
        Schema::dropIfExists('custom_attributes');
    }
}
