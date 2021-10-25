<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //Definizione della colonna 
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            // definiamo il vincolo (foreing key)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //eliminiamo il vincolo (foreing key)
            $table->dropForeignKey('posts_category_id_foreign');
            // eliminiamo la colonna 
            $table->dropColumn('category_id');
        });
    }
}
