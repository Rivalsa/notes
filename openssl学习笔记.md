# openssl 学习笔记

## 非对称加密

### genrsa 指令

`genrsa` 指令用于生成私钥，其格式为：

```bash
openssl genrsa [参数] [私钥位数]
```

输出生成的私钥。如果省略私钥位数，则默认生成 2048 位的私钥。

常用参数如下：

> `-out {filename}` 不输出生成的私钥，而是将生成的私钥写入 {filename} 文件
>
> `-aes128`、`-aes192`、`-aes256` 将生成的私钥用指定的对称加密算法加密后再输出或写入文件

不太常用或者我没太弄清楚的参数如下：

> `-des`、`-des3`、`-camellia128`、`-camellia192`、`-camellia256`等 将生成的私钥用指定的对称加密算法加密后再输出或写入文件
>
> `-f4` 使用 65537 (0x10001) 作为 E 值
>
> `-3` 使用 3 作为 E 值
>
> 如果没有使用任何指定 E 值的参数，则默认使用 65537 作为 E 值

更多参数信息可以运行`openssl genrsa -help`查看。

**举例：生成私钥**

```bash
openssl genrsa -out private.pem 2048
```

**举例：生成私钥并使用对称算法（aes128）进行加密**

```bash
openssl genrsa -aes128 -out aes.pem 2048
```

### rsa 指令

`rsa` 指令通常用于查看公钥或私钥相关的信息（例如：不同格式的公钥或私钥等），其格式为：

```bash
openssl rsa [参数]
```

输入一个公钥或私钥，输出相关信息。

常用参数如下：

> `-in {file}` 提供输入的私钥或公钥的文件名
>
> `-inform {format}` 提供输入文件的格式，若不提供此参数，则默认为 pem 格式
>
> `-out {file}` 不输出任何内容，而是将应输出的内容写入 {file} 文件
>
> `-ourform {format}` 指定输出内容的格式，若不提供此参数，则默认为 pem 格式
>
> `-passin pass:{pass}` 提供被对称加密的私钥的密码
>
> `-passout pass:{pass}` 指定用于将输出私钥进行对称加密的密码，指定此参数的同时还应同时提供对称加密的参数（如：`-aes128`、`-aes192` 或 `-aes256` 等）
>
> `-aes128`、`-aes192`、`-aes256`等 对输出的私钥用指定的算法进行对称加密
>
> `-pubin` 输入的内容为公钥，若未提供此参数，则输入的内容为私钥
>
> `-pubout` 输出公钥，若未提供此参数，则输出的为私钥
>
> `-text` 输出私钥或公钥的相关信息


不太常用或者我没太弄清楚的参数如下：

> `-check` 检测私钥的合法性
>
> `-modulus` 输出私钥的 modulus

更多参数信息可以运行`openssl rsa -help`查看。

**举例：查看私钥信息**

```bash
openssl rsa -in private.pem -text
```

**举例：查看私钥对应的公钥**

```bash
openssl rsa -in private.pem -pubout -out public.pem
```

**举例：将被对称加密的私钥解除加密**

本例中，私钥对称加密的密码为 1234

```bash
openssl rsa -in aes.pem -passin pass:1234
```

**举例：对私钥进行对称加密（aes128)**

```bash
openssl rsa -in private.pem -aes128 -passout pass:1234
```

**举例：转换私钥格式**

```bash
openssl rsa -in private.pem -outform der -out private.der
```

### rsautl 指令

`rsautl` 指令用于利用公钥或私钥对一个文件进行加密、解密、签名、验证签名等操作，其格式为：

```bash
openssl rsautl [参数]
```

输入一个需要被操作的文件及一个公钥或私钥，输出操作结果。

常用参数如下：

> `-in {file}` 提供需要被操作的文件
>
> `-out {file}` 不输出任何内容，而是将应输出的内容写入 {file} 文件中
>
> `-inkey {file}` 提供一个公钥或私钥
>
> `-encrypt` 使用公钥加密被操作文件
>
> `-decrypt` 使用私钥解密被操作文件
>
> `-sign` 使用私钥对被操作文件签名
>
> `-verify` 使用公钥对被操作文件验证签名
>
> `passin pass:{pass}` 为经过对称加密的私钥提供密码
>
> `keyform {format}` 提供私钥或公钥的格式，若未提供此参数，则默认为 pem 格式
>
> `-pubin` 输入的密钥为公钥，若未提供此参数，则输入的密钥为私钥
>
> `-certin` 输入的是携带公钥的证书
>
> `-hexdump` 十六进制输出

更多参数信息可以运行`openssl rsautl -help`查看。

**举例：用公钥加密文件**

```bash
openssl rsautl -encrypt -in text.txt -inkey public.pem -pubin -out text_encrypt.txt
```

**举例：用私钥解密文件**

```bash
openssl rsautl -decrypt -in text_encrypt.txt -inkey private.pem
```

**举例：用私钥对文件签名**

```bash
openssl rsautl -sign -in text.txt -inkey private.pem -out text_sign.txt
```

**举例：用公钥对文件验证签名**

```bash
openssl rsautl -verify -in text_sign.txt -inkey public.pem -pubin
```

## 散列

散列相关个各类算法通过 `dgst` 指令实现。其格式为：

```bash
openssl dgst [参数] [被操作文件]
```

输入原始文件、公钥或私钥等，输出计算结果。

常用参数如下：

> `-out {file}` 不输出任何内容，而是将应输出的内容写入 {file} 文件中
>
> `-md4`、`-md5`、`-sha`、`-sha1`、`-sha224`、`-sha256`、`-sha384`、`-sha512` 计算对应的散列值，如果不提供此参数，默认为 sha256
>
> `-sign {private}` 计算出散列值后，使用指定私钥对散列值进行签名
>
> `-hex` 十六进制输出
>
> `-verify {public}` 以及 `-signature {sign}` 用提供的公钥对提供的签名进行验证签名，并将得到的散列值与计算出的散列值进行对比。

更多参数信息可以运行`openssl dgst -help`查看。

**举例：计算散列值（sha1)**

```hash
openssl dgst -sha1 text.txt
```

**举例：使用私钥对散列值签名**

```hash
openssl dgst -sha1 -sign private.pem -out text_hashsign.txt text.txt
```

**举例：使用公钥对散列值签名进行验证签名，并于计算出的散列值对比**

```hash
openssl dgst -sha1 -verify public.pem -signature text_hashsign.txt text.txt
```

## 对称加密

对称加密通常使用 `enc` 指令来进行操作。其格式为：

```hash
openssl enc [参数]
```

输入原始文件或加密后的文件，输出加密或解密的结果。

常用参数如下：

> `-a`、`-base64` 加密后使用 base64 编码，或先使用 base64 解码后再解密
>
> `-e` 加密
>
> `-d` 解密
>
> `-aes128`、`-aes256`等 通过指定的对称加密算法进行加密或解密
>
> `-in {file}` 提供需要加密或解密的文件
>
> `-k {key}`、`-pass pass:{pass}` 提供加密或解密的密码
>
> `-out {file}` 不输出内容，而是将应输出的内容写入到文件中
>
> `-pbkdf2` Use password-based key derivation function 2
>
> `-iter {num}` Specify the iteration count and force use of PBKDF2

不太常用或者我没太弄清楚的参数如下：

> `-p` 输出 salt、key、iv 等相关信息
>
> `-debug` 输出调试信息
>
> `-salt` 随机加盐，未提供此参数时也会随机加盐，除非提供了 `-nosalt` 或 `-S` 参数。
>
> `-nosalt` 不加盐
>
> `-S {salt}` 手动制定加盐的值

更多参数信息可以运行`openssl dgst -help`查看。

**举例：将文件进行 base64 编码**

```bash
openssl enc -in text.txt -a
```

**举例：对文件进行对称加密（aes128），并输出 base64 编码**

```bash
openssl enc -e -aes128 -in text.txt -k 1234 -a -pbkdf2 -out text_aes128.txt
```

**举例：对 base64 编码的加密文件（aes128）进行解密**

```bash
openssl enc -d -aes128 -in text_aes128.txt -k 1234 -a -pbkdf2
```