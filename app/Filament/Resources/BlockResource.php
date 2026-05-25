<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlockResource\Pages;
use App\Models\Block;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Contenido';

    protected static ?string $navigationLabel = 'Bloques';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $modelLabel = 'Bloque';

    protected static ?string $pluralModelLabel = 'Bloques';

    protected static ?int $navigationSort = 2;

    // -----------------------------------------------------------------------
    // Data-schema builder (polimórfico por type)
    // -----------------------------------------------------------------------

    protected static function fileUpload(string $name, string $label): Forms\Components\FileUpload
    {
        return Forms\Components\FileUpload::make($name)
            ->label($label)
            ->image()
            ->disk('public')
            ->directory('uploads')
            ->imagePreviewHeight('150');
    }

    protected static function richEditor(string $name, string $label): Forms\Components\RichEditor
    {
        return Forms\Components\RichEditor::make($name)
            ->label($label)
            ->toolbarButtons(['bold', 'italic', 'underline', 'link', 'bulletList', 'orderedList', 'redo', 'undo']);
    }

    protected static function repeater(string $name, string $label): Forms\Components\Repeater
    {
        return Forms\Components\Repeater::make($name)
            ->label($label)
            ->collapsible()
            ->cloneable()
            ->defaultItems(0);
    }

    public static function getDataSchema(?string $type): array
    {
        return match ($type) {

            'hero_slider' => [
                static::repeater('slides', 'Slides')->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('label')->label('Label'),
                ]),
                Forms\Components\TextInput::make('title')->label('Título'),
                Forms\Components\TextInput::make('subtitle')->label('Subtítulo'),
            ],

            'marquee' => [
                Forms\Components\Textarea::make('content')->label('Contenido')->rows(2),
            ],

            'intro_text' => [
                static::fileUpload('image', 'Imagen'),
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('paragraph_1', 'Párrafo 1'),
                static::richEditor('paragraph_2', 'Párrafo 2'),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    Forms\Components\TextInput::make('button_url')->label('URL botón'),
                ]),
            ],

            'image_break' => [
                static::fileUpload('image', 'Imagen'),
                Forms\Components\TextInput::make('heading')->label('Heading'),
                Forms\Components\TextInput::make('subheading')->label('Subheading'),
            ],

            'services_grid' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('services', 'Servicios')->maxItems(6)->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('number')->label('Número'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\Textarea::make('description')->label('Descripción'),
                    Forms\Components\TextInput::make('url')->label('URL'),
                ]),
            ],

            'portfolio_teaser' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('items', 'Items')->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\TextInput::make('category')->label('Categoría'),
                    Forms\Components\Select::make('layout')->label('Layout')->options(['tall' => 'Tall', 'wide' => 'Wide', 'normal' => 'Normal']),
                ]),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    Forms\Components\TextInput::make('button_url')->label('URL botón'),
                ]),
            ],

            'cta_final' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    Forms\Components\TextInput::make('button_url')->label('URL botón'),
                ]),
            ],

            'page_hero' => [
                Forms\Components\TextInput::make('kicker')->label('Kicker'),
                Forms\Components\TextInput::make('brand')->label('Brand'),
                Forms\Components\TextInput::make('subtitle')->label('Subtítulo'),
            ],

            'breadcrumb' => [
                static::repeater('items', 'Items')->schema([
                    Forms\Components\TextInput::make('label')->label('Label'),
                    Forms\Components\TextInput::make('url')->label('URL'),
                ]),
            ],

            'pull_quote' => [
                static::richEditor('quote', 'Cita'),
            ],

            'full_image' => [
                static::fileUpload('image', 'Imagen'),
            ],

            'two_column' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('paragraph_1', 'Párrafo 1'),
                static::richEditor('paragraph_2', 'Párrafo 2'),
                static::fileUpload('image', 'Imagen'),
            ],

            'stat_block' => [
                Forms\Components\TextInput::make('number')->label('Número'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
            ],

            'timeline' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('items', 'Hitos')->schema([
                    Forms\Components\TextInput::make('year')->label('Año'),
                    static::richEditor('description', 'Descripción'),
                ]),
            ],

            'team_grid' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('team', 'Equipo')->schema([
                    Forms\Components\TextInput::make('initials')->label('Iniciales'),
                    Forms\Components\TextInput::make('name')->label('Nombre'),
                    Forms\Components\TextInput::make('role')->label('Rol'),
                ]),
            ],

            'features_row' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('features', 'Features')->schema([
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\Textarea::make('description')->label('Descripción'),
                ]),
            ],

            'service_rows' => [
                static::repeater('rows', 'Filas')->schema([
                    Forms\Components\TextInput::make('number')->label('Número'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    static::richEditor('description', 'Descripción'),
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('url')->label('URL'),
                ]),
            ],

            'marcas_propias' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
                static::repeater('brands', 'Marcas')->schema([
                    Forms\Components\TextInput::make('logo_text')->label('Texto logo'),
                    Forms\Components\Textarea::make('description')->label('Descripción'),
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    static::fileUpload('modal_image', 'Imagen modal'),
                    Forms\Components\TextInput::make('modal_title')->label('Título modal'),
                    Forms\Components\TextInput::make('modal_subtitle')->label('Subtítulo modal'),
                ]),
            ],

            'talento_form' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::fileUpload('image', 'Imagen'),
                static::richEditor('description', 'Descripción'),
                Forms\Components\KeyValue::make('form_placeholders')->label('Placeholders formulario'),
                Forms\Components\TextInput::make('form_submit_text')->label('Texto enviar'),
            ],

            'identidad_tags' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('paragraph_1', 'Párrafo 1'),
                static::richEditor('paragraph_2', 'Párrafo 2'),
                Forms\Components\TagsInput::make('tags')->label('Tags'),
                static::fileUpload('image', 'Imagen'),
            ],

            'desfiles_cta' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
                static::fileUpload('image_break_image', 'Imagen break'),
                Forms\Components\TextInput::make('image_break_title')->label('Título image break'),
                Forms\Components\TextInput::make('image_break_subtitle')->label('Subtítulo image break'),
                Forms\Components\TextInput::make('card_logo')->label('Logo card'),
                Forms\Components\Textarea::make('card_description')->label('Descripción card'),
                Forms\Components\TextInput::make('card_badge')->label('Badge card'),
            ],

            'gallery' => [
                static::repeater('images', 'Imágenes')->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('caption')->label('Caption'),
                ]),
            ],

            'process_grid' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('steps', 'Pasos')->schema([
                    Forms\Components\TextInput::make('number')->label('Número'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\Textarea::make('description')->label('Descripción'),
                ]),
            ],

            'partner' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
                static::fileUpload('logo', 'Logo'),
                Forms\Components\TextInput::make('partner_name')->label('Nombre partner'),
                Forms\Components\TextInput::make('url')->label('URL'),
            ],

            'portfolio_filters' => [
                static::repeater('filters', 'Filtros')->schema([
                    Forms\Components\TextInput::make('key')->label('Clave'),
                    Forms\Components\TextInput::make('label')->label('Label'),
                ]),
            ],

            'masonry' => [
                static::repeater('items', 'Items')->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\TextInput::make('category')->label('Categoría'),
                    Forms\Components\Select::make('aspect_ratio')->label('Ratio')
                        ->options(['3/4' => '3/4', '4/5' => '4/5', '1/1' => '1/1', '3/2' => '3/2', '2/3' => '2/3']),
                    Forms\Components\TextInput::make('categories')->label('Categorías'),
                ]),
            ],

            'contact_duo' => [
                static::fileUpload('image', 'Imagen'),
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                Forms\Components\Textarea::make('lead_text')->label('Texto intro'),
                Forms\Components\KeyValue::make('form_placeholders')->label('Placeholders formulario'),
                Forms\Components\TextInput::make('form_submit_text')->label('Texto enviar'),
                Forms\Components\TextInput::make('email_contacto')->label('Email contacto')->email(),
                Forms\Components\TextInput::make('telefono_contacto')->label('Teléfono'),
                Forms\Components\TextInput::make('direccion_contacto')->label('Dirección'),
            ],

            'legal_sections' => [
                Forms\Components\DatePicker::make('last_updated')->label('Última actualización'),
                static::repeater('sections', 'Secciones')->schema([
                    Forms\Components\TextInput::make('heading')->label('Encabezado'),
                    static::richEditor('content', 'Contenido'),
                ]),
            ],

            default => [
                Forms\Components\KeyValue::make('raw')->label('Datos (clave → valor)'),
            ],
        };
    }

    // -----------------------------------------------------------------------
    // Form
    // -----------------------------------------------------------------------

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\Select::make('page_id')
                    ->label('Página')
                    ->relationship('page', 'title')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('key')
                    ->label('Clave (key)')
                    ->required()
                    ->maxLength(255),
            ]),

            Forms\Components\Grid::make(2)->schema([
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
                    ->required()
                    ->live(),
            ]),

            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),
            ]),

            Forms\Components\Section::make('Contenido del bloque')
                ->schema(fn (Forms\Get $get): array => static::getDataSchema($get('type')))
                ->statePath('data'),
        ]);
    }

    // -----------------------------------------------------------------------
    // Table
    // -----------------------------------------------------------------------

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.title')
                    ->label('Página')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('key')
                    ->label('Clave')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->label('Tipo'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Orden')
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Activo'),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([
                Tables\Filters\SelectFilter::make('page_id')
                    ->label('Página')
                    ->relationship('page', 'title'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListBlocks::route('/'),
            'create' => Pages\CreateBlock::route('/create'),
            'edit'   => Pages\EditBlock::route('/{record}/edit'),
        ];
    }
}
