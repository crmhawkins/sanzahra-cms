<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static string $view = 'filament.pages.site-settings';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Configuración del sitio';

    protected static ?string $title = 'Configuración del sitio';

    protected static ?int $navigationSort = 0;

    /** Todas las claves que gestiona esta página. */
    protected const KEYS = [
        // marca
        'brand_text', 'brand_logo', 'favicon', 'loader_text', 'title_suffix', 'nav_transparent',
        // cabecera
        'header_menu_left', 'header_menu_right', 'header_menu_mobile',
        // pie
        'footer_tagline', 'footer_columns', 'footer_copyright', 'footer_legal_links',
        // contacto / redes
        'contacto_email', 'contacto_telefono', 'contacto_direccion',
        'redes_instagram', 'redes_linkedin', 'redes_facebook',
        // cookies
        'cookie_title', 'cookie_text', 'cookie_accept', 'cookie_reject',
    ];

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->currentValues());
    }

    protected function currentValues(): array
    {
        $values = [];
        foreach (self::KEYS as $key) {
            $values[$key] = site($key);
        }

        // Para las subidas de imagen, no precargamos los assets estáticos por
        // defecto (no viven en el disco público): el campo queda vacío y, si
        // se deja así, la web usa el logo/favicon por defecto.
        foreach (['brand_logo', 'favicon'] as $img) {
            $v = $values[$img] ?? null;
            $values[$img] = (is_string($v) && str_starts_with($v, 'uploads/')) ? $v : null;
        }

        return $values;
    }

    public function form(Form $form): Form
    {
        $urlHelp = 'Escribe el slug de una página (ej: "sobre-nosotros"), "/" para Inicio, o una URL completa (https://...). Para ir a una sección: "moda#talento".';

        return $form
            ->schema([
                Forms\Components\Tabs::make('Configuración')->tabs([

                    // ---------------- MARCA ----------------
                    Forms\Components\Tabs\Tab::make('Marca')
                        ->icon('heroicon-o-sparkles')
                        ->schema([
                            Forms\Components\TextInput::make('brand_text')
                                ->label('Logo (texto)')
                                ->helperText('Texto que se muestra como logo si no subes una imagen.')
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('brand_logo')
                                ->label('Logo (imagen, opcional)')
                                ->helperText('Si subes una imagen, sustituye al logo de texto en cabecera y pie.')
                                ->image()->disk('public')->directory('uploads')->imagePreviewHeight('80'),
                            Forms\Components\FileUpload::make('favicon')
                                ->label('Favicon (icono de la pestaña)')
                                ->helperText('Déjalo vacío para usar el favicon por defecto de SANZAHRA.')
                                ->image()->disk('public')->directory('uploads')->imagePreviewHeight('48'),
                            Forms\Components\TextInput::make('loader_text')
                                ->label('Texto del loader (pantalla de carga)')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('title_suffix')
                                ->label('Sufijo del título del navegador')
                                ->helperText('Aparece tras el nombre de cada página: "Inicio — SUFIJO".')
                                ->maxLength(255),
                            Forms\Components\Toggle::make('nav_transparent')
                                ->label('Cabecera transparente sobre la imagen principal'),
                        ]),

                    // ---------------- CABECERA / MENÚ ----------------
                    Forms\Components\Tabs\Tab::make('Cabecera / Menú')
                        ->icon('heroicon-o-bars-3')
                        ->schema([
                            $this->menuRepeater('header_menu_left', 'Menú — lado izquierdo', $urlHelp, true),
                            $this->menuRepeater('header_menu_right', 'Menú — lado derecho', $urlHelp, true),
                            $this->menuRepeater('header_menu_mobile', 'Menú móvil', $urlHelp, false),
                        ]),

                    // ---------------- PIE ----------------
                    Forms\Components\Tabs\Tab::make('Pie de página')
                        ->icon('heroicon-o-bars-3-bottom-left')
                        ->schema([
                            Forms\Components\Textarea::make('footer_tagline')
                                ->label('Descripción de marca')->rows(3),
                            Forms\Components\Repeater::make('footer_columns')
                                ->label('Columnas de enlaces')
                                ->collapsible()->cloneable()
                                ->itemLabel(fn (array $state): ?string => $state['heading'] ?? null)
                                ->schema([
                                    Forms\Components\TextInput::make('heading')->label('Título de la columna'),
                                    Forms\Components\Repeater::make('links')
                                        ->label('Enlaces')
                                        ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                        ->schema([
                                            Forms\Components\TextInput::make('label')->label('Texto')->required(),
                                            Forms\Components\TextInput::make('url')->label('Destino')->helperText($urlHelp),
                                        ])->defaultItems(0)->collapsed(),
                                ]),
                            Forms\Components\TextInput::make('footer_copyright')
                                ->label('Texto de copyright')
                                ->helperText('Usa {year} para el año actual automático.'),
                            Forms\Components\Repeater::make('footer_legal_links')
                                ->label('Enlaces legales')
                                ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                                ->schema([
                                    Forms\Components\TextInput::make('label')->label('Texto')->required(),
                                    Forms\Components\TextInput::make('url')->label('Destino')->helperText($urlHelp),
                                ])->defaultItems(0)->collapsed(),
                        ]),

                    // ---------------- CONTACTO / REDES ----------------
                    Forms\Components\Tabs\Tab::make('Contacto y redes')
                        ->icon('heroicon-o-at-symbol')
                        ->schema([
                            Forms\Components\TextInput::make('contacto_email')->label('Email de contacto')->email(),
                            Forms\Components\TextInput::make('contacto_telefono')->label('Teléfono'),
                            Forms\Components\TextInput::make('contacto_direccion')->label('Dirección'),
                            Forms\Components\TextInput::make('redes_instagram')->label('Instagram (URL)')->url(),
                            Forms\Components\TextInput::make('redes_linkedin')->label('LinkedIn (URL)')->url(),
                            Forms\Components\TextInput::make('redes_facebook')->label('Facebook (URL)')->url(),
                        ]),

                    // ---------------- COOKIES ----------------
                    Forms\Components\Tabs\Tab::make('Cookies')
                        ->icon('heroicon-o-shield-check')
                        ->schema([
                            Forms\Components\TextInput::make('cookie_title')->label('Título del aviso'),
                            Forms\Components\Textarea::make('cookie_text')->label('Texto del aviso')->rows(3)
                                ->helperText('Tras este texto se añade automáticamente el enlace a la política de privacidad.'),
                            Forms\Components\TextInput::make('cookie_accept')->label('Texto botón "Aceptar"'),
                            Forms\Components\TextInput::make('cookie_reject')->label('Texto botón "Rechazar"'),
                        ]),

                ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    protected function menuRepeater(string $name, string $label, string $urlHelp, bool $withChildren): Forms\Components\Repeater
    {
        $itemSchema = [
            Forms\Components\TextInput::make('label')->label('Texto')->required(),
            Forms\Components\TextInput::make('url')->label('Destino')->helperText($urlHelp),
        ];

        if ($withChildren) {
            $itemSchema[] = Forms\Components\Repeater::make('children')
                ->label('Submenú desplegable (opcional)')
                ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                ->schema([
                    Forms\Components\TextInput::make('label')->label('Texto')->required(),
                    Forms\Components\TextInput::make('url')->label('Destino')->helperText($urlHelp),
                ])->defaultItems(0)->collapsed();
        }

        return Forms\Components\Repeater::make($name)
            ->label($label)
            ->collapsible()->cloneable()
            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
            ->schema($itemSchema)
            ->defaultItems(0);
    }

    public function save(): void
    {
        $state = $this->form->getState();

        foreach (self::KEYS as $key) {
            Setting::set($key, $state[$key] ?? null, $this->groupFor($key));
        }

        Notification::make()
            ->title('Configuración guardada')
            ->body('Los cambios ya están publicados en la web.')
            ->success()
            ->send();
    }

    protected function groupFor(string $key): string
    {
        return match (true) {
            str_starts_with($key, 'header_')   => 'cabecera',
            str_starts_with($key, 'footer_')   => 'pie',
            str_starts_with($key, 'contacto_') => 'contacto',
            str_starts_with($key, 'redes_')    => 'redes',
            str_starts_with($key, 'cookie_')   => 'cookies',
            default                            => 'marca',
        };
    }
}
