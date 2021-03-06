<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>店铺设计与道具满意度</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            -webkit-appearance: none; //去掉浏览器默认样式
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            -webkit-touch-callout: none;
            box-sizing: border-box;
        }
    </style>
    <script>
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    if(clientWidth>=750){
                        // 这里的640 取决于设计稿的宽度
                        docEl.style.fontSize = '100px';
                    }else{
                        docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
                    }
                };

            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);
    </script>
    <link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/opening6.css">
</head>
<body>
    <h1>评个分吧</h1>
    <label>
        <span>店铺动线、布局是否合理</span>
        <select name="" id="dxbj" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>挂货量是否合理</span>
        <select name="" id="ghl" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>效果图是否完整(正常店铺3-5张)</span>
        <select name="" id="xgt" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>施工图是否完整、有误</span>
        <select name="" id="sgt" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>道具清单是否完整、有误</span>
        <select name="" id="djqd" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>图纸设计是否及时</span>
        <select name="" id="tzsj" class="one">
            <option value="100">点击打分</option>
            <option value="0">是</option>
            <option value="1">否</option>
        </select>
    </label>
    <label>
        <span>道具发货是否及时</span>
        <select name="" id="djfh" class="one">
            <option value="100">点击打分</option>
            <option value="0">是</option>
            <option value="1">否</option>
        </select>
    </label>
    <label>
        <span>设计师服务满意度</span>
        <select name="" id="sjsfw" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>工程监理服务满意度</span>
        <select name="" id="gcjlfw" class="one">
            <option value="100">点击打分</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </label>
    <label>
        <span>建议说明</span>
        <input type="text" id="jysm">
    </label>
    <button class="button">提交</button>
<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(".button").on("touchend",function(){
        var dxbj=$("#dxbj").val();
        var ghl=$("#ghl").val();
        var xgt=$("#xgt").val();
        var sgt=$("#sgt").val();
        var djqd=$("#djqd").val();
        var tzsj=$("#tzsj").val();
        var djfh=$("#djfh").val();
        var sjsfw=$("#sjsfw").val();
        var gcjlfw=$("#gcjlfw").val();
        var jysm=$("#jysm").val();

        if(dxbj=="100"||ghl=="100"||xgt=="100"||sgt=="100"||djqd=="100"||tzsj=="100"||djfh=="100"||sjsfw=="100"||gcjlfw=="100"||jysm=="100"){
            $(this).attr("disabled",true);
            alert("请完善信息");
            return;
        }


        var d1=[];
        b1=[dxbj,ghl,xgt,sgt,djqd,tzsj,djfh,sjsfw,gcjlfw,jysm];
        sessionStorage.b1=b1;
        var a1=sessionStorage.a1;
        var b1=sessionStorage.b1;
        var e=a1+','+b1;
        var stu={
            studentone:a1,
            studenttwo:b1,
        }
        console.log(a1);
        $.ajax({
            url:"<?php  echo $this->createMobileUrl('feedback',array('op'=>'shop_feedback'));?>",
            data:{"e":e},
            dataType:"json",
            type:"post",
            success:function(data){
                console.log(data);
                if(data==1){
                    window.location.href="http://h5.lwest.cn/we7/app/index.php?i=3&c=entry&op=myTing&do=feedback&m=lwx_helloting";
                }
            }
        })

    });
</script>