# Laravel-Dribbble

Laravel Bundle: Dribbble API Wrapper
------------------------------------

## Installation

### Artisan
```php
php artisan bundle:install dribbble
```
### Manually
Create the folder "dribbble" in your "bundles" and paste files from this Github repository: 

```php 
https://github.com/ariok/Laravel-Dribbble
```

## Bundle Registration

Add the following code to your **application/bundles.php** file:

```php
'dribbble' => array('auto'  => true, 'handles' => 'dribbble'),
```

## Usage

### Static 
You can access every Dribbble API service by static calls: 

```php 
Dribbble::shots("jumpzero");
```

**With Pagination**

 ```php 
 Dribbble:shots("jumpzero",3,20) //Get shots by Jumpzero, starting from page 3 and displaying 20 results per page
 ```

### By URL
Or by your website URL 

```php
http://yoursite.com/dribbble/shots/jumpzero
```

**With Pagination**
```
http://yoursite.com/dribbble/shots/jumpzero/3/20
```

You can block direct-URL-call by deleting the routing rule in 
**bundles/dribbble/routes.php**. 

## Methods list
For more information about the methods you can check the [Official Dribbble API Documentation](http://api.dribbble.com ) 

**/shots/:id**
```php 
Dribbble::shots(:id);
```

**/shots/:id/rebounds**
```php 
Dribbble::rebounds(:id);
```

**/shots/:id/comments**
```php 
Dribbble::comments(:id);
```

**/shots/:list**
```php 
Dribbble::shotsList("popular" or "everyone" or "debuts");
```

**/players/:id/shots**
```php 
Dribbble::playersShots(:id);
```

**/players/:id/shots/following**
```php 
Dribbble::playersShotsFollowing(:id);
```

**/players/:id/shots/likes**
```php 
Dribbble::playersShotsLikes(:id);
```

**/players/:id**
```php 
Dribbble::players(:id);
```
**/players/:id/followers**
```php 
Dribbble::playersFollowers(:id);
```

**/players/:id/following**
```php 
Dribbble::playersFollowing(:id);
```

**/players/:id/draftees**
```php 
Dribbble::playersDraftees(:id);
```











