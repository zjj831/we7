<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/zepto/1.0rc1/zepto.min.js"></script>
    <script src="../addons/lwx_helloting/template/mobile/public/new/js/common.js"></script>
    <link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/new/css/common.css">
    <link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/login.css">
    <title>Document</title>
</head>
<body class="iphonex">
    <section class="box">
        <div id="login">
            <div class="one label">
                <img src="../addons/lwx_helloting/template/mobile/public/images/login_phone.png" alt="">
                <input id="user" name="user" type="text" placeholder="请输入您的手机号码">
            </div>
            <div class="two label">
                <img src="../addons/lwx_helloting/template/mobile/public/images/login_lock.png" alt="">
                <input id="password" name="password" type="password" placeholder="请输入您的验证码">
                <div class="sure">获取验证码</div>
            </div>
            <div class="login">
                <img src="../addons/lwx_helloting/template/mobile/public/images/login_btn.png" alt="">
            </div>
        </div>
    </section>

    <script>
        $("#user").on("focus",function(){
            $(this).css("outline","none");
        })
        $("#password").on("focus",function(){
            $(this).css("outline","none");
        })

        $('.login').on("touchend",function(){
            var tel=$('#user').val();
            var code=$('#password').val();
            $.ajax({
                url:"<?php  echo $this->createMobileUrl('feedback',array('op'=>'loginload'));?>",
                data:{tel:tel,code:code},
                dataType:"json",
                type:"post",
                success:function(data){
                    if(data.status==1){
                        window.location.href="http://h5.lwest.cn/we7/app/index.php?i=3&c=entry&do=feedback&m=lwx_helloting&from=singlemessage";
                    }else if(data.status==3){
                        alert("验证码错误");
                    }else if(data.status==5){
                        alert("请关注微信公众号hello汀");
                    }else if(data.status==4){
                        alert("验证码已失效,请重新获取");
                    }
                    else if(data.status==6)
                    {
                        alert('该手机已经绑定了其他的微信号');
                    }
                    else if(data.status==7)
                    {
                        alert('该微信号已经绑定了其他的手机');
                    }
                },
            })
        })


        $('.sure').on("touchend",function(){
            var login=$('#user').val();
            $.ajax({
                url:"<?php  echo $this->createMobileUrl('feedback',array('op'=>'logingetcode'));?>",
                type:"post",
                data:{tel:login},
                dataType:"json",
                success:function(data){
                    if(data.status==3){
                        alert("用户不存在");
                    }else if(data.status==1){
                        $('.sure').html("60");
                        var t=setInterval(end,1000);
                        function end(){
                            var time=$('.sure').html();
                            time--;
                            if(time<=0){
                                time="获取验证码";
                                $('.sure').html(time);
                                clearInterval(t);
                            }else{
                                $('.sure').html(time);
                            }
                        }
                    }
                },
            })
        })

    </script>
<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>