<?php

namespace App\Providers;

use App\Enums\Role as RoleEnum;
use App\Models\Incident;
use App\Observers\IncidentObserver;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // Observers
    Incident::observe(IncidentObserver::class);

    Gate::before(function ($user, $ability) {
      return $user->hasRole(RoleEnum::SUPER_ADMIN->value) ? true : null;
    });

    TextColumn::configureUsing(function (TextColumn $column) {
      $column->timezone('America/Caracas');
    });

    TextEntry::configureUsing(function (TextEntry $entry) {
      $entry->timezone('America/Caracas');
    });

    Password::defaults(function () {
      return Password::min(8)
        ->max(20)
        ->symbols()
        ->numbers()
        ->mixedCase();
    });
  }
}

