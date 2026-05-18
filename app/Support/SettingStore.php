<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;

class SettingStore
{
    public static function integer(string $key, int $default = 0): int
    {
        $value = DB::table('settings')
            ->where('key', $key)
            ->value('value');

        return $value === null ? $default : (int) $value;
    }

    public static function increment(string $key, int $amount = 1): int
    {
        return DB::transaction(function () use ($key, $amount): int {
            $setting = DB::table('settings')
                ->where('key', $key)
                ->lockForUpdate()
                ->first();

            $value = ((int) ($setting->value ?? 0)) + max(1, $amount);

            DB::table('settings')->updateOrInsert(
                ['key' => $key],
                [
                    'value' => (string) $value,
                    'updated_at' => now(),
                    'created_at' => $setting->created_at ?? now(),
                ],
            );

            return $value;
        });
    }
}
