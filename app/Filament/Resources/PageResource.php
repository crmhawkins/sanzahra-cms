<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationGroup = 'Contenido';

    protected static ?string $navigationLabel = 'Páginas';

    protected static ?string $modelLabel = 'Página';

    protected static ?string $pluralModelLabel = 'Páginas';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Información de la página')
                ->description('Datos básicos visibles en el navegador y buscadores.')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Título')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('slug')
                        ->label('URL de la página')
                        ->prefix('sanzahra.com/')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    Forms\Components\TextInput::make('meta_title')
                        ->label('Título SEO (pestaña del navegador)')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('meta_description')
                        ->label('Descripción SEO (aparece en Google)')
                        ->rows(3)
                        ->maxLength(500),

                    Forms\Components\Select::make('layout')
                        ->label('Tipo de página')
                        ->options([
                            'default'   => 'Default',
                            'home'      => 'Home',
                            'legal'     => 'Legal',
                            'contacto'  => 'Contacto',
                            'portfolio' => 'Portfolio',
                        ])
                        ->required()
                        ->default('default'),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Visible en la web')
                            ->default(true),

                        Forms\Components\TextInput::make('order')
                            ->label('Orden en menú')
                            ->numeric()
                            ->default(0),
                    ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Página')
                    ->description(fn (Page $record): string => $record->slug ? '/' . $record->slug : '/')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('layout')
                    ->label('Tipo'),

                Tables\Columns\TextColumn::make('blocks_count')
                    ->counts('blocks')
                    ->label('Secciones')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Visible'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar contenido')
                    ->icon('heroicon-o-pencil-square'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\BlocksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
