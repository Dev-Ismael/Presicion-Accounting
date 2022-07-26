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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100 )->index();
            $table->string('slug')->index();
            $table->string('seo_title', 500);
            $table->string('seo_description', 500);
            $table->string('seo_keywords', 500);
            $table->string('summary', 255 );
            $table->integer('parent_id')->nullable();
            $table->text('content', 5000);
            $table->string('icon');
            $table->string('img');
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
        Schema::dropIfExists('services');
    }
};
