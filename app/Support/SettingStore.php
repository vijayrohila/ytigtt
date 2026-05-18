<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingStore
{
    public static function integer(string $key, int $default = 0): int
    {
        $value = Setting::query()
            ->where('key', $key)
            ->value('value');

        return $value === null ? $default : (int) $value;
    }

    public static function increment(string $key, int $amount = 1): int
    {
        return DB::transaction(function () use ($key, $amount): int {
            $setting = Setting::query()
                ->where('key', $key)
                ->lockForUpdate()
                ->first();

            $value = ((int) ($setting->value ?? 0)) + max(1, $amount);

            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => (string) $value],
            );

            return $value;
        });
    }
}
