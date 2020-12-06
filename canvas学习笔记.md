# canvas学习笔记

canvas默认的CSS属性

- display:inline
- width:300px
- height:150px

## 显示尺寸和画布尺寸

通过调整CSS的width和height属性可以调整canvas的显示尺寸（相当于将整个canvas进行缩放，而不是调整canvas画布的大小）。

通过调整canvas标签的width和height属性可以调整canvas画布的尺寸（不影响内部图形的尺寸）。

## 正方向

水平轴（x轴，横坐标）的正方向为向右。

竖直轴（y轴，纵坐标）的正方向为向下。

角度/弧度的正方向为从x轴方向指向y轴方向，即顺时针。

## 上下文

通过`getContext(a)`函数来获取canvas的上下文。如果绘制2D图像，则参数a应为字符串`2d`。函数返回对应canvas的上下文。

```javascript
const testCanvas = document.createElement('canvas'),
      testCanvasContext = testCanvas.getContext('2d');
// ...
document.body.appendChild(testCanvas);
```

> 下文中就写创建canvas、获取上下文及将canvas添加到body中的代码了，默认认为`testCanvasContext`就是获取好的上下文。

## 绘制图形

绘制图形函数的返回值均为`undefined`。

### 可直接绘制的图形

可直接绘制的图形是指可以通过一个函数，在描述了要绘制的图形的同时将图形绘制在画布上。

**绘制实心矩形**

通过`fillRect(a, b, c, d)`函数可以绘制一个实心矩形。参数`a`为矩形左上定点的横坐标，参数`b`为矩形左上定点的纵坐标，参数`c`为矩形的宽度，参数`d`为矩形的高度。

```javascript
testCanvasContext.fillRect(20,20,50,80);
```

**绘制矩形边框**

通过`strokeRect(a, b, c, d)`函数可以绘制一个矩形边框。参数`a`为矩形左上定点的横坐标，参数`b`为矩形左上定点的纵坐标，参数`c`为矩形的宽度，参数`d`为矩形的高度。

```javascript
testCanvasContext.strokeRect(20,20,50,80);
```

**清除矩形区域**

通过`clearRect(a, b, c, d)`函数可以清除一个矩形区域。参数`a`为矩形左上定点的横坐标，参数`b`为矩形左上定点的纵坐标，参数`c`为矩形的宽度，参数`d`为矩形的高度。

```java
testCanvasContext.fillRect(20,20,100,100);
testCanvasContext.clearRect(30,30,50,80);
```

### 无法直接绘制的图形

无法直接绘制的图形必须要先通过函数描述要绘制的图形，然后再通过另一个函数进行绘制。

#### 描述

**矩形**

通过`rect(a,b,c,d)`函数可以描述一个矩形。参数`a`为矩形左上定点的横坐标，参数`b`为矩形左上定点的纵坐标，参数`c`为矩形的宽度，参数`d`为矩形的高度。

```javascript
testCanvasContext.rect(20,20,50,80);
```

**圆弧**

通过`arc(a,b,c,d,e,f)`函数可以描述一个圆弧。参数`a`为圆心的横坐标，参数`b`为圆心的纵坐标，参数`c`为圆弧的半径，参数`d`为圆弧的起始弧度，参数`e`为圆弧的终止弧度，参数`f`表示是否反方向，值为`true`表示反方向（即负方向），值为`false`表示正方向。

```javascript
testCanvasContext.arc(100,100,50,0,Math.PI / 2,true);
```

**路径**

通过`beginPath()`函数可以开始一个新的路径。

通过`moveTo(a,b)`函数可以设置某点为路径中描述图形的起点。参数`a`为横坐标，参数`b`为纵坐标。

通过`closePath()`函数可以闭合路径。

如果使用`fill()`进行填充绘制时，系统会自动闭合图形。

**路径 - 线段**

通过`lineTo(a,b)`函数可以描述一条到指定点的线段。参数`a`为横坐标，参数`b`为纵坐标。

**路径 - 圆弧转角**

通过`arcTo(a,b,c,d,e)`函数可以描述一条到指定点的圆弧。参数a为转角点的横坐标，参数b为转角点的纵坐标，参数c为圆弧终点的横坐标，参数d为终点的纵坐标，参数e为圆弧的半径。转角点为终点向圆弧前的直线做垂线的垂足。

**路径 - 一次贝塞尔曲线**

 通过`quadraticCurveTo(a,b,c,d)`函数可以描述一次贝塞尔曲线。参数a为控制点的横坐标，参数b为控制点的纵坐标，参数c为终点的横坐标，参数d为终点的纵坐标。

**路径 - 二次贝塞尔曲线**

 通过`bezierCurveTo(a,b,c,d,e,f)`函数可以描述二次贝塞尔曲线。参数a为控制点1的横坐标，参数b为控制点1的纵坐标，参数 c为控制点2的横坐标，参数d为控制点2的纵坐标,参数e为终点的横坐标，参数f为终点的纵坐标。

#### 绘制

**直接绘制**

通过`stroke()`函数可以绘制已描述的图形。

**填充绘制**

通过`fill()`函数可以绘制已描述的图形，并在内部填充颜色。

### 绘制属性

**绘制颜色**

可以通过调整`strokeStyle`属性来调整“直接绘制”的颜色。

```javascript
testCanvasContext.strokeStyle = 'blue';
```

可以通过调整`fillStyle`属性来调整“填充绘制”的颜色。

```javascript
testCanvasContext.fillStyle = 'red';
```

**线条宽度**

可以通过调整`lineWidth`属性来调整线条宽度，线条宽度外部一半，内部一半，推荐使用偶数。

```javascript
testCanvasContext.lineWidth = 20;
```

**线条转角**

可以通过调整`lineJoin`属性来调整线条转角，有如下属性值可以选择。

- minter 尖角（默认值）
- round 圆角
- bevel 斜角

```javascript
testCanvasContext.lineJoin = 'round';
```

**线条端点**

可以通过调整`lineCap`属性来调整线条端点，有如下属性值可以选择。

- butt 无（默认值）
- round 圆角
- square 矩形

```javascript
testCanvasContext.lineCap = 'round';
```

## 变换

（待编写）

## 保存与恢复

通过`save()`函数可以保存当前的属性及样式，供需要时恢复。

通过`restore()`可以恢复之前已保存的属性及样式。