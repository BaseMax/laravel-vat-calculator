# Online VAT Calculator

**Superadmin username:** admin@gmail.com

**Superadmin password:** password

**Project Features:**
- Automated tests integrated to ensure reliability.
- Implementation of factories and seeders for all models for efficient database management.
- Automatic creation of super admins for streamlined administration.
- Geolocation detection capability when users submit new VAT calculation requests.
- VAT calculation functionality for both gross and net amounts.
- Visualization of data through various charts including world maps and bar charts showcasing the number of calculations in recent days/months.
- Utilization of Laravel 11 framework for robust development.
- Creation of an aesthetically pleasing admin panel using a sophisticated template.
- Superadmin's ability to create new users for seamless user management.
- User management functionalities including deletion and editing of users.
- Profile editing feature for users to update their information.
- Integration of the DataTable plugin in Laravel, offering pagination, search, and sorting features for enhanced user experience.

## Demo

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/4243b7c7-d293-4f57-8f3b-9783215e9e48)

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/08e26349-ce43-4066-b88f-f0357596e5f9)

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/2aed2567-6191-4b37-b916-15fac67432d5)

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/098ef0ab-1b0d-48d4-945c-b3fbb2868f9e)

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/ec05a4c7-dc32-403b-8b8f-548940745773)

![image](https://github.com/erfangnu/vat-laravel/assets/136471903/6b11410a-5112-427c-aabe-e520ca635cf6)

## Getting Start

```
composer install
composer update

# npm install
# npm run build

php artisan migrate
php artisan db:seed

php artisan test

./vendor/bin/pint -v
```

## Routes

```
GET|HEAD        / ....................................................................................................................................................................................... 
POST            _ignition/execute-solution ................................................................................ ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolutionController
GET|HEAD        _ignition/health-check ............................................................................................ ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController
POST            _ignition/update-config ......................................................................................... ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController
GET|HEAD        api/user ................................................................................................................................................................................ 
GET|HEAD        dashboard ................................................................................................................................... dashboard › Admin\DashboardController@index
GET|HEAD        forgot-password ................................................................................................. password.request › Laravel\Fortify › PasswordResetLinkController@create
POST            forgot-password .................................................................................................... password.email › Laravel\Fortify › PasswordResetLinkController@store
GET|HEAD        livewire/livewire.js ........................................................................................................ Livewire\Mechanisms › FrontendAssets@returnJavaScriptAsFile
GET|HEAD        livewire/livewire.min.js.map .................................................................................................................. Livewire\Mechanisms › FrontendAssets@maps
GET|HEAD        livewire/preview-file/{filename} ............................................................................... livewire.preview-file › Livewire\Features › FilePreviewController@handle
POST            livewire/update ..................................................................................................... livewire.update › Livewire\Mechanisms › HandleRequests@handleUpdate
POST            livewire/upload-file ............................................................................................. livewire.upload-file › Livewire\Features › FileUploadController@handle
GET|HEAD        login ................................................................................................................... login › Laravel\Fortify › AuthenticatedSessionController@create
POST            login ............................................................................................................................ Laravel\Fortify › AuthenticatedSessionController@store
POST            logout ................................................................................................................ logout › Laravel\Fortify › AuthenticatedSessionController@destroy
GET|HEAD        profile ......................................................................................................................................... profile › Admin\ProfileController@index
POST            profile ................................................................................................................................. profile.update › Admin\ProfileController@update
GET|HEAD        profile-delete .................................................................................................................. profile.delete › Admin\ProfileController@delete_profile
GET|HEAD        requests ................................................................................................................................ requests.index › Admin\RequestsController@index
POST            requests ................................................................................................................................ requests.store › Admin\RequestsController@store
GET|HEAD        requests/create ....................................................................................................................... requests.create › Admin\RequestsController@create
GET|HEAD        requests/{request} ........................................................................................................................ requests.show › Admin\RequestsController@show
DELETE          requests/{request} .................................................................................................................. requests.destroy › Admin\RequestsController@destroy
POST            reset-password .......................................................................................................... password.update › Laravel\Fortify › NewPasswordController@store
GET|HEAD        reset-password/{token} .................................................................................................. password.reset › Laravel\Fortify › NewPasswordController@create
GET|HEAD        sanctum/csrf-cookie ................................................................................................... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show
GET|HEAD        two-factor-challenge ................................................................................ two-factor.login › Laravel\Fortify › TwoFactorAuthenticatedSessionController@create
POST            two-factor-challenge .................................................................................................... Laravel\Fortify › TwoFactorAuthenticatedSessionController@store
GET|HEAD        up ...................................................................................................................................................................................... 
GET|HEAD        user/confirm-password .............................................................................................................. Laravel\Fortify › ConfirmablePasswordController@show
POST            user/confirm-password .......................................................................................... password.confirm › Laravel\Fortify › ConfirmablePasswordController@store
GET|HEAD        user/confirmed-password-status ......................................................................... password.confirmation › Laravel\Fortify › ConfirmedPasswordStatusController@show
POST            user/confirmed-two-factor-authentication ........................................................ two-factor.confirm › Laravel\Fortify › ConfirmedTwoFactorAuthenticationController@store
PUT             user/password ........................................................................................................ user-password.update › Laravel\Fortify › PasswordController@update
GET|HEAD        user/profile .............................................................................................................. profile.show › Laravel\Jetstream › UserProfileController@show
PUT             user/profile-information ........................................................................ user-profile-information.update › Laravel\Fortify › ProfileInformationController@update
POST            user/two-factor-authentication ............................................................................ two-factor.enable › Laravel\Fortify › TwoFactorAuthenticationController@store
DELETE          user/two-factor-authentication ......................................................................... two-factor.disable › Laravel\Fortify › TwoFactorAuthenticationController@destroy
GET|HEAD        user/two-factor-qr-code ........................................................................................... two-factor.qr-code › Laravel\Fortify › TwoFactorQrCodeController@show
GET|HEAD        user/two-factor-recovery-codes ............................................................................... two-factor.recovery-codes › Laravel\Fortify › RecoveryCodeController@index
POST            user/two-factor-recovery-codes ........................................................................................................... Laravel\Fortify › RecoveryCodeController@store
GET|HEAD        user/two-factor-secret-key .................................................................................. two-factor.secret-key › Laravel\Fortify › TwoFactorSecretKeyController@show
GET|HEAD        users ......................................................................................................................................... users.index › Admin\UsersController@index
POST            users ......................................................................................................................................... users.store › Admin\UsersController@store
GET|HEAD        users/create ................................................................................................................................ users.create › Admin\UsersController@create
PUT|PATCH       users/{user} ................................................................................................................................ users.update › Admin\UsersController@update
DELETE          users/{user} .............................................................................................................................. users.destroy › Admin\UsersController@destroy
GET|HEAD        users/{user}/edit ............................................................................................................................... users.edit › Admin\UsersController@edit

```

## Tests

```
$ php artisan test

PASS  Tests\Unit\ExampleTest
✓ that true is true

PASS  Tests\Feature\AuthenticationTest
✓ login screen can be rendered                                                                                                                                                                      0.91s  
✓ users can authenticate using the login screen                                                                                                                                                     0.04s  
✓ users can not authenticate with invalid password                                                                                                                                                  0.02s  

PASS  Tests\Feature\ExampleTest
✓ home page redirect to                                                                                                                                                                             0.01s  
✓ login                                                                                                                                                                                             0.02s  
✓ dashboard without token                                                                                                                                                                           0.01s  
✓ login with random user                                                                                                                                                                            0.02s  
✓ login with a user                                                                                                                                                                                 0.05s  

Tests:    9 passed (35 assertions)
Duration: 1.14s
```

Copyright 2024, Max Base
