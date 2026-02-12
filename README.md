# Ask AI

> A WordPress plugin that acts as a wrapper for the WP AI Client.

## Installation

1. Add the plugin.
1. Download the WP AI Client.
```sh
cd wp-content/plugins/ask-ai
composer require wordpress/wp-ai-client
```
3. Add an API key in `Settings > AI Credentials`.

## Usage

```php
$result = ask_ai( 'What is the answer to life, the universe, and everything?' );

// (bool) $result['success']
// (string) $result['data']
```

## Author

[Tim Brugman](https://github.com/Brugman)

