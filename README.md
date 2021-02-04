# Laravel Flash Messages with livewire support
## Installation

install via composer

```bash
composer require webdo-cz/livewire-flash
```

## Setup

add before `</body>`

```html
<livewire:flash-messages />
```

## Usage

make a call to the `flash()` function.

```php
$flash = [
    'type' => 'success',
    'title' => 'Success',
    'message' => 'Post added to our database',
];

flash($flash, $this);
```
($this is used for livewire support)

There are three types: success, warning, error
