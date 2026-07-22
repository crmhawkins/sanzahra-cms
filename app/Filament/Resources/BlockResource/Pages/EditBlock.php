<?php

namespace App\Filament\Resources\BlockResource\Pages;

use App\Filament\Resources\BlockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditBlock extends EditRecord
{
    protected static string $resource = BlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['data']) && is_array($data['data'])) {
            $data['data'] = $this->migrateImagePaths($data['data']);
        }
        return $data;
    }

    private function migrateImagePaths(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_string($value) && $value !== '') {
                $data[$key] = $this->migrateImagePath($value);
            } elseif (is_array($value)) {
                $data[$key] = $this->migrateImagePaths($value);
            }
        }
        return $data;
    }

    private function migrateImagePath(string $value): string
    {
        if (str_starts_with($value, 'uploads/') && Storage::disk('public')->exists($value)) {
            return $value;
        }

        $ext = strtolower(pathinfo($value, PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
            return $value;
        }

        try {
            $storagePath = 'uploads/migrated-' . md5($value) . '.' . $ext;
            if (!Storage::disk('public')->exists($storagePath)) {
                $contents = str_starts_with($value, 'http')
                    ? @file_get_contents($value)
                    : @file_get_contents(public_path($value));
                if (!$contents) return $value;
                Storage::disk('public')->put($storagePath, $contents);
            }
            return $storagePath;
        } catch (\Throwable $e) {
            return $value;
        }
    }
}
