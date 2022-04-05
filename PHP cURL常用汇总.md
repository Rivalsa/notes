# PHP cURL函数

## curl_init($url)

初始化一个新会话，返回一个cURL句柄，供`curl_seropt`，`curl_exec`和`curl_close`函数使用。

**参数**

- `url`可选，字符串，如果提供了此参数，`CURLOPT_URL`选项将会被设置位这个值。如果这里不设置，也可以通过`curl_setopt`函数手动设置这个值。

**返回值**

- 如果成功则返回一个新的cURL句柄，出错返回`false`。

## curl_setopt(\$ch,​\$option,$value)

对cURL会话的选项进行设置。

**参数**

- `ch`由`curl_init`返回的cURL句柄。
- `option`需要设置的选项。
- `value`将选项设置为的值。

> 此函数有如下常用选项可以设置：
>
> | 选项                      | 说明                                                         | 值的类型 |
> | ------------------------- | ------------------------------------------------------------ | -------- |
> | CURLOPT_HEADER            | 启用时会将头文件的信息作为数据流输出。                       | bool     |
> | CURLOPT_RETURNTRANSFER    | 将`curl_exec`获取的信息以字符串返回，而不是直接输出。        | bool     |
> | CURLOPT_SSL_VERIFYPEER    | 禁止 cURL 验证对等证书（peer's certificate）。要验证的交换证书可以在 `CURLOPT_CAINFO` 选项中设置，或在 `CURLOPT_CAPATH`中设置证书目录。 | bool     |
> | CURLOPT_SSL_VERIFYHOST    | 设置为 1 是检查服务器SSL证书中是否存在一个公用名(common name)。译者注：公用名(Common Name)一般来讲就是填写你将要申请SSL证书的域名 (domain)或子域名(sub domain)。 设置成 2，会检查公用名是否存在，并且是否与提供的主机名匹配。 0 为不检查名称。 在生产环境中，这个值应该是 2（默认值）。 | integer  |
> | CURLOPT_CAINFO            | 一个保存着1个或多个用来让服务端验证的证书的文件名。这个参数仅仅在和`CURLOPT_SSL_VERIFYPEER`一起使用时才有意义。 | string   |
> | CURLOPT_CAPATH            | 一个保存着多个CA证书的目录。这个选项是和`CURLOPT_SSL_VERIFYPEER`一起使用的。 | string   |
> | CURLOPT_COOKIE            | 设定 HTTP 请求中`Cookie`"部分的内容。多个 cookie 用分号分隔，分号后带一个空格(例如:`"fruit=apple; colour=red"`)。 | string   |
> | CURLOPT_REFERER           | 在HTTP请求头中`Referer`的内容。                              | string   |
> | CURLOPT_URL               | 需要获取的URL地址，也可以在`curl_init`函数中设置。           | string   |
> | CURLOPT_USERAGENT         | 在HTTP请求中包含一个`User-Agent`头的字符串。                 | string   |
> | CURLOPT_POST              | 发送 POST 请求，类型为`application/x-www-form-urlencoded`，是 HTML 表单提交时最常见的一种。 | Bool     |
> | CURLOPT_HTTPHEADER        | 设置 HTTP 头字段的数组。格式： `array('Content-type: text/plain', 'Content-length: 100')` | array    |
> | CURLOPT_HTTPGET           | 设置 HTTP 的 method 为 GET，由于默认是 GET，所以只有 method 被修改时才需要这个选项。 | Bool     |
> | CURLOPT_DNS_CACHE_TIMEOUT | 设置在内存中保存DNS信息的时间，默认为120秒。                 | Integer  |
> | CURLOPT_TIMEOUT           | 设置cURL允许执行的最长秒数。                                 | Integer  |
> | CURLOPT_TIMEOUT_MS        | 设置cURL允许执行的最长毫秒数。                               | Integer  |
> | CURLOPT_CUSTOMREQUEST     | HTTP 请求时，使用自定义的 Method 来代替"GET"或"HEAD"。对 "DELETE" 或者其他更隐蔽的 HTTP 请求有用。 有效值如 "GET"，"POST"，"CONNECT"等等；也就是说，不要在这里输入整行 HTTP 请求。例如输入"GET /index.html HTTP/1.0\r\n\r\n"是不正确的。 | String   |
> | CURLOPT_POSTFIELDS        | 全部数据使用HTTP协议中的 "POST" 操作来发送。 要发送文件，在文件名前面加上@前缀并使用完整路径。 文件类型可在文件名后以 `;type=mimetype` 的格式指定。 这个参数可以是 urlencoded 后的字符串，类似`para1=val1&para2=val2&...`，也可以使用一个以字段名为键值，字段数据为值的数组。 如果value是一个数组，`Content-Type`头将会被设置成`multipart/form-data`。 从 PHP 5.2.0 开始，使用 @ 前缀传递文件时，value 必须是个数组。 从 PHP 5.5.0 开始, @ 前缀已被废弃，文件可通过 CURLFile 发送。 设置 `CURLOPT_SAFE_UPLOAD` 为 `true` 可禁用 @ 前缀发送文件，以增加安全性。 | String   |
> | CURLOPT_SAFE_UPLOAD       | 禁用 @ 前缀在 CURLOPT_POSTFIELDS 中发送文件。 意味着 @ 可以在字段中安全得使用了。 可使用 CURLFile 作为上传的代替。 | bool     |
> | CURLOPT_USERPWD           | 传递一个连接中需要的用户名和密码，格式为："[username]:[password]"。 | String   |

**返回值**

成功时返回`true`，失败时返回`false`。

## curl_setopt_array(\$ch,​\$options)

为cURL传输会话批量设置选项。这个函数对于需要设置大量的cURL选项是非常有用的，不需要重复地调用 `curl_setopt`。

**参数**

`ch`由 curl_init() 返回的 cURL 句柄。

`options`用来确定将被设置的选项及其值的数组。其键值必须是一个有效的`curl_setopt`常量或者是它们对等的整数值。

**返回值**

如果全部的选项都被成功设置，返回`TRUE`。如果一个选项不能被成功设置，马上返回`FALSE`，忽略其后的任何在 options 数组中的选项。

## curl_exec($ch)

执行给定的cURL会话。这个函数应该在初始化一个cURL会话并且全部的选项都被设置后被调用。

**参数**

`ch`由`curl_init`返回的cURL句柄。

**返回值**

成功时返回`TRUE`， 失败时返回`FALSE`。然而，如果`CURLOPT_RETURNTRANSFER`选项设置为`true`，函数执行成功时会返回执行的结果，失败时返回 FALSE 。

## curl_close($ch)

关闭一个cURL会话并且释放所有资源。cURL句柄ch 也会被释放。

**参数**

`ch`由`curl_init`返回的cURL句柄。

**返回值**

没有返回值。