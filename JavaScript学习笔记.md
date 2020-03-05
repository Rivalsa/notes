欢迎访问[个人网站导航页](https://rivalsa.cn)

#  前端JavaScript学习笔记

**关于本文中的ES6的说明**

本文中的ES6指的是从ECMA Script 2015一直到最新版的统称

本文中，标有<span style="color:yellowgreen;font-weight:600;">[ES6]</span>标记的，表示属于ES6新增的内容

**关于本文中Symbol数据类型的说明**

本文中，除了专门讲解Symbol数据类型或另有说明外，均不考虑Symbol数据类型的情况。

**主流浏览器**

IE（高版本）/Edge、Chrome、Firefox、Safari、Opera

浏览器由**外壳**与**内核**组成,浏览器的内核分为**渲染引擎**和**JS引擎**,内核见下表:

| 浏览器  | 渲染引擎        | JS引擎            |
| ------- | --------------- | ----------------- |
| IE      | Trident         | JScript -> Chakra |
| Firefox | Gecko           | Monkey系列        |
| Chrome  | Webkit -> Blink | V8                |
| Safari  | Webkit          | SquirrelFish系列  |
| Opera   | Presto -> Blink | Carakan           |

渲染引擎：将html和css代码渲染成图形界面

js引擎：解析js代码

V8引擎为解析js代码最快的js引擎

**JS的诞生**

在1995 年 Netscape，一位名为 Brendan Eich 的工程师创造了 JavaScript，随后在 1996 年初，JavaScript 首先被应用于 Netscape 2 浏览器上。最初的 JavaScript 名为 LiveScript（活力脚本），后来因为 Sun Microsystem 的 Java 语言的兴起和广泛使用，Netscape 出于宣传和推广的考虑，将它的名字从最初的 LiveScript 更改为 JavaScript——尽管两者之间并没有什么共同点。这便是之后混淆产生的根源。

几个月后，Microsoft 随着 IE 3 推出了一个与之基本兼容的语言 JScript（注意微软的人生哲学，当它发现别人的东西很好的时候，就必须拧巴的推出自己的，然后自己的又被市场排斥，又开始兼容别人的）。又几个月后，Netscape 将 JavaScript 提交至 Ecma International（一个欧洲标准化组织）， ECMAScript 标准第一版便在 1997 年诞生了，随后在 1999 年以 ECMAScript 第三版的形式进行了更新，从那之后这个标准没有发生过大的改动。由于委员会在语言特性的讨论上发生分歧，ECMAScript 第四版尚未推出便被废除，但随后于 2009 年 12 月发布的 ECMAScript 第五版引入了第四版草案加入的许多特性。第六版标准已经于2015年六月发布 。

**JS的发展**

**2003年**： 页面上漂浮的广告、弹窗广告；所以当时的浏览器就推出一个功能，禁用广告，实际上本质就是禁用JavaScript。

**2004年**：谷歌在JavaScript中添加了ajax，从此JavaScript被人重视，很多人开始学习JS语言。

**2007年**：三层分离，iPhone发布，人们开始重视用户体验。大家发现了，JavaScript是web页面中制作交互效果唯一的语言，所以把JS的重视程度，提到了相当高的一个地位。

**2008年**：Chrome浏览器发布，V8引擎加快了JS的解析，之前的浏览器解析JS的时候卡顿卡顿的，动画效果是蹦蹦的。在Chrome里，它的引擎叫做V8，运行JS很流畅。

**2009年**：jQuery变得流行，解决了浏览器兼容问题，制作页面效果变得简单，越来越多的初学者愿意学习JavaScript。

**2011年**：Node.js得到广泛应用，实际上就是把JavaScript运行在了服务器上，单线程非阻塞，能够让企业用最小的成本实现后台网站，比如之前4万的服务器都卡，现在用了node之后，4000的机器都很流畅。

**2015年**：ECMA Script 6发布，叫做ECMA Script 2015。重量级的改变，把语言的特性颠覆性的一个增强。

**JS的特点及组成**

特点:弱类型,解释型,单线程

组成:ECMAScript，DOM和BOM

**JS代码写在哪里**

可以在HTML中`<script></script>`标签内的内容会被当做JS代码执行，也可以通过src属性来引入外部的js文件，当使用src属性时，标签内的代码会被忽略。

**加载外部JS代码的三种方式**

正常模式

```html
<script src="script.js"></script>
```

当执行到此标签时，会立即下载脚本，下载完毕后立即执行脚本，下载和执行的过程中，html解析暂停。

`async`模式

```html
<script async src="script.js"></script>
```

当有`async`属性时，会立刻下载脚本，并在下载完毕后立即执行脚本。下载脚本时，html不停止解析，执行脚本时html解析暂停。所以此时脚本的执行顺序并不仅与书写顺序有关。

`defer`模式

```html
<script defer src="script.js"></script>
```

当有`defer`属性时，会立刻下载脚本，并在html解析完成后执行脚本。下载脚本时，html不停止解析。

## 1.杂项

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`const`定义一个常数,定义时必须赋值,不允许重新赋值，例如`const num = 20;`

`window.encodeURI(x)`将x进行URL encode编码（ASCII字母和数字以及URL中个分隔符不进行编码）

`window.encodeURIComponent(x)`将x进行URL encode编码（ASCII字母和数字不进行编码）

`window.decodeURI(x)`将`window.encodeURI`编码的x进行解码

`window.decodeURIComponent(x)`将`window.encodeURIComponent`编码的x进行解码

`window.alert(x)`警告弹窗，x为弹窗的内容

`window.prompt([x[, y]])`输入弹窗,x是提示内容,y为在输入框中默认输入的内容,返回输入的字符串,如果点"取消"则返回null(在IE7和IE8中，省略y会导致输入框中显示默认值undefined)

`window.confirm(x)`确认弹窗,x是提示内容,点击"是"返回true,否则返回false

`window.JSON.parse(x)`将JSON格式的字符串x转换为对象，返回这个对象（IE7及其以下不支持）

`window.JSON.stringify(obj)`返回obj对象转换为的JSON字符串（IE7及其以下不支持）

`try-catch`执行代码出错后不阻碍后面代码执行,例如:

```javascript
//try中的代码遇报错则跳过错误继续执行,并执行catch中的内容,try中内容无报错则不执行catch中的内容.
try{
    conSole.log(1);
}catch(e){ //e为错误信息
    //throw e;    //抛出错误
    console.log(e);
}
```

`'use strict'`将此字符串放在第一行表示使用严格模式，在严格模式下，有如下特殊要求：

- 禁用`with`
- 禁止给未定义的变量赋值
- arguments对象是传入函数内实参列表的静态脚本，而不是与对应的实参指向同一个值的引用
- 禁止删除定义的变量或参数
- 八进制必须以0o开头
- eval有独立的作用域
- 禁止给基础数据类型添加属性
- 函数自执行时，this指向undefined而不是window
- 禁止使用arguments.callee
- arguments和eval被当做关键字，不能被赋值和用作变量名
- call，apply，bind传入null或undefined时函数的this指向null或undefined而不是window
- (其它特殊要求)

`with`\[严格模式不支持\]延长作用域链，里面的变量都从传入的对象中取得,例如:

```javascript
var a=20,
    obj={a:30};
(function(){
    var a=10;
    console.log(a);
    with(window){
        console.log(a);
    }
    with(obj){
        console.log(a);
    }
})();
```

## 2.变量

### 2.1 变量命名规则

- 不能以数字开头
- 严格区分大小写
- 不能使用**关键词**或**保留词**

### 2.2 变量命名规范

命名规范是为了方便代码维护、阅读、团队协作开发而制定的,违反这些规范并不会报错,而且每个团队会有自己的规范.这里列出的是通常被大多数团队使用的规范

- 只允许使用 数字(0-9)/字母(A-Z,a-z)/下划线(_)/美元符号($)
- 语义化命名
- 小驼峰命名（构造函数的函数名用大驼峰命名）
- 不覆盖系统自带API

### 2.3 定义变量及赋值

变量必须先定义后使用（赋值除外），直接使用未定义的变量会报错（在严格模式下必须定义后才能赋值）

可以使用`var`关键字定义一个变量,在定义变量时可以直接赋值,例如:`var a = 10;`也可以只定义不赋值，例如`var b;`

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>在ES6中还可以使用`let`关键词定义变量，语法与`var`相同

**使用let和使用var的不同**

|                                      | 使用var定义变量 | 使用let定义变量 | 举例 |
| ------------------------------------ | --------------- | --------------- | ---- |
| 变量提升现象                         | 存在            | 不存在          |      |
| 在同一作用域内多次定义同一个变量     | 允许            | 不允许          |      |
| 暂时性死区问题                       | 不存在          | 存在            | 例1  |
| 全局变量是否为顶层对象(window)的属性 | 是              | 否              | 例2  |
| 作用域                               | 按照ES5语法确定 | 按照ES6语法确定 |      |

**例1**

```javascript
console.log(a); // undefined
var a = 10;
console.log(b); // Uncaught ReferenceError: Cannot access 'b' before initialization
let b = 20;
```

**例2**

```javascript
var a = 10;
let b = 20;
console.log(window.a); // 10
console.log(window.b); //undefined
```

定义变量是可以通过加逗号一定定义多个变量,如`var/let a = 10, b = '20', c;`

变量定义后未经赋值的,值为undefined

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>给变量赋值除了使用赋值运算符`=`外,在es6中只要变量与数值具有相同的结构就可以进行赋值，通常称为**解构赋值**例如：

```javascript
let [a, b] = [10, 20]; // 相当于let a = 10, b = 20;
let [q, w, e] = [1, [2, 3]]; // 相当于 let q = 1, w = [2, 3], e;
let [q, [w, e]] = [1, [2, 3]]; // 相当于 let q = 1, w = 2 , e = 3;
let [a, b, c] = ['1', 'ss']; // 相当于 let a = '1', b = 'ss', c; （不成功的解构）
let [a, b] = [10, 20, 30] // 相当于 let a = 10, b = 20; （不完全解构）
let [, a, b] = [10, 20, 30] // 相当于 let a = 20, b = 30; （不完全解构）
let [a, b = 10] = [5]; // 相当于let a = 5, b = 10; （传undefined也使用默认值）
let [x = f()] = [1]; // 相当于let x = 1; 函数f不执行
let [x = f()] = []; // 相当于let x = f();
let {x: c, y: d} = {x: 50, y: 80}; // 相当于let c = 50, d = 80;
	// 上面一条也可写为 let {c, d} = {c: 50, d: 80};
	// 完整写出来为 let {c: c, d: d} = {c: 50, d: 80};
```

## 3. 控制台输出

`window.console.log(...x)`普通输出，如有多个参数则依次输出

`window.console.info(x)`输出信息

*`window.console.log`与`console.info`只是语义上的差别,效果上差别不大,在有有的浏览器中有info的标记,但在Google Chrome中完全一样*

`window.console.warn(x)`输出警告信息,不阻碍代码继续执行

`window.console.error(x)`输出错误信息,不阻碍代码继续执行

*如想阻止代码继续执行,可以使用`throw`抛出错误,例如*

```javascript
throw 'xxx';
throw new Error('xxx');
```

`window.console.dir`如果输出的是对象,则可以显示对象的所有属性与方法,如果不是对象,则除只能接收一个参数外与`log`无明显差异

## 4.数据类型

### 4.1 JavaScript含有的数据类型

*其中object称为复杂数据类型(或引用数据类型),其他的称为简单数据类型(或基础数据类型)*

- number

- string
- boolean
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>symbol
- null
- undefined
- object

### 4.2 部分数据类型的说明

#### 4.2.1 string类型

字符串的两端需要用下列符号中的任何一个括起来:

- 单引号(') - 例如:`'hello world'`
- 双引号(") - 例如:`"hello world"`
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>反引号(\`)（称为模板字符串） - 例如:\`hello word\` - 使用此符号时，内部可以换行，而且可以使用`${变量或表达式}`来直接得到对应的值，避免多次拼接

**字符串常用方法**

*以下提到的字符串方法均不改变原字符串的内容*

字符串可以加下标（用中括号）,表示取其中字符，只读，低版本IE不支持，x超出下标范围时返回undefined

`window.String.prototype.charAt(x)`只读,用法同字符串的下标，任何浏览器都支持，x超出下标范围时返回空字符串

`window.String.prototype.length`只读,获取字符串的长度

`window.String.prototype.charCodeAt(x)`第x位的编码

`window.String.fromCharCode(x)`返回对应编码的字符

`window.String.prototype.subString(x[, y])`截取字符串,如果x小于y则从第x个字符(含)开始截取到第y个字符(不含)；如果x大于y则从第y个字符(含)开始截取到第x个字符(不含)，x与y传负数时按0计，若省略y，则从此处一直截取到字符串结尾，返回截取的字符串。

`window.String.prototype.substr(x[, y])`截取字符串,从第x个字符(含)开始截取y个字符,省略y时截取到末尾。x可以传负数，表示从结尾开始计，返回截取的字符串。

`window.String.prototype.slice(x[, y])`截取字符串,从第x个字符(含)开始截取到第y个字符(不含)，省略y时截取到末尾。x与y可以传负数，表示从结尾开始计，返回截取的字符串。

`window.String.prototype.toLowerCase()`字符串转换为小写,无参数，返回转换后的字符串。

`window.String.prototype.toUpperCase()`字符串转换为大写,无参数，返回转换后的字符串。

`window.String.prototype.toLocaleLowerCase()`按照本地方式将字符串转换为小写,无参数，返回转换后的字符串。

`window.String.prototype.toLocaleUpperCase()`按照本地方式将字符串转换为大写,无参数，返回转换后的字符串。

> 只有少数几种语言（如土耳其语）具有地方特有的大小写映射，所以该方法的返回值通常与不带`Local`的函数一样。

`window.String.prototype.split(x)`以参数中的字符串或正则表达式切割字符串,返回一个数组,如果传参为**空字符串**,则逐字符切割,如果不传参数则将整体作为数组的一个元素。

`window.String.prototype.indexOf(x[, y])`从自左向右第y位开始查询,返回x在字符串中第一次出现的位置,若未出现该字符串,则返回-1，y可以省略表示从第0个字符开始查询

`window.String.prototype.lastIndexOf(x[, y])`从自左向右第y位开始向左查询,返回x在字符串中第一次出现的位置,若未出现x,则返回-1，y可以省略表示从最后0个字符开始查询

`window.String.prototype.search(x)`返回x在字符串中第一次出现的位置,x可以为字符串也可以为正则表达式（传正则时不执行全局检索）,若未出现该字符串,则返回-1

`window.String.prototype.concat(a[, b[, c[, ...]]])`字符串拼接，将参数a,b,c,...拼接在字符串后面，返回拼接后的新字符串

`window.String.prototype.trimLeft()`去除左侧空格，返回新字符串

`window.String.prototype.trimRight()`去除右侧空格，返回新字符串

`window.String.prototype.trim()`去除两侧空格，返回新字符串

`window.String.prototype.replace(旧内容,新内容)`用新内容替换旧内容,返回替换后的字符串

- 旧内容可以是一段字符串,也可以是一个正则表达式，旧内容为字符串时，只替换第一个匹配的内容
- 新内容可以是一段字符串,也可以是一个函数,如果是函数则用函数的返回值替换就内容,传给函数的第一个实参为替换前的旧内容(形参通常用$0接收)

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.padStart(i[, x])`[ES2017]字符串不够i位，则在开头数次添加字符串x，补满位数，返回处理后的字符串，若省略第二个参数，则用空格补全。

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.padEnd(i[, x])`[ES2017]字符串不够i位，则在结尾数次添加字符串x，补满位数，返回处理后的字符串，若省略第二个参数，则用空格补全。

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.includes(x[, i])`从第i位开始到最后为范围，判断字符串x是否在范围中，存在则返回true，否则返回false

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.startsWith(x[, i])`从第i位开始到最后为范围，判断范围内是否已x开头，是则返回true，否则返回false

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.endsWith(x[, i])`从第0位开始到第i位（不包括i）为范围，判断范围内是否已x结尾，是则返回true，否则返回false

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.String.prototype.repeat(n)`返回将字符串重复n次的新字符串

- 如果n为正小数则向下取整
- 如果n为小于或等于-1的负数或Infinity则报错
- 如果n为-1到0之间的小数，则n取0
- 如果n为字符串，则先转换为数字

`windoe.String.prototype.match(正则表达式)`返回字符串中匹配成功的字符串组成的数组(数组有匹配的内容与子项组成,在规则中使用全局`g`则组成的数组中不包含子项)

#### 4.2.2 number类型

JavaScript中的数字有最大值和最小值的限制,对于正数最大值可以利用`Number.MAX_VALUE`取得,若数字大于此值,则会转换为`Infinity`最小值可以利用`Number.MIN_VALUE`取得,若数字小于此值,则为`0`

在设置数字的时候可以设置十六进制/十进制/八进制/二进制

- 书写十六进制数字必须以`0x`开头
- 书写八进制必须以`0`或`0o`开头
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>书写二进制必须以`0b`开头

```javascript
console.log(017); // 15
console.log(0o15); // 13
console.log(0xab); // 171
console.log(0b10110); //22
// 对于八进制,以0开头,但数字超过了7会按照十进制来解析
console.log(088); // 88
// 对于八进制,以0o开头,但数字超过了7会报错
console.log(0o88); // 报错 Uncaught SyntaxError: invalid or unexpected token
```

`NaN`也属于数字类型,这种数据通常出现在类型转换时,将无法转换为数字的数据转换为数字类型或者计算类似`0/0`或负数的平方根等情况,就会出现`NaN`这个值.(NaN即Not a Number)

**数字常用方法**

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Number.isFinite(x)`若x为数字类型且为有穷的数字，则返回true，否则返回false（NaN返回false）

`window.isFinite(x)`将x转换为数字类型，判断转后后的数字是否为有穷的，若是则返回true，否则返回false（NaN返回false）

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Number.isNaN(x)`如果x为数字类型，且x为NaN，则返回true，否则返回false

`window.isNaN(x)`判断x转换为数字类型是否是NaN，若是则返回true，否则返回false

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Number.isInteger(x)`如果x为数字，且x为整数，则返回true，否则返回false

#### 4.2.3 object类型

##### 4.2.3.1 普通对象

我们可以通过如下方式来创建一个对象

- 使用`{键1:值1,键2:值2,...键n:值n}`的方式来定义对象,其中可以有若干个键值对(键也可以称为属性)
- 通过`new window.Object()`的方式来创建一个对象
- 通过`window.Object.create(x)`来创建一个对象，创建的对象的原型指向x

在es5中,键必须是字符串形式（不能是变量）,可以加引号也可以不加引号,但不加引号时必须符合变量的命名规则（纯数字会转换为字符串）

值可以是任意一种数据类型，也可以是变量

获取对象属性的值有两种方法：

- 可以使用`对象名.属性名`的方式来获取对应的值，但属性名必须满足变量的命名规则，且不能使用变量，属性名不必加引号会自动按字符串处理
- 也可以使用`对象名[变量或表达式]`的方式来获取变量或表达式的值对应的属性值，如果变量或表达式的值为纯数字，则会转换为字符串处理，属性名为字符串需要使用引号。

新增对象和修改属性值有两种方法：

- 直接通过赋值运算符进行赋值，例如：`obj.prop = 'abc'`，若prop属性原本不存在，则会新增此属性，原本存在会被修改（设置`get xxx`或`set xxx`属性时，其值需要为一个函数，表示xxx属性被读取或被赋值时执行此函数，详情见与下一条中的`get`属性和`set`属性的描述）
- 通过`window.Object.defineProperty(obj, prop, descriptor)`方法

> window.Object.defineProperty(obj, prop, descriptor)直接在obj上定义一个新属性，或者修改一个对象的现有属性， 并返回这个对象。
>
> - obj为要在其上定义属性的对象
> - prop为要定义或修改的属性名称
> - descriptor为将被定义或修改的属性的描述
>
> > descriptor为一个对象，可包含如下属性：
> >
> > - configurable属性，当且仅当此属性为true时，obj的prop属性的descriptor能被改变，同时此属性也能从对象上被删除，默认为false
> > - enumerable属性，当且仅当此属性为true时，obj的prop属性才能够出行在obj的枚举属性中（可以被遍历到），默认为false
> > - value属性，obj的prop属性对应的值，默认为undefined（有get或set属性时不能配置value属性）
> > - writable属性，当且仅当此属性为true是，obj的prop属性值才能被赋值运算符改变，默认为false
> > - get属性，值为一个函数，当读取此属性时会执行此函数，函数的返回值为读取到的属性值。
> > - set属性，值为一个函数，当给此属性赋值是会执行此函数。此函数必须接受一个形参，为被赋的值。

**例1**

```javascript
let obj = {age: 16};
Object.defineProperty(obj, 'name', {
    value: 'Rivalsa'
});
console.log(obj); // {age: 16, name: "Rivalsa"}
for(let v of Object.entries(obj)) {
    console.log(v); // 仅打印一次["age", 16]，因为enumerable属性为默认值false，所以name属性不能被遍历到
}
obj.name = 'Jerry'; // 因为writable属性为默认值false，所以name属性不能被赋值运算符改变(严格模式下此行报错，非严格模式下此行不生效)
console.log(obj); // {age: 16, name: "Rivalsa"} 非严格模式下才有此行输出
```

**例2**

```javascript
let obj = {age: 16};
Object.defineProperty(obj, 'name', {
    value: 'Rivalsa',
    enumerable: true,
    writable: true
});
console.log(obj); // {age: 16, name: "Rivalsa"}
for(let v of Object.entries(obj)) {
    console.log(v); // 第一次["age", 16]，第二次["name"， “Rivalsa”]
}
obj.name = 'Jerry';
console.log(obj); // {age: 16, name: "Jerry"}
```

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>在es6中键可以写`[变量或表达式]`,这时会使用变量或表达式的值转换为字符串形式作为对象的键，例如：

```javascript
let key = "name";
let obj = {
    [key]: "Rivalsa"
};
console.log(obj.name); // Rivalsa
```

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>当对象的属性值为变量且与属性名相同时可以简写，当属性值为函数时也可以简写，如下所示：

```javascript
//未简写
let x = 10,
    y = 20,
    obj = {
        x: x,
        y: y,
        sum: function() {
            return this.x + this.y;
        }
    };
//简写
let x = 10,
    y = 20,
    obj = {
        x,
        y,
        sum() {
            return this.x + this.y;
        }
    };
```

读取对象中不存在的属性不会报错，值为undefined

使用`delete`可以删除对象中的属性，例如:`delete obj.pet`，删除成功返回`true`否则返回`false`(在严格模式下无法使用)

将对象赋值给一个变量是将对象的地址给这个变量，对变量的修改等价于直接修改对象，举例如下：

```javascript
let obj = {
    name: 'Rivalsa',
    age: 18,
    pet: 'cat'
};
let a = obj;
a.age = 16;
console.log(obj.age); // 16
```

`window.Object.getOwnPropertyNames(obj)`返回对象obj的所有属性名（包括不可枚举的属性，但不包含Symbol值作为属性名的属性）组成的数组

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Object.getOwnPropertySymbols(obj)`返回对象obj所有Symbol值作为属性名的数组

`window.Object.prototype.hasOwnProperty(prop)`判断对象中是否存在prop属性（不检查原型链），存在返回true，不存在返回false

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>对象的`window.Object.keys(obj)`,`window.Object.values(obj)`与`window.Object.entries(obj)`方法分别表示获取对象的键,值以及键值对组成的数组

利用`for 变量 in 对象`可以遍历对象的键。

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Object.is(x, y)`判断x与y是否是相同的值（不发生数据类型转换），例如：

```javascript
console.log(Object.is(NaN, NaN)); // true
console.log(Object.is(+0, -0)); // false
console.log(Object.is({}, {})); // false 比较的仍然是地址
```

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Object.assign(target, ...sources)`将source对象拼接在target对象上（如果属性名重复，则使用最后一个属性值），target对象会被改变，sources对象不改变，返回修改后的target对象

`a in obj`如果a是obj的属性或原型链上的属性，则返回true，否则返回false。

##### 4.2.3.2 数组

数组属于对象的一种，可以通过如下方式创建一个数组：

- 通过`[值1,值2,值3,...,值n]`来定义一个数组
- 通过`new window.Array(x[, y[, z[, ...]]])`来创建一个数组，如果x为数字且没有其他参数,则返回有x项的数组且每项内容为空；否则，返回由x,y,z...组成的数组
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>通过`window.Array.of(x, y, z, ...)`将一组散列的值转换为数组

*JS不同方法对数组的空位的处理不一致，很乱，所以要尽量避免空位的出现*

**数组常用方法**

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Array.prototype.keys()`、`window.Array.prototype.values()`、`window.Array.prototype.entries()`方法分别会返回数组的下标，数组的数据以及数组的下标数据对组成的`Iterator`对象

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>利用`for 变量 of 数组`遍历数组（部署了`Iterator`的类数组也能用），举例如下：

```javascript
//遍历对象（本质上也是遍历数组）
let obj = {name:"Rivalsa",age:18,sex:"M"};
for(let key of Object.keys(obj)){ //keys对应换成values或entries
    console.log(key);
}
//遍历数组
let arr = [1,2,3,4];
for(let value of arr){
    console.log(value);
}
```

`array.length`返回数组的长度

`window.Array.prototype.push(x[, y[, z[, ...]]])`向数组中添加新数据x,y,z,...(新增到结尾),返回新增数据后数组的长度.(改变原数组)

`window.Array.prototype.unshift(x[, y[, z[, ...]]])`向数组中添加新数据x,y,z,...(新增到开头),返回新增数据后数组的长度.(改变原数组)

`window.Array.prototype.pop()`无参数,把原数组的最后一位删掉,改变原数组,返回被删除的数据

`window.Array.prototype.shift()`无参数,把原数组的第一位删掉,改变原数组,返回被删除的数据

`window.Array.prototype.splice(a, b[, data[, data[, data[,...]]]])`从数组下标为a的位开始删除b个数据,再增加数据data,改变原数组,返回由被删除的数据组成的数组(若未删除则返回空数组)

- a可以传入负数,表示从末尾的某处开始删除

`window.Array.prototype.indexOf(x[, y])`从下标为y处开始查找数组中的第一个数据x,返回数据下标,若未找到则返回-1，省略y则从第一个元素开始查找

`window.Array.prototype.lastIndexOf(x[, y])`从下标为y处开始反向查找数组中的第一个数据x,返回数据下标,若未找到则返回-1，省略y则从最后一个元素开始查找

`window.Array.prototype.slice(x[, y])`截取数组,从下标为x的数据(含)开始到下标为y的数据(不含)结束,如果省略y则截取到最后,不修改原数组,返回得到的新数组

- x与y均可以传入负数,表示从末尾开始计

`window.Array.prototype.sort(x)`当不传入参数x时将数组中的数据从小到大排列,改变原数组,返回排序后的数组

*x可以为函数,此处不详细写明,但有一种常用用法,举例如下*

```javascript
var arr=[2,5,1,6,4];
//从大到小排列
arr.sort(function(a,b){return b-a;});
console.log(arr)
```

`window.Array.prototype.reverse()`颠倒顺序,改变原数组,返回改变后的数组

`window.Array.prototype.concat(x[, y[, z[, ...]]])`将x,y,z...拼接在数组后面,x,y,z...既可以是一个数组,也可以是其他数据类型的新数据,不改变原有数组,返回新数组

`window.Array.prototype.join([x])`用x将数组的元素连接在一起（不传x则默认为逗号）,不修改原数组,返回拼接好的字符串

`window.Array.isArray(x)`判断x是否是数组,如果是返回true,否则返回false

`window.Array.prototype.forEach(function(currentValue[, index[, arr]])[, thisValue])`数组的遍历

- `currentValue`为当前的数据
- `index`为当前的序号
- `arr`为数组本身
- `thisValue`为函数中`this`的指向

> forEach不兼容IE8及其以下
>
> 类数组`HTMLCollection`不支持使用`forEach`
>
> 类数组`NodeList`支持使用`forEach`

`window.Array.prototype.map(function(item[, index[, arr]])[, thisValue])`数组的映射(遍历数组，遍历时执行函数，返回以每次执行函数的返回值为元素的数组)，不改变原数组

- item为当前的数据
- index为当前的序号
- arr为数组本身
- `thisValue`为函数中`this`的指向

`window.Array.prototype.filter(function(item[, index[, arr]])[, thisValue])`数组的筛选(遍历数组，遍历时执行函数，返回由函数返回值为true的元素组成的新数组)，不改变原数组

- item为当前的数据
- index为当前的序号
- arr为数组本身
- `thisValue`为函数中`this`的指向

`window.Array.prototype.some(function(item[, index[, arr]])[, thisValue])`遍历数组，并执行函数，每次执行函数的返回值中如果有一个返回true则整个函数返回true，否则返回false，若对空数组使用此方法，则无论任何情况都返回false

- item为当前的数据
- index为当前的序号
- arr为数组本身
- `thisValue`为函数中`this`的指向

`window.Array.prototype.every(function(item[, index[, arr]])[, thisValue])`遍历数组，并执行函数，每次执行函数的返回值中全都返回true则整个函数返回true，否则返回false，若对空数组使用此方法，则无论任何情况都返回false

- item为当前的数据
- index为当前的序号
- arr为数组本身
- `thisValue`为函数中`this`的指向

`window.Array.prototype.reduce(function(prev, currentValue[, index[, arr]])[, initialValue])`

> 当未传initialValue时，按照如下步骤执行：
>
> - 执行回调函数（prev为数组的第0项，currentValue为数组的第1项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的第2项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的第3项，index时CurrentValue的索引，arr为数组本身）
> - ...
> - 再次执行回调函数（prev为上一次回调执行函数的返回值，currentValue为数组的第最后一项，index时CurrentValue的索引，arr为数组本身）
> - 整个函数返回值为最后一次执行回调函数的返回值
>
> 当传了initialValue时，按照如下步骤执行：
>
> - 执行回调函数（prev为initialValue，currentValue为数组的第0项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的第1项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的第2项，index时CurrentValue的索引，arr为数组本身）
> - ...
> - 再次执行回调函数（prev为上一次回调执行函数的返回值，currentValue为数组的第最后一项，index时CurrentValue的索引，arr为数组本身）
> - 整个函数返回值为最后一次执行回调函数的返回值

`window.Array.prototype.reduceRight(function(prev, currentValue[, index[, arr]])[, initialValue])`

> 当未传initialValue时，按照如下步骤执行：
>
> - 执行回调函数（prev为数组的最后一项项，currentValue为数组的倒数第二项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的倒数第三项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的倒数第四项，index时CurrentValue的索引，arr为数组本身）
> - ...
> - 再次执行回调函数（prev为上一次回调执行函数的返回值，currentValue为数组的第0项，index时CurrentValue的索引，arr为数组本身）
> - 整个函数返回值为最后一次执行回调函数的返回值
>
> 当传了initialValue时，按照如下步骤执行：
>
> - 执行回调函数（prev为initialValue，currentValue为数组的最后一项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的倒数第二项，index时CurrentValue的索引，arr为数组本身）
> - 再次执行回调函数（prev为上一次执行回调函数的返回值，currentValue为数组的倒数第三项，index时CurrentValue的索引，arr为数组本身）
> - ...
> - 再次执行回调函数（prev为上一次回调执行函数的返回值，currentValue为数组的第0项，index时CurrentValue的索引，arr为数组本身）
> - 整个函数返回值为最后一次执行回调函数的返回值

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Array.from(arrayLike[, mapFn[, thisArg]])`将类数组或可迭代对象转换为数组

- arrayLike为想要转换成数组的伪数组对象或可迭代对象
- mapFn为如果指定了此参数，新数组将由此函数的返回值组成
- thisArg为回调函数中的this指向

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Array.prototype.find(function(val[, index[, arr]])[, thisArg])`返回数组中第一个使回调函数返回为true的值。若无则返回undefined

- val当前的元素
- index当前元素的索引
- arr数组本身
- thisArg回调函数中的this指向

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Array.prototype.findIndex(function(val, index, arr))`返回数组中第一个使回调函数返回为true的索引值。若无则返回-1

- val当前的元素
- index当前元素的索引
- arr数组本身
- thisArg回调函数中的this指向

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Array.prototype.fill(value[, start[, end]])`用value填充一个数组中从start（含）到end（不含）的全部元素，省略start则从第0位开始填充，省略end则填充到最后一位

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>[ES2016]`window.Array.prototype.includes(x)`数组中是否包含x，包含则返回true，否则返回false

##### 4.2.3.3 函数

函数属于对象的一种

- 定义函数可以通过`function`关键字进行定义,如`function 函数名(形参){}`,也可以通过赋值的方式进行定义,如`var/let 函数名 = function(形参){};`,有时也可以不给函数取名(称为匿名函数),例如`function(形参){}`
- 对于通过`function 函数名(形参){}`定义的函数或通过`var/let 函数名 = function(形参){}`来定义的函数，可以在函数内部以及函数所在作用域内通过函数名来调用函数
- 对于通过`var 函数名1 = function 函数名2(形参){}`来定义的函数，可以在函数内部以及函数所在作用域内通过函数名1来调用函数，但在函数名2只能在函数的内部使用
- 当函数中有`return`时,函数的返回值为对应的内容，当函数中没有`return`或内容为空时,返回`undefined`，执行函数时，一旦遇到`retutn`则直接跳出函数
- 函数表达式可以加小括号去执行（小括号中的内容为传递的实参）,函数定义`function(形参){}`可以通过小括号括起来转换为表达式,再在后面加小括号就可以直接执行,称为**立即执行函数(IIFE)**。立即执行函数可以将代码模块化,避免污染全局环境
- 函数实际传入的参数称为**实参**,在函数内部用于接受实参值的变量称为**形参**,实参与形参按顺序一一对应
- 实参个数可以等于形参个数,也可以大于形参个数,也可以小于形参个数.传参时,形参与实参按顺序一一对应,对于形参多于实参的情况,未传值的形参值为undefined,对于实参多于形参的情况,在函数中无法通过形参拿到值,但可以通过`arguments`(实参列表)来拿到值
- 函数的参数也可以通过解构赋值的方式进行传值
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>在ES6中可以在形参中通过等号来设置默认值，当对应的实参为undefined时，将使用默认值

```javascript
function fn(形参 = 默认值) {
    ...
}
```

> *ES5中无法直接设置默认值，通常通过如下方案代替：*
> ```javascript
> function fn(形参) {
>     // 方案一
>     形参 = 形参 || 默认值;
>     // 方案二
>     形参 === undefined && 形参 = 默认值;
>     ...
> }
> ```
>*<span style="color:yellowgreen;font-weight:600;">[ES6]</span>函数的形参可以通过解构赋值的方式来接收实参，在解构赋值时设置默认值的方式请参考《[利用解构赋值给函数传参时的默认值问题](https://www.rivalsa.cn/s/article/Frontend/defval?utm=SlPlrabkuaDnrJTorrA=)》*

- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>在es6中函数有`function.length`和`function.name`属性,length表示第一个有默认值的形参之前的形参的个数（不包括rest参数），name为函数的名字

```javascript
function fn(a,b,c = 0, d) {};
console.log(fn.length, fn.name); // 2 "fn"
```

- 在函数中可以调用函数自身，这种方式称为**递归**
- 参数为函数，或返回值为函数的函数称为**高阶函数**
- 函数中存在一个`this`，会指向**调用函数的对象**,函数直接加括号执行属于window调用的,但在严格模式下,函数加括号直接执行this指向undefined（箭头函数除外）
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>从ES2017开始，允许函数实参有尾逗号
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>箭头函数

> 箭头函数不是函数声明，只是一个函数表达式
>
> 用`=>`的方式来定义函数，例如：
>
> ```javascript
> let a = (x, y) => {
> return x + y;
> }
> a();
> ```
>
> 箭头函数的简写
>
> - 当形参有且仅有一个时，小括号可以不写（小括号里面的形参要写）
> - 当函数体中只有一条语句时，大括号可以不写（大括号里面的语句要写），但省略大括号后，函数默认的返回值变为语句的返回值
>
> 箭头函数与普通函数的异同点
>
> | 箭头函数() = > {}                 | 普通函数function(){}       | 举例 |
> | --------------------------------- | -------------------------- | ---- |
> | this指向与外界一致,没有自己的this | this指向调用这个函数的对象 | 例1  |
> | 不能用new执行                     | 可以用new执行              |      |
> | 没有arguments                     | 有arguments                |      |
>
> 例1
>
> ```javascript
> document.addEventListener("click",function(){
>  console.log(this); // this指向document
> });
> document.addEventListener("click",() => {
>  console.log(this); // this指向window
> });
> ```

**<span style="color:yellowgreen;font-weight:600;">[ES6]</span>Symbol类型**

每次新建的Symbol都是不一样的。在ES5中对象的属性名都是字符串，如果要使用其他人提供的对象，又想为此对象新增一些属性，为了不让新属性的属性名与原有的属性重名，就可以使用Symbol数据类型。例如：

```javascript
let obj={name:"Rivalsa",age:18};
let name=Symbol();
obj[name]="Jerry";
console.log(obj); // {name: "Rivalsa", age: 18, Symbol(): "Jerry"}
```

Symbol的参数是它的标识，只是便于开发者区分，运行时没有实际意义

在遍历对象时，通常拿不到属性值为Symbol类型的属性

### 4.3 数据类型的检测

`typeof x`返回x的数据类型字符串(也可以写为`typeof(x)`),但存在特殊情况,下面列出所有可能的输出值

- `number`类型返回`number`
- `string`类型返回`string`
- `boolean`类型返回`boolean`
- `undefined`类型返回`undefined`
- `null`类型返回`object`
- `object`类型(function除外)返回`object`
- `function`返回`function`

*判断x的数据类型还有一种方案是通过`window.Object.prototype.toString.call(x)`的返回值来判断*

### 4.4 数据类型之间的转换

#### 4.4.1 转换为数字

`window.Number(x)`将x转换为数字类型,返回转换后的结果如下：

- 若x为纯由数字组成的字符串(可以有正负号或小数点，忽略最前面和最后面空格)，则返回对应的数字
- 若x为含有非数字字符的字符串，则返回结果为`NaN`
- 若x为空字符串，则返回`0`
- 若x为`true`,则返回`1`
- 若x为`false`,则返回`0`
- 若x为`null`,则返回`0`
- 若x为`undefined`或对象,则先转换为字符串,再将得到的字符串按照上述规则转换为数字,返回得到的数字

`window.parseInt(string, radix)`将以数字开头的字符串转换为整数数字(第一个非数字字符后面的内容不再解析,正负号算作数字),返回获得的结果,第二个参数为进制的基数,表示第一个参数是以多少进制表示的

`window.parseFloat(x)`将以数字开头的字符串转换为数字(第一个非数字且非第一个`.`字符后面的内容不再解析,正负号算作数字),返回获得的结果

<span style="color:yellowgreen;font-weight:600;">[ES6]</span>在ES6中`window.parseInt`和`window.parseFloat`可以用`window.Number.parseInt`和`window.Number.parseFloat`代替

#### 4.4.2 转换为字符串

`window.String(x)`将x转换为字符串,返回转换后的结果

`window.Object.prototype.toString()`将x转换为字符串,返回转换后的结果,括号中可以传入一个数字参数,表示将数字转换为对应进制数的字符串(如果x不是数字则忽略参数)

将x转换为字符串的结果如下:

- 若x为数字,则转换为对应的纯数字的字符串
- 若x为`true`或`false`或`null`或`undefined`或`NaN`则对应转换为`'true'`或`'false'`或`'null'`或`'undefined'`或`'NaN'`
- 若x为对象类型(函数和数组除外),则转换为`'[object Object]'`
- 若x为数组,则转换为经扩展运算符(...)运算后的值
- 若x为函数,则转换为整个函数体

#### 4.4.3 转换为布尔值

`Boolean(x)`将x转换为布尔值,返回结果如下:

- 若x为数字`0`,则返回`false`
- 若x为空字符串`""`,则返回`false`
- 若x为`undefined`,则返回`false`
- 若x为`null`则返回`false`
- 若x为`NaN`则返回`false`
- 其他情况均返回`true`

## 5.Math对象

- `window.Math.abs(x)`返回x的绝对值
- `window.Math.random()`返回0-1之间的随机数(包含0,不包含1)
- `window.Math.round(x)`返回x的四舍五入取整值
- `window.Math.ceil(x)`返回大于或等于x的最小整数
- `window.Math.floor(x)`返回小于或等于x的最大整数
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Math.trunc(x)`返回x的整数部分，对于undefined和无法截取整数的值，返回NaN（可以用~~x代替）(传入该函数的参数会被转换为数字类型)
- `window.Math.min(a,b,c,...)`接收多个数字参数,返回最小值（如果不传参返回`Infinity`）
- `window.Math.max(a,b,c,...)`接收多个数字参数,返回最大值（如果不传参返回`-Infinity`）
- `window.Math.pow(a,b)`返回a的b次幂(<span style="color:yellowgreen;font-weight:600;">[ES6]</span>在es6中可以用`a ** b`表示)
- `window.Math.sqrt(x)`返回x的算术平方根
- `window.Math.cos(x)`计算x的余弦值，x是以弧度为单位的数字
- `window.Math.sin(x)`计算x的正弦值，x是以弧度为单位的数字
- `window.Math.tan(x)`计算x的正切值，x是以弧度为单位的数字
- `window.Math.PI`圆周率的值
- `window.Math.LN10`10的自然对数
- `window.Math.LN2`2的自然对数
- `window.Math.LOG10E`以10为底e的对数
- `window.Math.LOG2E`以2为底e的对数
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Math.sign(x)`此函数共有5种返回值, 分别是 **1, -1, 0, -0, NaN.** 代表的各是**正数, 负数, 正零, 负零, NaN**(传入该函数的参数会被转换为数字类型)
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Math.cbrt(x)`返回x的立方根
- <span style="color:yellowgreen;font-weight:600;">[ES6]</span>`window.Math.hypot(x[, y[, z[, ...]]])`返回所有参数的平方和的平方根

## 6.日期对象

**window.Date为构造函数（类）,需要通过new创建一个对象**

*Date后面加括号可以指定时间(年,月,日,时,分,秒),月份从0起,注意减一,或者括号中可以直接写以毫秒为单位的时间戳,或者传格式为"年/月/日 时:分:秒"的字符串("/"可以替换为"-")).传字符串时月份不必考虑加减1的问题*

`window.Date.prototype.toLocalString()`转换为本地格式的日期时间

`window.Date.prototype.toLocalDateString()`转换为本地格式的日期

`window.Date.prototype.toLocalTimeString()`转换为本地格式的时间

`window.Date.prototype.getFullYear()`获取完整年份

`window.Date.prototype.getYear()`获取年份(19xx年用两位数表示,后续会超过100,不常用)

`window.Date.prototype.getMonth()`获取月份,0-11月,所以通常要加1

`window.Date.prototype.getDay()`获取星期,从零开始,星期日为0

`window.Date.prototype.getDate()`获取日

`window.Date.prototype.getHours()`获取时

`window.Date.prototype.getMinutes()`获取分

`window.Date.prototype.getSeconds()`获取秒

`window.Date.prototype.getMilliSeconds()`获取毫秒

`window.Date.prototype.toUTCSting()`转换为UTC时间,返回值为字符串

`window.Date.prototype.getTime()`转换为以毫秒为单位的时间戳(从1970年1月1日0时整开始计算)

`window.Date.prototype.getTimezoneOffset()`获取GMT时间与本地时间相差的分钟数(GMT时间减去本地时间)

`window.Date.prototype.setFullYear(x)`将年份设置为x

`window.Date.prototype.setMonth(x)`将月份设置为x,范围为0-11

`window.Date.prototype.setDate(x)`将日设置为x

`window.Date.prototype.setHours(x)`将小时设置为x

`window.Date.prototype.setMinutes(x)`将分钟设置为x

`window.Date.prototype.setSeconds(x)`将秒设置为x

`window.Date.prototype.setMilliseconds(x)`将毫秒设置为x

日期对象可以相减,返回值为两个日期相差的毫秒数(相当于时间戳相减)

## 7. <span style="color:yellowgreen;font-weight:600;">[ES6]</span>Set和Map两种数据结构

ES6中新增`Set`和`Map`两种数据结构，需用`new`创建对象

创建`set`对象时需要传一个数组，创建的`set`对象有数组中的元素去重后组成(不传值或传空数组均返回没有元素的`set`对象)

```javascript
let set = new Set(['a', 'b', 10, 20, true, 'b', true]);
console.log(set); // Set(5) {"a", "b", 10, 20, true}
```

通过`window.Set.prototype.keys()`,`window.Set.prototype.values()`以及`window.Set.prototype.entries()`的执行，可以看出一个set对象的键与值是完全一样的，例如上例中的set对象的键分别为`"a", "b", 10, 20, true`，值也分别为`"a", "b", 10, 20, true`

利用`set`对象将传进的数组去重，例如：

```javascript
let arr=[1, 2, 4, 6, 6, 8, 3, 8, 1];
let x=[...new Set(arr)];
console.log(x);
```

`set`对象的属性

- `set.size` 长度
- `window.Set.prototype.add(x)` 添加数据x（数据有相同内容时不会被添加），改变原set对象，返回改变后的set对象
- `window.Set.prototype.clear()` 全部清除
- `window.Set.prototype.delete(x)` 删除数据x，成功返回true，失败返回false

由于`window.Set.prototype.add(x)`的返回值仍是此set对象，所以可以进行链式操作，例如：

```javascript
let s = new Set();
s.add(10).add(20).add(30).add(40);
console.log(s);
```

`Map`可以让任何数据类型都能作为键，但只能`window.Map.prototype.set(键, 值)`存值，`window.Map.prototype.get(键)`取值。例如：

```javascript
let obj={};
let map=new Map();
map.set(true,123);
map.set(obj,"qwe");
console.log(map.get(obj),map.get(true));
```

## <span style="color:yellowgreen;font-weight:600;">[ES6]</span>8.[Symbol.iterator]

在`Symbol`这个对象中会默认有一个名为`iterator`的属性，其值为`Symbol`数据类型。`Symbol.iterator`被系统设置为一些对象的属性，其值为一个函数，执行这个函数时，会返回一个与此对象有关的`iterator`对象。

*`[Symbol.iterator]`通常会在某些方法内部自动调用*

`iterator`称为迭代器，其运行过程是这样的：

（1）某些方法内部会自动调用`[Symbol.iterator]`接口，会生成一个`iterator`对象。

（2）第一次调用`iterator`对象对象的`next`方法，可以将指针指向数据结构的第一个成员。

（3）第二次调用`iterator`对象对象的`next`方法，指针就指向数据结构的第二个成员。

（4）不断调用`iterator`对象对象的`next`方法，直到它指向数据结构的结束位置。

**为了理解`iterator`，现在以数组为例，逐步说明**

```javascript
let arr = [10, 20, 30];
// 迭代器通常不直接使用，而是在调用如for...in...等内容是，在逻辑内部自动调用，为了方便说明，这里采用手动的方式来一步步调用迭代器。
let ite = arr[Symbol.iterator](); // 迭代器是一个函数，执行这个函数
console.log(ite); // 迭代器的返回值的原型链中有next函数
console.log(ite.next()); // 执行next函数，会返回一个对象，对象中value属性为数组的第0个值，done属性为false表示当前没有迭代完成
console.log(ite.next()); // 执行next函数，会返回一个对象，对象中value属性为数组的第1个值，done属性为false表示当前没有迭代完成
console.log(ite.next()); // 执行next函数，会返回一个对象，对象中value属性为数组的第2个值，done属性为false表示当前没有迭代完成
console.log(ite.next()); // 执行next函数，会返回一个对象，对象中value属性为undefined，done属性为true表示当前已经迭代完成
```

上例中，经过反复执行`nex`t函数，就能够依次遍历到数组中的每一个值，而类似`for...of...`的内部，就是利用迭代器来得到数组中每一个值的，所以只有部署了`Symbol.iterator`的对象才能使用`for...of...`

**原生具备`[Symbol.Iterator]`的对象**

- Array
- Map
- Set
- String
- 函数的arguments对象
- Nodelist对象

**给类数组部署`[Symbol.iterator]`**

```javascript
let obj = {
    0: 'a',
    1: 'b',
    2: 'c',
    length: 3,
    [Symbol.iterator]: Array.prototype[Symbol.iterator]
};
for(let v of obj) {
    console.log(v); // 分别打印a，b，c
}
```

不能给普通对象部署`[Symbol.iterator]`，如果强行部署，会因为没有属性名为“0“，”1“，”2“，... 的属性，所以每次返回的对象中`value`的值均为`undefined`

## <span style="color:yellowgreen;font-weight:600;">[ES6]</span>9.Proxy

代理用于修改某些操作的默认行为，等同于在语言层面做出修改，所以属于一种“元编程”，即对编程语言进行编程

通过代理允许自定义函数，在对代理对象执行相关操作时，执行对应函数。

可通过如下方法创建一个对象的代理：

```javascript
let proxy = new Proxy(target, handler);
```

- `target`为被代理的对象
- `handler`指定对代理对象执行对应操作时执行函数

> handler为一个对象，可由如下属性组成：
>
> **set(a, b, c, d){}**修改代理对象的属性值时执行此函数
>
> - 形参a为被代理对象
> - 形参b为被访问的属性名
> - 形参c为预被设置为的属性值
> - 形参d为代理对象
>
> **get(a, b, c){}**读取代理对象的属性值时执行此函数，得到的属性的值为此函数的返回值
>
> - 形参a为被代理对象
> - 形参b为被访问的属性名
> - 形参c为代理对象
>
> **has(target, propKey)**：拦截`propKey in proxy`的操作，返回一个布尔值
>
> **deleteProperty(target, propKey)**：拦截`delete proxy[propKey]`的操作，返回一个布尔值
>
> **ownKeys(target)**：拦截`Object.getOwnPropertyNames(proxy)`、`Object.getOwnPropertySymbols(proxy)`、`Object.keys(proxy)`，返回一个数组。该方法返回目标对象所有自身的属性的属性名，而`Object.keys()`的返回结果仅包括目标对象自身的可遍历属性
>
> **getOwnPropertyDescriptor(target, propKey)**：拦截`Object.getOwnPropertyDescriptor(proxy, propKey)`，返回属性的描述对象
>
> **defineProperty(target, propKey, propDesc)**：拦截`Object.defineProperty(proxy, propKey, propDesc）`、`Object.defineProperties(proxy, propDescs)`，返回一个布尔值
>
> **preventExtensions(target)**：拦截`Object.preventExtensions(proxy)`，返回一个布尔值
>
> **getPrototypeOf(target)**：拦截`Object.getPrototypeOf(proxy)`，返回一个对象
>
> **isExtensible(target)**：拦截`Object.isExtensible(proxy)`，返回一个布尔值
>
> **setPrototypeOf(target, proto)**：拦截`Object.setPrototypeOf(proxy, proto)`，返回一个布尔值。如果目标对象是函数，那么还有两种额外操作可以拦截
>
> **apply(target, object, args)**：拦截 Proxy 实例作为函数调用的操作，比如`proxy(...args)`、`proxy.call(object, ...args)`、`proxy.apply(...)`
>
> **construct(target, args)**：拦截 Proxy 实例作为构造函数调用的操作，比如`new proxy(...args)`

**可撤销的代理**

利用`window.Proxy.revocable(target, handler)`可以创建一个可撤销的代理，其返回值为一个对象，由如下两个属性组成：

- `proxy`代理的对象
- `revoke`函数，执行此函数可以撤销代理

```javascript
let {proxy, revoke} = Proxy.revocable({}, {});
proxy.foo = 123;
console.log(proxy.foo); // 123
revoke();
console.log(proxy.foo); // Uncaught TypeError: Cannot perform 'get' on a proxy that has been revoked
```

## 10.改变this指向

`window.Function.prototype.call(a[, b[, c[, ...]]])`立即执行函数,a为函数中的this指向，b,c,...为向函数中传递的实参，例如:

```javascript
function fn(a, b){
    console.log(this);
    console.log(a + b);
}
fn.call(document, 5, 6);
```

`window.Function.prototype.apply(a[, b])`立即执行函数，a为函数中的this指向，b为向函数中传的的实参组成的数组，例如:

```javascript
function fn(a, b){
    console.log(this);
    console.log(a + b);
}
fn.apply(document, [5, 6]);
```

`window.Function.prototype.bind(a[, b[, c[, ...]]])`*[不兼容IE8及其以下]*不执行这个函数,返回值为新函数,但新函数的内容与原函数相同,新函数的this指向为实参对象a，实参b,c,...为函数的实参,返回的函数无须再传此参数也无法修改

```javascript
function fn(a, b){
    console.log(this);
    console.log(a + b);
}
fn.bind(document, 1)(2);
```

## 11.运算符

运算符按照按照参数的个数可以分为**一元运算符**,**二元运算符**和**三元运算符**

运算符按照作用可以分为**赋值运算符**,**算数运算符**,**比较运算符**,**逻辑运算符**,**三目运算符**,**逗号运算符**和**位运算符**

### 11.1 赋值运算符

赋值运算符`=`的左侧为一个变量,右侧为一个值,表示将值赋给变量

赋值运算符的返回值为"`=`"右侧的值

```javascript
var a;
console.log(a = 20); // 20
console.log(a); // 20
```

**自增赋值或自减赋值**

自增和自减用`++`和`--`表示,可以写在数据前面也可以写在数据后面

```javascript
console.log(i++);
// 上述代码相当于
// console.log(i);
// i++;

console.log(++i);
// 上述代码相当于
// i++;
// console.log(i);

// 自减与自加类似
```

**赋值简写**

```javascript
let a = 10;
a += 1; // 相当于 a = a + 1;
a -= 1; // 相当于 a = a - 1;
a *= 1; // 相当于 a = a * 1;
a /= 1; // 相当于 a = a / 1;
a %= 1; // 相当于 a = a % 1;
a **= 1； // 相当于 a = a ** 1 [ES6];
```

### 11.2 算数运算符

算数运算符分为`+(正)`\\`-(负)`\\`+(加)`\\`-(减)`\\`*(乘)`\\`/(除)`\\`%(取余)`

加减乘除和取余数按照数学上的运算规则进行运算

**数字运算符运算过程中的强制类型转换**

涉及一元运算符都会强制转换为数字类型再运算,例如:

```javascript
console.log('24'); // '24' - 字符串
console.log(+'24'); // 24 - 数字
console.log(+'24d'); // NaN - 数字
console.log(-'24'); // -24 - 数字
```

涉及减\乘\除\取余都会强制转换为数字类型再运算

涉及加会按照如下规则进行运算:

- 如果`+`两侧有一侧是字符串,则会将另一侧转换为字符串类型后拼接为新字符串
- 如果`+`两侧有一侧是对象,则会将两侧全部转换为字符串再进行运算
- 其他情况一律全部转换为数字再进行运算

### 11.3 比较运算符

比较运算符包含`<`,`<=`,`>`,`>=`,`==`,`===`,`!=`,`!==`

**`==`与`===`的区别,`!=`与`!==`的区别**

`===`的比较需要数据类型与值都完全相同才会返回true,否则返回false

`==`的比较若两侧数据类型不一致会按照相关规则进行类型转换后再比较。

*`!=`与`!==`的区别于`==`与`===`的区别相似*

**对象与对象的比较**

对象在比较时,只比较地址是否一致,例如:

```javascript
let obj1 = {x:1};
let obj2 = {x:1};
console.log(obj1 == obj2); // false
console.log(obj1 === obj2); // false
```

对象间有关大于或小于的比较全部返回false

**字符串与字符串的比较**

字符串与字符串的比较按照首字符的编码大小进行比较,如果首字符相同,则按照第二个字符的编码大小进行转换,以此类推,例如:

```javascript
console.log('30' > '4'); // false
```

**数字与数字的比较**

按照数学上的规则进行比较

任何数字都小于`Infinity`

任何数字都大于`-Infinity`

**除了数字与数字/字符串与字符串/对象与对象外的比较**

除了数字与数字/字符串与字符串/对象与对象外,会将两侧都转换为数字类型后再进行比较

**与NaN的比较**

任何与`NaN`的比较都返回`false`,即使`NaN == NaN`也会返回`false`

### 11.4 逻辑运算符

逻辑运算符包含`&&`,`||`,`!`

`&&`称为与运算符,使用方法为`值1 && 值2`,运算时,首先判断`值1`转换为布尔值是否为false,如果是,则直接返回值1(**注意:是返回值1,而不是返回值1转换为的布尔值**),如果不是,则直接返回值2

`||`称为或运算符,使用方法为`值1 || 值2`,运算时,首先判断`值1`转回为布尔值是否为true,如果是,则直接返回值1(**注意:是返回值1,而不是返回值1转换为的布尔值**),如果不是,则直接返回值2

`!`称为非运算符,使用方法为`!值`如果值转换为布尔值为true则返回false,否则返回true

举例:

```javascript
console.info( 1 && 2 && null && 4 ); // null
console.info( null || undefined || 10 || false ); // 10  
var a = 0 && alert('hhh'); // 弹窗不执行, a为0
var b = alert("hhh") && 0; // 弹窗，b为undefined
```

### 11.5 三目运算符

三目运算符语法为`值1 ? 值2 : 值3`

当`值1`转换为布尔值为`true`时,整个返回`值2`,否则返回`值3`

### 11.6 逗号运算符

逗号运算符的语法为`语句1,语句2`,执行时,先执行语句1,再执行语句2,整个表达式的返回值为语句2的值

### 11.7 位运算符

位运算符包括`&`,`|`,`~`,`^`,`<<`,`>>`,`>>>`

位运算是在JavaScript中为数不多的直接操作数字二进制位的运算,位运算会将数字转换为有符号的32位二进制数进行运算,运算完成后再转换为十进制数字返回结果

`&`表示按位与运算

`|`表示按位或运算

`~`表示按位非运算

`^`表示按位异或运算

`<<`表示左移运算

`>>`表示带符号右移运算

`>>>`表示无符号右移运算

*无符号右移运算返回的运算结果为无符号的32位二进制数转换为的十进制数*

更多关于位运算的知识,请参考[《JavaScript中的位运算》](https://www.rivalsa.cn/s/article/Frontend/bit_operation?utm=SlPlrabkuaDnrJTorrA=)

### <span style="color:yellowgreen;font-weight:600;">[ES6]</span>11.8 ...运算符

`...`运算符也称为扩展运算符、重置运算符、剩余运算符、rest运算符、rest参数等

只有具有`Symbol.iterator`接口的才能使用`...`运算符

将数组或其他数据结构的数据拆分为用逗号分隔的参数序列或作为函数的参数接收多于的实参，例如：

```javascript
let a = [1,2,'3',true];
console.log(...a);
let fn = function(a, b, ...c) {
    console.log(c);
}
fn(1,2,3,4,5,6); // [3,4,5,6]
```

`...`运算符后面也可以通过一个表达式来得到一个数组，例如：

```javascript
let x = 10;
console.log(...x > 5 ? [1, 2, 3] : ['a', 'b', 'c']); // ...运算符后面整个表达式的优先级高于...运算符的优先级
```

### 11.9 运算符的优先级

请参考[这份资料](https://developer.mozilla.org/zh-CN/docs/Web/JavaScript/Reference/Operators/Operator_Precedence)

## 12 判断与循环

### 12.1 if...else...

**用法1**

```javascript
if(值) {
    // 值转换为布尔值为true是执行此处代码
    ...
}
```

**用法2**

```javascript
if(值) {
    // 值转换为布尔值为true是执行此处代码
    ...
} else {
    // 值转换为布尔值为false是执行此处代码
    ...
}
```

**用法3**

```javascript
if(值1) {
    // 值1转换为布尔值为true时执行此处代码
    ...
} else if(值2) {
    // 值1转换为布尔值为false且值2转换为布尔值为true是执行此处代码
    ...
} ... {
    ...
} else if(值n) {
    // 值1转换为布尔值为false且值2转换为布尔值为false且...且值n转换为布尔值为true是执行此处代码
    ...
} else {
    // 上述所有表达式转换为布尔值都为false时执行此处代码
}
```

**用法3**中可以没有最后一个else部分

如果某个代码块中只有一条语句时,可以省略大括号

较简单的判断语句可以用逻辑运算符或三目运算符代替

### 12.2 switch

**基本语法**

```javascript
switch(值0) {
    case 值1:
        代码块1
    case 值2:
        代码块2
    ...
    	...
    case 值n:
        代码块n
    default:
        默认代码块
}
```

在执行switch时,首先会用值0和值1/值2/.../值n依次进行匹配,若某个值匹配成功后,则从此代码块开始依次执行后面的所有代码块(包括默认代码块),如果所有的值都不匹配,则执行默认代码块.

执行代码块时,如果遇到break,则直接跳出switch判断

switch的比较需要值与数据类型都完全相同

### 12.3 for

**语法**

```javascript
for(语句1;语句2;语句3) {
    // 循环体
    ...
}
```

循环语句按照如下顺序执行:

1. 执行语句1
2. 判断语句2的转换为的布尔值,如果为false则跳出循环,否则继续向下执行
3. 执行循环体
4. 执行语句3
5. 返回第2步继续执行

语句1,语句2和语句3均可以省略不写,但分号不可省略

### 12.4 while

**语法**

```javascript
while(值) {
    // 循环体
    ...
}
```

循环语句按照如下顺序执行:

1. 判断值转换为的布尔值,如果为false则跳出循环,否则继续向下执行;
2. 执行循环体
3. 返回第1步继续执行

**while循环即for循环的一种特殊写法，for循环只是把与循环有关的代码集中在了一个位置**

### 12.5 do ... while

**语法**

```javascript
do {
    // 循环体
    ...
} while(值);
```

循环语句按照如下顺序执行:

1. 执行循环体
2. 判断值转换为的布尔值,如果为false则跳出循环,否则继续向下执行;
3. 返回第1步继续执行

### 12.6 跳出循环

**break**

跳出循环,例如:

```javascript
for(let i = 0; i < 5; i++) {
    if(i === 3) break;
    console.log(i); // 控制台依次输出0 1 2
}
```

**continue**

跳出本次循环,立即开始下一次循环,例如:

```javascript
for(let i = 0; i < 5; i++) {
    if (i === 3) continue;
    console.log(i); // 控制台依次输出0 1 2 4
}
```

跳出循环时,只跳出`break`或`continue`所在的循环,想跳出外层循环请参考循环命名

### 12.7 循环命名

用于跳出指定的循环

```javascript
aaa:for(var i = 0; i < 5; i++) {
    console.log(`i:${i}`);
    for(var j = 0; j < 5; j++) {
        console.log(`j:${j}`);
        break aaa;
    }
}
```

### 12.8 循环添加异步事件中的循环变量

例如如下代码

```html
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>循环添加异步事件中的循环变量</title>
</head>
<body>
    <button>按钮0</button>
    <button>按钮1</button>
    <button>按钮2</button>
    <button>按钮3</button>
    <button>按钮4</button>
    <script>
    	var aBtn = document.getElementsByTagName('button');
        for(var i = 0; i < aBtn.length; i++) {
            aBtn[i].onclick = function() {
                alert(i);
            };
        }
    </script>
</body>
</html>
```

执行上述代码时，会发现点击任意一个按钮，都会弹框5，而不是点那个按钮就弹对应的序号，这种现象的原因是给按钮添加的点击事件属于异步代码，在添加点击事件时，其中的代码不会执行，等到点击按钮执行代码时，循环变量i早已循环到5了，所以点击每个按钮都会弹窗5。

解决此问题有两种方案：利用自定义属性和利用闭包，请参考[《循环添加异步事件中的循环变量》](https://www.rivalsa.cn/s/article/Frontend/variable_in_loop?utm=SlPlrabkuaDnrJTorrA=)

## 13.作用域与解析顺序

### 13.1 作用域及作用域链

**作用域**可以通俗的理解为起作用的范围,分为全局作用域与局部作用域,**在es5中,只有函数运行时会创建一个局部作用域,<span style="color:yellowgreen;font-weight:600;">[ES6]</span>在es6中执行代码块（通常有大括号包裹）时就会创建一个局部作用域**

在引用变量时,会首先在自己的作用域内查找这个变量,如果找不到就到父级作用域内查找,一直找到全局作用域,如果全局也找不到,则报错,这个本作用域到父作用域一直到全局作用域的链接称为**作用域链**

全局作用域中的变量保存在GO(全局对象)中,局部作用域中的变量保存在对应的AO(活跃对象)中，能产生局部作用域的代码在每次执行时，会产生全新的AO对象

```javascript
var a, b;
function fn() {
    var a = 10, c = 20;
    b = 30;
    console.log(a,b,c);
}
fn(); // 10 30 20
console.log(a,b); // undefined 30
console.log(c); // 报错:Uncaught ReferenceError: c is not defined
```

对于函数可以通过`[[Scopes]]`记录了其作用域(链)

当AO对象今后无法再用到时，这个作用域内的AO对象会被自动删除，将对应内存释放，称为**垃圾回收机制**

### 13.2 闭包

现有A、B和C三个作用域，B是A的子作用域，C是B的子作用域，在C作用域中用到了B作用域中的AO对象，当C作用域中的内容直接在A作用域中被访问时，由于没有执行B作用域中的内容所以没有重新创建B作用域对应的AO对象，所以C作用域中能用到B作用域内上次的值。将这种情况称为**闭包**，举例如下：

**未形成闭包的情况**

```javascript
function outer() {
    var a = 0;
    function inner() {
        console.log(a++);
    }
    inner();
}
outer(); // 0
outer(); // 0
outer(); // 0
```

上述例子中，有三个作用域，全局作用域，outer形成的局部作用域和inner形成的局部作用域，outer形成的作用域是全局作用域的子作用域，inner形成的作用域是outer形成的作用域的子作用域，inner形成的作用域中用到了outer形成的作用域中的变量a，但是inner形成的作用域无法在全局作用域中直接访问（也就是说无法在不执行outer的情况下直接执行inner），所以每次执行都会创建新的a。

**形成了闭包的情况**

```javascript
var fn;
function outer() {
    var a = 0;
    function inner() {
        console.log(a++);
    }
    fn = inner;
}
outer();
fn(); // 0
fn(); // 1
fn(); // 2
```

上述例子中，有三个作用域，全局作用域，outer形成的局部作用域和inner形成的局部作用域，outer的是全局作用域的子作用域，inner的是outer的子作用域，inner的作用域中用到了outer的作用域中的变量a，且inner形成的作用域可以在全局作用域中直接访问（通过执行fn相当于在不执行outer的情况下直接执行inner），在直接执行时由于outer中的代码没有执行，所以没在outter作用域内创建全新的变量a，所以inner中就可以直接使用outer中原有的a

### 13.3 变量提升与解析顺序

在es5中,即使把定义变量的语句写在后面,也会先进行变量的定义(但不会赋值),把这个现象称为**变量提升**,例如:

```javascript
alert(b); // 弹窗：undefined
var b = 10;
alert（b); //  弹窗：10
alert(a); // 报错:Uncaught ReferenceError: a is not defined
```

**解析顺序**

1.定义(预解析)

- 执行`var`定义的变量(但不赋值)
- 如果在函数内，则自动创建形参并将实参赋值给形参
- 执行`function`定义的函数

2.执行 - 从上到下执行剩余代码

### 13.4 作用域与解析顺序的举例

**例0**

```javascript
if(false) {
    var a = 10;
    let b = 20;
}
alert(a);
alert(b);
```

**执行结果**

> 弹窗：undefined
>
> 报错：Uncaught ReferenceError: b is not defined

**例1**

```javascript
if(true) {
    var a = 10;
    let b = 20
}
alert(a);
alert(b);
```

**执行结果**

> 弹窗:10
>
> 报错:Uncaught ReferenceError: b is not defined

**例2**

```javascript
var x = 5;
a();
function a() {
    alert(x);
    var x = 10;
}
alert(x);
```

**执行结果**

> 弹窗:undefined
>
> 弹窗:5

**例3**

```javascript
var x = 5;
a();
function a() {
    alert(x);
    x = 10;
}
alert(x);
```

**执行结果**

> 弹窗:5
>
> 弹窗:10

**例4**

```javascript
a();
function a() {
    alert(x);
    var x = 10
}
alert(x);
```

**执行结果**

> 弹窗:undefined
>
> 报错:Uncaught ReferenceError: x is not defined

**例5**

```javascript
function a() {
    alert(1);
}
var a;
alert(a);
```

**执行结果**

> 弹窗:(函数体)

**例6**

```javascript
alert(a);
var a = 10;
alert(a);
function a() {alert(20)}
alert(a);
var a = 30;
function a() {alert(40)}
alert(a);
```

**执行结果**

> 弹窗:(alert(40)的函数体)
>
> 弹窗:10
>
> 弹窗:10
>
> 弹窗:30

**例7**

```javascript
var a = 10;
alert(a);
a();
alert(a);
function a() {
    alert(20);
}
```

**执行结果**

> 弹窗:10
>
> 报错: Uncaught TypeError: a is not a function

**例8**

```javascript
a();
var a = function() {alert(1);};
a();
function a() {alert(2);}
a();
var a = function() {alert(3);};
a();
```

**执行结果**

> 弹窗:2
>
> 弹窗:1
>
>  弹窗:1
>
> 弹窗:3

**例9**

```javascript
var a = 10;
function fn() {
    alert(a);
    var a = 1;
    alert(a);
}
fn();
alert(a);
```

**执行结果**

> 弹窗:undefined
>
> 弹窗:1
>
>  弹窗:10

**例10**

```javascript
fn();
alert(a);
var a = 10;
alert(a);
function fn() {
    var a = 1;
}
```

**执行结果**

> 弹窗:undefined
>
> 弹窗:10

**例11**

```javascript
fn();
alert(a);
var a = 10;
alert(a);
function fn() {
    a = 1;
}
```

**执行结果**

> 弹窗:1
>
> 弹窗:10

**例12**

```javascript
fn()();
var a = 0;
function fn() {
    alert(a);
    var a = 3;
    function c() {
        alert(a);
    }
    return c;
}
```

**执行结果**

> 弹窗:undefined
>
> 弹窗:3

**例13**

```javascript
var a = 5;
function fn() {
    var a = 10;
    alert(a);
    function b() {
        alert(++a);
    }
    return b;
}
var c = fn();
c();
fn()();
c();
```

**执行结果**

> 弹窗:10
>
> 弹窗:11
>
> 弹窗:10
>
> 弹窗:11
>
> 弹窗:12

## 14.定时器

`window.setInterval(a,b,c,d,e,...)`设置重复定时器,参数a为一个函数（或JS语句字符串，不建议）,当定时器时间到后执行函数或字符串中的语句,参数b为定时时间,c,d,e,...为给a函数传的实参，返回定时器的编号。（除了第一个参数外，均是可选的）

`window.setTimeout(a,b,c,d,e,...)`设置单次定时器,参数a为一个函数（或JS语句字符串，不建议）,当定时器时间到后执行函数或字符串中的语句,参数b为定时时间,c,d,e,...为给a函数传的实参,返回定时器的编号。（除了第一个参数外，均是可选的）

```javascript
setTimeout((...arr) => {
    console.log(arr);
}, 1000, null, 2, 'a', true, [1,2,3,false], {pet: 'cat', name: 'Tom'});
```

`window.clearInterval(a)`取消编号为a的重复定时器

`window.clearTimeout(a)`取消编号为a的单次定时器

*实际上，`clearInterval`也可以取消`setTimeout`定时器，`clearTimeout`也可以取消setInterval定时器*

`window.requestAnimationFrame(a)`按照刷新率执行函数a,相当于一个重复定时器,时间定为刷新率

`window.cancelAnimationFrame(a)`取消编号为a的`requestAnimationFrame`定时器

## 15.面向对象

### 15.1 构造函数

构造函数的本质就是一个函数（箭头函数不能作为构造函数）。但构造函数通常不是直接调用，而是通过`new`关键词来调用，直接调用与通过`new`调用的区别如下：

- 使用`new`执行函数时会自动创建一个对象，函数中的`this`指向这个对象，函数执行结束后自动返回这个对象。
- 构造函数的函数体中存在`return`语句且用`new`来执行函数时，如果`return`的是基础数据类型则会终止函数执行并返回函数自动创建的对象，如果`return`的是复杂数据类型则会终止函数执行并返回`return`后面的对象。

对于基础数据类型，本身是没有属性的，但字符串、数字等具有一个自带的构造函数（如String，Number），当通过`.`或`[]`来读取或运行属性时，系统会自动通过自带的构造函数创建一个对象，再执行或读取对象的属性。我们把这个自带的构造函数称为**包装类**。举例如下：

```javascript
let str = '我是字符串';
console.log(str.length);
// 第二行代码相当于如下代码
console.log(new String(str).length);
```

### 15.2 原型与原型链

一般来说，绝大多数对象都有一个名为`__proto__`的属性，其值为对象类型，此对象称为原对象的**原型**

在函数中，默认存在一个`prototype`属性，其值为对象类型。此函数通过`new`操作符创建的对象的`__proto__`属性值默认与其构造函数的`prototype`属性值指向同一个对象。

绝大多数对象都有自己的原型，原型的属性值是一个对象，则此对象的原型还有自己的原型...我们将此称为**原型链**，通常原型链的终点通常为Object

一个对象在调用属性时会首先找它本身的属性,如果找到,则使用这个属性值,如果找不到,则会在它的原型中查找,如果找到,则使用这个属性值,如果找不到,则在其原型的原型中查找...

例1

```javascript
let Cat = function(){};
Cat.prototype.aa = 0;
let tom = new Cat();
console.log(tom.aa); // 0
console.log(tom.__proto__ === Cat.prototype); // true
```

例2

```javascript
function O(){
    this.name = "rivalsa";
    this.sex = "M";
}
O.prototype.tt = "123";
var obj = new O;
console.log(obj);
```

构造函数的`prototype`中会默认有一个`construotor`，函数值为构造函数

**构造函数私有属性及其原型（链）的继承**

现存在一个构造函数,我们创造一个新的构造函数,新的构造函数可以调用原构造函数的所有的属性及原型,则称新的构造函数是由原构造函数**继承**而来的

**私有属性的继承**

JavaScript中没有继承构造函数的方法,但我们可以通过一些方式来模拟出这个过程

> 私有属性的继承方法如下:
>
> ```javascript
>function Person(n, a) {
>  this.name = n;
>  this age = a;
>    }
>    function Teacher(n, a, id) {
>  Person.call(this,n,a); // 继承的私有属性
>  this.id = id; // 新增的私有属性
>    }
>    ```

**原型链的继承**

JavaScript中没有继承构造函数的方法,但我们可以通过一些方式来模拟出这个过程

> 原型链的继承方法如下:
>
> ```javascript
> function Person(n,a){
>  this.name = n;
>  this.age = a;
> }
> Person.prototype.showName = function(){
>  console.log(this.name);
> }
> Person.prototype.showAge = function(){
>  console.log(this.age);
> }
> function Teacher(n,a,id){
>  Person.call(this,n,a); // 继承的私有属性
>  this.id = id; // 新增的私有属性
> }
> function _Person(){} // 新定义的构造函数，和原函数的原型相同，没有多余的私有属性，防止创建无用属性
> _Person.prototype = Person.prototype; // 设置相同的原型函数
> Teacher.prototype = new _Person; // 继承原型（实际是将_Person实例化一个对象作为Teacher的原型）
> Teacher.prototype.constructor = Teacher; // 补充constructor属性
> Teacher.prototype.showId = function(){ // 新增的原型
> 	console.log(this.id);
> }
> ```
>

**instanceof**

可以利用`instanceof`来判断一个对象的原型链上是否存在指定的构造函数,如果存在则返回true,否则返回false

用法:`object instanceof function`

### 15.3 <span style="color:yellowgreen;font-weight:600;">[ES6]</span>类及其继承

在ES5中没有类的概念，用构造函数代替，在ES6中可以用class定义一个类，定义的类只能用new执行，不能自执行，继承可以直接使用extends，大大简化了原型及原型链的复杂逻辑.举例如下：

```javascript
class Person {
    constructor(n,a) { // constructor函数会在实例化时自动执行
        // 定义私有属性
        this.name=n;
        this.age=a;
    }
    // 定义原型中的属性
    showName() {
        console.log(this.name);
    }
    showAge() {
        console.log(this.age);
    }
}
class Teacher extends Person { // Teacher继承自Person
    constructor(n,a,i) {
        super(n,a); // 继承所有私有属性（如果没有constructor会默认创建带有super的constructor，如果有constructor则必须执行super）
        this.id=i; // 新增的私有属性
    }
    showName() { // 修改原有的原型中的方法
        super.showName(); // 执行原有的原型方法
        console.log("123"); // 原型方法中新增的语句
    }
    showId() { // 新增的原型方法
        console.log(this.id);
    }
}
let r=new Teacher("Rivalsa",16,1112);
console.log(r);
r.showName();
```

定义一个类除了利用`class 类名()`外也可以通过定义的方式来创建，例如`let 类名 = class{}`

当没有constructor时，会默认创建一个空constructor

原型链中的属性名可以是变量，用`[变量]`表示

类的定义不会被提升（必须先定义再使用）

在方法前加`static`可以使此方法创建为私有方法（构造函数的属性，而不是在原型上）

## 16. <span style="color:yellowgreen;font-weight:600;">[ES6]</span>回调地狱及其解决方案

如果代码中有多处异步代码(异步中还有异步),例如:

```javascript
setTimeout(() => {
    setTimeout(() => {
        setTimeout(() => {
            console.log(4);
        },100);
        console.log(3)
    },100);
    console.log(2);
},100);
console.log(1);
```

可以看到,上述代码有横向发展的趋势,看起来不好看,也不利于代码维护.通常把这种情况称为**回调地狱**

###  16.1 Promise

`window.Promise`是一个构造函数，需要通过`new`来创建一个promise对象，创建对象时，需要传递一个函数参数fn1(resolve, reject)，当创建这个对象时，系统会执行函数fn1，执行时形参resolve和reject所对应的实参为函数fn2和函数fn3，我们只要把想进行的异步操作放在fn1中执行，根据执行的结果在函数fn1中手动执行函数fn2（即执行resolve）或执行函数fn3（即执行reject）即可。当函数f2函数（即resolve）被执行时，promise对象由pending状态转换为resolve状态，当函数f3（即reject）被执行时，promise对象由pending状态转换为reject状态。

```javascript
let promise - new Promise((res, rej) => {
    ... // 执行异步代码（可能成功可能失败）,创建promise对象时系统会自动执行
    if(...) res(实参); else rej(实参); // 根据执行结果是否成功，分别执行不同的函数
});
```

通常，我们需要在根据执行成功与否的情况来做出一些操作，所以系统允许我们自定义两个函数fn4与fn5，函数f4会在promise对象转换为resolve状态时自动调用，函数f5会在promise对象转换为reject状态时自动调用，函数f4与函数f5的定义方法如下：

- `window.Promise.prototype.then(fn4, fn5)`promise对象有then属性(方法)，可以通过调用此方法传递f4与f5两个函数
- `window.Promise.prototype.then(fn4)`和`window.Promise.prototype.catch(fn5)`，promise对象有then和catch属性（方法），可以通过调用这两个方法分别传递f4与f5两个函数

```javascript
// 接续上一段代码，方案一
promise.then((形参) => { // 此处的形参为执行resolve函数（即fn2)时传递的实参
    ... // 成功时执行的代码
}, (形参) => { // 此处的形参为执行reject函数（即fn3)时传递的实参
    ... // 失败时执行的代码
});

// 接续上一段代码，方案二
promise.then((形参) => { // 此处的形参为执行resolve函数（即fn2)时传递的实参
    ... // 成功时执行的代码
});
promise.catch((形参) => { // 此处的形参为执行reject函数（即fn3)时传递的实参
    ... // 失败时执行的代码
});
```

**Promise的更多属性**

`window.Promise.resolve(x)`返回一个promise对象（若x为promise对象，则返回x，若x非promise对象，则返回一个新的状态为resolve内容为x的promise对象），等价于如下内容：

```javascript
new Promise(resolve => resolve(x));
```

`window.Promise.reject(x)`返回状态为reject内容为x的Promise对象，等价于如下内容：

```javascript
new Promise((resolve, reject) => reject(x));
```

`window.Promise.all(x)`参数x为由多个promise对象组成的数组，返回的promise对象当x中的所有promise对象都转换为resolve状态时才会转换为resolve状态。

**利用Promise解决回调地狱问题**

promise对象中的fn4函数的返回值会被then函数再次返回，所以可以通过在fn4中返回另一个promise对象来解决回调地狱问题

```javascript
// 例子中所有的res()要放在异步代码内部
let p1 = new Promise(res => {
    ... // 异步代码
    res();
});
let p2 = p1.then(() => {
    return new Promise(res => {
        ... // 异步代码
        res();
    });
});
let p3 = p2.then(() => {
    return new Promise(res => {
        ... // 异步代码
        res();
    });
});
p3.then(() => {
    ... // 异步代码
});
```

**Promise的链式操作**

由于promise对象的then方法返回的还是promise对象，所以以上代码可以通过如下的方式进行链式操作：

```javascript
// 例子中所有的res()要放在异步代码内部
new Promise(res => {
    ... // 异步代码
    res();
}).then(() => {
    return new Promise(res => {
        ... // 异步代码
        res();
    });
}).then(() => {
    return new Promise(res => {
        ... // 异步代码
        res();
    });
}).then(() => {
    ... // 异步代码
});
```

利用Promise可以解决本章第一个代码额回调地狱问题,代码如下:

```javascript
console.log(1);
new Promise(resolve => {
    setTimeout(() => {
        console.log(2);
        resolve();
    },100);
}).then(() => {
    return new Promise(resolve => {
        setTimeout(() => {
            console.log(3);
            resolve();
        },100);
	});
}).then(() => {
    setTimeout(() => {
        console.log(4);
    },100);
});
```

### 16.2 generator

定义一个generator基本语法如下

```javascript
function * 函数名() {
    yield 值或表达式1；
    yield 值或表达式2;
    yield 值或表达式3;
}
```

执行函数后，会生成一个generator对象，此对象的原型链中有next函数，当执行这个函数时，会取得包含值或表达式1的对象，当再次执行时会取得包含值或表达式2的对象，...举例如下：

```javascript
function * gen() {
    yield 1;
    yield 2;
    yield 3;
}
let g = gen();
console.log(g); // gen {<suspended>}
console.log(g.next()); // {value: 1, done: false}
console.log(g.next()); // {value: 2, done: false}
console.log(g.next()); // {value: 3, done: false}
console.log(g.next()); // {value: undefined, done: true}
```

我们可以将generator与Promise结合来解决回调地狱的问题

```javascript
function * gen() {
    yield new Promise(res => {
        ... // 异步代码1
        res();
    });
    yield new Promise(res => {
        ... // 异步代码2
        res();
    });
    yield new Promise(res => {
        ... // 异步代码3
        res();
    });
}
let g = gen();
g.next().value.then(() => {
    ...
    return g.next().value;
}).then(() => {
    ...
    return g.next().value;
}).then(() => {
    ...
});
```

利用generator与Promise结合可以解决本章第一个代码额回调地狱问题,代码如下:

```javascript
console.log(1);
function * gen() {
    yield new Promise(resolve => {
        setTimeout(() => {
            console.log(2);
            resolve();
        },100);
    })
    yield new Promise(resolve => {
        setTimeout(() => {
            console.log(3);
            resolve();
        },100);
	});
    yield setTimeout(() => {
        console.log(4);
    },100);
}
let g = gen();
g.next().value.then(() => {
    return g.next().value;
}).then(() => {
    g.next();
});
```

### 16.3 async

在ES2017中引入了async函数，让异步的操作更加方便，async函数时generator函数的语法糖

async通常配合promise使用：

```javascript
async function fn() {
    await new Promise(res => {
        ... // 异步代码1
        res();
    });
    await new Promise(res => {
        ... // 异步代码2
        res();
    });
    await new Promise(res => {
        ... // 异步代码3
        res();
    });
}
fn();
```

执行await异步时，函数内部后面的内容会等待，一直到promise返回成功，再继续执行。

await语句的返回值，就是内部promise对象执行resolve时所传的参数，如果需要用到此参数则定义变量接收即可。

利用async可以解决本章第一个代码额回调地狱问题,代码如下:

```javascript
console.log(1);
(async function() {
    await new Promise(resolve => {
        setTimeout(() => {
            console.log(2);
            resolve();
        },100);
    })
    await new Promise(resolve => {
        setTimeout(() => {
            console.log(3);
            resolve();
        },100);
	});
    setTimeout(() => {
        console.log(4);
    },100);
})();
```

## 17.正则表达式

可以用来高效便捷的处理字符串

### 17.1 定义正则表达式

**双斜杠定义**

例如:`let reg = /abc/;`

**利用`RegExp`定义**

例如`let reg = new RegExp(x);`x可以为一个字符串变量,也可以直接传入字符串(字符串的内容为正则表达式)

### 17.2 正则表达规则

#### 17.2.1 转义字符

转移字符为`\`可以将有特殊意义的字符变为普通字符，也可以将个别普通字符转变为有特殊意义的符号

`\n`匹配换行符

`\t`匹配制表符(tab)

`\r`

`\d`匹配所有数字字符(1位)

`\D`匹配除了数字字符外的所有字符

`\s`匹配如下字符:

- `(空格字符)`
- `\t`
- `\n`
- `\r`

`\S`匹配除了下面字符外的所有字符

- `(空格字符)`
- `\t`
- `\n`
- `\r`

`\w`匹配如下字符:

- 数字
- 字母
- 下划线

`\W`匹配除了下面字符外的所有字符

- 数字
- 字母
- 下划线

`\b`匹配如下内容:

- 起始位置
- 结束位置
- `\W`能匹配的所有字符

`\B`匹配除了下面内容外的所有内容

- 起始位置
- 结束位置
- `\W`能匹配的所有字符

#### 17.2.2 标识

写在正则表达式结尾/的后面,可以写多个,不区分先后顺序,在使用RegExp定义时,标识以字符串形式作为第二个参数传入

`g`全局,表示在整个字符串中匹配(而不是只匹配到第一个就结束)

`i`不区分大小写

`m`换行匹配

#### 17.2.3 量词

*写在对应规则后面*

`{n}`n个

`{n,m}`最少n个,最多m个,包括n和m

`{n,}`最少n个,包括n

`+`最少1个,等价于`{1,}`

`*`最少0个,等价于`{0,}`

`?`0个或1个,等价于`{0,1}`

**量词的贪婪和惰性**

贪婪（默认）：尽量按多的去匹配

惰性（在量词后面加`?`表示惰性量词）：尽量按少的去匹配

#### 17.2.4 子项

使用小括号可以将里面的内容作为一个子项，有一些字符串的方法会同时返回匹配的子项，有时也利用子项提高一部分表达式的优先级

在子项中以`?<键>`开头可以给匹配的子项组成此键组成的键值对，例如：

```javascript
const str = '2233-3344-5555-4423',
      reg = /(\d{4})-(\d{4})-(\d{4})-(\d{4})/,
      reg2 = /(?<aa>\d{4})-(?<bb>\d{4})-(?<cc>\d{4})-(?<dd>\d{4})/;
console.log(str.match(reg).groups); // undefined
console.log(str.match(reg2).groups); // {aa:"2233",bb:"3344",cc:"5555",dd:"4423"}
```

使用String.prototype.replace时，可以在被替换的值中利用$<键>来取得对应的子项的值，例如：

```javascript
const str = '2233-3344-5555-4423',
      reg = /(?<aa>\d{4})-(?<bb>\d{4})-(?<cc>\d{4})-(?<dd>\d{4})/;
console.log(str.replace(reg, '$<dd>-$<cc>-$<bb>-$<aa>')); // 4423-5555-3344-2233
```

#### 17.2.5 字符集

用中括号表示

- 表示"或者"

  - `[abc]`表示字符`a`或字符`b`或字符`c`
  - `[abc]{2}`表示`aa`或`ab`或`ac`或`ba`或`bb`或`bc`或`ca`或`cb`或`cc`

- 字符集中的`-`表示一个区间(按编码的区间)

  - `[0-5]`表示`0`到`5`之间的任意数字
  - [a-z]表示所有小写字母
  - [A-Z]表示所有大写字母
  - [0-<]表示所有数字或冒号或分号或小于号(编码中冒号和分号和小于号是9后面紧接着的三个)

  *在字符集之外`-`没有特殊意义*

- 如果字符集中第1个字符是`^`整个子项表示排除，例如:`[^abc]`表示除了字符a和字符b和字符c外的任意字符

- 字符集中小括号/大括号/中括号的前半部分/正斜杠/问号/星号/加号/竖线/点/美元符号无特殊含义

#### 17.2.6 其他有特殊意义的字符

这些字符在字符集中都没有特殊含义（除了^）

- `^`表示起始位置
- `$`表示结束位置
- `.`表示匹配除了以下内容的任意字符
  - `\n`
  - `\r`
- `|`表示或者(前后是两个独立的正则)

#### 17.2.7 捕获组

`\数字x`表示第x个子项,再次匹配第x个子项

*并不是第x个子项的匹配规则,而是第x个子项的内容*

#### 17.2.8 断言

`(?=xx)`(不算做子项)某字符后面要含有xx字符,但匹配到的东西不包含xx

`(?!xx)`(不算做子项)某字符后面要不含有xx字符,但匹配到的东西不包含xx

`(?<=xx)`(不算做子项)某字符前面要含有xx字符,但匹配到的东西不包含xx

`(?<!xx)`(不算做子项)某字符前面要不含有xx字符,但匹配到的东西不包含xx

### 17.3 使用正则表达式的方法

**正则表达式的方法**

`window.RegExp.prototype.test(字符串)`检查字符串中是否存在对应正则规则,存在则返回`true`否则返回`false`

`window.RegExp.prototype.exec(字符串)`返回第一次出现对应规则的字符串有关的对象，若未匹配成功则返回null，不执行全局查找

`window.RegExp.prototype[Symbol.match](字符串)`当不全局匹配时类似`RegExp.prototype.exrc`，全局匹配时，返回由匹配成功的内容组成的数组

`window.RegExp.prototype[Symbol.matchAll](字符串)`返回一个对象，此对象的原型链上有一个next方法，当第一次执行next方法时，返回包含第一个匹配到的内容的对象，第二次执行next方法时，返回包含第二个匹配到的内容的对象，...

**字符串的方法**

- window.String.prototype.search
- window.String.prototype.replace
- window.String.prototype.split
- window.String.prototype.match

### 17.4 RegExp对象

RegExp中存储了上一次的子项,可以通过这个对象直接拿到数据.(可以先test然后通过RegExp得到子项)

## 18.ajax

> ajax即“Asynchronous Javascript And XML”（异步 JavaScript 和 XML）,可以在不刷新页面的前提下向后端发送请求

### 18.1 JavaScript原生ajax

```javascript
let xhr;
if (window.XMLHttpRequest) {　 // 标准浏览器
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // 低版本IE（比较复杂，写的可能不完整）
    try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
    } catch () {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
    }
}
if (xhr) {
    xhr.onreadystatechange = onReadyStateChange; // 状态发生变化时会调用此函数
    xhr.open('POST', '/url', true);
    // 设置 Content-Type 为 application/x-www-form-urlencoded
    // 以表单的形式传递数据
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('username=admin&password=root');
}

// onreadystatechange 方法
function onReadyStateChange() {
    /*
    xhr.readyState：
        0: 请求未初始化
        1: 服务器连接已建立
        2: 请求已接收
        3: 请求处理中
        4: 请求已完成，且响应已就绪
     */
    if (xhr.readyState === 4) {
        // 请求处理到了最后一步
        //xhr.status HTTP状态码
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText); // xhr.responseText请求返回的文本内容
        } else {
            console.log('There was a problem with the request.');
        }
    } else {
        // 请求还没处理到最后一步
        console.log('still not ready...', xhr.readyState);
    }
}
```

### 18.2 封装的ajax方法

常用的封装的ajax方法有很多，比如jQuery中就有`$.ajax`，但本文中介绍的是封装的axios方法。

**发送单个请求**

```javascript
axios({
	method: "post",
    url: "http://example.com",
    headers: {},
    params: {},
    data: {name:"Rivalsa",age:18},
    withCredentials: false
}).then(res => {
    console.log(res);
}).catch(err => {
    console.log(err);
});
```

也可以通过`window.axios.get`与`window.axios.post`直接发送get或post请求

**发送多个请求**

同时发送两个请求,全都处理完成后才执行回调

```javascript
function reqA(){
    return axios.get("url1");
}
function reqB(){
    return axios.get("url2");
}
axios.all([ reqA(),reqB() ]).then(res => {
    console.log(res);
});
```

### 18.3 跨域及jsonp

**跨域问题**

发送ajax请求时需要确保当前页面与请求页面同源(必须协议\\主机\\端口号全都相同),否则需要后端按照CORS策略发送相应的HTTP Header

**jsonp**

由于HTML页面中调用JavaScript是没有同源限制的,所以可以利用此方法发送数据,举例如下:

假设:请求地址为https://example.com返回数据为`rivalsa({"name":"rivalsa","age":18});`

则前端请求为:

```html
<script>
    let rivalsa = m => {
        console.log(m);
    };
</script>
<script src="https://example.com"></script>
```

## 19.DOM操作

> DOM（文档对象模型 document object model）是针对HTML文档的一个API.
> DOM 描绘了一个层次化的节点树，允许开发人员添加、移除和修改页面元素(元素的文字也是DOM的一个节点)

DOM节点共有12种，可以通过`Node.prototype.nodeType`判断DOM节点的类型

- 元素节点(nodeType为1)
- 文本节点(nodeType为3,nodeValue为文本的内容)
- 属性节点(nodeType为2,nodeValue为属性的值)
- 注释节点(nodeType为8,nodeValue为注释的内容)
- (其他8种)

`window.Node.prototype.nodeValue`是可读可写的

`window.Node.prototype.nodeName`为节点的名称（以大写字母表示，只读）

`window.Element.prototype.attributes`为节点的属性

### 19.1 获取DOM对象基础方式

**通过ID获取**

```javascript
window.document.getElementById('ID'); // 返回对应的DOM元素
```

**通过class获取**(不兼容IE8及其以下)

```javascript
// 返回类数组HTMLCollection
window.Element.protorype.getElementsByClassName('className'); 
window.document.getElementsByClassName('className');
```

**通过标签名获取**

```javascript
// 返回类数组HTMLCollection
window.Element.prototype.getElementsByTagName('tagName'); 
window.document.getElementsByTagName('tagName');
```

**通过name获取**

```javascript
window.document.getElementsByName('name'); // 返回类数组NodeList
```

*在低版本的IE浏览器中，此方法会获取ID为对应字符串的元素*

**通过选择器获取**(静态方法，不兼容IE7及其以下)

```javascript
// 返回对应的DOM元素(第一个)
window.Element.prototype.querySelector('选择器'); 
window.document.querySelector('选择器');
// 返回类数组NodeList, element的后代元素
window.Element.prototype.querySelectorAll('选择器');
window.document.querySelectorAll('选择器');
```

**几个特殊元素的获取方式**

获取html:`window.document.documentElement`

获取title:`window.document.title`

获取body:`window.document.body`

获取head:`window.document.head`

### 19.2 操作DOM的属性及内容

**操作标签原有属性**

DOM元素的各种属性都在DOM对象中,所以可以直接修改DOM对象的属性即可,举例如下:

```javascript
var oBox = document.getElementById("box");
oBox.href = "#";
oBox.className = "box1";
oBox.style.display = "none" ;
```

特殊情况

- 修改DOM元素的class属性,可以使用`window.Element.prototype.className`或`window.Element.prototype.classList`来操作
- DOM对象的style属性也是一个对象,此对象的各种属性就是对应元素行内的CSS样式

对特殊情况的举例

例1

```html
<html>
<head>
	<style>
        #wrap {
            width: 300px;
            height: 300px;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div id="wrap"></div>
    <script>
    	let oWrap = document.getElementById('wrap');
        oWrap.style.backgroundColor = 'red';
        // 上一行代码也可以写成如下形式
        // oWrap.style['backgroucd-color'] = 'red';
    </script>
</body>
</html>
```

在例1中,通过的读写`oWrap.style`只能拿到或写入行内样式的值,如果样式写在`style`标签中,是无法通过`oWrap.style`取得值的.

例2

```html
<html>
<head>
	<style>
        #wrap {
            width: 300px;
            height: 300px;
            background-color: blue;
        }
    </style>
</head>
<body>
    <div id="wrap"></div>
    <script>
    	let oWrap = document.getElementById('wrap');
        oWrap.style.cssText = 'background-color:red; width:100px';
    </script>
</body>
</html>
```

在例2中,通过`oWrap.style.cssText`可以一次读取或修改多个行内样式.

例3

```html
<html>
<head>
	<style>
        .wrap {
            width: 300px;
            height: 300px;
            background-color: blue;
        }
        .wrap.app {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="wrap"></div>
    <script>
    	let oWrap = document.getElementsByClassName('wrap')[0];
        oWrap.className = 'wrap app';
    </script>
</body>
</html>
```

通过修改`window.Element.prototype.className`可以直接修改标签对应的类名,通过修改类名可以修改对应样式

例4

```html
<html>
<head>
	<style>
        .wrap {
            width: 300px;
            height: 300px;
            background-color: blue;
        }
        .wrap.app {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="wrap"></div>
    <script>
    	let oWrap = document.getElementsByClassName('wrap')[0];
        oWrap.addEventListener('click',function() {
            this.classList.add('app');
        });
    </script>
</body>
</html>
```

通过`window.Element.protorype.classList`的各种API可以直接修改类名(*不支持IE9及其以下*)，此函数返回`DOMTokenList`对象，`classList`包括以下API：

- `window.DOMTokenList.prototype.add(类名)`添加类名
- `window.DOMTokenList.prototype.remove(类名)`移除类名
- `window.DOMTokenList.prototype.toggle(类名)`添加或删除类名(有则删除,无则添加),删除了类名会返回false,添加了类名会返回true
- `window.DOMTokenList.prototype.contains(类名)`判断是否存在类名,存在则返回true,不存在则返回false

获取标签当前样式

`window.getComputedStyle(x，y)`省略y时返回对象x的计算样式表，y取`'after'`或`'before'`时返回x的对应伪元素的计算样式表,只读属性（IE8及其以下不支持，用`element.currentStyle`代替，IE8以上不支持第2个参数）（动态的）例如:

**HTML**

```html
<div id="wrap"></div>
```

**CSS**

```css
#wrap{
    width:100px;
    height:100px;
    background-color:red;
}
```

**JavaScript**

```javascript
var oWrap=document.getElementById("wrap"),
    wrapCss=window.getComputedStyle(oWrap);
console.log(wrapCss.width);
console.log(wrapCss.height);
console.log(wrapCss.backgroundColor);
```

**操作标签`data-`自定义属性**

`window.HTMLElement.prototype.dataset`也是一个对象，可以直接读取或修改“data-”开头的属性

**操作标签的属性(原有的和自定义的都可以)**

获取属性:`window.HTMLElement.prototype.getAttribute('属性名');`

新增或修改属性:`window.HTMLElement.prototype.setAttribute('属性名','属性值');`

移除属性:`window.HTMLElement.prototype.removeAttribute('属性名');`

```javascript
var oBox = document.getElementById("box");
oBox.getAttribute("data-title"); // 获取
oBox.setAttribute("data-name","mydata"); // 修改、添加
oBox.removeAttribute("data-name"); // 删除
```

**innerHTML/innerText**

改变元素的内容

```js
var oBox = document.getElementById("box");
oBox.innerHTML = "ABC";
oBox.innerText = "123";
```

innerHTML 与 innerText 的区别：

- `window.HTMLElement.prototype.innerHTML`会解析其中的html标签
- `window.HTMLElement.prototype.innerText`不会解析html标签，原样替换所设置的内容

*低版本火狐浏览器不支持`innerText`,用`textContent`代替*

### 19.3 更多DOM操作

`window.Node.prototype.childNodes`获取元素的所有子节点(主流浏览器是获取所有子节点,低版本IE浏览器是获取所有子元素节点)

`window.Element.prototype.children`获取元素的所有子元素节点

`window.Node.prototype.parentNode`获取元素父节点

`window.Node.prototype.parentElement`获取元素父元素节点

*通常元素的父节点与元素的父元素节点是相同的，因为通常只有元素节点才会有子节点*

`window.HTMLElement.prototype.offsetParent`【兼容性差】

- 对于主流浏览器：获取元素最近的有定位属性的父节点，找不到则为body
- 对于IE7及其以下：

> 如果本身没有定位属性：获取最近的有设置宽度或高度的元素，找不到则为body
>
> 如果本身没有定位属性：与主流浏览器相同

`window.document.createElement(x)`创建X元素节点

`window.document.createTextNode("xx")`创建内容为xx的文本节点

`window.document.creatComment('xx')`创建内容为xx的注释节点

`window.document.createDocumentfragment()`创建文档片段

`window.Node.prototype.appendChild(x)`在子节点的末尾添加节点x

`window.Node.prototype.insertBefore(a,b)`在子节点中节点b之前新增节点a

`window.Node.prototype.replaceChild(a,b)`在子节点中用a节点替换b节点，返回b节点

`window.Element.prototype.remove()`删除本节点

`window.Node.prototype.removeChild(x)`在子节点中删除节点x，返回被删除的节点

`window.Node.prototype.hasChildNodes()`有子节点则返回true，否则返回false

`window.Element.prototype.firstElementChild`获取第一个子元素节点(不支持IE9及其以下)

`window.Node.prototype.firstChild`

- 主流浏览器:获取第一个子节点
- IE9及其以下:获取第一个子元素节点

`window.Element.prototype.lastElementChild`获取最后一个子元素节点(不支持IE9及其以下)

`window.Node.prototype.lastChild`

- 主流浏览器:获取最后一个子节点
- IE9及其以下:获取最后一个子元素节点

`window.Element.prototype.nextElementSibling`获取下一个兄弟元素节点(不支持IE9及其以下)

`window.Node.prototype.nextSibling`

- 主流浏览器:获取下一个兄弟节点
- IE9及其以下:获取下一个兄弟元素节点

`window.Element.prototype.previousElementSibling`获取上一个兄弟元素节点(不支持IE9及其以下)

`window.Node.prototype.previousSibling`

- 主流浏览器:获取上一个兄弟节点
- IE9及其以下:获取上一个兄弟元素节点

## 20. DOM事件

### 20.1 0级事件

*采用赋值的方式绑定函数,新事件替代旧事件*

```javascript
element.event = fun;
```

如需要移除事件，将其赋值为`null`即可

**鼠标事件**

`window.HTMLElement.prototype.oncontextmenu`鼠标右键点击事件

`window.HTMLElement.prototype.onselectstart`选中开始事件

`window.HTMLElement.prototype.ondblclick`鼠标双击事件

`window.HTMLElement.prototype.onclick`鼠标单击事件

`window.HTMLElement.prototype.onmousedown`鼠标任意键按下

`window.HTMLElement.prototype.onmousemove`鼠标移动

`window.HTMLElement.prototype.onmouseup`鼠标任意键抬起

`window.HTMLElement.prototype.ommouseenter`鼠标移入(不冒泡)

`window.HTMLElement.prototype.onmouseleave`鼠标移出(不冒泡)

`window.HTMLElement.prototype.onmouseover`鼠标移入(冒泡)

`window.HTMLElement.prototype.onmouseout`鼠标移出(冒泡)

关于鼠标移入移出事件,冒泡与不冒泡的说明:

- 此处的冒泡:父级盒子设置有移入事件,则鼠标从父级盒子移入子级盒子时**也会**触发事件,从子级盒子移入父级盒子时**也会**触发事件;
- 此处的不冒泡:父级盒子设置有移入事件,则鼠标从父级盒子移入子级盒子时**不会**触发事件,从子级盒子移入父级盒子时**不会**触发事件;
- 无论是否冒泡,从父级盒子外部直接移入子级盒子内部(即使子级盒子显示的位置不在父级盒子显示的位置内部)**都会**触发事件

鼠标滚轮滚动事件

- `window.HTMLElement.prototype.mousewheel`鼠标滚轮事件（非火狐浏览器）
- `DOMMouseScroll`鼠标滚轮事件（火狐浏览器专用，仅支持通过添加事件监听器的方式绑定事件）

**键盘事件**

`window.HTMLElement.prototype.onkeydown`键盘按键按下事件

`window.HTMLElement.prototype.onkeypress`键盘能输入内容的按键(不含功能键)按下事件

`window.HTMLElement.prototype.onkeyup`键盘按键抬起事件

**表单事件**

`window.HTMLElement.prototype.onfocus`表单获得焦点事件(window和表单均码有此事件)

`window.HTMLElement.prototype.onblur`表单失去焦点事件(window和表单均码有此事件)

`window.HTMLElement.prototype.onchange`表单内容发生改变事件

- 对于`text`:在失去焦点之前触发(需要失去焦点时刻与获得焦点时刻**内容不同**才会触发)
- 对于`radio`:被选中的单选框触发
- 对于`checkbox`:被选中和被取消选中时均会触发
- 对于`select`:选择的内容发生改变时会被触发

`window.HTMLElement.prototype.oninput`input框输入或删除字符事件

`window.HTMLElement.prototype.onsubmit`表单提交事件

`window.HTMLElement.prototype.onreset`表单重置事件

`window.HTMLElement.prototype.onselect`文本框的文本内容被选中事件

**表单事件方法**

- `window.HTMLElement.prototype.focus()`获得焦点
- `window.HTMLElement.prototype.blur()`失去焦点
- `window.HTMLElement.prototype.submit()`提交表单
- `window.HTMLElement.prototype.reset()`重置表单

**滚动条事件**

`window.HTMLElement.prototype.onscroll`滚动条滚动事件

### 20.2 2级事件与3级事件

*新事件与旧事件共存,与0级事件不冲突*

`window.EventTarget.prototype.addEventListener(a,b,c)`添加事件监听器(低版本IE不支持,用`attachEvent(a,b)`代替（没有第3个参数）,且IE中事件函数的this指向window)

- a为事件字符串，不写on(使用`attachEvent`时需要写on)
- b为事件函数(参数为事件对象)
- c为布尔值，true表示事件绑定在捕获阶段，false表示事件绑定在冒泡阶段（**参考事件捕获与事件冒泡章节**）

`window.EventTarget.prototype.removeEventListener(a,b,c)`移除事件监听器(低版本IE不支持,用`detachEvent(a,b)`代替（没有第3个参数）)

*移除事件时的参数应与绑定事件时的参数相同（函数需要指针相同）*

**只能通过绑定事件监听器的方式添加的事件**

- `DOMMouseScroll`鼠标滚动事件（火狐浏览器专用）
- `touchstart`触屏事件，手指放在屏幕上
- `touchmove`触屏事件，手指在屏幕上滑动
- `touchend`触屏事件，手指离开屏幕
- `touchcancel`系统取消touch事件时触发

### 20.3 事件捕获与事件冒泡

当采用2级事件绑定事件函数时，第三个参数为true则事件绑定在捕获阶段。

当采用2级事件绑定事件函数时，第三个参数为false则事件绑定在冒泡阶段。

**事件源没有捕获阶段，即使第三个参数为true也是绑定在冒泡阶段的，有时会将事件源的冒泡阶段称为执行阶段**

**0级事件是绑定在事件冒泡阶段的**

当某个事件被触发后，会先进入此事件的捕获阶段，随后进入此事件的冒泡阶段。

**事件的捕获阶段**

当某元素的某个事件被触发后，首先会执行window或document（随浏览器的不同而不同）上此事件的捕获阶段的事件函数，随后执行...的捕获阶段的事件函数，随后执行此元素的父级的父级的父级的捕获阶段的事件函数，随后执行此元素的父级的父级的捕获阶段的事件函数，随后执行此元素的父级的捕获阶段的事件函数，随后进入冒泡阶段。

**如果同一个元素的同一个事件绑定了多个捕获阶段的事件，则后绑定的先执行**

**事件的冒泡阶段**

当某元素的某个事件被触发后，会先进入捕获阶段，随后执行此元素冒泡阶段的事件函数，随后执行此元素的父级的冒泡阶段的事件函数，随后执行此元素的父级的父级的冒泡阶段的事件函数，随后执行此元素的父级的父级的父级的冒泡阶段的事件函数，随后执行...的冒泡阶段的事件函数，随后执行window或document（随浏览器的不同而不同）上此事件的冒泡阶段的事件函数。

**如果同一个元素的同一个事件绑定了多个冒泡阶段的事件，则先绑定的先执行**

举例：

```html
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>事件捕获与事件冒泡</title>
    <style>
        #out {
            width: 300px;
            height: 300px;
            background-color: aqua;
        }
        #mid {
            width: 200px;
            height: 200px;
            background-color: pink;
        }
        #in {
            width: 100px;
            height: 100px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <div id="out">
        <div id="mid">
            <div id="in"></div>
        </div>
    </div>
    <script>
        'use strict'
        let oOut = document.getElementById('out'),
            oMid = document.getElementById('mid'),
            oIn = document.getElementById('in');
        oOut.onclick = () => {
            console.log('0级out');
        };
        oMid.onclick = () => {
            console.log('0级mid');
        };
        oIn.onclick = () => {
            console.log('0级in');
        };
        oOut.addEventListener('click', () => {
            console.log('冒泡out');
        });
        oMid.addEventListener('click', () => {
            console.log('冒泡mid');
        });
        oIn.addEventListener('click', () => {
            console.log('冒泡in');
        });
        oOut.addEventListener('click', () => {
            console.log('捕获out');
        }, true);
        oMid.addEventListener('click', () => {
            console.log('捕获mid');
        }, true);
        oIn.addEventListener('click', () => {
            console.log('捕获in');
        }, true);
    </script>
</body>
</html>
```

执行结果：

> 当点击最内侧的in元素时，控制台会输出如下内容：
>
> 捕获out
> 
> 捕获mid
> 
> 0级in
> 
> 冒泡in
> 
> 捕获in
> 
> 0级mid
> 
> 冒泡mid
> 
> 0级out
> 
> 冒泡out

**阻止事件冒泡的方法请参考事件对象一节**

### 20.4事件委托

把事件加给父级,利用事件对象中的`target`来判断是哪个元素触发的。

### 20.5 事件对象

在主流浏览器中：当事件被触发时，会默认传一个实参，为事件对象,可以在事件函数中设置形参(通常用e或ev)接收

*在IE8及其以下的浏览器中，不会传这个实参，但在全局中有`window.event`为事件对象*

以下都是事件对象中常用的属性：

**通用属性**

`type`事件的类型（没有on）

`stopPropagation()`停止事件流的传播（不再继续捕获或冒泡）（IE8及其以下浏览器不支持，用`cancelBubble=true`代替）

`preventDefault()`阻止默认事件（IE8及其以下浏览器不支持`preventDefault`，用`returnValue=false`代替）（在0级事件中也可以用`return false`阻止默认事件，所有浏览器均支持)

`target`触发事件的DOM元素(IE8及其以下浏览器不支持,用srcElement代替)

`currentTarget`当前执行事件函数的DOM元素（通常会使用this代替此属性）

**鼠标事件属性**

`altKey/shiftKey/ctrlKey` 布尔值，表示alt/shift/ctrl键是否按下

`clientX/clientY` 鼠标到浏览器左上角的距离(不是到文档,与滚动条无关)

`pageX/pageY` 鼠标到文档左上角的距离(与滚动条有关)

`offsetX/offsetY` 鼠标到触发事件元素左上角的距离

`layerX/layerY`鼠标距离定位父级左上角的距离【没试过但感觉兼容性差】

`screenX/screenY` 鼠标到用户屏幕左上角的距离

`button`按下的是鼠标左键还是中键还是右键（值分别为0，1，2）

`wheelDelta`(非火狐浏览器可用)滚轮向上滚动值为120，向下滚动值为-120

`detail`(火狐浏览器可用)滚轮向上滚动值为-3，向下滚动值为3

**键盘事件属性**

`altKey/shiftKey/ctrlKey` 布尔值，表示alt/shift/ctrl键是否按下

`keyCode`按键的键值（也有用`witch`的）

**触屏事件属性**

*触屏事件属性大部分与鼠标事件属性相似，这里只列出一部分不同的属性*

（待添加内容）

## 21.BOM相关

**BOM事件**

`onresize`窗口大小改变事件(window的事件)

`onload`页面加载完成事件

`onerror`页面加载出错事件

`onscroll`滚动条滚动事件

`onfocus`获得焦点事件

`onblur`失去焦点事件

*获得焦点与失去焦点事件通常与定时器配合,在失去焦点时取消定时器*

**其他BOM相关内容**

`location`当前地址信息对象

- `.href`完整的URL
- `.protocol`使用的协议
- `.hostname`主机名
- `.port`端口号
- `.host`主机名+端口号
- `.pathname`路径
- `.search`参数（`?`后的字符）
- `.hash` `#`后的字符

`history`前进后退等历史信息对象

- `.length`历史页面的个数
- `.back()`转跳到前一个页面
- `forward()`转跳到后一个页面
- `.go(n)`转跳到下n个页面，n可为非0的整数

`navigator`浏览器相关信息(例如用户代理)对象

`screen`屏幕相关信息对象

## 22.元素各种尺寸和距离

`window.innerHeight`浏览器窗口高度(带窗口边框)

`window.innerWidth`浏览器窗口宽度(带窗口边框)

`.clientWidth` 盒子padding-box的宽度

`.clientHeigth` 盒子padding-box的高度

`.offsetWidth` 盒子border-box的宽度

`.offsetHeight` 盒子border-box的高度

*当盒子没有设置高度，而是由内容撑开时，在IE6中`clientHeigth`为0（这里我记不准是直接为0还是content-box部分高度为0，有知道的小伙伴请e-mail至fans@samail.cn告知）*

`.scrollHeight` 【兼容性差】内容实际占用的高度,超出盒子的部分也计算(有无`overflow:hidden`时不一样,不同浏览器不一样)

`.scrollWidth` 【兼容性差】内容实际占用的宽度,超出盒子的部分也计算(有无`overflow:hidden`时不一样,不同浏览器不一样)

`.offsetLeft`【兼容性差】元素左侧到定位父级左侧的距离(对transform:translate不响应,显示的是没有此属性时的距离)

`.offsetTop`【兼容性差】元素顶部到定位父级顶部的距离(对transform:translate不响应,显示的是没有此属性时的距离)

`.clientLeft`左边框宽度

`.clientTop`上边框宽度

`.getBoundingClientRect()`

`.scrollTop`滚动高度(可读可写)

`.scrollTop`滚动宽度(可读可写)

**获取页面滚动高/宽度**

- `pageXOffset`/`pageYOffset`
- `document.documentElement.scrollLeft`/`document.documentElement.scrollTop`
- `document.body.scrollLeft`/`document.body.scrollTop`

*`document.documentElement.scrollTop`在老版本的Google Chrome,及有些手机版的浏览器中不支持，可使用`document.body.scrollTop`代替*

`window.scrollTo(top:x)`将滚动高度设置为x