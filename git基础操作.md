# git 操作

**配置信息**

```git
git config --global user.name "Rivalsa"
git config --global user.email "sa@rivalsa.cn"
```

*`--global`表示全局,如果没有这个参数则本次配置只适用于本仓库*

**初始化**

```git
git init
```

**所有文件放入暂存区**

```git
git add .
```

**查看当前仓库里所有文件的状态**

```git
git status
```

**查看一个文件修改了哪一部分**

```git
git diff 文件名
```
**缓存区文件提交到本地仓库**

```git
git commit -m"描述"
```

**撤销为暂存的修改**

```git
git restore 文件名(或.)
```

**撤销已添加到暂存区的修改**

```git
git restore --staged 文件名(或.)
```

**查看所有版本**

```git
git log
```

**回退到某版本**

```git
git reset --hard 版本号
```

**查看每一次命令记录**

```git
git reflog
```

**对历史版本进行管理**

```git
git rebase -i 版本号
```

**创建密钥**

```git
ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
```

*密钥创建在~/.ssh/*

**从远程仓库客隆默认分支**

```git
git clone 远程仓库地址
```

**从远程仓库客隆指定分支**

```git
git clone -b 分支名 远程仓库地址
```

**推送到远程仓库master分支**

```git
git push origin master
```

*可以在`push`后面加`-f`参数来强制`push`*

**关联origin到某个远程仓库**

```git
git remote add origin https://github.com/******/*****.git
```

**查看当前origin**

```git
git remote show origin
```

**修改origin地址**

```git
git remote set-url origin https://github.com/******/*****.git
```

**删除origin地址**

```git
git remote rm origin
```

**创建分支**

```git
git branch 分支名
```

**查看分支**

```git
git branch
```

**查看所有分支（包括远程分支）**

```git
git branch -a
```

**切换分支**

```git
git switch 分支名   (推荐)
或
git checkout 分支名
```

**在本地创建一个与远程分支相同的分支并切换到此分支**

```git
git checkout -b 本地分支名 远程分支名
```

**在本地创建一个与远程分支相同且同名的分支并切换到此分支**

```git
git checkout -t 远程分支名
```

**删除分支**

```git
git branch -d 分支名
```

**创建并切换至分支**

```git
git switch -c 分支名
```

**将分支合并到当前分支**

```git
git merge 分支名
```

**将分支合并到当前分支(不使用快速合并)**

```git
git merge --no-ff -m"版本信息" 分支名
```

**查看分支的历史**

```git
git log --graph --pretty=online --avvrev-commit
```

**将未提交的代码隐藏**

```git
git stash
```

**显示隐藏的代码列表**

```git
git stash list
```

**恢复隐藏的代码**

```git
git stash pop
```
