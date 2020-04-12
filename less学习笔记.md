二5800

# less 学习笔记

## 引入外部less文件

```less
@import "外部less地址";
```

引入外部less文件相当于将外部文件中的内容写在本文件中，最后统一编译成为同一个CSS文件。

## 注释

与JavaScript的注释规则相同。

## 变量

### 定义和使用

定义变量（变量名严格区分大小写）

```less
@变量名:变量值; // 变量值可以是CSS的属性值、字符串、选择器、属性名
```

使用变量

```less
@变量名 // 不在字符串内使用的变量
@{变量名} // 在字符串内部使用的变量 或 作为选择器、属性名
```

变量的作用域及预解析

每个大括号都是一个作用域，在大括号内定义的变量只能在内部使用。在所有大括号之外的为全局作用域。即使将定义变量的语句写在后面也会预先执行（定义并赋值）。

将变量的值作为变量名

less允许将变量的值再作为变量名使用。@a : "b"; 且 @b: "c"；则@@a为“c“。

举例

```less
@myColor: pink;
@src: "https://image.example.com/123/bbb/";
@myBox: #box;
@hh: height;
body {
    border-color: @myColor red @myColor red;
    background-image: url("@{src}test.webp");
}
@{myBox} {
    @{hh}: 100px;
    background-color: @myColor;
}
.wrap {
    @myColor: blue;
    color: @myColor;
}
```

### 计算

less中可以让值为数字的变量进行四则运算，例如：

```less
@w: 300px;
.box {
    width: @w - 100; // 不需要写单位
    height: @w;
}
```

## 混合（混入，Mixins）

混合是指属性及属性值来源于已经存在的样式，可以理解为将其他地方的样式复制一份（如果内部还有选择器则会连选择器一同复制）。

### 不带参数的混入

可以混入class选择器或id选择器

```less
// 以class选择器为例，id选择器也是同理
.wrap {
    color: red;
}
.box {
    .wrap(); // 或写未.wrap;也可以
}
```

如果不希望上面代码中的`.wrap`的样式输出，则可以在其后面加括号。

```less
// 以class选择器为例，id选择器也是同理
.wrap() {
    color: red;
}
.box {
    .wrap(); // 或写未.wrap;也可以
}
```

如果混入的是定义在内部的class或id，则在调用时要写明外部的class或id。

```less
.wrap {
    width: 300px;
    .inner {
        font-size: 30px;
        color: pink;
    }
}
.box {
    .wrap.inner;
    // 上一行也可以写成如下内容
    // .wrap.inner();
    // .wrap .inner;
    // .wrap .inner();
    // .wrap > .inner;
    // .wrap > .inner();
}
```

### 带参数的混入

在混入时也可以传递参数

```less
.wrap(@w, @h) {
    width: @w;
    height: @h;
}
.box {
    .wrap(100px, 200px);
}
```

## 颜色函数

`lighten(某颜色, n%)`将某颜色的亮度增加（亮）n%

`darken(某颜色, n%)`将某颜色的亮度减少（暗）n%

`saturate(某颜色, n%)`将某颜色的饱和度增加（浓）n%

`desaturate(某颜色, n%)`将某颜色的饱和度减少（淡）n%

`spin(某颜色, n)`将某颜色的色相值增加n，n为数字（正负均可）

`desaturate(某颜色, 某百分比)`将某颜色的饱和度减少（淡）某百分比

`mix(颜色1, 颜色2)`混合两种颜色