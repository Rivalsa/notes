# vue 学习笔记

vue官网：https://cn.vuejs.org/

## vue 2 

实例化对象时最为参数对象中的属性：

- el
- data
- methods
- customOption 可以通过 $options.customOption 取得
- computed
- created
- filters (vue 3 中被废弃）
- key
- template

HTML 中的 vue 语法或指令

- {{xxx}}
- :src
- v-text
- v-on:click（简写为 @click）（$event 为事件对象）
- v-cloak （与样式 `[v-cloak]{display:none;}` 配合）
- v-if
- v-else-if
- v-else
- v-for
- v-html
- v-show
- v-model
- v-bind
- v-once