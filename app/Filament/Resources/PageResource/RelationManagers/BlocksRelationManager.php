<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use App\Filament\Resources\BlockResource;
use App\Models\Block;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BlocksRelationManager extends RelationManager
{
    protected static string $relationship = 'blocks';

    protected static ?string $title = 'Secciones de esta página';

    public function form(Form $form): Form
    {
        return $form->schema(function (?Block $record): array {
            $type = $record?->type;

            return [
                Forms\Components\Section::make('Etiqueta')
                    ->schema([
                        Forms\Components\TextInput::make('label')
                            ->label('Nombre de esta sección')
                            ->required()
                            ->maxLength(255),
                    ]),

                Forms\Components\Section::make('Contenido')
                    ->description('Edita el contenido visible de esta sección en la web.')
                    ->schema(BlockResource::getDataSchema($type))
                    ->statePath('data'),
            ];
        });
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('label')
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('#')
                    ->sortable()
                    ->width('50px'),

                Tables\Columns\TextColumn::make('label')
                    ->label('Sección')
                    ->description(fn (Block $record): string => $record->key)
                    ->searchable()
                    ->wrap(),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Tipo'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Visible'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar')
                    ->slideOver()
                    ->icon('heroicon-o-pencil-square'),
            ])
            ->bulkActions([]);
    }
}
