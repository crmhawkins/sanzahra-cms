<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlockResource\Pages;
use App\Models\Block;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

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

    protected static function fileUpload(string $name, string $label): Forms\Components\Group
    {
        return Forms\Components\Group::make([
            Forms\Components\Placeholder::make("{$name}_current_preview")
                ->label("{$label} (imagen actual)")
                ->content(function (Forms\Get $get) use ($name): HtmlString {
                    $val = $get($name) ?? '';
                    if ($val === '' || str_starts_with($val, 'uploads/')) {
                        return new HtmlString('');
                    }
                    $url = rtrim(config('app.url'), '/') . '/' . ltrim($val, '/');
                    return new HtmlString('<img src="' . e($url) . '" style="max-height:150px;border-radius:6px;">');
                })
                ->visible(fn (Forms\Get $get): bool => ($val = $get($name) ?? '') !== '' && !str_starts_with($val, 'uploads/')),

            Forms\Components\FileUpload::make($name)
                ->label("{$label} (subir nueva)")
                ->image()
                ->disk('public')
                ->directory('uploads')
                ->imagePreviewHeight('150')
                ->dehydrated(fn ($state): bool => filled($state)),
        ]);
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
                Forms\Components\TagsInput::make('tags')->label('Tags (opcional)'),
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
                Forms\Components\TextInput::make('title')->label('Título (admite <br>)'),
                Forms\Components\Textarea::make('description')->label('Descripción')->rows(2),
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    Forms\Components\TextInput::make('button_url')->label('URL botón'),
                ]),
            ],

            'page_hero' => [
                Forms\Components\TextInput::make('kicker')->label('Kicker (etiqueta superior)'),
                Forms\Components\TextInput::make('title')->label('Título'),
                Forms\Components\TextInput::make('brand')->label('Marca (texto grande, solo home/about)'),
                Forms\Components\TextInput::make('subtitle')->label('Subtítulo'),
                static::fileUpload('background_image', 'Imagen de fondo'),
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
                Forms\Components\TextInput::make('title')->label('Título (admite <br>)'),
                Forms\Components\Textarea::make('description')->label('Descripción')->rows(4),
            ],

            'timeline' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('items', 'Hitos')->schema([
                    Forms\Components\TextInput::make('year')->label('Año'),
                    Forms\Components\Textarea::make('description')->label('Descripción')->rows(3),
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
                static::repeater('services', 'Servicios')->schema([
                    Forms\Components\TextInput::make('number')->label('Número'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    static::richEditor('description', 'Descripción'),
                    Forms\Components\TagsInput::make('bullets')->label('Puntos (lista)'),
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('url')->label('URL'),
                    Forms\Components\Toggle::make('reverse')->label('Invertir orden (imagen a la izquierda)'),
                ]),
            ],

            'marcas_propias' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::richEditor('description', 'Descripción'),
                static::repeater('brands', 'Marcas')->schema([
                    Forms\Components\TextInput::make('name')->label('Nombre de la marca'),
                    Forms\Components\Textarea::make('description')->label('Descripción'),
                    Forms\Components\Select::make('status')->label('Estado')->options([
                        'coming_soon' => 'Próximamente',
                        'available'   => 'Disponible',
                    ]),
                    static::fileUpload('modal_image', 'Imagen'),
                ]),
            ],

            'talento_form' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::fileUpload('image', 'Imagen'),
                static::richEditor('description', 'Descripción'),
                Forms\Components\TagsInput::make('fields')->label('Campos del formulario'),
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
                static::fileUpload('image_break', 'Imagen'),
                Forms\Components\TextInput::make('break_heading')->label('Título sobre la imagen'),
                Forms\Components\TextInput::make('break_sub')->label('Subtítulo sobre la imagen'),
                Forms\Components\TextInput::make('badge')->label('Etiqueta (badge)'),
            ],

            'gallery' => [
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                static::repeater('items', 'Imágenes')->schema([
                    static::fileUpload('image', 'Imagen'),
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
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('button_text')->label('Texto botón'),
                    Forms\Components\TextInput::make('button_url')->label('URL botón'),
                ]),
            ],

            'portfolio_filters' => [
                static::repeater('filters', 'Filtros')->schema([
                    Forms\Components\TextInput::make('label')->label('Etiqueta'),
                    Forms\Components\TextInput::make('value')->label('Valor (categoría)'),
                ]),
            ],

            'masonry' => [
                static::repeater('items', 'Items')->schema([
                    static::fileUpload('image', 'Imagen'),
                    Forms\Components\TextInput::make('title')->label('Título'),
                    Forms\Components\TextInput::make('category')
                        ->label('Categorías para el filtro')
                        ->helperText('Slugs separados por espacio, deben coincidir con los filtros. Ej: "moda eventos".'),
                    Forms\Components\TextInput::make('category_label')
                        ->label('Etiqueta visible (opcional)')
                        ->helperText('Texto mostrado bajo el proyecto. Si se deja vacío se genera a partir de las categorías.'),
                    Forms\Components\Select::make('aspect_ratio')->label('Ratio')
                        ->options(['3/4' => '3/4', '4/5' => '4/5', '1/1' => '1/1', '3/2' => '3/2', '2/3' => '2/3']),
                ]),
            ],

            'contact_duo' => [
                static::fileUpload('image', 'Imagen'),
                Forms\Components\TextInput::make('section_label')->label('Etiqueta sección'),
                Forms\Components\TextInput::make('title')->label('Título'),
                Forms\Components\Textarea::make('lead')->label('Texto intro')->rows(3),
                Forms\Components\TagsInput::make('form_fields')->label('Campos del formulario'),
                Forms\Components\TextInput::make('email')->label('Email contacto')->email(),
                Forms\Components\TextInput::make('tel')->label('Teléfono'),
                Forms\Components\TextInput::make('direccion')->label('Dirección'),
            ],

            'legal_sections' => [
                Forms\Components\DatePicker::make('last_updated')->label('Última actualización'),
                static::richEditor('intro', 'Introducción'),
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
