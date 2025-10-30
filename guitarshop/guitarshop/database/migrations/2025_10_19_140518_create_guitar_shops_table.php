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
        Schema::create('ugyfelek', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->text('cim')->nullable();
            $table->timestamps();
        });

        Schema::create('szolgaltatasok', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->text('leiras')->nullable();
            $table->decimal('ar', 10, 2);
            $table->timestamps();
        });

        Schema::create('megrendelesek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ugyfel_id')->constrained('ugyfelek')->onDelete('cascade');
            $table->date('rendeles_datum')->nullable();
            $table->date('teljesites_datum')->nullable();
            $table->enum('allapot', ['függőben', 'folyamatban', 'teljesítve', 'lemondva'])->default('függőben');
            $table->timestamps();
        });

        Schema::create('megrendeles_tetelek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('megrendeles_id')->constrained('megrendelesek')->onDelete('cascade');
            $table->foreignId('szolgaltatas_id')->constrained('szolgaltatasok')->onDelete('cascade');
            $table->integer('mennyiseg')->default(1);
            $table->decimal('egysegar', 10, 2);
            $table->decimal('osszeg', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('megrendeles_tetelek');
        Schema::dropIfExists('megrendelesek');
        Schema::dropIfExists('szolgaltatasok');
        Schema::dropIfExists('ugyfelek');
    }
};
