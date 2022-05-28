<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleLocation;
use App\Models\Client;
use App\Models\Location;
use App\Models\Tarification;
use App\Models\User;
use App\Models\UserPermission;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleTableSeeder::class);
        $this->call(StatutLocationTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeLocationTableSeeder::class);
        $this->call(TypeArticleTableSeeder::class);
        User::factory()->count(10)->create();
        Client::factory()->count(10)->create();
        Article::factory()->count(10)->create();
        Location::factory()->count(10)->create();
        
        Tarification::factory()->count(10)->create();
        $user_permission = UserPermission::factory()->count(10)->create();
        ArticleLocation::factory()->count(10)->create();
        UserRole::factory()->count(10)->create();

        
    }
}
