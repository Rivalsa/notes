#  前端JavaScript生词本

## 1.杂项

`isNaN(x)`判断x是否是`NaN`若是则返回true,否则返回false

`delete`删除对象中的变量(在严格模式下无法使用)

`parseInt(string, radix)`字符串转换为整数数字

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

`querySelector`与`querySelectorAll`document自带的function,通过选择器选中Element(s)

`getAttribute("xx")`document自带的function,获取自定义属性

`setAttribute("xx","xx")`document自带的function,设置自定义属性

`removeAttribute("xx")`document自带的function,删除自定义属性

`arguments`function内部自带的Object(类Array),不定参.

`toggle("xx")`classList自带的function,若有xx类名则移除,若无则添加.此函数有返回值，如果是添加了类名则返回true，如果是移除了类名则返回false

例如:

```javascript
document.documentElement.classList.toggle("xx");
```

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

## 2.改变`this`指向

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

## 3.几个特殊元素的获取方式

获取html:`document.documentElement`

获取title:`document.title`

获取body:`document.body`

获取head:`document.head`

## 4.数据类型

- Number
- String
- Boolean
- Symbol (ES6新增)
- null
- undefined
- Object

## 5.字符串常用API

字符串可以加下标（用中括号表示）,表示取其中字符,只读，低版本IE不支持，例如

`.charAt(x)`只读,用法同字符串的下标，任何浏览器都支持。

`.length`只读,获取字符长的长度

`.charCodeAt(x)`第x为的Unicode编码

`.subString(x,y)`截取字符串,从第x个字符(含)开始截取到y个字符(不含)

`.slice`与上一条相似,但更好用,可以传入负数.

```javascript
var a="阿飞老师";
console.log(a[1]); //飞
console.log(a.charAt(1)); //飞
console.log(a.length); //4
console.log(a.charCodeAt(0)); //38463
onsole.log(a.subString(0,2)); //阿飞
```

`String.fromCharCode(x)`返回对应Unicode码的字符

`.toLowerCase()`字符串转换为小写,无参数

`.toLocaleLowerCase()`字符串转换为小写,无参数

`.toUpperCase()`字符串转换为大写,无参数

`.split()`以参数中的字符切割字符串,返回一个数组,如果传参为空字符串,则逐字符切割,也可以传入正则表达式(但不常传正则)

`.indexOf(x,y)`返回从第y位开始,x在字符串中第一次出现的位置,x应为字符串,若未出现该字符串,则返回-1

```javascript
var a="今天很开心见到了阿飞老师";
console.log(a.indexOf("飞"));
```

`.replace(旧内容,新内容)`用新内容替换旧内容,返回替换后的字符串,不改变原字符串.

- 旧内容可以是一段字符串,也可以是一个正则表达式
- 新内容可以是一段字符串,也可以是一个函数,如果是函数则用函数的返回值替换就内容,传给函数的第一个实参为替换前的旧内容(形参通常用$0接收).

## 6.数组常用API

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

`.isArray()`判断数据是否是数组,如果是返回true,否则返回false

`.forEach(x)`数组的遍历,x是一个function,函数自行是会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

*forEach不兼容IE8及其以下*

​	querySelecctorAll可以使用forEach

`.map(x)`数组的映射(遍历数组并产生新数组,新数组的元素是x中的返回值),返回值为新数组,不改变原数组.x是一个function,函数自行是会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

`.filter(x)`数组的筛选(遍历数组,并产生新数组,新数组的元素是x返回为true时对应原数组的元素),返回值为新数组,不改变原数组.x是一个function,函数自行是会传入三个参数(需要选中设置形参接收),分别是item,index,arr

- item为当前的数据
- index为当前的序号
- arr为数组本身(很少使用)

## 7.Math对象

JavaScript内置的数学Object.

- `.abs(x)`返回x的绝对值
- `.random()`返回0-1之间的随机数(包含0,不包含1)
- `.round(x)`返回x的四舍五入取整值
- `.ceil(x)`返回x向上取整(进1取整)的值
- `.floor(x)`返回x向下取整(舍尾取整)的值
- `.min(a,b,c,...)`接收多个数字参数,返回最小值
- `.max(a,b,c,...)`接收多个数字参数,返回最大值
- `.pow(a,b)`返回a的b次幂

## 8.定时器

`setInterval(a,b)`设置重复定时器,参数a为一个函数,当定时器时间到后执行函数,参数b为定时时间,返回定时器的编号

`setTimeout(a,b)`设置单次定时器,参数a为一个函数,当定时器时间到后执行函数,参数b为定时时间,返回定时器的编号

`clearInterval(a)`取消编号为a的重复定时器

`clearTimeout(a)`取消编号为a的单次定时器

`requestAnimationFrame(a)`按照刷新率执行函数a,相当于一个重复定时器,时间定为刷新率

`cancelAnimationFrame(a)`取消编号为a的`requestAnimationFrame`定时器

## 9.日期对象

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

## 10.面向对象

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

## 11.ECMA Script 6

### 11.1 杂项

ES6中不允许使用`var`,不建议通过`function`定义函数(通过赋值方式定义函数)

`let`没有变量提升问题,必须先定义变量后使用变量,不能重复定义变量

`const`定义一个常数,定义时必须赋值,不允许重新赋值,满足`let`的所有规定

`padStart(数字,字符串)`字符串的方法,如果不够对应位数,则在开头添加参数中指定的字符串,补满位数

`padEnd(数字,字符串)`字符串的方法,如果不够对应位数,则在结尾添加参数中指定的字符串,补满位数

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
let [aa,bb,cc,dd]="阿飞老师";
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
let obj={name:"afei",age:18,sex:"M"};
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
    [key]:"阿飞"
};
console.log(obj.name); //阿飞
```

### 11.2 箭头函数

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

### 11.3 Symbol

每次新建的Symbol都是不一样的。ES6中symbol数据也可以当做属性名，例如

```javascript
let obj={name:"阿飞",age:18};
let name=Symbol();
obj[name]="言新";
console.log(obj);
```

Symbol的参数是它的标识，只是便于开发者区分，没有实际意义。

### 11.4 类及其继承

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

### 11.5 Set和Map两种数据结构

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

### 11.6 对象赋值时的简写

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

## 12.DOM节点操作

节点(共12种)

- 元素节点(nodetype为1)
- 文本节点(nodetype为3,nodeValue为文本的内容)
- 属性节点(nodetype为2,nodeValue为属性的值)
- 注释节点(nodetype为8,nodeValue为注释的内容)
- (其他8种)

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

**不常用DOM操作**

| 现代浏览器        | 低版本IE浏览器 |含义|
| :---------------: | :------------: | :------------: |
| firstElementChild | firstChild | 获取第一个子元素节点 |
| lastElementChild | lastChild |获取最后一个子元素节点|
| nextElementSibling | nextSibling |下一个兄弟元素节点(在现代浏览器中nextSibling表示下一个兄弟节点)|
| previousElementSibling | previousSibling |上一个兄弟元素节点(在现代浏览器中previousSibling表示上一个兄弟节点)|

## 13.DOM事件

### 13.1 0级事件

*采用赋值的方式,新事件替代旧事件*

**鼠标事件**

`oncontextmenu`弹出右键菜单事件

`onselectstart`选中开始事件

`ondblclick`双击事件

`onclick`单击事件

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

`onsubmit`表单提交事件

`onreset`表单重置事件

**表单事件方法**

- `focus()`获得焦点
- `blur()`失去焦点
- `submit()`提交表单
- `reset()`重置表单

**BOM相关的事件,请参阅第14章节**

**事件对象相关内容,请参阅第16章节**

### 13.2 2级事件

*新事件与旧事件共存,与0级事件不冲突*

`.addEventListener(a,b)`添加事件监听器(低版本IE不支持,用`attachEvent`代替,且IE中事件函数中this指向window)

- a为对应事件,如click(不写on)
- b为事件函数(函数的实参为事件对象)

`removeEventListener(a,b)`移除事件监听器(低版本IE不支持,用detachEvent`代替)

- a为对应事件,如click(不写on)
- b为事件函数(b必须与添加时的b具有相同指针)

### 13.3 事件捕获

先执行捕获事件(从父级到子集)再执行普通事件(从子集到父级)

`.addEventListener(a,b,c)`(低版本IE不支持)

- (参数a,b参考*2级事件*)
- c为布尔值,为true时此事件为捕获事件

*移除捕获事件时`removeEventListener`也需要添加第三个参数为true*

### 13.4 事件委托

把事件加给父级,利用`target`来判断是哪个子级触发的

## 14.BOM相关

`onresize`窗口大小改变事件(window的事件)

`onscroll`滚动条滚动事件(任何有滚动条的元素都有此事件)

`onfocus`获得焦点事件(window的事件)

`onblur`失去焦点事件(window的事件)

*获得焦点与失去焦点事件通常与定时器配合,在失去焦点时取消定时器*

`location`当前地址信息对象

`history`前进后退等历史信息对象

`navigator`浏览器相关信息(例如用户代理)对象

`screen`屏幕相关信息对象

## 15.元素各种尺寸和距离

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

## 16.事件对象

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

## 17.文档碎片

创建文档碎片:`document.createDocumentfragment();`

## 18.正则表达式

可以用来高效便捷的处理字符串

### 18.1 定义正则表达式

**双斜杠定义**

例如:`let reg = /abc/;`

**利用`RegExp`定义**

例如`let reg = new RegExp("x");`括号中可以传入一个字符串变量,也可以直接传入字符串(字符串的内容为正则表达式)

### 18.2 正则表达规则

#### 18.2.1 转义字符

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

#### 18.2.2 标识

*写在正则表达式结尾/的后面,可以写多个,不区分先后顺序,在使用RegExp定义时,标识以字符串形式作为第二个参数传入*

`g`全局,表示在整个字符串中匹配(而不是只匹配到第一个就结束)

`i`不区分大小写

`m`换行匹配

#### 18.2.3 量词

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

#### 18.2.4 子项

使用小括号可以将里面的内容作为一个子项

#### 18.2.5 字符集

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

#### 18.2.6 其他有特殊意义的字符

- `^`表示起始位置
- `$`表示结束位置
- `.`表示匹配除了以下内容的任意字符
  - `\n`
  - `\r`
- `|`表示或者(前后是两个独立的正则)

#### 18.2.7 捕获组

`\数字x`表示第x个子项,再次匹配第x个子项

*并不是第x个子项的匹配规则,而是第x个子项的内容*

#### 18.2.8 断言

`(?=xx)`(不算做子项)某字符后面要含有xx字符,但匹配到的东西不包含xx

`(?!xx)`(不算做子项)某字符后面要不含有xx字符,但匹配到的东西不包含xx

`(?<=xx)`(不算做子项)某字符前面要含有xx字符,但匹配到的东西不包含xx

`(?<!xx)`(不算做子项)某字符前面要不含有xx字符,但匹配到的东西不包含xx

### 18.3 使用正则表达式的方法

**正则表达式的方法**

`.test(字符串)`检查字符串中是否存在对应正则规则,存在则返回`true`否则返回`false`

`.exec(字符串)`返回第一次出现对应规则的字符串有关的对象,若为匹配成功则返回null(不常用)

**字符串的方法**

`.match(正则表达式)`返回字符串中匹配成功的字符串组成的数组(数组有匹配的内容与子项组成,在规则中使用全局`g`则组成的数组中不包含子项)

### 18.4 RegExp对象

RegExp中存储了上一次的子项,可以通过这个对象直接拿到数据.(可以先test然后通过RegExp得到子项)

## 19.ajax

ajax即“Asynchronous Javascript And XML”（异步 JavaScript 和 XML），是指一种创建交互式网页应用的网页开发技术。 

ajax可以在不刷新页面的前提下向后端 发送/请求 数据，在开发中是必然会用的技术。

### 19.1 JavaScript原生ajax

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

### 19.2 jQuery的ajax

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

### 19.3 axios

**发送单个请求**

```javascript
axios({
	method : "post",
    url : "http://api.afei.fun",
    data : {name:"afei",age:18}
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

### 19.4 跨域问题

发送ajax请求时需要确保当前页面与请求页面同源(必须协议\\主机\\端口号全都相同),否则需要后端发送相应的HTTP Header才能正常访问.

### 19.5 jsonp

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

