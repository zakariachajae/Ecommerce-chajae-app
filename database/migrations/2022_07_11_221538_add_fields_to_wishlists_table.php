<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->string('nom_produit');
            $table->string('description_produit');
            $table->string('genre_produit');
            $table->integer('prix_produit');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropColumn('nom_produit');
            $table->dropColumn('description_produit');
            $table->dropColumn('genre_produit');
            $table->dropColumn('prix_produit');
        });
    }
}
