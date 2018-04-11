Postern
=====

PHP class that mainly developed for Laravel to sign in to user page easily in development environment.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Postern/tree/1.0))

Installation
====

Execute composer command.

    composer require sukohi/postern:2.*

If your Laravel's version is 5.5+, the installation is done!

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\Postern\PosternServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Postern'   => Sukohi\Postern\Facades\Postern::class
    ]

Usage
====

**Minimal Way  (in View)**

    <form method="POST" action="http://example.com" name="form_name">
        <input name="input_email_name" type="text">
        <input name="input_password_name" type="password">
    </form>

	{!! \Postern::form('form_name')
            ->credentials('Link Text', ['input_email_name' => 'admin@example.com', 'input_password_name' => 'admin'])
            ->render()
    !!}
    
**Other Way  (in View)**

	{!! \Postern::form('form_name')
            ->credentials('Admin Login', ['email' => 'admin@example.com', 'password' => 'admin'])
            ->credentials('User Login', ['email' => 'user@example.com', 'password' => 'user'])
            ->localOnly($boolean = true)    // optional
            ->render()
    !!}
    
* You can repeatedly use credentials().
* If you'd like to use this package in production environment, set localOnly(false).


License
====

This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh