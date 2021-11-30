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

> `-des`、`-des3`、`-camellia128`、`-camellia192`、`-camellia256` 将生成的私钥用指定的对称加密算法加密后再输出或写入文件
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

`rsa` 指令通常用于输入一个私钥或公钥，输出相关的信息（例如：不同格式的公钥或私钥、加密、解密或不同加密算法的私钥等），其格式为：

```bash
openssl rsa [参数]
```

常用参数如下：

> `-in {file}` 提供输入的私钥或公钥的文件名
>
> `inform {format}` 提供输入文件的格式（如 der、net 或 pem 等），若不提供此参数，则默认为 pem 格式
>
> `-out {file}` 不输出任何内容，而是将应输出的内容写入 {file} 文件
>
> `-ourform {format}` 指定输出内容的格式（如 der、net 或 pem 等），若不提供此参数，则默认为 pem 格式
>
> `-passin pass:{pass}` 提供被对称加密的私钥的密码，若私钥被对称加密但没有提供此参数，会再执行后要求输入密码
>
> `-passout pass:{pass}` 指定用于将输出私钥进行对称加密的密码，指定此参数的同时还应同时提供对称加密的参数（如：`-aes128`、`-aes192` 或 `-aes256` 等）
>
> `-aes128`、`-aes192`、`-aes256` 对输出的私钥用指定的算法进行对称加密
>
> `-pubin` 输入的内容为公钥，若未提供此参数，则输入的内容为私钥
>
> `punout` 输出公钥，若未提供此参数，则输出的为私钥
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

> 本例中，私钥对称加密的密码为 1234

```bash
openssl rsa -in aes.pem -passin pass:1234
```