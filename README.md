# EZ Laravel Cookie Consent

Simple package to display a cookie consent dialog in your Laravel application.

## Installation

Run the following command in your project directory to install the package:

```
composer require ez-laravel/cookie-consent
```

Run the following command to publish the vue components & views of the package so you can customize these to your specific application:

```
php artisan vendor:publish --provider="EZ\\CookieConsent\\Providers\\CookieConsentServiceProvider" --tag=frontend
```

Make sure the Vue.js component is loaded; I usually use the following code in `app.js` to load all available components automatically:

```js
// Automatically load all vue components
const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
```

Ironically this package uses a cookie to store the users answer; if you wish to customize the name of the cookie you should publish the configure file and override the `cookie_name` property.

```
php artisan vendor:publish --provider="EZ\\CookieConsent\\Providers\\CookieConsentServiceProvider" --tag=config
```

## Usage

All you have to do now is include the cookie consent dialog partial in your layout and it will be shown to the user until they either agree or disagree with the dialog.

```html
@include("cookieconsent::dialog")
```

## Contributing

If you want to contribute feel free to submit a pull request!