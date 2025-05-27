![Rellu Toolbox](https://static.relluem94.de/logos/web/rellutoolbox.png)

### a collection of useful tools [Toolbox](https://toolbox.rellu.de)

# How to add a new Tool?

## Add JSON into shared/config/tools.json with Configuration

```json
{
  "name": "template",
  "displayname": "template",
  "icon": "template",
  "description": "template",
  "bgclass": "template",
  "content": "./tools/template.php"
}
```

like

```json
{
  "name": "rollTheDice20",
  "displayname": "Roll the Dice20",
  "icon": "fa-solid fa-dice-d20",
  "description": "Generates Numbers between 1-20",
  "bgclass": "bg-warning",
  "content": "./tools/rollTheDice20.php"
}
```

## Add `<toolname>.php` into tools/ Folder

```php
<?php
    echo "template";
?>
```

### Good to know

- important is to use camelCase for the `name`.
- The `displayname` is used as modal title
- If you need a php script that is called by your tool add a folder like `./tools/rollTheDice20/`
- Additional CSS Files can be stored in `./assets/css/`
- Additional JS Files can be stored in `./assets/js/`
- Additional Images can be stored in `./assets/img/`
- The Main Language for this Project is English

### Colors

| Color      | Class        | Use                                |
| ---------- | ------------ | ---------------------------------- |
| Yellow     | bg-warning   | Generators                         |
| Blue       | bg-primary   | Calculators & Tools with API Calls |
| Gray       | bg-secondary | Free                               |
| Light Blue | bg-info      | Converter                          |
| Green      | bg-success   | Free                               |
| Red        | bg-danger    | Free                               |

# Todos

1. Comma Seperator (from new Line)
1. Text Div

# Deploy

1. ```shell
   git clone https://github.com/Relluem94/RelluToolbox.git
   ```
1. ```shell
   ./build.sh
   ```
1. clone `prod.env.example` over to `prod.env` and fill in the values
