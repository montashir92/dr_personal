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
        Schema::create('latestcases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('casecat_id')
                    ->constrained('case_cats')
                    ->onDelete('cascade');
            $table->string('name', 60);
            $table->longText('description')->nullable();
            $table->text('image');
            $table->integer('save_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('latestcases');
    }
};
