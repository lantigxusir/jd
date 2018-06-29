1. 移动web的布局方式 流式布局 (百分比布局)
2. 回顾了Bootstrap each 深度自定义Bootstrap Bootstrap实例
3. 搭建JD项目的骨架
4. 移动端设备的真实(CSS像素)像素 和 物理像素(分辨率)的区别 和之间的比率关系
 在移动端的retina 图片设计得是按照分辨率来设计(会比真实的图片大一倍) 在CSS里面写样式的时候要把图片缩小一倍
 5. 主体布局容器max-width min-width
 6. 主页头部的自适应布局

 1. 写得慢
 2. 什么情况下要用百分比 什么情况下固定宽高
 	盒子写死了固定的宽高 里面的图片的宽高也是写死
 	盒子的宽度会随着屏幕宽度变化 就是盒子宽度写了百分比布局 里面的图片就也会使用百分比 
 3. less是所有浏览器都不支持的 最终都要转换成CSS浏览器才能认识
 	之所以    <link rel="stylesheet/less" href="less/index.less"> 能生效
 	是因为 <script src="lib/less/less.js"></script> 临时编译器
 	会临时把less文件编译成CSS嵌入到HTML里面	
 	上线是要编译成CSS引入进页面
 1. 倒计时JS特效
 2. 倒计时优化 new Date() 可以传人5种参数去设置一个具体的时间的毫秒数
 3. 轮播图支持自动无缝轮播 
 	 过渡完成事件 transtionend
 4. 轮播图支持左滑右滑切换图片