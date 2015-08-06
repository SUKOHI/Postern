Postern
=====

PHP class that mainly developed for Laravel to sign in to user page easily in development environment.  
(This is for Laravel 4.2. [For Laravel 5+](https://github.com/SUKOHI/Postern))

Requirements
====

[jQuery](https://github.com/jquery/jquery)


Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/postern": "1.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        'Sukohi\Postern\PosternServiceProvider',
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Postern' => 'Sukohi\Postern\Facades\Postern',
    ]

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