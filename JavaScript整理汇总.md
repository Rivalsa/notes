**本文正在持续更新中,感兴趣的朋友们敬请留意!!**

欢迎访问[个人网站](https://rivalsa.cn)

#  前端JavaScript整理汇总

## 1.杂项

`encodeURI(x)`将x进行URL encode编码（ASCII字母和数字以及URL中个分隔符不进行编码）

`encodeURIComponent(x)`将x进行URL encode编码（ASCII字母和数字不进行编码）

`decodeURI(x)`将encodeURI编码的x进行解码

`decodeURIComponent(x)`将encodeURIComponent编码的x进行解码

`typeof x`返回x的数据类型字符串(也可以写为`typeof(x)`),但存在特殊情况,下面列出所有可能的输出值

- `number`类型返回`number`
- `string`类型返回`string`
- `boolean`类型返回`boolean`
- `undefined`类型返回`undefined`
- `null`类型返回`object`
- `object`类型(function除外)返回`object`
- `function`返回`function`

`alert(x)`弹窗x(本意是警告弹窗,但通常用语不需要确认和输入内容的弹窗,应用很少)

`prompt(x,y)`输入弹窗,x是提示内容,y为在输入框中的提示内容,会返回输入的字符串,如果点"取消"则返回null

`confirm(x)`确认弹窗,x是提示内容,点击"是"或"确定"一类的返回true,否则返回false

`isNaN(x)`判断x是否是`NaN`若是则返回true,否则返回false

`arguments`function内部自带的Object(类Array),不定参

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

`'use strict'`使用严格模式,通常写在第一行.

`with`\[严格模式不支持\]\[不推荐使用\]延长作用域链里面的变量都从传入的对象中取得,例如:

```javascript
var a=20,
    obj={a:30};
(function(){
	var a=10;
    console.log(a);
    with(window){
        console(a);
    }
    with(obj){
        console(a);
    }
});
```

## 2.变量

变量的命名需要满足标识符命名的规则

### 2.1 标识符命名规则

- 只允许使用 数字/字母/中文/_/$
- 不能以数字开头
- 不能使用**关键词**或**保留词**

### 2.2 标识符命名规范

命名规范是为了方便代码维护\阅读\团队协作开发而制定的,违反这些规范并不会报错,而且不同团队会有自己的规范,如果在团队中开发,遵循对应规范即可.这里列出的是推荐的通常被大多数团队使用的规范.

- 语义化命名
- 小驼峰命名
- 不使用中文命名
- 不使用系统自带API作为标识符

### 2.3 定义变量及赋值

在es5中可以使用`var`关键字定义一个变量,用`=`进行赋值,例如:`var a = 10;`

在非严格模式下,允许变量未经定义直接赋值,也允许在同一个作用域内多次定义同一个变量,但不建议这样做.

在严格模式下,变量必须先定义,后赋值.

在es6中可以使用`let`关键词定义变量

赋值运算符"`=`的左侧必须为一个变量,右侧可以为一个值或表达式,表示将值或表达式的值赋给左侧的变量

赋值运算符的返回值为"`=`"右侧的值或右侧表达式的值

```javascript
var a;
console.log(a = 20); // 20
```

## 3.`console`控制台输出

`.log`普通输出

`.info`输出信息

*`log`与`info`只是语义上的差别,效果上差别不大,在有有的浏览器中有info的标记,但在Google Chrome中完全一样*

`.warn`输出警告信息,不阻碍代码继续执行

`.error`输出错误信息,不阻碍代码继续执行

*如想阻止代码继续执行,可以使用`throw`抛出错误,例如*

```javascript
throw 'xxx';
// 或
// throw new Error('xxx');
```

`.dir`如果输出的是对象,则可以显示对象的所有属性与方法,如果不是对象,则与`log`无明显差异

## 4.数据类型

### 4.1 JavaScript含有的数据类型

*其中object称为复杂数据类型(或引用数据类型),其他的称为简单数据类型(或基础数据类型)*

- number

- string
- boolean
- symbol (ES6新增)
- null
- undefined
- object

### 4.2 部分数据类型的说明

**number类型**

JavaScript中的数字有最大值和最小值的限制,最大值可以利用`Number.MAX_VALUE`取得,若数字大于此值,则为`Infinity`.正数的最小值可以利用`Number.MIN_VALUE`取得,若数字小于此值,则为0

`NaN`也属于数字类型,这种数据通常出现在类型转换时,将无法转换为数字的数据转换为数字类型或者计算`0/0`,就会出现`NaN`这个值.(NaN即Not a Number)

**object类型**

可以使用`{键1:值1,键2:值2,...键n:值n}`的方式来定义对象,其中可以有若干个键值对(键也可以称为属性).

在es5中,键必须是字符串形式,可以加引号也可以不加引号,但不加引号时必须符合变量的命名规则

在es6中键可以写`[变量]`,这时会使用变量的值转换为字符串形式作为对象的键

值可以是任意一种数据类型(包含对象),也可以是变量

读取对象中不存在的属性不会报错，会返回`undefined`

使用`delete`可以删除对象中的变量,例如:`delete obj.pet`(在严格模式下无法使用)

获取对象属性的值有以下两种方案:

- 可以使用`对象名.属性名`的方式来获取对应的值,但属性名必须满足变量的命名规则,且不能使用变量,属性名会自动按字符串处理
- 也可以使用`对象名[属性]`的方式来获取对应的值,属性名可以使用变量

将对象赋值给一个变量是将对象的指针给这个变量,对变量的修改等价于直接修改对象,举例如下:

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

**数组(array)**属于对象的一种,可以使用`[值1,值2,值3,...,值n]`来定义一个数组

**函数(function)**属于对象的一种

- 定义函数可以通过`function`关键字进行定义,如`function 函数名(){}`,也可以通过赋值的方式进行定义,如`var 函数名 = function(){};`,也可以不给函数取名(称为匿名函数),例如`function(){}`
- 当函数中有`return`时,函数的返回值为对应的内容
- 当函数中没有`return`或内容为空时,返回`undefined`
- 函数可以加小括号去执行
- 函数在定义时经赋值(或整体加`()`或在前面加`+`/`-`/`~`/`!`等)后,可以直接在后面加小括号执行,称为立即执行函数(或自执行函数或IIFE).立即执行函数可以将代码模块化,避免污染全局环境
- 函数实际传入的参数称为**实参**,在函数内部用于接受实参值的变量称为**形参**,实参与形参按顺序一一对应

```javascript
function fn(形参1,形参2,...,形参n) {
    ...
}
fn(实参1,实参2,...,实参n);
```

- 实参个数可以等于形参个数,也可以大于形参个数,也可以小于形参个数.传参时,形参与实参按顺序一一对应,对于形参多于实参的情况,未传值的形参值为undefined,对于实参多于形参的情况,在函数中无法通过形参拿到值,但可以通过`arguments`来拿到值

- 函数的`arguments`是内部自带的类数组对象称为**不定参**,用于接受所有传入的参数

### 4.3 数据类型之间的转换

#### 4.3.1 转换为数字

`Number(x)`将x转换为数字类型,返回转换后的结果如下：

- 若x为纯由数字组成的字符串(可以有正负号或小数点)，则返回对应的数字
- 若x为含有非数字字符的字符串，则返回结果为`NaN`
- 若x为`true`,则返回`1`
- 若x为`false`,则返回`0`
- 若x为`symbol`类型,则报错
- 若x为`null`,则返回`0`
- 若x为`undefined`或对象,则先转换为字符串,再将得到的字符串按照上述规则转换为数字,返回得到的数字

`parseInt(string, radix)`将以数字开头的字符串转换为整数数字(第一个非数字字符后面的内容不再解析,正负号算作数字),返回获得的结果,第二个参数为进制的基数,表示第一个参数要返回的数字是以多少进制表示的

`parseFloat(x)`将以数字开头的字符串转换为数字(第一个非数字且非第一个`.`字符后面的内容不再解析,正负号算作数字),返回获得的结果

#### 4.3.2 转换为字符串

`String(x)`将x转换为字符串,返回转换后的结果

`x.toString()`将x转换为字符串,返回转换后的结果,括号中可以传入一个数字参数,表示将数字转换为对应进制数的字符串(如果x不是数字则忽略参数)

将x转换为字符串的结果如下:

- 若x为数字,则转换为对应的纯数字的字符串
- 若x为`true`或`false`或`null`或`undefined`则对应转换为`'true'`或`'false'`或`'null'`或`'undefined'`
- 若x为`symbol`类型,则转换为定义时的对应值,例如`String(Symbol(123)) === 'Symbol(123)'`为`true`
- 若x为对象类型(函数和数组除外),则转换为`'[object Object]'`
- 若x为数组,则转换为经扩展运算符(...)运算后的值
- 若x为函数,则转换为整个函数体

#### 4.3.3 转换为布尔值

`Boolean(x)`将x转换为布尔值,返回结果如下:

- 若x为数字`0`,则返回`false`
- 若x为空字符串`""`,则返回`false`
- 若x为`undefined`,则返回`false`
- 若x为`null`则返回`false`
- 若x为`NaN`则返回`false`
- 其他情况均返回`true`

## 5.运算符

### 5.1 算数运算符

算数运算符分为`+(正)`\\`-(负)`\\`+(加)`\\`-(减)`\\`*(乘)`\\`/(除)`\\`%(取余)`

其中,正负运算符称为**一元运算符**,只有运算符后面有一个数据

**自增运算或自减运算**

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

**运算简写**

```javascript
let a = 10;
a += 1; // 相当于 a = a + 1;
a -= 1; // 相当于 a = a - 1;
a *= 1; // 相当于 a = a * 1;
a /= 1; // 相当于 a = a / 1;
a %= 1; // 相当于 a = a % 1;
```

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

- 如果`+`两侧有一侧是字符串,另一侧非symbol类型,则会将另一侧转换为字符串类型(symbol类型除外)后拼接为新字符串
- 如果`+`两侧有一侧是对象,另一侧非symbol类型,则会将两侧全部转换为字符串再进行运算
- 如果`+`两侧有一侧是symbol类型,则会报错
- 其他情况一律全部转换为数字再进行运算

### 5.2 比较运算符

比较运算符包含`<`,`<=`,`>`,`>=`,`==`,`===`,`!=`,`!==`

**`==`与`===`的区别,`!=`与`!==`的区别**

`===`的比较需要数据类型与值都完全相同才会返回true,否则返回false

`==`的比较会按照相关规则进行类型转换

*`!=`与`!==`的区别于`==`与`===`的区别相似*

对象在比较时,只比较地址是否一致,例如:

```javascript
let obj1 = {x:1};
let obj2 = {x:1};
console.log(obj1 == obj2); // false
console.log(obj1 === obj2); // false
```

**字符串的比较**

字符串的比较按照首字符的编码大小进行比较,如果首字符相同,则按照第二个字符的编码大小进行转换,以此类推,例如:

```javascript
console.log('30' > '4'); // false
```

**比较运算符的类型转换**

除了比较运算符两侧都是字符串的情况,会将两侧都转换为数字类型后再进行比较

**与NaN的比较**

任何与`NaN`的比较都返回`false`,即使`NaN == NaN`也会返回`false`

### 5.3 逻辑运算符

逻辑运算符包含`&&`,`||`,`!`

`&&`从前向后依次执行,遇到转换为布尔值为`true`的则继续向后执行,遇到转换为布尔值为`false`的则返回这个值(返回转换前的值)

`||`从前向后依次执行,遇到转换为布尔值为`false`的则继续向后执行,遇到转换为布尔值为`true`的则返回这个值(返回转换前的值)

`!`后面的值转换为布尔值为`true`则返回`false`,后面的值转换为布尔值为`false`返回`true`

例如:

```javascript
console.info( 1 && 2 && null && 4 ); // null
console.info( null || undefined || 10 || false ); // 10  
var a = 0 && alert('hhh'); // 弹窗不执行, a为0
var b = alert("hhh") && 0; // 弹窗，b为undefined
```

### 5.4 三目运算符

三目运算符语法为`表达式 ? 值1 : 值2`

当表达式为`true`时,整个返回`值1`,否则返回`值2`

### 5.5 位运算符

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

更多关于位运算的知识,请参考[《JavaScript中的位运算》](https://www.rivalsa.cn/s/article/Frontend/bit_operation?utm=SlPmlbTnkIbmsYfmgLs=)

## 6 判断与循环

### 6.1 if...else...

**用法1**

```javascript
if(表达式) {
    // 表达式为true是执行此处代码
    ...
}
```

**用法2**

```javascript
if(表达式) {
    // 表达式为true是执行此处代码
    ...
} else {
    // 表达式为false是执行此处代码
    ...
}
```

**用法3**

```javascript
if(表达式1) {
    // 表达式1为true时执行此处代码
    ...
} else if(表达式2) {
    // 表达式2为true是执行此处代码
    ...
} ... {
    ...
} else if(表达式n) {
    // 表达式n为true是执行此处代码
    ...
} else {
    // 上述所有表达式都为false时执行此处代码
}
```

如果某个代码块中只有一条语句时,可以省略大括号.

较简单的判断语句可以用逻辑运算符或三目运算符代替.

### 6.2 switch

**基本语法**

```javascript
switch(表达式) {
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

在执行switch时,首先会用表达式和值1/值2/.../值n依次进行匹配,若某个值匹配成功后,则从此代码块开始依次执行后面的所有代码块(包括默认代码块),如果所有的值都不匹配,则执行默认代码块.

执行代码块时,如果遇到break,则直接跳出switch判断

switch的比较需要值与数据类型都完全相同

### 6.3 for

**语法**

```javascript
for(语句1;语句2;语句3) {
    // 循环体
    ...
}
```

循环语句按照如下顺序执行:

1. 执行语句1;
2. 判断语句2的表达式,如果为false则跳出循环,否则继续向下执行;
3. 执行循环体;
4. 执行语句3;
5. 返回第2步继续执行

语句1,语句2和语句3均可以省略不写,但分号不可省略,在设置语句2时,除非有明确需要,尽量避免形成死循环.

### 6.4 while

**语法**

```javascript
while(表达式) {
    // 循环体
    ...
}
```

循环语句按照如下顺序执行:

1. 判断表达式,如果为false则跳出循环,否则继续向下执行;
2. 执行循环体
3. 返回第1步继续执行

**while循环即for循环的一种特殊写法，for循环只是把与循环有关的代码集中在了一个位置**

### 6.5 do ... while

**语法**

```javascript
do {
    // 循环体
    ...
} while(表达式);
```

循环语句按照如下顺序执行:

1. 执行循环体
2. 判断表达式,如果为false则跳出循环,否则继续向下执行;
3. 返回第1步继续执行

### 6.6 跳出循环

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
    if (i ===3) continue;
    console.log(i); // 控制台依次输出0 1 2 4
}
```

### 6.7 循环命名

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

### 6.8 循环添加异步事件中的循环变量

例如如下代码:

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

执行上述代码时,会发现点击任意一个按钮,都会弹框5,而不是点那个按钮就弹对应的序号,这种现象的原因是:给按钮添加的点击事件属于异步代码,在添加点击事件时,其中的代码不会执行,等到点击按钮执行代码时,循环变量i早已循环完成值到5了.所以点击每个按钮都会弹窗5.

要想解决这个问题,有3个方案(其中第3个方案用到了ES6语法):

**解决方案1:利用一个自定义属性存住循环变量**

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
            aBtn[i].index = i;
            aBtn[i].onclick = function() {
                alert(this.index);
            };
        }
    </script>
</body>
</html>
```

**解决方案2:利用一个立即执行函数形成闭包**

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
            (function(i){
                aBtn[i].onclick = function() {
                	alert(i);
            	};
            })(i);
        }
    </script>
</body>
</html>
```

**解决方案3:利用ES6中的let定义变量形成闭包**

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
        for(let i = 0; i < aBtn.length; i++) {
            aBtn[i].onclick = function() {
                alert(i);
            };
        }
    </script>
</body>
</html>
```

## 7.改变`this`指向

`call`执行函数时函数加`.call`后传入的第一个实参为函数中的this指向(原参数对应写在后面).
例如:

```javascript
function fn(a,b){
    console.log(this);
    console.log(a+b);
}
fn.call(document,5,6);
```

`apply`执行函数时函数加`.apply`后传入的第一个实参为函数中的this指向(原参数作为数组在第二个参数传入).

例如:

```javascript
function fn(a,b){
    console.log(this);
    console.log(a+b);
}
fn.apply(document,[a,b]);
```

`bind`*[不兼容IE8及其以下]*函数加`.bind`后其返回值为新函数,但新函数的内容与原函数相同,新函数的this指向为参数中规定的指向(如果传入函数的参数,则可以固定参数,期返回的函数无须再传此参数也无法修改,传参的方法与`call`相同)(无须改变this指向可以写null).

```javascript
function fn(a,b){
    console.log(this);
    console.log(a+b);
}
fn.bind(document,1)(2);
```

## 8.字符串常用API

字符串可以加下标（用中括号表示）,表示取其中字符,只读，低版本IE不支持，例如

`.charAt(x)`只读,用法同字符串的下标，任何浏览器都支持。

`.length`只读,获取字符长的长度

`.charCodeAt(x)`第x为的Unicode编码

`.subString(x,y)`截取字符串,从第x个字符(含)开始截取到y个字符(不含)

`.slice`与上一条相似,但更好用,可以传入负数.

`String.fromCharCode(x)`返回对应Unicode码的字符

`.toLowerCase()`字符串转换为小写,无参数

`.toUpperCase()`字符串转换为大写,无参数

`.toLocaleLowerCase()`按照本地方式将字符串转换为小写,无参数

`.toLocaleUpperCase()`按照本地方式将字符串转换为大写,无参数

> 只有少数几种语言（如土耳其语）具有地方特有的大小写映射，所有该方法的返回值通常与不带`Local`的函数一样。

`.split()`以参数中的字符切割字符串,返回一个数组,如果传参为**空字符串**,则逐字符切割,也可以传入正则表达式(但不常传正则)

`.indexOf(x,y)`返回从第y位开始,x在字符串中第一次出现的位置,x应为字符串,若未出现该字符串,则返回-1

`.replace(旧内容,新内容)`用新内容替换旧内容,返回替换后的字符串,不改变原字符串.

- 旧内容可以是一段字符串,也可以是一个正则表达式
- 新内容可以是一段字符串,也可以是一个函数,如果是函数则用函数的返回值替换就内容,传给函数的第一个实参为替换前的旧内容(形参通常用$0接收).

```javascript
let str = '这是一段test用的字符串-123-456-789';
console.log(str[1]); // '是'
console.log(str.charAt(1)); // '是'
console.log(str.length); // 25
console.log(str.charCodeAt(0)); // 36825
console.log(str.slice(14,17)); // '123'
console.log(str.toLocaleUpperCase()); // '这是一段TEST用的字符串-123-456-789'
console.log(str.split('-')); // ['这是一段test用的字符串','123','456','789']
console.log(str.indexOf('-'); // 13
console.log(String.fromCharCode(36825)); // '这'
```

## 9.数组常用API

`.length`返回数组的长度(存储的数据的个数)

`.push(x)`向数组中添加新数据x(新增到最后一条),返回新增数据后数组的长度.(改变原数组)

`.unshift(x)`向数组中添加新数据(新增到第一条),返回新增数据后数组的长度.(改变原数组)

`.pop()`无参数,把原数组的最后一位删掉,改变原数组,返回被删除的数据

`.shift()`无参数,把原数组的第一位删掉,改变原数组,返回被删除的数据

`.splice(a,b[,data[,data[,data[,...]]]])`从数组的第a位开始删除b个数据,再增加数据data,返回一个数组,里面是被删除的数据(若未删除则返回空数组)

- a可以传入负数,表示从末尾的某处开始删除

`.indexOf(x)`找数组中的某个数据,返回数据下标,若未找到则返回-1

`.slice(x,y)`截取数组,从第x个数据(含)开始到第y个数据(不含)结束,返回切割得到的新数组

`.sort()`将数组中的数据从小到大排列,改变原数组,返回排序后的数组

*可以传一个函数参数,此处不详细写明,但有一种常用用法,举例如下*

```javascript
var arr=[2,5,1,6,4];
//倒叙排列
arr.sort(function(a,b){return b-a;});
console.log(arr)
```

`.reverse()`颠倒顺序,改变原数组

`.concat(x)`将数组x拼接在数组后面,不改变原有数组,返回新数组

`.join(x)`用x将数组的元素连接在一起,返回拼接好的字符串

`Array.isArray(x)`判断x是否是数组,如果是返回true,否则返回false

`.forEach(x)`数组的遍历,x是一个function,函数执行时会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

*forEach不兼容IE8及其以下*

*类数组`HTMLCollection`不支持使用`forEach`*

*类数组`NodeList`支持使用`forEach`*

`.map(x)`数组的映射(遍历数组并产生新数组,新数组的元素是x中的返回值),返回值为新数组,不改变原数组.x是一个function,函数执行时会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

`.filter(x)`数组的筛选(遍历数组,并产生新数组,新数组的元素是x返回为true时对应原数组的元素),返回值为新数组,不改变原数组.x是一个function,函数自行是会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

## 10.作用域与解析顺序

### 10.1 作用域及作用域链

**作用域**可以通俗的理解为起作用的范围,分为全局作用域与局部作用域,在局部作用域中定义的变量,只在定义的作用域内可以使用,**在es5中,只有函数能产生一个局部作用域,在es6中遇到大括号就是一个局部作用域**

全局变量保存在GO对象中,局部变量保存在AO对象中,但GO对象和AO对象在JS中是无法直接访问的.

在引用变量时,会现在自己的作用域内查找,如果找不到就到父级作用域内查找,一直找到全局作用域,如果全局也找不到,则报错,这个称为**作用域链**

### 10.2 变量提升与解析顺序

在es5中,即使把定义变量的语句写在后面,也会先进行变量的定义(但不会赋值),把这个现象称为**变量提升**,例如:

```javascript
alert(b); // 弹窗undefined
var b = 10;
alert(a); // 报错
```

**解析顺序**

1.定义(预解析)

- 执行`var`定义变量(但不赋值)
- 执行`function`定义变量

2.执行 - 从上到下执行剩余代码

### 10.3 作用域与解析顺序的举例

**例0**

```javascript
if(false) {
    var a = 10;
}
alert(a);
```

**执行结果**

> 弹窗:undefined

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
> 报错:b is not defined

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
> 报错:x is not defined

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
> 报错: a is not a function

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

## 11.Math对象

JavaScript内置的数学Object.

- `.abs(x)`返回x的绝对值
- `.random()`返回0-1之间的随机数(包含0,不包含1)
- `.round(x)`返回x的四舍五入取整值
- `.ceil(x)`返回x向上取整(进1取整)的值
- `.floor(x)`返回x向下取整(舍尾取整)的值
- `.min(a,b,c,...)`接收多个数字参数,返回最小值
- `.max(a,b,c,...)`接收多个数字参数,返回最大值
- `.pow(a,b)`返回a的b次幂

## 12.定时器

`setInterval(a,b)`设置重复定时器,参数a为一个函数,当定时器时间到后执行函数,参数b为定时时间,返回定时器的编号

`setTimeout(a,b)`设置单次定时器,参数a为一个函数,当定时器时间到后执行函数,参数b为定时时间,返回定时器的编号

`clearInterval(a)`取消编号为a的重复定时器

`clearTimeout(a)`取消编号为a的单次定时器

`requestAnimationFrame(a)`按照刷新率执行函数a,相当于一个重复定时器,时间定为刷新率

`cancelAnimationFrame(a)`取消编号为a的`requestAnimationFrame`定时器

## 13.日期对象

**Date()为构造函数（类）,需要通过new创建一个对象**

*Date后面加括号可以指定时间(年,月,日,时,分,秒),月份从0起,注意减一,或者括号中可以直接写以毫秒为单位的时间戳*

`getFullYear()`获取完整年份

`getMonth()`获取月份,从零开始,通常要加1

`getDay()`获取星期,从零开始,星期日为0

`getDate()`获取日

`getHours()`获取时

`getMinutes()`获取分

`getSeconds()`获取秒

`.toUTCSting()`转换为UTC时间,返回值为字符串

`.getTime()`转换为以毫秒为单位的时间戳

日期对象可以相减,返回值为两个日期相差的毫秒数(相当于时间戳相减)

## 14.面向对象

在创建构造函数后，可以用`.prototype`属性来向\_\_proto\_\_中写入原型，这个对象可以供所有实例化后的对象直接使用，例如：

```javascript
"use strict"
function O(){
    this.name="rivalsa";
    this.sex="M";
}
O.prototype.tt="123";
var obj=new O;
console.log(obj);
```

*同一个构造函数实例化出来的实例的\_\_proto\_\_是给所有的实例公用的（相同的），也就是构造函数的prototype*

每一个原型上都默认有一个construotor指向对应的的函数

**构造函数私有属性及其原型的继承**

举例如下：

```javascript
function Person(n,a){
    this.name=n;
    this.age=a;
}
Person.prototype.showName=function(){
    console.log(this.name);
}
Person.prototype.showAge=function(){
    console.log(this.age);
}
function Teacher(n,a,id){
    Person.call(this,n,a); // 继承的私有属性
    this.id=id; // 新增的私有属性
}
function _Person(){} // 新定义的构造函数，和原函数的原型相同，没有多余的私有属性，防止创建无用属性
_Person.prototype=Person.prototype; // 设置相同的原型函数
Teacher.prototype=new _Person; // 继承原型（实际是将_Person实例化一个对象作为Teacher的原型）
Teacher.prototype.constructor=Teacher; // 补充constructor属性
Teacher.prototype.showId=function(){ // 新增的原型
	console.log(this.id);
}
```

## 15.ECMA Script 6

### 15.1 杂项

ES6中不允许使用`var`,不建议通过`function`定义函数(通过赋值方式定义函数)

`let`没有变量提升问题,必须先定义变量后使用变量,不能重复定义变量

`const`定义一个常数,定义时必须赋值,不允许重新赋值,满足`let`的所有规定

`padStart(数字,字符串)`字符串的方法,如果不够对应位数,则在开头添加参数中指定的字符串,补满位数

`padEnd(数字,字符串)`字符串的方法,如果不够对应位数,则在结尾添加参数中指定的字符串,补满位数

`**`表示乘方,例如`5 ** 2`表示5的2次幂

**作用域**:每一个括号都会产生一个作用域,作用域嵌套就会产生闭包.(在ES5中只有function能产生作用域)

**块作用域**:直接用大括号括起来,相当于立即执行函数,可以产生一个局部作用域,例如:

```javascript
{
    let a=10;
    console.log(a);
};
//相当于ES5中的下面代码
(function(){
    var a-10;
    console.log(a);
})();
```

ES6中顶层对象不再是window,例如:

```javascript
let a=20;
console.log(window.a); //undefined
```

**解构赋值**:当定义变量时,变量与数值具有相同的结构,即可进行赋值,例如:

```javascript
let [a,b]=[10,20];
let {x:c,y:d}={x:50,y:80}; //可简写为let {c,d}={c:50,d:80},相当于let {c:c,d:d}={c:50,d:80}
console.log(a,b,c,d);
let [aa,bb,cc,dd]="解构赋值";
console.log(aa,bb,cc,dd);
```

**函数参数的默认值可以直接在形参中写等号进行赋值**:当传入的参数为undefined时,使用默认值

**模板字符串**:用``代替""或'',可以换行,可以通过${}来直接得到大括号中变量的值,避免多次拼接

**扩展运算符**:...

**数组新增方法**

- keys()
- values()
- entries()

**for...of...**遍历对象，举例如下：

```javascript
//遍历对象
let obj={name:"Rivalsa",age:18,sex:"M"};
for(let key of Object.keys(obj)){ //keys对应换成values或entries
    console.log(key);
}
//遍历数组（不常用，因为常用forEach来遍历）
let arr=[1,2,3,4];
for(let value of arr){
    console.log(value);
}
```

**函数新增length和name属性**

- length表示形参个数
- name表示函数名字

ES6中对象的属性名可以用中括号括起来表示是个变量，例如：

```javascript
let key="name";
let obj={
    [key]:"Rivalsa"
};
console.log(obj.name); // Rivalsa
```

### 15.2 箭头函数

用`=>`的方式来定义函数，例如：

```javascript
let a=(x,y)=>{
    return x+y;
}
a();
```

箭头函数的简写

- 当形参有且仅有一个时，小括号可以不写（小括号里面的形参要写）
- 当函数体中只有一条语句时，大括号可以不写（大括号里面的语句要写），但省略大括号后，函数默认的返回值变为表达式的值

箭头函数与普通函数的异同点

| 箭头函数() = > {}                 | 普通函数function(){}       | 举例 |
| --------------------------------- | -------------------------- | ---- |
| this指向与外界一致,没有自己的this | this指向调用这个函数的对象 | 例1  |
| 不能用new执行                     | 可以用new执行              |      |
| 没有arguments                     | 有arguments                |      |

例1

```javascript
document.addEventListener("click",function(){
    console.log(this); // this指向document
});
document.addEventListener("click",() => {
    console.log(this); // this指向window
});
```

### 15.3 Symbol

每次新建的Symbol都是不一样的。ES6中symbol数据也可以当做属性名，例如

```javascript
let obj={name:"Rivalsa",age:18};
let name=Symbol();
obj[name]="Jerry";
console.log(obj);
```

Symbol的参数是它的标识，只是便于开发者区分，没有实际意义。

### 15.4 类及其继承

在ES5中没有类的概念，用构造函数代替，在ES6中可以用class定义一个类，定义的类只能用new执行，不能自执行，继承可以直接使用extends，举例如下：

```javascript
class Person{
    //私有属性需要在constructor中定义
    constructor(n,a){
        this.name=n;
        this.age=a;
    }
    //定义原型中的方法
    showName(){
        console.log(this.name);
    }
    showAge(){
        console.log(this.age);
    }
}
class Teacher extends Person{ //Teacher继承自Person
    constructor(n,a,i){
        super(n,a); //继承所有私有属性（传值过去）
        this.id=i; //新增的私有属性
    }
    showName(){ //修改原有的原型中的方法
        super.showName(); //执行原有的原型方法
        console.log("123"); //原型方法中新增的语句
    }
    showId(){ //新增的原型方法
        console.log(this.id);
    }
}
let r=new Teacher("Rivalsa",16,1112);
console.log(r);
r.showName();
```

### 15.5 Set和Map两种数据结构

ES6中新增Set和Map两种数据结构，需用new创建对象

set对象将传进的数组去重，例如：

```javascript
let arr=[1,2,4,6,6,8,3,8,1];
let x=[...new Set(arr)];
console.log(x);
```

Set的属性（方法）（不常用）

- size 长度
- add 添加数据（数据有相同内容时不会被添加）
- clear 全部清除
- delete 删除数据（删除哪一个数据，没有序号）
- 等等

Map可以让任何数据类型都能作为键，但只能set存值，get取值。例如：

```javascript
let obj={};
let map=new Map();
map.set(true,123);
map.set(obj,"qwe");
console.log(map.get(obj),map.get(true));
```

### 15.6 对象赋值时的简写

当对象值得变量名与属性名相同时可以简写，如下所示。方法也可以简写，如下所示；

```javascript
//未简写
let x=10,
    y=20,
    obj={
        x:x,
        y:y,
        sum:function(){
            return this.x+this.y;
        }
    };
//简写
let x=10,
    y=20,
    obj={
        x,
        y,
        sum(){
            return this.x+this.y;
        }
    };
```

### 15.7 回调地狱及Promise

如果代码中有多处异步代码(异步中还有异步),例如:

```javascript
setTimeout(() => {
    setTimeour(() => {
        setTimeout(() => {
            console.log(4);
        },100);
        console.log(3)
    },100);
    console.log(2);
},100);
console.log(1);
```

可以看到,上述代码有横向发展的趋势,看起来不好看,也不利于代码维护.通常把这种情况称为**回调地狱**.

**Promise**

`Promise`是一个构造函数(类),需要用`new`来创建一个对象,创建这个对象时,需要两个参数,这两个参数在内部会被定义为函数,第一个表示成功(一般使用resolve),第二个表示失败(一般使用reject),当这部分代码执行完毕后,需要根据状态调用`resolve`或`reject`,调用`resolve`后会停止当前的执行,并执行属性`then`传入的函数的第一个参数,调用`reject`或会停止档期至今,并执行属性`then`传入的第二个参数或属性`catch`传入的参数

*执行到resolve或reject后,会直接进入对应部分代码*

实例化后的Promise对象有两个常用属性,一个是`then`,另一个是`catch`,这两个属性都是函数,`then`需要传入两个函数参数,第一个是resolve时执行的函数,第二个是reject时执行的函数,但通常习惯上不传入第二个参数,而是用`catch`来捕捉reject.

代码如下:

```javascript
new Promise((resolve,reject) => {
    ...
    if(...) resolve(); else reject();
}).then(() => {
    //resolve时执行的代码
    ...
}).catch(() => {
    //reject时执行的代码
    ...
});
```

由于当Promise实例执行到resolve时会继续执行then传入的代码,则可以在then部分通过return设置返回值,这个返回值就是整个实例的返回值,如果让整个实例返回一个新的Promise对象,则可以实例又可以继续有then及catch属性,这样就可以将横向发展的代码变成纵向发展,也就解决了回调地狱问题,代码如下:

```javascript
new Promise (res => {
    ...
    res();
}).then(() => {
    return new Promise(res => {
        ...
        res();
    });
}).then(() => {
    return new Promise(res => {
        ...
        res();
    });
}).then(() => {
    ...
});
```

*如果需要捕捉reject则在最后增加`catch`即可,由于上面的代码中没有任何地方用到`reject`则`catch`并没有意义,所以没有定义`catch`*

利用此方法可以解决本节第一个代码额回调地狱问题,代码如下:

```javascript
console.log(1);
new Promise((resolve,reject) => {
    setTimeout(() => {
        console.log(2);
        resolve();
    },100);
}).then(() => {
    return new Promise(resolve ={
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

## 16.DOM操作

> DOM（文档对象模型 document object model）是针对HTML文档的一个API.
> DOM 描绘了一个层次化的节点树，允许开发人员添加、移除和修改页面元素(元素的文字也是DOM的一个节点)

DOM节点共有12种

- 元素节点(nodetype为1)
- 文本节点(nodetype为3,nodeValue为文本的内容)
- 属性节点(nodetype为2,nodeValue为属性的值)
- 注释节点(nodetype为8,nodeValue为注释的内容)
- (其他8种)

### 16.1 获取DOM对象

**通过ID获取**

```javascript
document.getElementById('ID'); // 返回对应的DOM元素
```

**通过class获取**(不兼容IE8及其以下)

```javascript
document.getElementsByClassName('className'); // 返回类数组HTMLCollection
```

**通过标签名获取**

```javascript
document.getElementsByTagName('tagName'); // 返回类数组HTMLCollection
```

**通过name获取**

```javascript
document.getElementsByName('name'); // 返回类数组NodeList
```

**通过选择器获取**(静态方法)

```javascript
document.querySelector('选择器'); // 返回对应的DOM元素(第一个)
document.querySelectorAll('选择器') // 返回类数组NodeList
```

**几个特殊元素的获取方式**

获取html:`document.documentElement`

获取title:`document.title`

获取body:`document.body`

获取head:`document.head`

### 16.2 操作DOM的属性及内容

**操作标签原有属性**

DOM元素的各种属性都在DOM对象中,所以可以直接修改DOM对象的属性即可,举例如下:

```javascript
var oBox = document.getElementById("box");
oBox.href = "#";
oBox.className = "box1";
oBox.style.display = "none" ;
```

特殊情况

- 修改DOM元素的class属性,可以使用`className`或`classList`来操作
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

通过修改`className`可以直接修改标签对应的类名,通过修改类名可以修改对应样式

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

通过`classList`的各种API可以直接修改类名(*不支持IE9及其以下*),`classList`包括以下API:

- `add(类名)`添加类名
- `remove(类名)`移除类名
- `toggle(类名)`添加或删除类名(有则删除,无则添加),删除了类名会返回false,添加了类名会返回true
- `contains(类名)`判断是否存在类名,存在则返回true,不存在则返回false

获取标签当前样式

`getComputedStyle(x)`window的自带函数,返回对象x的CSS样式,只读属性,例如:

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

**操作标签的属性(原有的和自定义的都可以)**

获取属性:`getAttribute('属性名');`

新增或修改属性:`getAttribute('属性名','属性值');`

移除属性:`removeAttribute('属性名');`

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

- innerHTML会解析其中的html标签
- innerText不会解析hmtl标签，原样替换所设置的内容

### 16.3 更多DOM操作

`.childNodes`获取元素的所有子节点(现代浏览器是获取所有子节点,低版本IE浏览器是获取所有子元素节点)

`.children`获取元素的所有子元素节点(不支持forEach)

`.parentNode`获取元素父节点

`.offsetParent`获取元素最近的有定位属性的父节点

`.createElement(x)`创建X元素节点

`.createTextNode("xx")`创建内容为xx的文本节点

`.appendChild(x)`在子节点的末尾添加节点x

`.insertBefore(a,b)`在子节点中节点b之前新增节点a

`.replaceChild(a,b)`在子节点中用a节点代替b节点

`.removeChild(x)`在子节点中删除节点x

`.createDocumentfragment()`创建文档碎片

**不常用DOM操作**

| 现代浏览器        | 低版本IE浏览器 |含义|
| :---------------: | :------------: | :------------: |
| firstElementChild | firstChild | 获取第一个子元素节点 |
| lastElementChild | lastChild |获取最后一个子元素节点|
| nextElementSibling | nextSibling |下一个兄弟元素节点(在现代浏览器中nextSibling表示下一个兄弟节点)|
| previousElementSibling | previousSibling |上一个兄弟元素节点(在现代浏览器中previousSibling表示上一个兄弟节点)|

## 17.DOM事件

### 17.1 0级事件

*采用赋值的方式,新事件替代旧事件*

**鼠标事件**

`oncontextmenu`鼠标右键点击事件

`onselectstart`选中开始事件

`ondblclick`鼠标双击事件

`onclick`鼠标单击事件

`onmousedown`鼠标按下

`onmousemove`鼠标移动

`onmouseup`鼠标抬起

`ommouseenter`鼠标移入事件(不冒泡)

`onmouseleave`鼠标移出事件(不冒泡)

`onmouseover`鼠标移入事件(冒泡)

`onmouseout`鼠标移出事件(冒泡)

关于鼠标移入移出事件,冒泡与不冒泡的说明:

- 此处的冒泡:父级盒子设置有移入事件,则鼠标从父级盒子移入子级盒子时**也会**触发事件,从子级盒子移入父级盒子时**也会**触发事件;
- 此处的不冒泡:父级盒子设置有移入事件,则鼠标从父级盒子移入子级盒子时**不会**触发事件,从子级盒子移入父级盒子时**不会**触发事件;
- 无论是否冒泡,从父级盒子外部直接移入子级盒子内部(即使子级盒子显示的位置不在父级盒子显示的位置内部)**都会**触发事件

鼠标滚轮滚动事件

- `DOMMouseScroll`鼠标滚轮事件（火狐浏览器专用，仅支持2级事件）

- `mousewheel`鼠标滚轮事件（标准现代浏览器（如谷歌））

    *事件对象中有一个参数可以指示滚动方向以及滚动速度*

**键盘事件**

`onkeydown`键盘按键按下事件

`onkeypress`键盘能输入内容的按键(不含功能键)按下事件

`onkeyup`键盘按键抬起事件

**表单事件**

`onfocus`表单获得焦点事件

`onblur`表单失去焦点事件

`onchange`表单内容发生改变事件

- 对于`text`:在失去焦点之前触发(需要失去焦点时刻与获得焦点时刻内容不同才会触发)
- 对于`radio`:被选中的单选框触发
- 对于`checkbox`:被选中和被取消选中时均会触发
- 对于`select`:选择的内容发生改变时会被触发

`oninput`input框输入或删除字符事件

`onsubmit`表单提交事件

`onreset`表单重置事件

`onselect`文本框的文本内容被选中事件

**表单事件方法**

- `focus()`获得焦点
- `blur()`失去焦点
- `submit()`提交表单
- `reset()`重置表单

**BOM相关的事件,请参阅《BOM相关》章节**

**事件对象相关内容,请参阅《事件对象》章节**

### 17.2 2级事件

*新事件与旧事件共存,与0级事件不冲突*

`.addEventListener(a,b)`添加事件监听器(低版本IE不支持,用`attachEvent`代替,且IE中事件函数中this指向window)

- a为对应事件,如click(不写on)
- b为事件函数(函数的实参为事件对象)

``removeEventListener(a,b)`移除事件监听器(低版本IE不支持,用`detachEvent`代替)

- a为对应事件,如click(不写on)
- b为事件函数(b必须与添加时的b具有相同指针)

### 17.3 事件捕获

先执行捕获事件(从父级到子集)再执行普通事件(从子集到父级)

`.addEventListener(a,b,c)`(低版本IE不支持)

- (参数a,b参考*2级事件*)
- c为布尔值,为true时此事件为捕获事件

*移除捕获事件时`removeEventListener`也需要添加第三个参数为true*

### 17.4 事件委托

把事件加给父级,利用`target`来判断是哪个子级触发的

## 18.BOM相关

**BOM事件**

`onresize`窗口大小改变事件(window的事件)

`onload`页面加载完成事件

`onerror`页面加载出错事件

`onscroll`滚动条滚动事件(任何有滚动条的元素都有此事件)

`onfocus`获得焦点事件(window的事件)

`onblur`失去焦点事件(window的事件)

*获得焦点与失去焦点事件通常与定时器配合,在失去焦点时取消定时器*

**其他BOM相关内容**

`location`当前地址信息对象

`history`前进后退等历史信息对象

`navigator`浏览器相关信息(例如用户代理)对象

`screen`屏幕相关信息对象

## 19.元素各种尺寸和距离

`window.innerHeight`浏览器窗口高度(带窗口边框)

`window.innerWidth`浏览器窗口宽度(带窗口边框)

`document.documentElement.clientWidth`HTML的宽度

`document.documentElement.clientHeight`HTML的高度

`.clientWidth` width+padding

`.clientHeigth` height+padding

`.offsetWidth` width+padding+border

`.offsetHeight` height+padding+border

`.scrollHeight` 内容实际占用的高度,超出盒子的部分也计算(有无`overflow:hidden`时不一样,不同浏览器不一样)

`.scrollWidth` 内容实际占用的宽度,超出盒子的部分也计算(有无`overflow:hidden`时不一样,不同浏览器不一样)

`.offsetLeft`元素左侧到定位父级左侧的距离(对transform:translate不相应,显示的是没有此属性时的距离)

`.offsetTop`元素顶部到定位父级顶部的距离(对transform:translate不相应,显示的是没有此属性时的距离)

`.getBoundingClientRect()`

`document.documentElement.scrollTop`竖直滚动条的滚动高度(老版本的Google Chrome,及有些手机版的浏览器使用`document.body.scrollTop`)(可读可写)

`window.scrollTo(top:x)`将滚动高度设置为x

## 20.事件对象

在现代浏览器中：当事件被触发时，会默认传一个实参，为事件对象,可以在事件函数中设置形参(通常用e或ev)接收

*在低版本IE浏览器中，不会传这个实参，但在全局中有window.event为事件对象*

以下都是事件对象中的属性:

- 鼠标事件
  - `altKey/shiftKey/ctrlKey` 对应按键是否按下
  - `clientX/clientY` 鼠标到浏览器可视区的距离(不是到文档,与滚动条无关)
  - `pageX/pageY` 鼠标到文档的距离(与滚动条有关)(兼容性一般)
  - `offsetX/offsetY` 鼠标到触发事件元素的距离
  - `screenX/screenY` 鼠标到用户屏幕的距离
  
- 键盘事件
  
  - `keyCode`按键的键值
  
- `stopPropagation()`阻止冒泡

- `cancelBubble=true`阻止冒泡

    - 冒泡指的是在子级上触发的事件会传递给父级

    - 阻止冒泡事件应该添加在子级上(遇到阻止冒泡属性后不再继续冒泡)

- `preventDefault()`阻止默认事件

- `target`事件触发源

## 21.正则表达式

可以用来高效便捷的处理字符串

### 21.1 定义正则表达式

**双斜杠定义**

例如:`let reg = /abc/;`

**利用`RegExp`定义**

例如`let reg = new RegExp("x");`括号中可以传入一个字符串变量,也可以直接传入字符串(字符串的内容为正则表达式)

### 21.2 正则表达规则

#### 21.2.1 转义字符

普通转移字符`\`(将有特殊意义的字符变为普通字符)

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

#### 21.2.2 标识

*写在正则表达式结尾/的后面,可以写多个,不区分先后顺序,在使用RegExp定义时,标识以字符串形式作为第二个参数传入*

`g`全局,表示在整个字符串中匹配(而不是只匹配到第一个就结束)

`i`不区分大小写

`m`换行匹配

#### 21.2.3 量词

*写在对应规则后面*

`{n}`n个

`{n,m}`最少n个,最多m个,包括n和m

`{n,}`最少n个,包括n

`+`最少1个,等价于`{1,}`

`*`最少0个,等价于`{0,}`

`?`0个或1个,等价于`{0,1}`

**量词的贪婪和惰性**

贪婪(默认):尽量按多的去匹配

惰性(在量词后面加`?`表示惰性量词):尽量按少的去匹配

#### 21.2.4 子项

使用小括号可以将里面的内容作为一个子项

#### 21.2.5 字符集

用中括号表示

- 表示"或者"

  - `[abc]`表示字符`a`或字符`b`或字符`c`
  - `[abc]{2}`表示`aa`或`ab`或`ac`或`ba`或`bb`或`bc`或`ca`或`cb`或`cc`

- 字符集中的`-`表示一个区间(按Unicode码的区间)

  - `[0-5]`表示`0`到`5`之间的任意数字
  - [a-z]表示所有小写字母
  - [A-Z]表示所有大写字母
  - [0-<]表示所有数字或冒号或分号或小于号(Unicode码中冒号和分号和小于号是9后面紧接着的三个)

  *在字符集之外`-`没有特殊意义*

- 如果字符集中第1个字符是`^`整个子项表示排除

  - `[^abc]`表示除了字符a和字符b和字符c外的任意字符

- 字符集中小括号/大括号/正斜杠/问号/星号/加号等无特殊含义

#### 21.2.6 其他有特殊意义的字符

- `^`表示起始位置
- `$`表示结束位置
- `.`表示匹配除了以下内容的任意字符
  - `\n`
  - `\r`
- `|`表示或者(前后是两个独立的正则)

#### 21.2.7 捕获组

`\数字x`表示第x个子项,再次匹配第x个子项

*并不是第x个子项的匹配规则,而是第x个子项的内容*

#### 21.2.8 断言

`(?=xx)`(不算做子项)某字符后面要含有xx字符,但匹配到的东西不包含xx

`(?!xx)`(不算做子项)某字符后面要不含有xx字符,但匹配到的东西不包含xx

`(?<=xx)`(不算做子项)某字符前面要含有xx字符,但匹配到的东西不包含xx

`(?<!xx)`(不算做子项)某字符前面要不含有xx字符,但匹配到的东西不包含xx

### 21.3 使用正则表达式的方法

**正则表达式的方法**

`.test(字符串)`检查字符串中是否存在对应正则规则,存在则返回`true`否则返回`false`

`.exec(字符串)`返回第一次出现对应规则的字符串有关的对象,若为匹配成功则返回null(不常用)

**字符串的方法**

`.match(正则表达式)`返回字符串中匹配成功的字符串组成的数组(数组有匹配的内容与子项组成,在规则中使用全局`g`则组成的数组中不包含子项)

### 21.4 RegExp对象

RegExp中存储了上一次的子项,可以通过这个对象直接拿到数据.(可以先test然后通过RegExp得到子项)

## 22.ajax

> ajax即“Asynchronous Javascript And XML”（异步 JavaScript 和 XML），是指一种创建交互式网页应用的网页开发技术。 

ajax可以在不刷新页面的前提下向后端 发送/请求 数据，在开发中是必然会用的技术。

### 22.1 JavaScript原生ajax

```javascript
let xhr;
if (window.XMLHttpRequest) {　 // 标准浏览器
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // 低版本IE
    try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e) {}
    }
}
if (xhr) {
    xhr.onreadystatechange = onReadyStateChange;
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
            console.log(xhr.responseText);//xhr.responseText请求返回的文本内容
        } else {
            console.log('There was a problem with the request.');
        }
    } else {
        // 请求还没处理到最后一步
        console.log('still not ready...');
    }
}
```

### 22.2 jQuery的ajax

```javascript
// 列出部分参数
$.ajax({
    method : "POST" // 请求方式
    ,url : "/url" // 请求地址
    ,data : {} // 需要发送的数据
    ,dataType : "json" // 对请求返回的数据预处理
    ,success : function(data){} // 请求成功的回调函数
    ,error : function(err){} // 请求失败的回调函数
});
```

### 22.3 axios

**发送单个请求**

```javascript
axios({
	method : "post",
    url : "http://example.com",
    data : {name:"Rivalsa",age:18}
}).then(res => {
    console.log(res);
}).catch(err => {
    console.log(err);
});
```

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

### 22.4 跨域问题

发送ajax请求时需要确保当前页面与请求页面同源(必须协议\\主机\\端口号全都相同),否则需要后端发送相应的HTTP Header才能正常访问.

### 22.5 jsonp

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

