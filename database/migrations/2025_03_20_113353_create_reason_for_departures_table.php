<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reason_for_departures', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nom du motif de départ
            $table->string('detail');  // Détail du motif de départ
            $table->foreignId('added_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reason_for_departures');
    }
};
