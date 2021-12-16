# node.js 学习笔记

node.js 官网：https://nodejs.org/zh-cn/

## node 常用命令

查看当前 node 的版本

```bash
node -v
```

## npm 常用命令

**查看当前 npm 版本**

```bash
npm -v
```

**查看全局安装路径**

```bash
npm config get prefix
```

**安装 xxx 包**

```bash
npm i xxx
```

加 `-g` 参数表示全局安装，加 `--registyr xxx` 参数表示从 xxx 源安装相应包。

**查看安装的包**

```bash
npm ls
```

加 `-g` 参数表示查看全局安装的包

**卸载安装的 xxx 包**

```bash
npm uninstall xxx
```

加 `-g` 参数表示卸载全局安装的包

## yarn 常用命令

**查看当前 yarn 版本**

```bash
yarn -v
```

**查看配置列表**

```bash
yarn config list
```

**修改下载包的地址为 xxx**

```bash
yarn config set registyr xxx
```

> 淘宝镜像：https://registry.npm.taobao.org

**安装 xxx 包**

```bash
yarn add xxx
```

全局安装包请使用 `yarn global add xxx`

**查看全局安装位置**

```bash
yarn global dir
```

**删除全局包 xxx**

```bash
yarn global remove xxx
```

**create 命令**

`yarn create xxx` 命令相当于先执行 `yarn global add create-xxx` 命令，再执行 `create-xxx` 命令。