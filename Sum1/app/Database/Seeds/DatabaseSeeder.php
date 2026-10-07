<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $passwordHash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.';
        $users = $this->db->table('users');
        $existing = $users->where('username', 'Christian')->get()->getRowArray();

        if ($existing) {
            $users->where('id', $existing['id'])->update(['password' => $passwordHash]);
            return;
        }

        $users->insert([
            'username' => 'Christian',
            'full_name' => 'Christian Danielle Ola',
            'email' => 'ceola@fit.edu.ph',
            'password' => $passwordHash,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
