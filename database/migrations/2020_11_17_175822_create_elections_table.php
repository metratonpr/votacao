<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
      * The table referring to Election must have:
      * Promotion name -> name
      * Description -> description
      * Start date -> starts_in
      * End Date -> ends_in
      * Slug -> slug
      * Promotional Photo -> image
      * Situation Open/Closed -> isOpen
      */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->date('starts_in');
            $table->date('ends_in');
            $table->string('slug');
            $table->string('image');
            $table->boolean('isOpen');
            $table->integer('votes');
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
        Schema::dropIfExists('elections');
    }
}
