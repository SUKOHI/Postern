Postern
=====

PHP class that mainly developed for Laravel 4 to sign in to user page easily in development environment.

Requirements
====

jQuery


Installation&setting for Laravel
====

After installation using composer, add the followings to the array in  app/config/app.php

    'providers' => array(  
        ...Others...,  
        'Sukohi\Postern\PosternServiceProvider',
    )

    'aliases' => array(  
        ...Others...,  
        'Postern' => 'Sukohi\Postern\Facades\Postern',
    )

Usage
====

**Minimal Way  (in View)**

	{{ Postern::form('form_name')
        ->credentials('Label', [
            'input_email_name' => 'admin@example.com',
            'input_password_name' => 'admin'
        ])
        ->render()
    }}
    
**Other Way  (in View)**

	{{ Postern::form('form_name')
        ->credentials('Admin Login', [
            'email' => 'admin@example.com',
            'password' => 'admin'
        ])
        ->credentials('User Login', [
            'email' => 'user@example.com',
            'password' => 'user'
        ])
        ->localOnly($boolean = true)    // skippable
        ->render()
    }}
    
    * credentials() can be used repeatedly.
    * If you'd like to use in prod environment, set localOnly(false).
    
License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh