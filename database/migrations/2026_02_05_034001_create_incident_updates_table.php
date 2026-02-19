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
    Schema::create('incident_updates', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('incident_id')->constrained();
      $table->foreignUuid('user_id')->constrained();
      $table->text('comment');
      $table->json('attachments')->nullable();
      $table->string('previous_status');
      $table->string('new_status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('incident_updates');
  }
};

