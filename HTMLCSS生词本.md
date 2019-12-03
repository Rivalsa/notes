# 前端HTML CSS生词本

## 1. 杂项

`display`这个属性可以调整元素的显示样式,有如下值可以使用:

- `block`块级元素
- `inline`行内元素
- `inline-block`行内块元素
- `flex`弹性盒布局
- `grid`网格布局
- `inline-grid`行内网格布局
- `none`不显示此元素
- 其他值(如`list-item`/`run-in`/`table`/`inline-table`/`teble-*`等)

*关于`block`/`inline`/`inline-block`之间的区别,请参考文章[CSS中display属性值inline,block,inline-block的区别](https://www.rivalsa.cn/s/article/Frontend/display?utm=5Luj56CB5LuT5bqTSFRNTENTUw==)*

*关于`flex`与`grid`的更多介绍,请参见本文的**弹性盒子布局**及**网格布局**部分*

`iframe`可以在当前页面中引入其他html文件(不推荐使用)

- `src`属性:引入的文件路径
- `frameborder`属性:是否有默认边框,一般写0或1
- `srcdoc`属性:里面可以写html代码

`text-transform`控制文本的大小写，其值为：

- none 带有小写字母和大写字母的标准文本
- uppercase 全部转换为大写
- lowercase 全部转换为小写
- capitalize 每个单子首字母开头

`opacity` 设置透明度

`mask`遮罩，用法与`background`相同，通常需要使用浏览器私有前缀

`letter-spacing`字符间距(字和字之间的间距)

`user-select`用户选中文字,值为`none`代表用户无法选中文字

`linear-gradient`线性渐变

举例：

**CSS**

```css
div{
	border:2px solid #000;
	height:300px;
	width:300px;
	background-image:
		linear-gradient(transparent 10%,black 10%,black 20%,transparent 20%),
		linear-gradient(to right,transparent 10%,red 10%,red 20%,transparent 20%);
}
```

`repeating-linear-gradient`重复线性渐变

`transparent`透明

`radial-gradient`径向渐变

`repeating-radial-gradient`重复径向渐变

`ellipse`椭圆,用在径向渐变中

`circle`圆,用在径向渐变中,用法:`circle at 100px 100px`

`vertical-align`竖直对齐，默认基线对齐

`cursor:pointer;`改变鼠标样式为手形

`text-indent`文本缩进

## 2. 定位布局

`position:relative;`定位：相对于自己定位

`position:absolute;`定位：绝对定位，相对于最近的祖先定位元素定位

绝对定位的元素不支持左右margin设置为auto自动居中

绝对定位元素不会出现外边距合并的情况

绝对定位元素具有包裹性

绝对定位元素会强制转换为block元素

## 3. 浮动布局

`float`浮动

浮动的元素不会去**主动**覆盖未浮动的元素（若浮动元素前面有没有浮动的元素,此浮动元素会原地飘起来,而不会向上移动）

当父级宽度不够则会下滑,一直滑到可以继续向左飘至能放下的地方

浮动起的元素不支持左右margin设置为auto自动居中

元素浮动后,不会出现外边距合并的情况

浮动元素具有包裹性

浮动元素会强制转换为block元素

浮动元素不会覆盖文字

## 4. BFC (块级格式化上下文)

以下CSS属性可以让元素BFC化:

- `overflow:hidden;`
- `display:inline-block;`
- `float:left;/float:right;`
- `position:absolute;`

## 5. 表单相关

`input`的type

- `text`输入框(可输入任何文内容)

- `password`密码输入框(输入内容会被遮盖)

- `number`数字输入框(只能输入数字)

- `range`可拖动滑块,表现为数字

  *默认没有占位符,`placeholder`无效*

- `date`日期输入框

- `datetime-local`日期时间输入框,添加`step`属性则显示秒(值是几一次加几)

- `time`时间输入框,添加`step`属性则显示秒(值是几一次加几)

- `week`某年第几周输入框

- `month`年月输入框

- `color`颜色选择框

- `file`文件选择框

  *增加`multiple`属性表示可以选择多个文件(无值)*

- `radio`表单中的单选框,`name`相同的为同一组

- `checkbox`表单中的多选框

`input`的公共属性

- `placeholder`占位符(表单输入框中的提示文字)
- `minlength`与`maxlength`表示text与password输入框中输入的最小长度与最大长度
- `max`与`min`表示数字输入框或滑块的最大数字和最小数字
- `step`表示数字输入框或滑块单次改变的步长
- `value`值
- `required`表单中的字段是必须填写的
- `checked`表单中的单选框或复选框默认选中

`select` 下拉菜单,选项用`option`添加(添加`multiple`属性可以多选),分组用`optgroup`,例如

```html
<!-- 就是做一个例子,可能不太恰当 -->
<form>
    <select name="sex">
        <optgroup label="分组:男">
        	<option value="m">男</option>
        </optgroup>
    	<optgroup label="分组:女">
        	<option value="f">女</option>
		</optgroup>
    </select>
</form>
```

`textaraea`多行文字输入框(双标签)(列数`cola`,行数`roes`)(在CSS中添加`resize:none;`可以禁止用户调整大小)

`fieldset`一个表单框(双标签),里面用`legend`标签(通常写在第一个)设置表单框的名字(也是双标签,可以设置CSS的border)

`outline`写法与`border`相同，表单输入框选中时默认周围的蓝色框

`label`双标签,扩大选区,将其中的内容与单选框或复选框关联.点击对应文字时,可以选中单选框或复选框.格式为`<label for="">`其中`for`的属性值写需要与之关联的单选框或复选框的ID,例如:

```html
<form action="" method="">
	<input id="test" type="checkbox">
	<label for="test">测试文字</label>   
</form>
```

`datalist`表单中的数据列表(双标签),可以被`input`标签使用(`list="datalist-id";`),内部使用`option`标签

## 6. 表格

`caption`通常用于表格的标题

`border-collapse:collapse;`CSS样式(给`table`)设置边框合并

`border-spacing`CSS样式(给`table`)让表格单元格之间有间隙,可以写一个或两个值,代表上下\左右或上下左右

`colspan`水平合并单元格,通常用于`td`标签中

`rowspan`竖直合并单元格，通常用于`td`标签中

## 7. 过渡

`transition`过渡

- `transition-duration`持续时间
- `transition-property`应用过渡的属性
- `transition-delay`过渡延时(负数相当于提前执行动画,有一个瞬变得瞬间,但此值为负数值,其绝对值要小于`transiton-duration`)
- `transition-timing-function`过渡时间函数
  - `ease`慢-快-很慢(默认值)
  - `liner`匀速
  - `ease-in`慢-快
  - `ease-out`快-慢
  - `ease-in-out`慢-快-慢
  - `cubic-bezier(*n*,*n*,*n*,*n*)`贝塞尔曲线

*`transition`的复合写法中只有`transition-duration`不可省略且需要在`transition-delay`之前*

*`transition: property duration timing-function delay`*

## 8. 动画

`@keyframes`动画的关键帧,后面跟动画名称

*内部可用`from`和`to`来表示,也可以用百分比*

*`0%/100%/from/to`不写时默认为原有样式*

`animation`应用动画

- `animation-name`动画的名称
- `animation-duration`单次动画的时长
- `animation-iteration-count`执行次数,可以直接写数字(`infinite`表示无限次)
- `animation-delay`动画延时(负数表示页面刷新前就开始运动,页面出现后已经运动一段时间了,正数表示延后一段时间开始运动)
- `animation-timing-function`动画运动速率(贝塞尔曲线)
- `ease`慢-快-慢(默认值)
  
- `liner`匀速
  
- `ease-in`加速
  
- `ease-out`减速
  
- `ease-in-out`快-慢-快
  
- `cubic-bezier(*n*,*n*,*n*,*n*)`贝塞尔曲线
  - `steps`逐帧动画(动画过程用几帧完成,3帧则用`steps(3)`
- `animation-play-state`动画播放状态(`paused`/`running`)
- `animation-fill-mode`动画运动完成后如何处理(`forwards`表示停留在最后一帧)
- `animation-direction`运动的方向(`alternate`表示往返运动/`reverse`表示反向运行/`alternate-reverse`表示反向往返运动)

*复合写法:先写动画名称,运动时间在延时之前,动画名称和运动时间不可省略*

## 9. 选择器

`#`ID选择器

`.`类名(class)选择器

`(标签)`标签选择器

` (空格)`后代元素选择器

`>`子代元素选择器

`~`兄弟元素选择器(只能向后选)

`+`相邻兄弟元素选择器(相邻元素选择器,只能向后选)

### 9.1 伪类选择器

- `hover`鼠标悬停

- `visited`被访问过(通常用于`a`标签)

- `active`鼠标按下

- `link`未被访问过(通常用于`a`标签)

- `focus`获得焦点(通常用于表单中)

- `:focus-within`当子元素获得焦点时,通常用在`form`标签中

- `checked`已被勾选(通常用于表单中)

- `first-line`首行

- `first-letter`首字母(中文为首字)

- `selection`选中的内容

- `not(其他选择器)`反向选择器,例如:`.box2>p:not(.p1)`选择了`box2`中类名不为`p1`的`p`元素

- `nth-child(x)`第x个子元素(如`li:nth-child(3)`表示选择li元素又是第3个子元素的元素)

  - x可以写正整数
  - x可以写odd(奇数)或even(偶数)
  - x可以写an+b或an-b，其中a表示周期的长度，n 是计数器（从 0 开始），b 是偏移值

- `nth-last-child(x)`倒数第x个元素

  *用法与`nth-child(x)`相似*

- `first-child`第一个元素

- `last-child`最后一个元素

- `nth-of-type(x)`第x个相同类型的子元素

  *用法与`nth-child(x)`相似*

- `nth-last-of-type(x)`倒数第x个相同类型的子元素

  *用法与`nth-child(x)`相似*

### 9.2 属性选择器

用`[]`表示,格式为

- `[属性名="属性值"]`有这个属性名,且属性值**完全相同**才能被选中
- `[属性名]`属性名存在即选中
- `[属性名~="字符"]`
- `[属性名*="字符"]`有这个属性名,且属性值**包含**对应的字符才能被选中
- `[属性名^="字符"]`有这个属性名,且属性值**以**对应字符**开头**才能被选中
- `[属性名$="字符"]`有这个属性名,且属性值**以**对应字符**结尾**才能被选中

## 10. 伪元素

*JavaScript无法选中伪元素*

*伪元素前面可写两个冒号(推荐)也可以写一个冒号*

`before`在元素前添加伪元素

`after`在元素后添加伪元素

*必须有`content`属性,属性值为文字则用双引号引起来,为图片则使用`url("图片")`*

*`content`可以设置为`none`和`normal`,这两个值都可以让这个微元素不显示*

## 11. 阴影

`box-shadow`阴影

*层级在背景之下*

*可以设置多组属性值,之间用逗号分隔*

- 前两个参数表示阴影相对于盒子的位置(第一个值为向右,第二个值为向下)

- 第三个参数表示阴影的模糊半径(blur)(分界线两侧的像素点颜色融合,颜色求平均值)

- 第四个参数表示阴影的缩放

  *四个参数可以省略不写*

- 第五个参数为背景颜色

- 第六个参数表示阴影在盒子内部还是外部(inset表示内阴影)

  *一个盒子可以设置多个阴影相互叠加,之间用逗号分隔,先写的在上面*

  *阴影只能盖住背景*

  *阴影的形状与盒子的形状相同*

`text-shadow`文本阴影

## 12. 滤镜

`filter`滤镜

- `blur(xpx)`高斯模糊(毛玻璃效果)
- `brightness(.4)`亮度
  - 0为纯黑色
  - 小于1位变暗
  - 1位原图
  - 大于1位变亮
- `grayscale(.4)`灰度
  - 0为原图
  - 0到1灰度效果在中间
  - 1为灰度最强
- `contrast(.4)`对比度
  - 0为对比度最低(灰)
  - 小于1对比度减弱
  - 1为原图效果
  - 大于1对比度加强

## 13. 变换

`transform`变换(复合属性)

*子元素和内部文字会随着一起旋转*

*不会影响其他元素的布局*

- `rotate(ndeg)`绕基点点旋转n度(正数为顺时针旋转)

  *支持`transiton`和`animation`*

  *只有`block`和`inline-block`才能旋转*
  
- `translate(npx,mpx)`水平移动n像素,竖直移动X像素,只写一个参数时会参照参数进行水平移动,竖直方向不移动

  *可以分解写为`translateX(npx)`与`translateY(mpx)`*

  *不会影响其他元素布局*

  *translate与相对定位的区别:平移功能在性能上要优于相对定位*

- `scale(n)`缩放,盒子变为原来的n倍,传两个参数表示在水平和竖直方向上的缩放,例如`scale(m,n)`

  *里面的字体大小可以随着缩放*

  *不会影响其他元素的布局*
  
  *传入参数为负数时,会显示镜像结果*
  
- `skew(ndeg,mdeg)`倾斜(水平方向倾斜n度,数值方向倾斜m度)

  *可以拆写为`skewX`和`skewY`两个参数*

`transform-origin`设置变换基点,属性值写法可参照`background-position`

**三维变换**

`perspective`视距

`perspective-origin`视距基点,属性值写法可参照`transform-origin`

`transform: rotate(x)`默认绕Z轴旋转,可以使用`rotateX`和`rotateY`命令使其绕X轴和Y轴旋转.

`transform`中的`translate3d(x,y,z)`在三维空间上进行位移,可以分开写为`translateZ`等

`transform-style`值为`preserve-3d`可让盒子具有三维空间空间效果

## 14. 弹性盒布局

**以下内容添加在父元素（容器）中**

`display:flex`弹性盒模型布局

`flex-direction`主轴方向,其值可为:

- `row`(默认值)一行排列(正方向)
- `row-reverse`反向行排列(负方向)
- `column`一列排列(正方形)
- `column-reverse`反向列排列(负方向)

`flex-wrap`交叉轴方向(换行方向),其值可为:

- `nowrap`(默认值)不允许换行
- `wrap`换行方向垂直于主轴方向(正方向)
- `wrap-reverse`换行方向垂直于主轴方向(负方向)

*以上两个代码可以合并写为`flex-flow`*

`justify-content`主轴方向排列方式,其值可为:

- `flex-stare`(默认)贴着主轴开始的位置
- `flex-end`贴着主轴结尾的位置
- `center`在主轴中居中位置
- `space-around`均分布局(子元素左右均分空隙)
- `space-between`均分布局(中间的子元素左右均分空隙)

`align-content`交叉轴排列方式,其值可为:

- `flex-start`

- `flex-end`

- `center`

- `space-around`

- `stretch`(默认)均分交叉轴宽度

  *没写的与`justify-content`的值相似*

`align-items`单行当中所有元素的对齐方式,其值包含`align-content`的所有值,除此之外还多一个baseline(首行基线对齐)

**以下内容添加在子元素（项目）中**

`order`展示序号,序号大的展示在后面.值可正可负可为0,默认为0.

`flex-shrink`元素的压缩(盒子必须没有足够空间)

- 0表示不被缩小

- (数值越大,缩小的越多)

  *多出来的部分\*(自己的shrink/总的shrink)*

`flex-grow`元素的拉伸(盒子必须有多余空间)

- 0表示不放大

- (数值越大,放大的越多)

  *比例分配方法与`flex-shrink`相似*

`flex-basis`定义默认宽度(一般不使用)

*`flex-shrink`与`flex-grow`可以合并写为`flex`*

- `auto`表示`flex-grow`为1,`flex-shrink`为1

- `none`表示`flex-grow`为0,`flex-shrink`为0

  *`flex`可以有第三个值,为`flex-basis`,但一般不适用*

`align-self`与`align-items`的值相同,表示单独控制自己的对齐方式,效果会覆盖`align-items`

## 15. 网格布局

**以下内容添加在父元素（容器）中**

`display:grid`网格布局

`display:inline-grid`行内网格布局

`grid-template-columns`与`grid-template-rows`分别定义属性的列宽和行高,可以设置如下值:

- 多个像素值或百分比,例如`100px 100px 100px`表示有3行(列),每行(列)为100px高(宽)
- 使用repeat(x,y)可以括号中可以传入两个参数表示添加x个y,例如:
    - `100px 100px 100px`可以写成`repeat(3, 100px)`
    - `30% 30% 20% 20%`可以写成`repeat(2, 30%) repeat(2, 20%)`
    - `100px 20px 80px 100px 20px 80px`可以写成`repeat(2, 100px 20px 80px)`
- 使用auto-fill作为repeat的第一个参数,表示尽可能多的填充,例如`repear(auto-fill, 100px)`表示每行(列)的高(宽)为100px,并且尽可能多的填充
- 利用fr单位表示比例关系且用比例表示的部分会尽量沾满空余位置,例如`1fr 1fr`则表示两行(列),且高(宽)度相同,`1fr 2fr`则表示两行(列),且第2行(列)的高(宽)度是第一行(列)的2倍,`150px 1fr 2fr;`表示有3行(列),第1行(列)为150px,且第3行(列)是第二行(列)的2倍
- 使用minmax(a,b)设置一个长度范围,表示最小为a,最大为b
- 使用auto关键字,由浏览器自动判断,尽量沾满空余位置
- 可以利用中括号给每一个网格线设置名称,例如:`[c1] 100px [c2] 100px [c3] auto [c4]`

`row-gap`与`column-gap`与`gap`,前两项分别定义行间距与列间距,`gap`是前两项的复合属性,举例如下:

```css
row-gap: 20px;
column-gap: 10px;
/* 以上代码可以简写为以下代码 */
gap: 20px 10px; /* 第一个参数是行间隔,第二个参数是列间隔,如果省略第二个参数则与第一个参数相同 */
```

*对于没有执行最新标准的浏览器,应添加`grid-`前缀*

`grid-template-areas`属性(感觉像是给每个格子命名的,个人使用不多,暂时不介绍了,今后再补充)

`grid-auto-flow`此属性决定了项目的排列方式,可以取如下值:

- row - 水平方式排列(默认值)
- column - 垂直方式排列
- row dense - 水平方式排列并尽量排满一行(后面的元素可能会排在前面)
- column dense - 垂直方式排列,并尽量排满一列(后面的元素可能会排在前面)

`justify-items`与`align-items`与`place-items`前两项设置了每一个项目的水平和竖直对齐方式,可以取如下值:

- start - 对齐单元格的起始边缘。
- end - 对齐单元格的结束边缘。
- center - 单元格内部居中。
- stretch - 拉伸，占满单元格的整个宽度（默认值）。

`place-items`属性是`align-items`属性和`justify-items`属性的合并简写形式,第一个值是竖直对齐方式,第二个值是水平对齐方式,如果省略第二个参数,则与第一个参数的值相同

`justify-content`与`align-content`与`place-content`前两项设置了容器的对齐方式,可以取如下值:

- start - 对齐容器的起始边框。
- end - 对齐容器的结束边框。
- center - 容器内部居中。
- stretch - 项目大小没有指定时，拉伸占据整个网格容器。
- space-around - 每个项目两侧的间隔相等。所以，项目之间的间隔比项目与容器边框的间隔大一倍。
- space-between - 项目与项目的间隔相等，项目与容器边框之间没有间隔。
- space-evenly - 项目与项目的间隔相等，项目与容器边框之间也是同样长度的间隔。

`place-content`属性是`align-content`属性和`justify-content`属性的合并简写形式,第一个值是竖直对齐方式,第二个值是水平对齐方式,如果省略第二个参数,则与第一个参数的值相同

`grid-auto-columns`与`grid-auto-rows`(应该是指定新增格子的宽与高,个人使用不多,暂时不介绍了,今后再补充)

`grid-template`是`grid-template-columns`、`grid-template-rows`和`grid-template-areas`这三个属性的合并简写形式

`grid`是`grid-template-rows`、`grid-template-columns`、`grid-template-areas`、 `grid-auto-rows`、`grid-auto-columns`、`grid-auto-flow`这六个属性的合并简写形式。

**以下内容添加在子元素（项目）中**

`grid-column-start`与`grid-column-end`与`grid-row-start`与`grid-row-end`这四个属性分别指定了项目的四个边框,分别是左边框所在的垂直网格线/右边框所在的垂直网格线/上边框所在的水平网格线/下边框所在的水平网格线,没有指定位置的项目的排序将由容器属性`grid-auto-flow`决定

*除了指定网格线序号外,还可以指定网格线的名字*

*此属性还可以使用`span`关键字,表示跨越多少个网格,在这种情况下`grid-column-start`与`grid-column-end`是相同的,`grid-row-start`与`grid-row-end`是相同的*

*如果项目产生重叠,则使用`z-index`属性指定重叠的顺序*

`grid-column`与`grid-row`分别是`grid-column-start`和`grid-column-end`的复合属性和`grid-row-start`和`grid-row-end`的复合属性,语法类似`grid-column: start/end`或`grid-row: start/end`

`grid-area`属性制定项目放在哪一个区域(好像是用到了项目的名字,我没怎么用过,以后再补充吧)

`justify-self`与`align-self`与`place-self`此三个属性与`justify-items`与`align-items`与`place-items`的作用相同,但只作用于这单个项目,取值如下:

- start:对齐单元格的起始边缘。
- end:对齐单元格的结束边缘。
- center:单元格内部居中。
- stretch:拉伸，占满单元格的整个宽度（默认值）。

`place-self`属性是`align-self`属性和`justify-self`属性的合并简写形式,先写竖直对齐方式,再写水平对齐方式,如果第二个值省略,则与第一个值相同

## 16. 语义化标签

`blockquote`大段引用(block)

- 其中cite属性表明引用自哪里

`q`小段引用(inline)

- 其中cite属性表明引用自哪里

`header`页眉

`nav`导航

`section`页面中板块

`article`页面中独立完整结构的内容

`aside`侧边栏/广告

`footer`页脚

`figure`图文信息

`figcaption` `figure`中的标题

例如:

**HTML**

```html
<figure>
	<figcaption>标题</figcaption>
    <img src="xxx">
</figure>
```

`address`联系地址

`meter`度量给定范围（gauge）内的数据,类似进度条

`progress`进度条