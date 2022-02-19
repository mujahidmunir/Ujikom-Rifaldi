<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:reset', ['--force' => true]);
        Artisan::call('migrate');
        Artisan::call('permission:create-role admin');
        Artisan::call('permission:create-role manager');
        Artisan::call('permission:create-role kasir');
        Artisan::call('permission:create-role chef');

        $user = [
            [
                'id' => '1',
                'name' => 'admin',
                'phone' => '08123456789',
                'email' => 'admin@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'image' => 'img/avatar/avatar.png',
            ],
            [
                'id' => '2',
                'name' => 'Manager',
                'phone' => '08123456789',
                'email' => 'manager@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'image' => 'img/avatar/avatar.png',
            ],
            [
                'id' => '3',
                'name' => 'kasir',
                'phone' => '08123456789',
                'email' => 'kasir@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'image' => 'img/avatar/avatar.png',
            ],
            [
                'id' => '4',
                'name' => 'chef',
                'phone' => '08123456789',
                'email' => 'chef@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'image' => 'img/avatar/avatar.png',
            ],

        ];
        \App\Models\User::insert($user);

        $user_table = [
            [
                'name' => 'Meja 1',
                'email' => 'meja_1',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 2',
                'email' => 'meja_2',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 3',
                'email' => 'meja_3',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 4',
                'email' => 'meja_4',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 5',
                'email' => 'meja_5',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 6',
                'email' => 'meja_6',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
            [
                'name' => 'Meja 7',
                'email' => 'meja_7',
                'password' => \Illuminate\Support\Facades\Hash::make('123')
            ],
        ];
        \App\Models\User::insert($user_table);

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('manager');
        User::find(3)->assignRole('kasir');
        User::find(4)->assignRole('chef');
    }
}
