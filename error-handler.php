<?php

$status = isset($_SERVER['REDIRECT_STATUS']) ? $_SERVER['REDIRECT_STATUS'] : null;
$codes=array(
    // 1xx Informational
    100 => array('100 Continue', 'The server has received the request headers and the client should proceed to send the request body.'),
    101 => array('101 Switching Protocols', 'The requester has asked the server to switch protocols and the server has agreed to do so.'),
    102 => array('102 Processing', 'A WebDAV request may contain many sub-requests involving file operations, requiring a long time to complete the request. This code indicates that the server has received and is processing the request, but no response is available yet.'),

    // 2xx Success
    200 => array('200 OK', 'The request was successful.'),
    201 => array('201 Created', 'The request was successful, and a resource was created as a result.'),
    202 => array('202 Accepted', 'The request has been accepted for processing, but the processing has not been completed.'),
    203 => array('203 Non-Authoritative Information', 'The request was successful, but the enclosed payload has been modified from that of the origin server\'s 200 (OK) response by a transforming proxy.'),
    204 => array('204 No Content', 'The server has fulfilled the request but does not need to return an entity-body, and might want to return updated metainformation.'),
    205 => array('205 Reset Content', 'The server has fulfilled the request and the user agent SHOULD reset the document view which caused the request to be sent.'),
    206 => array('206 Partial Content', 'The server has fulfilled the partial GET request for the resource.'),

    // 3xx Redirection
    300 => array('300 Multiple Choices', 'The request has more than one possible response. The user-agent or user should choose one of them.'),
    301 => array('301 Moved Permanently', 'The URL of the requested resource has been changed permanently. The new URL is given in the response.'),
    302 => array('302 Found', 'This response code means that the URI of requested resource has been changed temporarily. New changes in the URI might be made in the future.'),
    303 => array('303 See Other', 'The server sent this response to direct the client to get the requested resource at another URI with a GET request.'),
    304 => array('304 Not Modified', 'If the client has performed a conditional GET request and access is allowed, but the document has not been modified, the server SHOULD respond with this status code.'),
    305 => array('305 Use Proxy', 'The requested resource MUST be accessed through the proxy given by the Location field.'),
    306 => array('306 (Unused)', 'The 306 status code was used in a previous version of the HTTP specification, is no longer used, and the code is reserved.'),
    307 => array('307 Temporary Redirect', 'The requested resource resides temporarily under a different URI.'),
    308 => array('308 Permanent Redirect', 'This means that the resource is now permanently located at another URI, specified by the Location: HTTP Response header. This has the same semantics as the 301 Moved Permanently HTTP response code, with the exception that the user agent must not change the HTTP method used.'),

    // 4xx Client Error
    400 => array('400 Bad Request', 'The request cannot be fulfilled due to bad syntax.'),
    401 => array('401 Unauthorized', 'The request requires user authentication.'),
    402 => array('402 Payment Required', 'The code is reserved for future use.'),
    403 => array('403 Forbidden', 'The server understood the request, but it refuses to authorize it.'),
    404 => array('404 Not Found', 'The requested resource could not be found on this server.'),
    405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the resource identified by the Request-URI.'),
    406 => array('406 Not Acceptable', 'The server has found a resource matching the request URI, but it cannot send a response acceptable to the client.'),
    407 => array('407 Proxy Authentication Required', 'The client must first authenticate itself with the proxy.'),
    408 => array('408 Request Timeout', 'The client did not produce a request within the time the server was prepared to wait.'),
    409 => array('409 Conflict', 'The request could not be completed due to a conflict with the current state of the resource.'),
    410 => array('410 Gone', 'The requested resource is no longer available and will not be available again.'),
    411 => array('411 Length Required', 'The server requires a Content-Length header field to be present in the request.'),
    412 => array('412 Precondition Failed', 'One or more conditions given in the request header fields evaluated to false when tested on the server.'),
    413 => array('413 Payload Too Large', 'The server is refusing to process a request because the request payload is larger than the server is willing or able to process.'),
    414 => array('414 URI Too Long', 'The URI provided was too long for the server to process.'),
    415 => array('415 Unsupported Media Type', 'The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource.'),
    416 => array('416 Range Not Satisfiable', 'The client has asked for a portion of the file, but the server cannot supply that portion.'),
    417 => array('417 Expectation Failed', 'The server could not meet the expectation given in the Expect request-header field.'),
    418 => array('418 I\'m a teapot', 'The server refuses the attempt to brew coffee with a teapot.'),
    421 => array('421 Misdirected Request', 'The request was directed at a server that is not able to produce a response.'),
    422 => array('422 Unprocessable Entity', 'The server understands the content type of the request entity and the syntax of the request entity is correct, but was unable to process the contained instructions.'),
    423 => array('423 Locked', 'The resource that is being accessed is locked.'),
    424 => array('424 Failed Dependency', 'The request failed due to failure of a previous request.'),
    425 => array('425 Too Early', 'The server is unwilling to risk processing a request that might be replayed.'),
    426 => array('426 Upgrade Required', 'The client should switch to a different protocol such as TLS/1.0.'),
    428 => array('428 Precondition Required', 'The origin server requires the request to be conditional.'),
    429 => array('429 Too Many Requests', 'The user has sent too many requests in a given amount of time.'),
    431 => array('431 Request Header Fields Too Large', 'The server is unwilling to process the request because its header fields are too large.'),
    440 => array('440 Login Timeout', 'A Microsoft extension. Indicates that your session has expired.'),
    449 => array('449 Retry With', 'A Microsoft extension. The request should be retried after doing the appropriate action.'),
    451 => array('451 Redirect', 'Microsoft Exchange Extension. Redirect destination in request header.'),
    444 => array('444 No Response', 'Used to indicate that the server has returned no information to the client and closed the connection.'),
    494 => array('494 Request Header Too Large', 'Client sent too large request or too long header line.'),
    495 => array('495 SSL Certificate Error', 'An expansion of the 400 Bad Request response code, used when the client has provided an invalid client certificate.'),
    496 => array('496 SSL Certificate Required', 'An expansion of the 400 Bad Request response code, used when a client certificate is required but not provided.'),
    497 => array('497 HTTP Request Sent to HTTPS Port', 'An expansion of the 400 Bad Request response code, used when the client has made a HTTP request to a port listening for HTTPS requests.'),
    499 => array('499 Client Closed Request', 'Used when the client has closed the request before the server could send a response.'),
    // 5xx Server Error
    500 => array('500 Internal Server Error', 'The server encountered an unexpected condition which prevented it from fulfilling the request.'),
    501 => array('501 Not Implemented', 'The server does not support the functionality required to fulfill the request.'),
    502 => array('502 Bad Gateway', 'The server, while acting as a gateway or proxy, received an invalid response from the upstream server it accessed in attempting to fulfill the request.'),
    503 => array('503 Service Unavailable', 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.'),
    504 => array('504 Gateway Timeout', 'The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server.'),
    505 => array('505 HTTP Version Not Supported', 'The server does not support, or refuses to support, the HTTP protocol version that was used in the request message.'),
    506 => array('506 Variant Also Negotiates', 'Transparent content negotiation for the request, results in a circular reference.'),
    507 => array('507 Insufficient Storage', 'The server is unable to store the representation needed to complete the request.'),
    508 => array('508 Loop Detected', 'The server detected an infinite loop while processing a request with "Depth: infinity".'),
    509 => array('509 Bandwidth Limit Exceeded', 'The server has exceeded the bandwidth specified by the server administrator; this is often used by shared hosting providers to limit the bandwidth of customers.'),
    510 => array('510 Not Extended', 'Further extensions to fulfill the request are needed.'),
    511 => array('511 Network Authentication Required', 'The client needs to authenticate to gain network access.'),
    520 => array('520 Web Server Returned an Unknown Error', 'The server is acting as a gateway or proxy and cannot or will not provide a valid response.'),
    521 => array('521 Web Server Is Down', 'The server is down and cannot accept connections.'),
    522 => array('522 Connection Timed Out', 'The server is acting as a gateway or proxy and did not receive a timely response from the upstream server.'),
    523 => array('523 Origin Is Unreachable', 'The server is acting as a gateway or proxy and cannot reach the upstream server.'),
    524 => array('524 A Timeout Occurred', 'The server is acting as a gateway or proxy and did not receive a timely response from the upstream server.'),
    525 => array('525 SSL Handshake Failed', 'Cloudflare could not negotiate an SSL handshake with the origin server.'),
    527 => array('527 Railgun Error', 'Error is returned when the Railgun Listener is unable to reach the Railgun origin after a request has been received.'),
    530 => array('530 Not Extended', 'Further extensions to fulfill the request are needed.'),
    598 => array('598 Network read timeout error', 'This status code is not specified in any RFCs, but is used by some HTTP proxies to signal a network read timeout behind the proxy to a client in front of the proxy.'),
    599 => array('599 Network connect timeout error', 'This status code is not specified in any RFCs, but is used by some HTTP proxies to signal a network read timeout behind the proxy to a client in front of the proxy.'),
    // Unofficial codes
    103 => array('103 Early Hints', 'Used to return some response headers before the final HTTP message.'),
    419 => array('419 Page Expired', 'Used by Laravel when the CSRF token is expired.'),
    420 => array('420 Enhance Your Calm', 'Returned by the Twitter Search and Trends API when the client is being rate-limited.'),
    430 => array('430 Request Header Fields Too Large', 'Used by Shopify.'),
    450 => array('450 Blocked by Windows Parental Controls', 'Used by Microsoft\'s Windows Parental Controls to block inappropriate web content.'),
    498 => array('498 Invalid Token', 'Returned by ArcGIS for Server when a token is invalid.'),
    526 => array('526 Invalid SSL Certificate', 'Used by Cloudflare and Cloud Foundry\'s Gorouter to indicate a failure to validate the SSL/TLS certificate that the origin server presented.'),
    529 => array('529 Site is overloaded', 'Used by Qualys in the SSLLabs server testing API to signal that the site can\'t process the request.'),
);

try {
    if ($status !== null && isset($codes[$status])) {
        $errortitle = $codes[$status][0];
        $message = $codes[$status][1];
    } else {
        if (is_numeric($status) && strlen($status) === 3) {
            $errortitle = $status . ' Unknown Status Code';
            $message = 'This status code is not defined in the current error handling system.';
        } else {
            $errortitle = 'Invalid Status Code';
            $message = 'The received status code is invalid or not defined in the current error handling system.';
        }

        // Print all server variables
        ob_start();
        print_r($_SERVER);
        $serverVars = ob_get_clean();

        // Print all environment variables
        ob_start();
        print_r($_ENV);
        $envVars = ob_get_clean();

        // Add these to the message
        $message .= "<pre>\n\nServer Variables:\n" . htmlentities($serverVars);
        $message .= "\n\nEnvironment Variables:\n" . htmlentities($envVars) . "</pre>";
    }
} catch (Exception $e) {
    // In the case of an unexpected error, the following code will run
    $errortitle = 'Unexpected Error';
    $message = $e->getMessage();  // Get the error message from the Exception object
    $message .= "\n\nException trace:\n" . $e->getTraceAsString(); // Get the stack trace from the Exception
}


?>
?>

<!doctype html>
<html>
<head>
    <title>Error</title>
    <style>
        html
        {color:#333;
            font-family: "Lucida Console", Courier, monospace;
            font-size:14px;
            background:#eeeeee;}

        .content
        {margin:0 auto;
            width:1000px;
            margin-top:20px;
            padding:10px 0 10px 0;
            border:1px solid #EEE;
            background: none repeat scroll 0 0 white;
            box-shadow: 0 5px 10px -5px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        h1
        {font-size:18px;
            text-align:center;}

        h1.title
        {color:red;}

        h2
        {font-size:16px;
            text-align:center;}

        p
        {text-align:center;}

        hr
        {border:#fe4902 solid 1px;}

    </style>
</head>

<body>

<div class="content">
    <h1>Sorry, an error occurred!</h1>
    <h1 class="title"><?php echo $errortitle; ?></h1>
    <hr>
    <p><?php echo $message;?></p>
</div>

</body>
</html>
