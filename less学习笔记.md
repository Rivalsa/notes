# less 学习笔记

## 注释

与JavaScript的注释规则相同。

## 变量

定义变量（变量名严格区分大小写）

```less
@变量名:变量值; // 变量值可以是CSS的属性值、字符串、选择器、属性名
```

使用变量

```less
@变量名 // 不在字符串内使用的变量
@{变量名} // 在字符串内部使用的变量 或 作为选择器、属性名
```

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
```

## 引入外部less文件

```less
@import "外部less地址";
```

引入外部less文件相当于将外部文件中的内容写在本文件中，最后统一编译成为同一个CSS文件。