<?php

return [
    'button_label' => 'Login with :provider',
    
    'providers' => [
        'google' => [
            'label' => 'Google',
            'icon' => 'fab-google',
            'color' => '#db4437',
        ],
        'facebook' => [
            'label' => 'Facebook',
            'icon' => 'fab-facebook-f',
            'color' => '#3b5998',
        ],
    ],

    'user' => [
        'fields' => [
            'name' => 'name',
            'email' => 'email',
        ],
        'model' => \App\Models\User::class,
    ],
];