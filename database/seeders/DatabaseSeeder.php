<?php
namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Tenant;
use App\Models\PickupSlot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('local', 'testing')) {
            // Create Users
            $admin = User::create(['name' => 'Admin System', 'email' => 'admin@cana.com', 'password' => Hash::make('password'), 'role' => UserRole::ADMIN]);
            $penjual = User::create(['name' => 'Bu Siti', 'email' => 'siti@cana.com', 'password' => Hash::make('password'), 'role' => UserRole::PENJUAL]);
            $siswa = User::create(['name' => 'Budi Siswa', 'email' => 'budi@cana.com', 'password' => Hash::make('password'), 'role' => UserRole::SISWA]);

            // Create Tenant
            $tenant = Tenant::create([
                'owner_id' => $penjual->id,
                'name' => 'Kedai Bu Siti',
                'slug' => Str::slug('Kedai Bu Siti'),
                'description' => 'Menjual aneka masakan rumahan.',
                'status' => 'ACTIVE'
            ]);

            // Create Pickup Slots
            PickupSlot::insert([
                ['start_time' => '10:00:00', 'end_time' => '10:15:00', 'capacity' => 20],
                ['start_time' => '10:15:00', 'end_time' => '10:30:00', 'capacity' => 20],
                ['start_time' => '10:30:00', 'end_time' => '10:45:00', 'capacity' => 20],
            ]);
        }
    }
}