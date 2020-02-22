# node.js学习笔记

## 杂项

**node.js官网**

https://nodejs.org 官网

http://nodejs.cn 官方中文网

**node.js的安装**

windows版的在官网下载后运行，一路next即可。安装完成后，可以在cmd中通过`node -v`与`npm -v`命令查看版本号来确定是否安装成功。

**通过node.js运行js文件**

node.js运行时不支持对DOM与BOM的操作。

在cmd中进入js文件所在目录，执行`node 文件名`即可，对于扩展名为js的文件，可以省略扩展名。

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

- `join(...paths)`路径拼接
- `resolve(...paths)` 在当前路径的基础上进行拼接
- `relative(x,y)`从x到y的路径
- `parse(path)`将路径序列化

**url模块**

`URL(地址) `构造函数，会返回将url地址序列化的对象

**querystring模块**

`parse(x)`字符串x应为`application/x-www-form-urlencoded`形式的字符串，此函数将其序列化，返回序列化的对象

`stringify(x[， y[, z]])`x应为一个对象，会返回将x转换为`application/x-www-form-urlencoded`形式的字符串，y为一个参数与另一个参数的分割符，z为一个参数的键与值之间的连接符。y与z默认为`&`和`=`

**fs模块**

`readFile(x[, options]， function(err, body))`【异步操作】读取一个文件，读取完成后执行回调函数

- `x`为字符串表示要读取的文件的地址
- `options`可以是一个字符串，也可以是一个对象，字符串表示以对应的编码格式打开文件，对象中，可以包含以下属性：

> 当`option`为对象时，可以包含以下属性：
>
> - `encoding`表示已对应的编码格式打开文件，默认为null
> - `flag`文件系统标识，默认为`r`
>
> 关于文件系统标识，请参阅[node.js中文网](http://nodejs.cn/api/fs.html#fs_file_system_flags)

- `err`为错误信息对象，没有错误是`err`为`null`
- `body`为读取的文件内的内容（如果指定格式为null则以buffer格式读取）