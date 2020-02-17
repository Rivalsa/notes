# node.js学习笔记

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

**path模块**

- `join(...paths)`路径拼接
- `resolve(...paths)` 在当前路径的基础上进行拼接
- `relative(x,y)`从x到y的路径
- `parse(path)`将路径序列化

**url模块**

`URL(地址) `构造函数，会返回将url地址序列化的对象