
Getting Started

First add to composer.json

```
	"codesleeve/platform-publish": "dev-master"
```

then add the service provider to the `providers` array in your `app\config\app.php`

```
	'Codesleeve\PlatformPublish\PublishServiceProvider',
```

then run commands for database

```
	php artisan migrate --package codesleeve/platform-publish
```