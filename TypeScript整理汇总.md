# TypeScript

> TypeScript是一种由微软开发的自由和开源的编程语言。它是JavaScript的一个超集，而且本质上向这个语言添加了可选的静态类型和基于类的面向对象编程。
>
> TypeScript扩展了JavaScript的语法，所以任何现有的JavaScript程序可以不加改变的在TypeScript下工作。
>
> TypeScript是为大型应用的开发而设计。

**本文介绍TypeScript与JavaScript的不同点,对于相同部分不再赘述.**

[JavaScript整理汇总](JavaScript整理汇总.md)

## 杂项

### 安装

TypeScripe依赖node.js环境,所以需要先安装node.js

*可以在官网下载node.js*

安装后可以以管理员身份运行cmd,并根据需要进行如下命令

**查看当前node版本号**

```node.js
node -v
```

**查看当前node的npm的版本号**

```node.js
npm -v
```

**安装typescript**

```node.js
npm install -g typescript
```

*`-g`参数表示全局*

*安装完成后可以通过运行`tsc`来确定是否安装成功*

### 编译

在命令行中,可以使用如下命令来编译TypeScript

```node.js
tsc 文件.ts
```

*会生成es5语法的JavaScript文件*

### 执行js代码

在命令行中,可以使用如下命令来执行JavaScript

```node.js
node 文件.js
```

## 变量定义

定义变量时可以指定变量的数据类型,例如:

```typescript
let a : number = 10;
```

定义后,不能给此变量赋不同的数据类型的值.

如果在定义变量时没有指定数据类型,则会根据初始值的数据类型确定此变量的数据类型,后续再赋值时不能变更这个数据类型

## 数据类型

**undefined是任意数据类型(除了never)的子类型,可以给任何类型的变量设置值为undefined**

### 元组类型

已知元素类型和长度的数组,设置时需要指定每一个值得数据类型以及长度,例如:

```typescript
let a:[string,number,number,object,boolean];
```

定义后,a必须为一个数组,而且必须有5个数据,且第一个为字符串,第二个为数字,第三个为...

也可以是一个指定属性名和属性值的数据类型和属性的个数的对象,例如:

```typescript
let a:{aa:string,bb:number};
```

定义后,给a的赋值必须是一个对象,而且对象只能且必须有aa和bb属性,且aa的值为字符串,bb的值为数字.

### 枚举类型(enum)

枚举类型是键与值的双向映射

```typescript
enum color {green, red, blue};
```

上述代码编译后为如下代码

```javascript
var color;
(function(color) {
    color[color["green"] = 0] = "green";
    color[color["red"] = 1] = "red";
    color[color["blue"] = 2] = "blue";
})(color || (color = {}));
```

对于上述例子中

- color["0"] === "green"
- color["1"] === "red"
- color["2"] === "blue"
- color["green"] === 0
- color["red"] === 1
- color["blue"] === 2

在设置时,可以给大括号中的值进行赋值,此时会按照缩写的编号开始进行继续编号,例如:

```typescript
enum test (u, v, w = 5, x, y, z);
```

则:`u,v,w,x,y,z`对应的编号分别为`0,1,5,6,7,8`

### any类型

设置为any类型的变量可以设置为任何类型的数据,类似JavaScript中的变量.

通常在函数的返回值类型限制时使用,例如:

```typescript
function fn(name:string):any {
    ...
}
```

### void类型

void表示没有任何类型,声明为void的变量,只能赋予undefined和null中的一个.

### never类型

永远不存在的值的类型,undefined和null不属于never,定义一个这样类型的变量是没有意义的,所以通常用于抛出错误的函数,或死循环函数,例如:

```typescript
function error(message:string):never {
    throw new Error(message);
}
function infiniteLoop():never {
    while(true) {
        ...
    }
}
```

**never类型是任意类型的子类型**,举例说明:

```typescript
let s:string;
let n:never;
s = "rivalsa"; // 不报错
n = "rivalsa"; // 报错
n = (() => {throw new Error('exception')})(); // 不报错,never类型赋值给never类型
s = (() => {throw new Error('exception')})(); // 不报错,never类型赋值给string类型
```

### 数据类型的断言

强制让浏览器将数据按某种类型进行编译*(当前不了解更多内容,后续再补充)*

```typescript
let s:any = "string";
let len:number = (<string>s).length; // 语法一
let len:number = (s as string).length // 语法二
```

## 接口

对对象类型的每个属性名与属性值进行检查

### 使用接口

```typescript
// 例1
interface Check {
	name:string,
    age:number
}
function fn(pp:Check){
    ...
}
// 例2
interface FnCheck{
    (s:string, n:number):string; // s与n只是一个提示,按顺序进行对应
}
let fn2:FnCheck = function(a,b) {
    return a + b;
}
```

- 在接口的属性名后面加`?`表示这个参数为可选参数
- 在属性名前面加`readonly(空格)`表示只读属性
- 属性名可以写`[property:string]`表示**属性检查**,在本例中,只要满足属性名为字符串的就可以通过,但**属性检查的规则不能与其他规则冲突**.
- 属性名可以写`[index:string]`表示表示**属性索引**,在本例中,只要满足属性名为字符串的就可以通过,但**属性检查的规则不能与其他规则冲突**.

*interface还可以用于class,但目前还没弄明白,只知道用在class中需要使用`implements`*

### 继承接口

```typescript
interface Shape {
    color:string;
}
interface Square extends Shape {
    sideLangth:number;
}
let square:square = {
    color:65, // 报错
    sideLength:18
};
```

一个接口可以继承自多个接口,代码如下:

```typescript
interface Square extends Shape, PenStroke {
    ...
}
```

## 类

### 修饰符

#### 公有修饰符(public)

类的属性前加public说明这个属性是公有的,如果不加任何修饰符,则默认就是共有的.

#### 私有修饰符(public)

类的私有属性只能在类的内部使用,共有属性既能在内部使用又能在外部使用.

```typescript
class Animal {
    public name:string;
    private age:18 = 18;
    public constructor(name:string) {
        this.name = name;
    }
    private move(dis:number) {
        console.log(`${this.name}移动了${dis}米`);
    }
    public sayAge() {
        console.log(this.age);
    }
	public sayMove() {
        this.move(1314);
    }
}
let o = new Animal;
o.sayMove(); // 熊猫移动了1314米
o.move(1413); // 报错
o.sayAge(); // 18
```

#### 保护修饰符(protected)

保护属性与私有属性相似,但保护的属性在继承的类内部是可以访问的,私有属性在继承的类内部不能访问.

如果在`construction`定义为`protected`则这个类只能用来继承,无法通过`new`来产生实例.

#### 只读修饰符(readonly)

只读属性可以在类的内部调用,也可以在类的外部调用,也可以被继承,但它是只读的,因此需要在定义时就进行赋值.

### 抽象类

抽象类在类的class前用`abstract`标记,抽象类中的抽象方法不能写具体的方法体(只能写名称),但继承的类中必须对这个方法重新定义.

*抽象类中有部分疑惑内容,没有写到这里*

**(未完待续)**