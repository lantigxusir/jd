/*
 * @Author: zhengwei
 * @Date:   2016-12-18 10:14:10
 * @Last Modified by:   zhengwei
 * @Last Modified time: 2016-12-19 15:32:48
 */

'use strict';
window.onload = function() {
    // 调用搜索框渐变JS特效
    search();
    //倒计时JS
    downTime();
    //调用轮播图JS
    reSlide();
};
//轮播图JS
function slide() {
    var index = 0;
    var slideWidth = document.querySelector('#slide').offsetWidth;
    var slideUl = document.querySelector('#slide > ul');
    var slideLI=document.querySelectorAll("#slide >ul >li");
    var len=slideLI.length;
    var slide = document.querySelector('#slide');
    slideUl.addEventListener('transitionend', function() {
        if (index == len) {
            index =len-1;
            slideUl.style.transform = "translateX(" + -index * slideWidth + "px)";
            slideUl.style.transition = "none";
        } else if (index <= 0) {
            index =0;
            slideUl.style.transform = "translateX(" + -index * slideWidth + "px)";
            slideUl.style.transition = "none";
        }
    });
    var startX = 0,
        endX = 0,
        moveX = 0,
        distanceX = 0;
    slide.addEventListener('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });
    slide.addEventListener('touchmove', function(e) {
        moveX = e.touches[0].clientX;
        distanceX = moveX - startX;
        slideUl.style.transform = "translateX(" + (-index * slideWidth ) + "px)";
        slideUl.style.transition = "none";
    });
    slide.addEventListener('touchend', function(e) {
        if (Math.abs(distanceX) > slideWidth / 4) {
            endX = e.changedTouches[0].clientX;
            if (endX - startX > 0) {
                index--;
                slideUl.style.transform = "translateX(" + -index * slideWidth + "px)";
                slideUl.style.transition = "all 0.2s";
            } else if (endX - startX < 0) {
                index++;
                slideUl.style.transform = "translateX(" + -index * slideWidth + "px)";
                slideUl.style.transition = "all 0.2s";
            }
        } else {
            slideUl.style.transform = "translateX(" + -index * slideWidth + "px)";
            slideUl.style.transition = "all 0.2s";
        }
    });
}

function reSlide(){
    var index=0;
    var w = parseInt($('#slide').width());
    var len=$("#slide ").find("li").length;
    $('#slide >ul').on("transitionend",function () {
        if (index == len) {
            index =len-1;
            $('#slide >ul').css({
                "transform":"translateX(" + -index * w + "px)",
                "transition":"none"
            })
        } else if (index <= 0) {
            index =0;
            $('#slide >ul').css({
                "transform":"translateX(" + -index * w + "px)",
                "transition":"none"
            })
        }
    })
    var count=0;
    var startX = 0,
        endX = 0,
        moveX = 0,
        distanceX = 0;
    $('#slide').on('touchstart', function(e) {
        startX = e.touches[0].clientX;
    });
    $('#slide').on('touchmove', function(e) {
        moveX = e.touches[0].clientX;
        distanceX = moveX - startX;
        $('#slide >ul').css({
            "transform":"translateX(" + -index * w + "px)",
            "transition":"none"
        })
    });
    $('#slide').on('touchend', function(e) {
        if (Math.abs(distanceX) > w / 4) {
            endX = e.changedTouches[0].clientX;
            if (endX - startX > 0) {
                index--;
                $('#slide >ul').css({
                    "transform":"translateX(" + -index * w + "px)",
                    "transition":"all 0.2s"
                })
            } else if (endX - startX < 0) {
                index++;
                $('#slide >ul').css({
                    "transform":"translateX(" + -index * w + "px)",
                    "transition":"all 0.2s"
                })
            }
        } else {
            $('#slide >ul').css({
                "transform":"translateX(" + -index * w + "px)",
                "transition":"all 0.2s"
            })
        }
        count=-index * w;
        console.log(count);
    });
}
//倒计时JS特效
function downTime() {
    /**
     * 1. 要从5小时每秒减1秒的倒计时
     * 2. 最终把减完1秒后的时间 计算 时分秒 放到页面上
     *  a. 定义一个5小时的时间  用秒数(1*60*60 == 3600)
     *  b. 设置一个定时器 定时器的时间为1000 毫秒
     *  c. 在定时器里面每次总时间 -- 
     *  d. 减完后分别计算当前总时间的   时分秒
     *  e. 时 3600 / 60 / 60 == 1 总时间 / 60 /60    总时间 / 3600 == 小时数
     *  f. 分 200 / 60 == 3  总时间  7400 % 3600 == 2 余 200 / 60 == 3 总时间 % 3600 / 60 == 分钟数
     *  g. 秒数 3640 == 40 3640 % 60 == 40    40 % 60 == 40 总时间 % 60
     */
    // 5000 / 60   83 % 60 == 23
    // 3800 % 3600 == 200     
    // a. 定义一个5小时的时间  用秒数(1*60*60 == 3600)
    // var time = 5 * 60 * 60;
    //现在的当前时间
    // var nowdate = new Date().getTime();
    //未来时间
    // var futuredate = new Date("December 19,2016 10:11:00").getTime();

    // time = Math.floor((futuredate - nowdate) / 1000);
    //从未来时间 减去 当前的时间 求到这之间的总秒数  假设一个未来的时间 今天中午12:00
    //获取当前时间的毫秒数
    var date1 = new Date("December 19,2016 12:00:00").getTime();
    // console.log(date);
    var date2 = new Date().getTime();
    // console.log((date1 - date2) / 1000);
    var time = (date1 - date2) / 1000;
    // b. 设置一个定时器 定时器的时间为1000 
    setInterval(function() {
        // time--;
        var date2 = new Date().getTime();
        time = (date1 - date2) / 1000;
        var shi = time / 3600;
        var fen = time % 3600 / 60;
        var miao = time % 60;
        var spans = document.querySelectorAll('.seckill-time > span');
        spans[0].innerHTML = Math.floor(shi / 10); //小时的十位数 23 / 10 == 2
        spans[1].innerHTML = Math.floor(shi % 10); // 小时是个位数 23 % 10 == 3
        spans[3].innerHTML = Math.floor(fen / 10); //分钟的十位数 23 / 10 == 2
        spans[4].innerHTML = Math.floor(fen % 10); // 分钟是个位数 23 % 10 == 3
        spans[6].innerHTML = Math.floor(miao / 10); //秒数的十位数 23 / 10 == 2
        spans[7].innerHTML = Math.floor(miao % 10); // 秒数是个位数 23 % 10 == 3
    }, 1000);
}
//搜索框渐变JS特效
function search() {
    /**
     * 1. 搜索框渐变是在轮播图区域里面渐变 
     * 2. 滚动条在轮播图区域滚动的时候 滚动的距离越大 透明度值越大
     * 3. 当滚动条滚动的距离超过轮播图区域 就固定一个透明度值0.8
     *  a. 获取搜索框容器
     *  b. 监听一个滚动条滚动的事件
     *  c. 在事件里面不断的获取滚动条滚动的距离
     *  b. 获取轮播图容器的高度 
     *  e. 用滚动条的距离 / 轮播图容器的高度  == 透明度值          
     *  f. 最后将计算好的透明度值设置到搜索框容器身上
     *  g. 判断一下当滚动条的距离超过了 轮播图区域 就固定一个透明度值
     */
    // a. 获取搜索框容器
    var header = document.querySelector('#header');
    // b. 监听一个滚动条滚动的事件
    window.addEventListener('scroll', function() {
        // c. 在事件里面不断的获取滚动条滚动的距离
        var scrollTop = document.body.scrollTop;
        // b. 获取轮播图容器的高度 
        var slideHeight = document.querySelector('#slide').offsetHeight;
        // e. 用滚动条的距离 / 轮播图容器的高度  == 透明度值
        var opcity = scrollTop / slideHeight * 0.85;
        // f. 最后将计算好的透明度值设置到搜索框容器身上
        header.style.background = "rgba(201,21,35," + opcity + ")";
        // g. 判断一下当滚动条的距离超过了 轮播图区域 就固定一个透明度值
        if (scrollTop > slideHeight) {
            header.style.background = "rgba(201,21,35,0.85)";
        }
    });
}

