<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ButtonAction;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Nome'),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->unique(User::class, 'email', ignoreRecord: true)
                ->label('E-mail'),

            TextInput::make('password')
                ->password()
                ->label('Senha:')
                ->required(fn(string $context): bool => $context === 'create') 
                ->dehydrated(fn($state) => filled($state))
                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                ->hiddenOn('edit') 
                ->placeholder('Digite a senha do usuário'),

            TextInput::make('new_password')
                ->password()
                ->label('Editar senha:')
                ->dehydrated(fn($state) => filled($state))
                ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                ->visibleOn('edit') 
                ->placeholder('••••••••'),


            Forms\Components\Select::make('roles')
                ->relationship('roles', 'name')
                ->options(Role::all()->pluck('name', 'id'))
                ->multiple()
                ->label('Cargos'),
        ]);
    }
}
