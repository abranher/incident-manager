<?php

use App\Enums\IncidentPriority;
use App\Enums\IncidentStatus;
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
    Schema::create('incidents', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('title');
      $table->text('description');
      $table->enum('status', IncidentStatus::values())->default(IncidentStatus::NEW->value);
      $table->enum('priority', IncidentPriority::values())->default(IncidentPriority::LOW->value);
      $table->foreignUuid('user_id')->constrained(); // Creator (Employee)
      $table->foreignUuid('department_id')->constrained();
      $table->timestamp('closed_at')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });

    Schema::create('incident_user', function (Blueprint $table) {
      $table->foreignUuid('incident_id')->constrained();
      $table->foreignUuid('user_id')->constrained();
      $table->timestamp('assigned_at')->useCurrent();
      $table->primary(['incident_id', 'user_id']);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('incident_user');
    Schema::dropIfExists('incidents');
  }
};

