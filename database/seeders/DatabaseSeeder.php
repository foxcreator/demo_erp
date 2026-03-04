<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '1G');
        DB::disableQueryLog();
        $this->command->info('Початок генерації 100,000 контрагентів...');

        $total = 300000;
        $chunkSize = 2500;

        for ($i = 0; $i < $total / $chunkSize; $i++) {
            $counterparties = [];
            for ($j = 0; $j < $chunkSize; $j++) {
                $counterparties[] = [
                    'type' => 'Юридична особа',
                    'name' => 'Компанія ' . Str::random(5),
                    'full_name' => 'ТОВ Компанія ' . Str::random(5),
                    'inn' => rand(1000000000, 9999999999),
                    'kpp' => rand(10000000, 99999999),
                    'legal_address' => 'м. Київ, вул. ' . Str::random(10) . ', ' . rand(1, 100),
                    'actual_address' => 'м. Київ, вул. ' . Str::random(10) . ', ' . rand(1, 100),
                    'phone' => '+380' . rand(100000000, 999999999),
                    'email' => Str::random(8) . '@example.com',
                    'bank_account' => 'UA' . rand(100000000000000000, 999999999999999999),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('counterparties')->insert($counterparties);
            $this->command->info('Згенеровано контрагентів: ' . (($i + 1) * $chunkSize));
            unset($counterparties);
        }

        $this->command->info('Початок генерації 100,000 договорів...');

        // Для договорів скористаємося тим, що id контрагентів йдуть від 1 до 100000
        for ($i = 0; $i < $total / $chunkSize; $i++) {
            $contracts = [];
            for ($j = 1; $j <= $chunkSize; $j++) {
                $counterpartyId = ($i * $chunkSize) + $j;
                $contracts[] = [
                    'counterparty_id' => $counterpartyId,
                    'type' => 'З покупцем',
                    'number' => 'Д-' . rand(1000, 9999) . '/' . date('Y'),
                    'date' => now()->subDays(rand(1, 365)),
                    'name' => 'Осн. договір №' . rand(1, 100),
                    'currency' => 'UAH',
                    'valid_until' => now()->addDays(rand(1, 365)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('contracts')->insert($contracts);
            $this->command->info('Згенеровано договорів: ' . (($i + 1) * $chunkSize));
            unset($contracts);
        }
    }
}
