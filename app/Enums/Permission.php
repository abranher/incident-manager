<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Permission: string implements HasLabel
{
  // USERS
  case VIEW_ANY_USER     = 'view_any_user';
  case VIEW_USER         = 'view_user';
  case CREATE_USER       = 'create_user';
  case UPDATE_USER       = 'update_user';
  case DELETE_USER       = 'delete_user';
  case RESTORE_USER      = 'restore_user';

  // ROLES
  case VIEW_ANY_ROLE     = 'view_any_role';
  case VIEW_ROLE         = 'view_role';

  // ACTIVITY LOGS
  case VIEW_ANY_ACTIVITY_LOG = 'view_any_activity_log';
  case VIEW_ACTIVITY_LOG     = 'view_activity_log';

  // DEPARTMENTS
  case VIEW_ANY_DEPARTMENT = 'view_any_department';
  case VIEW_DEPARTMENT     = 'view_department';
  case CREATE_DEPARTMENT   = 'create_department';
  case UPDATE_DEPARTMENT   = 'update_department';
  case DELETE_DEPARTMENT   = 'delete_department';
  case RESTORE_DEPARTMENT  = 'restore_department';

  // INCIDENTS
  case VIEW_ANY_INCIDENT   = 'view_any_incident';
  case VIEW_INCIDENT       = 'view_incident';
  case CREATE_INCIDENT     = 'create_incident';
  case UPDATE_INCIDENT     = 'update_incident';
  case DELETE_INCIDENT     = 'delete_incident';
  case RESTORE_INCIDENT    = 'restore_incident';

  public function getCategory(): string
  {
    return match (true) {
      str_contains($this->value, '_user')         => 'USUARIOS',
      str_contains($this->value, '_role')         => 'ROLES',
      str_contains($this->value, '_activity_log') => 'BITÁCORA',
      str_contains($this->value, '_department')   => 'DEPARTAMENTOS',
      str_contains($this->value, '_incident')     => 'INCIDENCIAS',
      default => 'SISTEMA',
    };
  }

  public function getLabel(): ?string
  {
    return match ($this) {
      // USERS
      static::VIEW_ANY_USER     => 'Ver todos los usuarios',
      static::VIEW_USER         => 'Ver detalle de usuario',
      static::CREATE_USER       => 'Crear usuario',
      static::UPDATE_USER       => 'Editar usuario',
      static::DELETE_USER       => 'Eliminar usuario',
      static::RESTORE_USER      => 'Restaurar usuario',

      // ROLES
      static::VIEW_ANY_ROLE     => 'Ver todos los roles',
      static::VIEW_ROLE         => 'Ver detalle de rol',

      // ACTIVITY LOGS
      static::VIEW_ANY_ACTIVITY_LOG => 'Ver bitácora del sistema',
      static::VIEW_ACTIVITY_LOG     => 'Ver detalle de bitácora',

      // DEPARTMENTS
      static::VIEW_ANY_DEPARTMENT => 'Ver todos los departamentos',
      static::VIEW_DEPARTMENT     => 'Ver detalle de departamento',
      static::CREATE_DEPARTMENT   => 'Crear departamento',
      static::UPDATE_DEPARTMENT   => 'Editar departamento',
      static::DELETE_DEPARTMENT   => 'Eliminar departamento',
      static::RESTORE_DEPARTMENT  => 'Restaurar departamento',

      // INCIDENTS
      static::VIEW_ANY_INCIDENT   => 'Ver todas las incidencias',
      static::VIEW_INCIDENT       => 'Ver detalle de incidencia',
      static::CREATE_INCIDENT     => 'Crear incidencia',
      static::UPDATE_INCIDENT     => 'Editar incidencia',
      static::DELETE_INCIDENT     => 'Eliminar incidencia',
      static::RESTORE_INCIDENT    => 'Restaurar incidencia',
    };
  }
}

