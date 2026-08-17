<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('hall_of_fames', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('role_title');
        $table->string('sub_group_name')->nullable();
        $table->string('image_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall_of_fames');
    }
};
