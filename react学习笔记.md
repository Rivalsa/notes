# React学习笔记

React是一个声明式，高效灵活的用于构建用户界面的JavaScript库。

使用React可以将一些简短、独立的代码片段组合成复杂的UI界面，这些代码片段称为**组件**。

举例，创建一个包含2个子节点的DOM节点：

```javascript
// 原生JavaScript
let oDiv = document.createElement('div'),
    oP = document.createElement('p'),
    oSpan = document.createElement('span');
oDiv.className = 'box';
oP.innerText = 'This is a p';
oSpan.innerText = 'This is a span';
oDiv.appendChild(oP);
oDiv.appendChild(oSpan);

// React JS
const ele = React.createElement(
    'div',
    {className: 'box'},
    React.createElement('p', null, 'This is a p'),
    React.createElement('span', null, 'This is a span')
);

// JSX语法(JavaScript和XML)
const ele = (
    <div className='box'>
    <p>this is a p</p>
    <span>this is a span</span>
    </div>
);
```

`React.createElement(type[, props][, ...children])`是一个函数，参数`type`是节点类型（如`div`、`p`等），props为节点属性，需要传一个JS对象，其余参数为子节点（传字符串即为文本节点，传React元素对象即为元素节点），返回一个React元素节点。

从上面例子中可以看出JSX的清晰简洁性，但JSX语法浏览器不能识别，所以通常写JSX语法后需要编译称为浏览器能识别的React JS语法。

编译JSX可以利用`<script src="..."></script>`来引入`babel-standalone`，在写JSX的语法的`script`标签中添加`type="text/babel"`属性，这样浏览器就能识别其中的JSX语法并将其转换为React JS语法。例如：

```html
<script src="https://static.rivalsa.net/code/react-16_13_1/babel_min.js"></script>
<script type="text/babel">
	// ...
</script>
```

要想使用React还需要再引入react和react-dom两个库，前者主要负责UI界面，后者主要负责DOM操作。例如：

```html
<script src="https://static.rivalsa.net/code/react-16_13_1/react_development.js"></script>
<script src="https://static.rivalsa.net/code/react-16_13_1/react-dom_development.js"></script>
```

如果想将完整的库下载到本地，可以利用node.js下载，如下命令供参考：

```bash
npm i yarn -g 安装yarn
yarn config set registry https://registry.npm.taobao.org 调整安装源
yarn add babel-standalone react react-dom 下载三个库
```

## JSX语法

JSX会被自动转换为React元素对象。

JSX中指定类名时应写作`className`，指定表单的`value`时应写作`defaultValue`（如果使用`value`则无论按下什么键内容都不会变，除非修改value值）

JSX指定行内样式时需要用大括号包裹一个样式对象，例如：

```jsx
const ele1 = (
    <div style={{color: "red", backgroundColor: "skyblue"}}>一段文字</div>
);
{/* 或者 */}
const myStyle = {
    color: 'red',
    backgroundColor: 'skyblue'
};
const ele2 = (
    <div style={myStyle}>一段文字</div>
);
```

插值符号`{}`可以将某个变量值或表达式值直接放入对应位置，对于数组，则会依次插入所有元素，无需遍历，例如：

```jsx
const a = '我是一段文字',
    b = ['数组元素1', '数组元素2'],
    ele = (
        <div>
            <p>{a}</p>
            <p>{b}</p>
        </div>
    );
```

JSX中的内容要符合XML规则，所有标签都必须是双标签，例如：

```jsx
{/* 正确 */}
<br />
{/* 错误 */}
<br>
```

JSX中只能有一个根节点，如果需要绑定多个空节点，可以用`<React.Fragment>...</React.Frement>`套起来（`<>...</>`是它的语法糖），例如：

```jsx
{/* 正确 */}
<React.Fragment>
    <div className="box">
        <h1>hello JSX</h1>
    </div>
    <p>this is a p</p>
</React.Fragment>
{/* 正确 */}
<>
    <div className="box">
        <h1>hello JSX</h1>
    </div>
    <p>this is a p</p>
</>
{/* 错误 */}
<div className="box">
    <h1>hello JSX</h1>
</div>
<p>this is a p</p>
```

在遍历数组时，需要给每个元素绑定一个独一无二的key，例如：

```jsx
const names = ['aaa', 'bbb' , 'ccc'],
      ele = (
          <div>
              {
                  names.map((item, i) => {
                      return (
                          <p key={i}>{i}:{item}</p>
                      );
                  })
              }
          </div>
      );
```

绑定事件时只能绑定行内事件，事件名称用小驼峰表示，事件函数用插值符号引入即可，例如：

```jsx
const ele = (
    <h1 onClick={fn}>test</h1>
);
```

可以通过`<组件名 属性=值 属性=值...>`的方式来调用组件，组件名的首字母必须大写。

## ReactDOM

`ReactDOM.render(element, container[, callback])`在提供的container中渲染一个React元素，并返回对该组件的引用（无状态组件返回null）。如果提供了可选的回调函数，则会在组件被渲染后执行。

## 组件

### 函数组件

一个函数（函数名首字母大写），返回一段JSX就可以理解为一个函数组件，例如：

```jsx
function Fn(props) {
    console.log(props);
    return (
        <div>
            <h1>{props.dream}</h1>
        </div>
    );
}
{/* 可以通过<Fn dream="test"/>来调用这个组件 */}
```

### 类组件（常用）

通常创建一个继承`React.Component`的类作为组件，类名就是组件名（必须首字母大写）

在类中需要创建一个名为`render`的公共函数，此函数的返回值为该组件实际要渲染的内容。

类中可以有一个`state`对象，表示组件的状态，此对象可以用`setState`方法来修改其中的内容，在修改后会自动重新渲染修改后的内容。

```jsx
class Fn extends React.Component {
    state = {
        dream: '我是dream'
    }
    myClick() {
        this.setState({
            dream: '新dream'
        });
    }
    render() {
        return (
            <div>
                <h1 onClick={this.myClick.bind(this)}>{this.state.dream}</h1>
            </div>
        );
    }
}
```

在类中可以用`props`来获取调用组件时设置的属性及属性值。