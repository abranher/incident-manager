<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Department extends Model
{
  use HasActivityLog, HasFactory, HasUuids, LogsActivity, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
  ];

  public function moderators(): BelongsToMany
  {
    return $this->belongsToMany(User::class, 'department_user');
  }

  public function incidents(): HasMany
  {
    return $this->hasMany(Incident::class);
  }
}

