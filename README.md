This repository contains classes for various VPS hosting providers' API's. This README.md file contains documentation for just the http_requests class. A different .md file will be created to document the usage of each class. Refer to the approriate .md file for documentation on whichever class you wish to use.

Because all classes extend the http_requests class, http_requests.php must be required, in addition to the file containing the class you want to use. Example:

```php
<?php

require_once("http_requests.php");
require_once("vultr.php");
```

## http_requests.php

### Instantiating the class

Here is an example of how to instantiate the http_requests class:

```php
<?php

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
<?php

$request->get("https://api.vultr.com/v1/os/list");
echo json_pretty($request->response);
echo "\n";
echo $request->response_code;
```

EXAMPLE RESPONSE: 

```json
{
    "127": {
        "OSID": "127",
        "name": "CentOS 6 x64",
        "arch": "x64",
        "family": "centos",
        "windows": false
    },
    "148": {
        "OSID": "148",
        "name": "Ubuntu 12.04 i386",
        "arch": "i386",
        "family": "ubuntu",
        "windows": false
    }
}
200
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
<?php

$request->keyget("https://api.vultr.com/v1/server/list");
echo json_pretty($request->response);
echo "\n";
echo $request->response_code;
```

EXAMPLE RESPONSE:
```json
{
    "576965": {
        "SUBID": "576965",
        "os": "CentOS 6 x64",
        "ram": "4096 MB",
        "disk": "Virtual 60 GB",
        "main_ip": "123.123.123.123",
        "vcpu_count": "2",
        "location": "New Jersey",
        "DCID": "1",
        "default_password": "nreqnusibni",
        "date_created": "2013-12-19 14:45:41",
        "pending_charges": "46.67",
        "status": "active",
        "cost_per_month": "10.05",
        "current_bandwidth_gb": 131.512,
        "allowed_bandwidth_gb": "1000",
        "netmask_v4": "255.255.255.248",
        "gateway_v4": "123.123.123.1",
        "power_status": "running",
        "server_state": "ok",
        "VPSPLANID": "28",
        "v6_network": "2001:DB8:1000::",
        "v6_main_ip": "2001:DB8:1000::100",
        "v6_network_size": "64",
        "v6_networks": [
            {
                "v6_network": "2001:DB8:1000::",
                "v6_main_ip": "2001:DB8:1000::100",
                "v6_network_size": "64"
            }
        ],
        "label": "my new server",
        "internal_ip": "10.99.0.10",
        "kvm_url": "https://my.vultr.com/subs/novnc/api.php?data=eawxFVZw2mXnhGUV",
        "auto_backups": "yes",
        "tag": "mytag"
    }
}
200
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
<?php

$data = array(
 'SUBID'=>123456,
 'label'=>"Example label",
);
$request->post("https://api.vultr.com/v1/server/label_set", $data);
echo $request->response;
echo $request->response_code;
```

EXAMPLE RESPONSE:
```
200
```

Important note: There are some API requests, such as the the Vultr one used in the example above, that do not return a string. With requests like these, it is good practice to confirm the HTTP response code to ensure the request completed.

A similar cURL command could be:
```shell
curl -w "%{http_code}" -H 'API-Key: APIKEY' --data "SUBID=123456" --data-urlencode 'label=Example label'
```
