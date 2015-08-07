# Laravel 4|5 ClusterPoint DB Support

###Laravel-ClusterPoint [NOT A WORKING VERSION]


**Please report any bugs you may find.**

- [Requirements](#requirements)
- [Installation](#installation)

###Requirements
- PHP >= 5.4

###Installation
```
{
    "require": {
        "shivergard/laravel-clusterpoint": "*"
    }
}
```

And then run `composer update`

Once Composer has installed or updated your packages you need to register the service provider. Open up `app/config/app.php` and find the `providers` key and add:

```php
'shivergard\Clusterpoint\ClusterpointServiceProvider'
```

Then setup a valid database configuration using the driver `clusterpoint`. Configure your connection as usual with:

```php
'clusterpoint' => array(
    'driver' => 'clusterpoint',
    'host' => '',
    'database' => 'xe',
    'username' => 'hr',
    'password' => 'hr',
    'account_id' => '123'
)
```

And run your laravel installation...



###License

Licensed under the [MIT License](http://cheeaun.mit-license.org/).
