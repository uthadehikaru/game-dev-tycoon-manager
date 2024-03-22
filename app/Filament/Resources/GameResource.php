<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Company;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function getEloquentQuery(): Builder
    {
        if(!Auth::user()->is_admin)
            return parent::getEloquentQuery()->whereRelation('company', 'user_id', Auth::id());

        return parent::getEloquentQuery();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                ->relationship(
                    name: 'company', 
                    titleAttribute: 'name',
                    modifyQueryUsing: fn($query) => Auth::user()->is_admin ? $query : $query->where('user_id', Auth::id()))
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Radio::make('size')
                    ->options([
                        'Small' => 'Small',
                        'Medium' => 'Medium',
                        'Large' => 'Large',
                        'AAA' => 'AAA',
                    ])
                    ->required(),
                Forms\Components\Select::make('topic_id')
                    ->relationship(name: 'topic', titleAttribute: 'name')
                    ->required(),
                Forms\Components\Select::make('genre_id')
                    ->relationship(name: 'genre', titleAttribute: 'name')
                    ->required(),
                Forms\Components\Radio::make('audience')
                        ->options([
                            'Y' => 'Young',
                            'E' => 'Everyone',
                            'M' => 'Mature',
                        ])
                    ->required(),
                Forms\Components\Select::make('platform_id')
                    ->relationship(name: 'platform', titleAttribute: 'name')
                    ->required(),
                Forms\Components\TextInput::make('score')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('released_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('size')
                    ->searchable(),
                Tables\Columns\TextColumn::make('topic.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('genre.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('audience')
                    ->searchable(),
                Tables\Columns\TextColumn::make('platform.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('released_at')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGames::route('/'),
        ];
    }
}
