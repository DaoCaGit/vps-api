This repository contains classes for various VPS hosting providers' API's. This README.md file contains documentation for just the http_requests class. A different .md file will be created to document the usage of each class. Refer to the approriate .md file for documentation on whichever class you wish to use.

Because all classes extend the http_requests class, http_requests.php must be required, in addition to the file containing the class you want to use. Example:

```php
require_once("http_requests.php");
require_once("vultr.php");
```

## http_requests.php

### Instantiating the class

Here is an example of how to instantiate the http_requests class:

```php
require_once("http_requests.php");
$request = new http_requests("APIKEY");
```

Because this class was written with the intention of using it with VPS API's, an API key is always required. It is not recommended for this class to be used where an API key is unnecessary.

After a function is run, two possible values can be pulled from the class:

- response (per the example, `$request->response`) - The string returned from the request.
- response_code (per the example, `$request->response`) - The HTTP status code.

### json_pretty()

**json_pretty** - Formats unformatted JSON.

It is important to note that this function was intended for debugging purposes only. Even when debugging, it sometimes hides the output. If there is no output, it returns "null".

**SYNOPSIS:** `json_pretty(string $notpretty);`

**notpretty** - A string containing unformatted JSON.

### get()

**get** - Performs basic HTTP GET request. 

**SYNOPSIS:** `get(string $url);`

**url** - URL indicating the location of the content you want to get.

EXAMPLE:

```php
$request->get("https://api.vultr.com/v1/os/list");
echo $request->response;
echo $request->response_code;
```

A similar cURL command could be:

```shell
curl -w "%{http_code}" "https://api.vultr.com/v1/os/list"
```

### keyget()

**keyget** - Performs HTTP GET request and passes the API key in the HTTP header. The API key is defined when the class is instatiated (see the "instantiating" section near the top of this document).

**SYNOPSIS:** `keyget(string $url);`

**url** - URL indicating the location of the content you want to get.

EXAMPLE:
```php
$request->keyget("https://api.vultr.com/v1/server/list");
echo $request->response;
echo $request->response_code;
```

A similar cURL command could be:

```shell
curl -w "%{http_code}" -H 'API-Key: APIKEY' "https://api.vultr.com/v1/server/list"
```

### post()

**post** - Performs HTTP POST request. 

**SYNOPSIS:** `post(string $url, array $data);`

**url** - URL indicating the location you want to post to.

**data** - The data you are posting. This must be an array.

EXAMPLE:
```php
$data = array(
 'SUBID'=>123456,
 'label'=>"Example label",
);
$request->post("https://api.vultr.com/v1/server/label_set", $data);
echo $request->response;
echo $request->response_code;
```

A similar cURL command could be:

```shell
curl -w "%{http_code}" -H 'API-Key: APIKEY' --data "SUBID=123456" --data-urlencode 'label=Example label'
```
