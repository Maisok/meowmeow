<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('new_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('specialist_id')->constrained('specialists')->onDelete('cascade');
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null'); 
            $table->string('name');
            $table->string('phone');
            $table->date('date');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('new_appointments');
    }
};
