# Lararole

Lararole is the package to manage user's roles and permissions for your website/blog/website by using this package you will have role and permissions module where you can define as many role as you want along with permissions as well as you can easily customize theme as per your theme requirements.

>**Please Note** this package will assume you are already using laravel authentication system and you have already `users` table in your database

## Installation

In order to use **Laravel** firstly, pull in the package through Composer

```$xslt
composer require ge/lararole
```

you can also add this package in your project's `composer.json` file.

```$xslt
"require": {
  "Ge/Lararole": "1.*",
}
```
after adding package in composer.json you will need to update composer
```
composer update
```

And then include the service provider within `app/config/app.php`

```$xslt
'providers' => [
    Ge\Lararole\LararoleServiceProvider::class
];
```

If you are in **laravel 5.6** then skip the last step laravel auto discover feature will be add automatically

#### Run Migration

```
php artisan migrate
```
This will generate necessary database tables

###### Make User model Rolable
Open User Model and add rolable trait on it.

```$xslt
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ge\Lararole\Ge\Rolable;

class User extends Authenticatable
{
    use Notifiable, Rolable;
}
```

>**You are all set**

Now you can user the package

##### All available Routes
URL | Method | ROUTE NAME | Comments 
--- | --- | --- | ---
domain.com/roles | GET | route('roles') | show all available roles
domain.com/roles | POST | route('roles.store') | Insert new role
domain.com/roles/{role}/show | GET | route('roles.show') | Show single role
domain.com/roles/{role}/edit | GET | route('roles.edit') | Role edit form
domain.com/roles/{role}/edit | PUT | route('roles.update') | Update given role
domain.com/roles/{role}/delete | GET | route('roles.destroy') | Role delete role
domain.com/permissions | GET | route('permissions') | show all available permissions
domain.com/permissions | POST | route('permissions.store') | Insert new permission
domain.com/permissions/{permission}/show | GET | route('permissions.edit') | Show single permission
domain.com/permissions/{permission}/edit | GET | route('permissions.edit') | Permission edit form
domain.com/permissions/{permission}/edit | PUT | route('permissions.update') | Update given permission
domain.com/permissions/{permission}/delete | GET | route('permissions.destroy') | Role delete permission

## Template Customization
Of-course you want to customize template as per your site theme, you can override the template by publish vendor to your views directory

```$xslt
php artisan vendor:publish --provider=Ge\Lararole\LararoleServiceProvider::class --tag=views
```

## Useful methods

```$xslt
// all the roles has assigned to this user

$user = User::find(1);

foreach($user->roles as $role)
{
    echo $role->name . '</br>';
}


// list all the permissions has in role with ID 1

$role = Role::find(1);

foreach($role->permissions as $permission)
{
    echo $permission->name . '</br>';
}
```
<!--
### GATES
You can use the gate functionality to your Controllers or Views to accessing protected resources

```
@allows('add-user')
    {{ 'you can add new user' }}
@endallows
```

```$xslt
if( GATE::allows('add-user') ) :
    echo 'You can add new user';
endif;
```

-->

**Happy coding...**