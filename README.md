# HTTP Status Code Handler

This PHP script is a simple HTTP status code handler, designed to provide informative and human-readable error messages for a wide range of HTTP status codes. From informational and success codes to client errors and server errors, it aims to provide useful feedback based on the status code it receives.

## Overview

The script starts by getting the `REDIRECT_STATUS` value from the `$_SERVER` superglobal. If the status code is present in the predefined list of codes, it fetches the corresponding title and message. If the status code is not in the list but is a valid 3-digit code, a generic message is displayed. If the received status is not a valid 3-digit code, an error is thrown with information about the server and environment variables.

In case of an unexpected error, the script catches the exception, displays the exception message, and prints the exception trace.

## Usage

---

## Setting up .htaccess

To use this custom error handling script effectively, you need to setup your `.htaccess` file to redirect error requests to it. Here's a basic example of how you can do this:

```htaccess
ErrorDocument 400 /error-handler.php
ErrorDocument 401 /error-handler.php
ErrorDocument 403 /error-handler.php
ErrorDocument 404 /error-handler.php
ErrorDocument 500 /error-handler.php
# ... and so on for each error code you want to handle
```

In this example, `/error-handler.php` should be the path to the error handling script relative to the web root.

If your script is not at the root directory, adjust the path accordingly. For example, if your script is inside an `includes` directory, you would use:

```htaccess
ErrorDocument 400 /includes/error-handler.php
# ...
```

Remember that the `.htaccess` file should be in the root directory of your website. If it's not already there, you'll need to create it.

Please note that usage of `.htaccess` files requires the server to be running Apache and have the `AllowOverride` directive enabled. If you're using a different server such as Nginx or if `AllowOverride` is disabled, you would need to use a different method to redirect error requests to the script.

---

To use this script, simply include it at the beginning of your PHP file:

```php
<?php
require 'http_status_handler.php';
```

Make sure to replace 'http_status_handler.php' with the actual path to this script.

Once included, the script will automatically handle any HTTP status code it encounters.

## Contributing

1. Fork the project.
2. Create your feature branch (`git checkout -b feature/AmazingFeature`).
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the branch (`git push origin feature/AmazingFeature`).
5. Open a pull request.

For major changes, please open an issue first to discuss what you would like to change.

## Contact

If you have any questions, issues, or suggestions, feel free to open an issue or submit a pull request.

## Acknowledgments

* Special thanks to the creators of PHP and HTTP protocol for making this possible.

## Disclaimer

This script is provided "as is", without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from, out of or in connection with the script or the use or other dealings in the script.
