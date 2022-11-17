<?php

return [
    'categories' => [
        'default' => 'Panel Admin',
        'users'   => 'Pengguna',
    ],
    'backend_access' => [
        'display_name' => 'Akses Panel Admin',
        'description'  => 'Pengguna dapat mengakses panel administrasi',
    ],
    'users_crud' => [
        'display_name' => 'Manajemen pengguna',
        'description'  => 'Pengguna dapat membuat, menghapus, atau memodifikasi pengguna',
    ],
    'roles_crud' => [
        'display_name' => 'Manajemen hak akses',
        'description'  => 'Pengguna dapat mengedit dan menentukan izin untuk suatu hak akses',
    ],
    'logs' => [
        'display_name' => 'Viewing logs',
        'description'  => 'User can view application logs',
    ],
];
