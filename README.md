# Phosphor Icons Library for Laravel

Add Phosphor Icons on Laravel Web Application. To add icon to web application common methods is using component import e.g. import { IconName }. With Phosphor Icons Library for Laravel, icon information is saved inside database. Allow icon change on web page without recompile web application.

![Screenshot](https://github.com/juikong/phosphoricon/blob/master/Screenshot.png)

## Installation

Install package with composer

```bash
composer require juiko/phosphoricon
```

Then run migration to create database table for Phosphor Icons

```bash
php artisan migrate
```

After that run import command to import icon data into Phosphor Icons

```bash
php artisan phosphor-icon:import
```

Install Phosphor Icon packages and utils, example for React

```bash
npm i @phosphor-icons/react
php artisan vendor:publish --tag=public
```

## Usage

### Icon Library

To create api to display Phosphor Icon Library, add PhosphorIcon Facades into Controller then call getData()

```php
use PhosphorIcon;

...
public function icons()
{
  return PhosphorIcon::getData();
}
...
```

To display icons after call the api, example for React

```jsx
import { phosphorIconCustom } from "@/Components/PhosphorIconUtils";

...
{icons.map((icon, index) => {
  const IconCustom = phosphorIconCustom(icon);
  return (
    <IconCustom key={index} className="w-8 h-8" size="16" onClick={() => console.log("Selected Icon: %d", icon.id)}/>
  );
})}
...
```

### Render Icon

Use getIcon method to retrieve icon data if phosphor_icon_id column exist

```php
use PhosphorIcon;

...
public function index(Request $request)
{
  $mymodel = Mymodel::get();
  $mymodelWithIcon = PhosphorIcon::getIcon($mymodel);

  return response()->json($mymodelWithIcon);
}
...
```

To render icons after call the api, example for React (item.phosphoricon is icon data and 16 is icon size in px)

```jsx
import { phosphorIcon } from "@/Components/PhosphorIconUtils";

...
<div>{phosphorIcon(item.phosphoricon, 16)}</div>
...
```

## Roadmap

- Support for Blade and Vue

## License

[MIT](https://choosealicense.com/licenses/mit/)
