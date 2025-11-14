<?php
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        $rolesAndUsers = [
            'admin' => [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => 'password123'
            ],
            'doctor' => [
                'name' => 'Doctor User',
                'email' => 'doctor@gmail.com',
                'password' => 'password123'
            ],
            'nurse' => [
                'name' => 'Nurse User',
                'email' => 'nurse@gmail.com',
                'password' => 'password123'
            ],
            'patient' => [
                'name' => 'Patient User',
                'email' => 'patient@gmail.com',
                'password' => 'password123'
            ],
        ];

        
        foreach ($rolesAndUsers as $roleName => $userData) {
           
            $role = Role::firstOrCreate(['name' => $roleName]);

            
            $user = User::firstOrCreate(
                ['email' => $userData['email']], 
                [
                    'name' => $userData['name'],
                    'password' => Hash::make($userData['password'])
                ]
            );

            
            $user->assignRole($role);
        }
    }
}
