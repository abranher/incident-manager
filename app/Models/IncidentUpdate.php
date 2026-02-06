<?php

namespace App\Models;

use App\Enums\IncidentStatus;
use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class IncidentUpdate extends Model
{
  use HasActivityLog, HasFactory, HasUuids, LogsActivity;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'incident_id',
    'user_id',
    'comment',
    'attachments',
    'previous_status',
    'new_status',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'new_status' => IncidentStatus::class,
      'previous_status' => IncidentStatus::class,
      'attachments' => 'array',
    ];
  }

  public function incident(): BelongsTo
  {
    return $this->belongsTo(Incident::class);
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
}

