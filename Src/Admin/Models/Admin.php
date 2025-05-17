<?php
namespace Admin\Models;

class Admin
{
    public static function authenticate($username, $password)
    {
        // Temporary hardcoded admin - replace with database later
        $admins = [
            'admin' => [
                'id' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'type' => 'super'
            ]
        ];

        if (isset($admins[$username])) {
            if (password_verify($password, $admins[$username]['password'])) {
                return $admins[$username];
            }
        }

        return false;
    }
}