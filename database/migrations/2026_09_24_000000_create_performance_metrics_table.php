<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('performance_metrics', function(Blueprint $table){ $table->id(); $table->string('label'); $table->string('device',20); $table->unsignedTinyInteger('performance_score'); $table->unsignedInteger('lcp_ms'); $table->unsignedInteger('fcp_ms'); $table->decimal('cls',4,3); $table->unsignedInteger('tbt_ms'); $table->unsignedInteger('ttfb_ms'); $table->unsignedInteger('transfer_kb'); $table->unsignedSmallInteger('requests'); $table->text('notes')->nullable(); $table->timestamps(); $table->unique(['label', 'device']); }); } public function down(): void { Schema::dropIfExists('performance_metrics'); } };
