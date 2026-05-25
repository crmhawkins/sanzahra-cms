<?php

namespace App\Filament\Resources\PageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BlocksRelationManager extends RelationManager
{
    protected static string $relationship = 'blocks';

    protected static ?string $title = 'Bloques';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('key')
                ->label('Clave')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('label')
                ->label('Etiqueta')
                ->required()
                ->maxLength(255),

            Forms\Components\Select::make('type')
                ->label('Tipo')
                ->options([
                    'hero_slider'       => 'Hero Slider (carrusel)',
                    'marquee'           => 'Marquee animado',
                    'intro_text'        => 'Intro 2-columnas',
                    'image_break'       => 'Image Break',
                    'services_grid'     => 'Grid de Servicios',
                    'portfolio_teaser'  => 'Portfolio Teaser',
                    'cta_final'         => 'CTA Final',
                    'page_hero'         => 'Page Hero',
                    'breadcrumb'        => 'Breadcrumb',
                    'pull_quote'        => 'Cita destacada',
                    'full_image'        => 'Imagen full-width',
                    'two_column'        => 'Dos columnas texto+imagen',
                    'stat_block'        => 'Bloque estadística',
                    'timeline'          => 'Timeline (hitos)',
                    'team_grid'         => 'Grid equipo',
                    'features_row'      => 'Fila de features',
                    'service_rows'      => 'Filas de servicios',
                    'marcas_propias'    => 'Marcas propias',
                    'talento_form'      => 'Formulario talento',
                    'identidad_tags'    => 'Identidad con tags',
                    'desfiles_cta'      => 'Desfiles CTA',
                    'gallery'           => 'Galería',
                    'process_grid'      => 'Grid de proceso',
                    'partner'           => 'Partner',
                    'portfolio_filters' => 'Filtros portfolio',
                    'masonry'           => 'Masonry portfolio',
                    'contact_duo'       => 'Contacto',
                    'legal_sections'    => 'Secciones legales',
                ])
                ->required(),

            Forms\Components\TextInput::make('order')
                ->label('Orden')
                ->numeric()
                ->default(0),

            Forms\Components\Toggle::make('is_active')
                ->label('Activo')
                ->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('label')
            ->columns([
                Tables\Columns\TextColumn::make('key')->label('Clave'),
                Tables\Columns\TextColumn::make('label')->label('Etiqueta'),
                Tables\Columns\BadgeColumn::make('type')->label('Tipo'),
                Tables\Columns\TextColumn::make('order')->label('Orden')->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Activo'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
