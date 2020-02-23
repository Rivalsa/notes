# node.js学习笔记

本文中所写的只是自认为较常用的内容，更完整的内容请参考官方文档

**node.js官网**

https://nodejs.org 官网

http://nodejs.cn 官方中文网

**node.js的安装**

windows版的在官网下载后运行，一路next即可。安装完成后，可以在cmd中通过`node -v`与`npm -v`命令查看版本号来确定是否安装成功。

**通过node.js运行js文件**

node.js运行时不支持对DOM与BOM的操作。

在cmd中进入js文件所在目录，执行`node 文件名`即可，对于扩展名为js的文件，可以省略扩展名。

## 引入模块、导出数据与全局变量

**引入模块**

`require(x)`引入x模块，被引入模块代码会立即执行，返回引入的模块导出的数据。（x可以为一个已安装的模块也可以是一个路径，如果被引入的文件扩展名为js则可以省略扩展名，引用当前路径时不能省略“./”）

多次引入同一个模块从第二次开始不会再执行模块中的代码，而是直接返回第一次的值（如果是对象则与第一次获取的对象具有相同地址）

**导出数据**

`module.exports`为要导出的数据，一个文件只能导出一个数据（如果需要导出多个数据，可以放到一个对象中，默认为空对象）。通过赋值的方式修改导出的数据。例如：

**1.js**

```javascript
const aa = 'node';
module.exports = aa;
```

**2.js**

```javascript
const bb = require('./1');
console.log(bb); // node
```

在node.js中，默认设置了`exports = module.exports`有时可以直接通过`exports.属性 = 值`来操作`module.export`的属性，但实际导出的内容是`module.exports`，而不是`exports`。

**更多全局变量**

`__dirname`当前文件所在的目录

## 各种模块

**path模块**

- `path.join(...paths)`路径拼接
- `path.resolve(...paths)` 在当前路径的基础上进行拼接
- `path.relative(from, to)`从参数`from`到参数`to`的路径
- `path.parse(path)`将路径序列化

**url模块**

`url.URL(地址) `构造函数，会返回将url地址序列化的对象，其中参数部分为map格式

**querystring模块**

`querystring.parse(x, y, z)`字符串x应为`application/x-www-form-urlencoded`形式的字符串，y为一个参数与另一个参数的分割符，z为一个参数的键与值之间的连接符，此函数将其序列化，返回序列化的对象

`querystring.stringify(x[， y[, z]])`x应为一个对象，会返回将x转换为`application/x-www-form-urlencoded`形式的字符串，y为一个参数与另一个参数的分割符，z为一个参数的键与值之间的连接符。y与z默认为`&`和`=`

**fs模块**

`fs.readFile(path[, encoding]， function(err, data))`【异步操作】读取一个文件，读取完成后执行回调函数

- `path`为字符串表示要读取的文件的地址
- `encoding`表示以对应的编码格式读取文件
- `err`为错误信息对象，没有错误是`err`为`null`
- `data`为读取的文件内的内容（如果指定格式为`null`则以`buffer`格式读取）

`fs.readFileSync(path[, encoding])`【同步操作】读取一个文件，参数与`readFile`的参数含义一致

`fs.writeFile(file, data[, options], function(err))`【异步操作】写入文件，当文件不存在时创建文件，文件存在时覆盖文件，写入完成后执行回调函数

- `file`为写入的文件地址（如果路径中有不存在的文件夹会出错）
- `data`为写入的文件数据
- `options`可以是字符串，也可以是一个对象，如果是一个字符串表示以对应的编码格式读取文件，如果是一个对象，请参考如下内容

> 当`options`为一个对象时，可以包含如下属性：
>
> - `encoding`以对应的编码格式读取文件
> - `flag`文件系统标志，默认为`w`，其它常用值为`a`或`wx`（`w`表示覆盖，`a`表示在末尾追加，`wx`与`w`基本相同，但如果文件已存在，则返回错误）

- `err`为错误信息对象，没有错误是`err`为`null`

`fs.writeFileSync(file, data[, options])`【同步操作】写入一个文件，参数与`writeFile`的参数含义一致

<span style="color:red;font-weight:600;">本文中介绍的大部分（除了有特殊说明外）异步操作都有对应的同步操作（在后面加Sync）</span>

