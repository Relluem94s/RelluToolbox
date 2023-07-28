![Rellu Toolbox](https://img.relluem94.de/logos/web/rellutoolbox.png)

### a collection of usefull tools [Toolbox](https://toolbox.rellu.de)

# How to add a new Tool?

## Add JSON into tools.json with Configuration
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
* important is that the "name" has no spaces between the words

## Add `<toolname>.php` into tools/ Folder
```php
<?php
    echo "template";
?>
```


# Todos

1. Comma Seperator (from new Line)
1. Text Div