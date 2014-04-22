
## Getting Started

First add to composer.json

```
	"codesleeve/platform-publish": "dev-master"
```

then add the service provider to the `providers` array in your `app\config\app.php`

```
	'Codesleeve\Platform\Publish\ServiceProvider',
```

then run commands for database

```
	php artisan migrate --package codesleeve/platform-publish
```


## Models provided with publish

### Codesleeve\Platform\Publish\Models\Menu

Name of the menu that hasMany menulinks.

 * title - the title of the menu

### Codesleeve\Platform\Publish\Models\MenuLink

Links that belong to a menu, attributes are:

 * title - title of this menu link
 * url - url of this menu link
 * menu_id - belongsTo menu
 * page_id - belongTo page (this can be null)

### Codesleeve\Platform\Publish\Models\Page

Content of a page that can be displayed, attributes are:

 * title - title of page
 * content - html content of page
 * layout - a particular view that you want to embed page content within
 * slug - human identifer for this page, primarily used to route to


### Codesleeve\Platform\Publish\Models\Photo

This is a place to store photos at. It uses Codesleeve\Stapler to handle uploads
and it can be used with the wysiwyg uploader too.


## Helper functions (possibly?)

menulinks($title)
: Returns an array of menulinks that belong to the menu with given title

page($slug or $id)
: Returns the given page with this slug or id
