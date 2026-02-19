<?php

namespace App\Filament\Pages\Auth;

use App\Filament\Fields\DocumentField;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Schema;

class EditProfile extends BaseEditProfile
{
  public function form(Schema $schema): Schema
  {
    return $schema
      ->components([
        DocumentField::make(),
        $this->getNameFormComponent(),
        $this->getEmailFormComponent(),
        $this->getPasswordFormComponent(),
        $this->getPasswordConfirmationFormComponent(),
        $this->getCurrentPasswordFormComponent(),
      ]);
  }
}

