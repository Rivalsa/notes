# Linux 学习笔记

## vi或vim用法

### 一般模式

刚刚进入页面的时候默认就是一般模式，在一般模式下可以进行如下操作：

- 上下左右方向键可以让光标向上下左右移动
- `k` `j` `h` `l`键可以让光标向上下左右移动
- `ctrl + B`文本页面向前翻一页
- `ctrl + F`文本页面向后翻一页
- `0`或`shift + 6`移动到本行行首
- `shift + 4`移动到本行行尾
- `gg`移动到首行
- `G`移动到尾行
- `nG(n为数字）或ngg`移动到第n行
- `x`和`X`向后或向前删除一个字符
- `nx`向后删除n个字符
- `dd`删除/剪切光变所在的哪一行
- `ndd（n为数字）`删除光变虽在的行之后的n行
- `yy`复制光标所在行
- `p`从光标所在行开始，向下粘贴已经复制或剪切的内容
- `P`从光标所在行开始，向上粘贴已经复制或剪切的内容
- `nyy`从光标所在行开始，向下复制n行
- `u`还原上一步操作
- `v`选中字符

### 编辑模式

可以任意编辑其中的内容，按esc键返回一般模式。

在一般模式下，可以通过如下按键进入编辑模式：

`i`在当前字符前插入

`I`在光标所在行行首插入

`a`在当前字符后插入

`A`在光标所在行行尾插入

`o`在当前行的下一行插入新的一行

`O`在当前行的上一行插入新的一行

### 命令模式

可以执行如下命令：

- `/word`在光标之后查找一个字符串word，按n继续向后搜索
- `?word`在光标之前查找一个字符串word，按n继续向前搜索
- `n1,n2s/word1/word2/g`在n1和n2行之间查找word1并替换为word2，不加g则只替换每行的第一个word1
- `1,$s/word1/word2/g`将文档中所有的word1替换为word2，不加g则只替换每行的第一个word1
- `w`保存文件
- `q`退出VIM 
- `w!`强制保存, 在root用户下，即使文本只读也可以完成保存
- `q!`强制退出，所有改动不生效
- `set nu`显示行号
- `set nonu`不显示行号

## curl用法

`curl`是一款发送请求的命令行工具，如果熟练使用，可以完全取代postman这一类图形页面工具。

使用方法：`curl [参数] URL地址`

为了方便演示，在本节中每个例子的服务端程序之间都有所不同。

此命令如果不携带任何参数，则是向对应地址发送GET请求，服务器返回内容会在命令行输出，例如：

```
[root@bogon ~]# curl http://192.168.1.5
Hello World!
```

**`-A "UA"`参数**

此参数可以修改发送的请求头中的`User-Agent`的值为对应的UA，例如：

```
[root@bogon ~]# curl http://192.168.1.5
Hello World!
User-agent:curl/7.61.1
[root@bogon ~]# curl -A "test UA" http://192.168.1.5
Hello World!
User-agent:test UA
[root@bogon ~]# curl -A "" http://192.168.1.5
Hello World!
User-agent:
```

上述命令会在发送的请求头中移除`User-Agent`字段，如果不携带此参数，则默认的UA为`curl/[version]。

**`-b "N1=V1;N2=V2..."`或`-b filename`参数**

`-b "N1=V1;N2=V2..."`可以向在发送的请求头中添加cookie，例如：

```
[root@bogon ~]# curl -b "foo=test1" http://192.168.1.5
Hello World!
COOKIE-foo:test1
COOKIE-foo2:
[root@bogon ~]# curl -b "foo=test1;foo2=mycookie" http://192.168.1.5
Hello World!
COOKIE-foo:test1
COOKIE-foo2:mycookie
```

`-b filename`的作用与`-b "N1=V1;N2=V2..."`相似，只是发送的cookie内容是从文件`filename`中读取的，`filename`文件的生成及例子请见下一条参数。

**`-c filename`参数**

此参数可以将服务器返回的cookie写入一个文件中，例如：

```
[root@bogon ~]# curl -b cookies.txt http://192.168.1.5
Hello World!
COOKIE-foo:myCookie
```

**`-d "k1=v1&k2=v2"`或`-d "@filename"`参数**

此参数可以给请求中添加`Content-Type`为`application/x-www-form-urlencoded`的请求体，使用此参数后，HTTP Header中会自动加上`Content-Type : application/x-www-form-urlencoded`且请求会自动转换为POST，例如：

```
[root@bogon ~]# curl -d "key1=value1&key2=value2" http://192.168.1.5
Hello World!
key1:value1
key2:value2
```

`-d "@filename"`的作用与`-d "k1=v1&k2=v2"`相似，只是请求体中的内容是从`filename`文件中读取的，例如：

```
[root@bogon ~]# cat data.txt 
key1=v1&key2=v2
[root@bogon ~]# curl -d "@data.txt" http://192.168.1.5
Hello World!
key1:v1
key2:v2
```

**`-e "ref"`参数**

此参数可以将请求头中`Referer`的值修改为ref，例如：

```
[root@bogon ~]# curl -e "test" http://192.168.1.5
Hello World!
REFERER:test
```

**`-F "key=@fname[;type=MIME][;filename=fname]"`参数**

此参数可以向请求中添加`Content-Type`为`multipart/form-data`的请求体，将fname文件作为`key`字段上传，`type`字段可以指定MIME类型，`filename`字段可以指定服务器接收到的文件名。

**`-G`参数**

略

**`-H "key=value"`参数**

此参数可以添加对应的请求头，例如：

```
[root@bogon ~]# curl -H "key:value" http://192.168.1.5
Hello World!
key:value
```

**`-i`参数**

此参数会打印出返回的响应头，例如：

```
[root@bogon ~]# curl -i http://192.168.1.5
HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Server: Microsoft-IIS/10.0
X-Powered-By: PHP/7.4.2
Date: Tue, 19 May 2020 11:52:53 GMT
Content-Length: 13

Hello World!
```

**`-I`参数**

此参数会发送HEAD请求，并打印出将响应头，例如：

```
[root@bogon ~]# curl -I http://192.168.1.5
HTTP/1.1 200 OK
Content-Length: 0
Content-Type: text/html; charset=UTF-8
Server: Microsoft-IIS/10.0
X-Powered-By: PHP/7.4.2
Date: Tue, 19 May 2020 11:54:49 GMT
```

**`-k`参数**

使用此参数将跳过SSL证书检查。

**`-L`参数**

此参数会让请求跟随服务器的重定向，例如：

```
[root@bogon ~]# curl -i http://192.168.1.5
HTTP/1.1 302 Found
Content-Type: text/html; charset=UTF-8
Location: sec.php
Server: Microsoft-IIS/10.0
X-Powered-By: PHP/7.4.2
Date: Tue, 19 May 2020 11:58:18 GMT
Content-Length: 0

[root@bogon ~]# curl -iL http://192.168.1.5
HTTP/1.1 302 Found
Content-Type: text/html; charset=UTF-8
Location: sec.php
Server: Microsoft-IIS/10.0
X-Powered-By: PHP/7.4.2
Date: Tue, 19 May 2020 11:58:26 GMT
Content-Length: 0

HTTP/1.1 200 OK
Content-Type: text/html; charset=UTF-8
Server: Microsoft-IIS/10.0
X-Powered-By: PHP/7.4.2
Date: Tue, 19 May 2020 11:58:26 GMT
Content-Length: 13

Hello World!
```

**`-o "filename"`参数**

使用此参数将服务器的响应保存为filename文件，例如：

```
[root@bogon ~]# curl -so index.php http://192.168.1.5/sec.php
[root@bogon ~]# cat index.php 
Hello World!
```

**`-O`参数**

使用此参数将服务器的响应保存文件，例如：

```
[root@bogon ~]# curl -sO http://192.168.1.5/sec.php
[root@bogon ~]# cat sec.php 
Hello World!
```

**`-s`参数**

不输出错误和进度信息。

**`-S`参数**

只输出错误信息。

**`-u`参数**

略

**`-v`参数**

输出通信的整个过程，用于调试。

**`-x`参数**

略

**`-X`参数**

指定 HTTP 请求的方法。

## 其他常用指令

`pwd`查看当前所在路径

`cd`变更目录，后面可以跟相对路径，也可以跟绝对路径

`ls`列出当前目录下的子目录与子文件

> `-a`显示所有文件和目录（包括隐藏文件）
>
> `-l`使用长格式列出文件及目录信息
>
> `-r`将文件以相反的次序显示
>
> `-t`按照最后修改时间排序
>
> `-A`与`-a`大致相同，但不列出当前目录(.)和父目录(..)
>
> `-S`按照文件大小排序
>
> `-R`递归列出所有子目录
>
> `-h`以合适的单位显示

`mkdir`创建目录，后面跟创建的目录的路径

> `-p`在不存在的路径中创建目录（未存在的路径也自动创建）

`touch`创建文件，后面跟文件名。

`rmdir`删除目录，后面跟目录名，只有空目录才能被此命令删除

> `-p`连级删除一串目录，但需要都是空目录

`rm`删除文件，后面跟文件地址

> `-r`操作目录
>
> `-f`强制删除

`cp`复制文件，后面跟源文件地址和目标文件地址

> `-r`操作目录

`mv`用于移动或重命名文件，后面分别跟源文件或目录、目标文件或目录

`cat`查看文件内容

> `-n`显示行号

`tac`按照从最后一行到第一行的顺序来显示文件内容

`more`分页查看文本内容，ctrl+f或空格向下翻页，ctrl+b向上翻页

`less`分页查看文本内容，上下方向键翻页，可以查找

`head`查看文件的前10行

> -数字 查看文件的前几行

`tail`查看文件的后10行

> -数字 查看文件的后几行

`groupadd`新增一个用户组，后面跟用户组名

`useradd`新增一个用户，后面跟用户名

`chgrp`改变某文件的所属用户组，后跟用户组名和文件地址

`chown`改变某文件的所属用户，后跟用户名和文件地址

`chmod`改变文件的权限，后跟新权限和文件地址

`umask`查看或修改文件的默认权限

`which`查找PATH环境变量中出现的路径下的可执行文件，后面跟想查找的指令

`whereis`

`find`列出路径中满足条件的文件

> `-atime +n/-n`表示访问或执行时间大于或小于n天的文件
>
> `-ctime +n/-n`表示写入、更改属性（如更改所有者、权限或者链接）的时间大于或小于n天的文件
>
> `-mtime +n/-n`表示写入时间大于或小于n天的文件
>
> `-name filename`表示文件名匹配的文件
>
> `-type filetype`表示文件类型匹配的文件（文件类型包含f,b,c,d,l,s等）

`df`用于查看已挂载磁盘的总容量、使用容量、剩余容量等

> `-h`用自适应的单位来显示
>
> `-m`以MB为单位显示
>
> `-k`以KB为单位显示
>
> `/dev`、`/dev/shm`为内存分区，默认大小为内存大小的一半，如果我们把文件存到这个分区下，相当于存到了内存中，好处是读写非常快，坏处是系统重启时文件就会丢失。 

`lsblk`以图表的方式查看分区情况

> `-f`显示分区信息的文件系统类型

`du`

> `-h`用自适应的单位来显示
>
> `-m`以MB为单位显示
>
> `-k`以KB为单位显示
>
> `-b`以B作为单位显示
>
> `-a`全部文件和目录的大小都列出来
>
> `-c`显示总用量
>
> `-s`只显示总大小

`fdisk`磁盘分区

> `-l`显示分区信息
>
> 后面跟具体设备，可以对设备执行分区操作

`mke2fs`格式化分区，后面跟具体分区

> ` -c`表示在格式化前先检测一下磁盘是否有问题。加上这个选项后，运行速度会非常慢。
>
> ` -L`表示预设该分区的标签（label）。
>
> ` -t`用来指定文件系统的类型，可以是ext2、ext3 ，也可以是 ext4
>
> 可使用的文件系统可在`/etc/filesystems`中查看

`mount`挂载分区，后面跟具体分区、挂载到的目录

> 系统启动后自动挂载的分区记录在`/etc/fstab`中

`umount`卸载分区，后面跟具体的分区

`vi`或`vim`编辑文件，后面跟文件的地址

> 两者的区别就是vim中的代码是有颜色显示的

`gzip`压缩一个文件，后面跟要压缩的文件（不允许压缩目录）

> `-n(n为数字1-9)`压缩等级，1为最快压缩，9为压缩率最高
>
> `-d`解压文件

`bzip2`压缩一个文件，必须有参数，后面跟压缩的文件（不允许压缩目录）

> `-z`压缩文件
>
> `-d`解压文件

`xz`压缩一个文件，必须有参数，后面跟压缩的文件（不允许压缩目录）

> `-z`压缩文件
>
> `-d`解压文件

`zip`压缩文件，后面跟压缩后的文件名、压缩的文件名

> `-r`压缩一个目录

`unzip`解压文件，后面跟文件名

`tar`将一个目录打包或将一个打包文件解包，打包时后面跟要打包的目录，解包后后面没有参数

> `-c`创建一个新包
>
> `-x`解一个包
>
> `-f`配置打包后的文件名或要解包的文件名（文件名跟在选项`f`后面）
>
> `-c`将打包或解包的文件显示出来
>
> `-z`打包后再利用gzip压缩或先用gzip解压后解包
>
> `-j`打包后再利用bzip2压缩或先用bzip2解压后解包
>
> `-J`打包后再利用xz压缩或先用xz解压后解包
>
> `-t`查看格子铺包内的文件

`alias`别名，直接运行此命令可以查看所有已设置的别名，后面跟`别名=命令`可以给命令设置别名。

`unalias 别名`解除某个别名。

`env`列出系统预设的环境变量。

> 常见的系统变量如下：
>
> - `HOSTNAME`主机名称
> - `SHELL`当前用户的shell类型
> - `HISTSIZE`历史记录条数
> - `MAIL`当前用户邮件存放目录
> - `PATH`此变量决定了shell将到哪些目录中寻找命令或程序
> - `PWD`表示当前目录
> - `LANG`与语言相关的环境变量，多语言环境可以修改此环境变量
> - `HOME`当前用户的home目录
> - `LOGNAME`当前用户的登录名

`set`列出系统中的所有变量

`变量名=变量值`设置一个变量，变量值中可以通过反引号引用其他变量值，设置的系统变量只在当前的shell中生效。

> 若想让设置的变量永久生效，可以修改`/etc/profile`文件的末尾增加`export 变量名=变量值`，然后运行`source profile`
>
> 若想让设置的变量只对当前用户生效，可以修改`~/.bashrc`文件末尾增加`export 变量名=变量值`，然后运行`source .bashrc`

`cut -d "分隔符" -f 数字n 文件`将文件中的每一行用分隔符分割，并将分割后的第n段显示出来。

## Linux系统部分自带目录或文件

### 目录

- `/bin`【binary】储存了Linux常用的指令
- `/boot`启动Linux时所需的核心文件
- `/dev`【device】储存了Linux的外部设备，在Linux中访问设备和访问文件的方式是相同的
- `/etc`储存了系统的配置文件
- `/home`每个用户都有一个自己的目录，可以理解为windows中的user文件夹
- `/lib`和`lib64`储存了系统基本的动态连接共享库，可以理解为windows中的dll文件，几乎所有应用程序都会用到这些共享库
- `/media`媒体，系统自动识别的一些设备（如U盘、光驱等），识别后，Linux会把识别的设备挂在到此目录下
- `/mnt`服务器内挂载的设备（如硬盘等）
- `/opt`留给额外安装软件的目录，默认为空
- `/proc`虚拟目录，系统内存的映射，可以通过访问此文件夹来获取系统信息，此目录的内容在内存中，可以直接修改里面的某些文件
- `/root`root账户的home目录
- `/run`此目录与/var/run是同一个目录，里面储存一些服务的PID
- `/sbin`存放系统管理员可以使用的指令
- `/srv`存储一些服务启动后需要提取的数据
- `/sys`存储与硬件驱动相关的信息
- `/tmp`用来存放一些临时文件
- `/usr`类似于Windows下的Program files目录，用户的很多应用程序和文件储存在本目录中
- `/usr/bin`存储系统用户使用的应用程序
- `/usr/sbin`存储管理员权限用户使用的应用程序
- `/var`存储了不断扩充且经常修改的内容，包括各种日志、PID文件等

### 文件

- `~/.bash_history`记录了曾经执行过的Linux命令（默认记录1000条），只有用户推出当前shell时，在当前shell中运行的命令才会被保存至`~/.bash_history`
- `/etc/sysconfig/network-scripts/ifcfg-ens32`通过调整此文件的最后一行`ONBOOT`为`yes`可以解决刚安装的系统无法联网的问题。

## 文件类型及权限信息

在Linux文件系统中，主要有以下几种类型的文件：

- 普通文件
- 目录
- 链接文件（硬链接、软链接）
- 设备

文件的权限用3位二进制数来表示：

- 最高位表示可读
- 中间位表示可写
- 最低位表示可执行

当使用`ls -l`来列出文件时，第一列的10个字符分别表示如下内容：

第一个字符

- `-`表示这是一个普通文件
- `d`表示这是一个目录
- `i`表示这是一个链接文件
- `d`表示这是一个设备文件

第2-10个字符表示权限信息，第2-4位表示所有者用户的权限，第5-7位表示用户所属组的权限，第8-10位表示其他组的权限，其中`r`表示可读，`w`表示可写，`x`表示可执行，`-`表示无对应权限。

## 常见缺少依赖提示及解决方案

c compiler cc is not found

> yum install gcc-c++

the HTTP rewrite module requires the PCRE library.

> yum install pcre-devel

the HTTP gzip module requires the zlib library.

> yum install zlib-devel

