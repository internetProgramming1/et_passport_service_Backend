<?php
namespace Admin\Models;

class Admin
{
    public static function authenticate($username, $password)
    {
        // Define hardcoded admin credentials using array()
        $admins = array(
            'new_admin' => array(
                'id' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // hash for "password123"
                'type' => 'new'
            ),
            'renewal_admin' => array(
                'id' => 2,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // hash for "password123"
                'type' => 'renewal'
            )
        );

        // Check if the username exists
        if (!array_key_exists($username, $admins)) {
            return false;
        }

        // Verify the password
        if (password_verify($password, $admins[$username]['password'])) {
            return array(
                'id' => $admins[$username]['id'],
                'username' => $username,
                'type' => $admins[$username]['type']
            );
        }

        return false;
    }
}
