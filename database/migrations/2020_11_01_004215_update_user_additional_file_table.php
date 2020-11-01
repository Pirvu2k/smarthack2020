<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserAdditionalFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_additional_file', function (Blueprint $table) {
            $table->unsignedBigInteger('user_document_id');
            $table->foreign('user_document_id')->references('id')->on('user_documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_additional_file', function($table)
        {
            $table->dropForeign('user_document_id');
        });
    }
}
