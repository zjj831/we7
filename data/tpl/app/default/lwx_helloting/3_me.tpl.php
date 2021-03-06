<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<title>我</title>
	<link href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/style.min.css">

<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/me.min.css">

</head>
<body>
	<!-- head layout -->
<div class="me-box">
	<header>
		<div class="header-background__bg">
			<div class="header-background__filter"></div>
		</div>
		<div class="header-image">
			<img src="<?php  echo $avatar;?>" alt="">
		</div>
		<div class="header-onedit">
			<div class="header-onedit__name"><?php  echo $nickname;?></div>
			<div class="header-onedit__qm">
				<!-- <div class="input-icon"></div> -->
				<div class="header-onedit__input_box" style="height:30px;">
					<div class="header-onedit__input" style="min-width:40px;height:30px;" contenteditable="true" placeholder="点击此处编辑您的个性签名"><?php  echo $member['description'];?></div>
				</div>
			</div>	
		</div>
	</header>
	<section>
		<div class="section-box">
			<div class="section-list__link ih-href" data-href="<?php  echo $this->createMobileUrl('person',array('op'=>'me_original'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_icon_original.png" alt="">我的原创</div>
			
			<div class="section-list__link ih-href" data-href="<?php  echo $this->createMobileUrl('person',array('op'=>'me_collect'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_icon_collect.png" alt="">我的收藏</div>
			
			<div class="section-list__link ih-href" data-href="<?php  echo $this->createMobileUrl('person',array('op'=>'me_follow'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_btn_like_s.png" alt="">我的关注</div>
		</div>
		<div class="section-box">
			<!-- <div class="section-list__link"><img src="../addons/lwx_helloting/template/mobile/public/images/common_btn_reward.png" alt="">我的打赏</div> -->
			<div class="section-list__link ih-href" data-href="<?php  echo $this->createMobileUrl('good',array('op'=>'myorder'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_icon_dingdan.png" alt="">我的订单</div>
		</div>
		<div class="section-box">
			<div class="section-list__link ih-href" data-href="<?php  echo $this->createMobileUrl('person',array('op'=>'me_feedback'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_icon_fankui.png" alt="">我的反馈</div>
		</div>
		<div class="section-box">
			<div class="section-list__link ih-href"  data-href="<?php  echo $this->createMobileUrl('person',array('op'=>'my_setup'));?>"><img src="../addons/lwx_helloting/template/mobile/public/images/common_icon_settings.png" alt="">设置</div>
		</div>
	</section>
</div>


	<!-- foot layout -->
	<footer>
		<div class="footer-but ih-href" data-href="<?php  echo $this->createMobileUrl('feedback');?>">
			<img class="footer__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_home_n.png" alt="">
			<img class="footer-active__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_home_s.png" alt="">
			<div>主页</div>
		</div>
		<div class="footer-but ih-href" data-href="<?php  echo $this->createMobileUrl('feedback', array('op'=>'message'));?>">
			<img class="footer__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_message_n.png" alt="">
			<img class="footer-active__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_message_s.png" alt="">
			<div>消息</div>
		</div>
		<div class="footer-but release-info ih-href" data-href="<?php  echo $this->createMobileUrl('feedback', array('op'=>'publish'));?>">
			<img src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_release.png" alt="">
		</div>
		<div class="footer-but ih-href" data-href="<?php  echo $this->createMobileUrl('feedback', array('op'=>'myTing'));?>">
			<img class="footer__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_form_n.png" alt="">
			<img class="footer-active__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_form_s.png" alt="">
			<div>我★汀</div>
		</div>
		<div class="footer-but ih-href" data-href="<?php  echo $this->createMobileUrl('feedback', array('op'=>'me'));?>">
			<img class="footer__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_me_n.png" alt="">
			<img class="footer-active__image" src="../addons/lwx_helloting/template/mobile/public/images/common_nav_btn_me_s.png" alt="">
			<div>我</div>
		</div>
	</footer>

	
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script src="https://cdn.bootcss.com/touchjs/0.2.14/touch.min.js"></script>
	<script src="../addons/lwx_helloting/template/mobile/public/js/common.js"></script>

	<script type="text/javascript">
		;(function($) {
			$(".footer-but").eq(4).addClass("footer-active");

			$(".footer-but").on("tap", function() {
				location.href = $(this).data("href");
			});


			// div contenteditable 模拟 input

			var $input = $(".header-onedit__input");
			var _placeholder = $input.attr("placeholder");
			var editReg = /<[^>]+>/g;

			// 将 html 元素转变为 ""
			var _text = $.trim($input.html()).replace(editReg, "");

			if (_text == "") {
				$input.html(_placeholder);
			}

			$(".header-onedit__input").focus(function() {
			    $(this).css("border","1px solid yellow;");
			    $(this).css("width","80%");
				var _self = $(this);
				var _contentVlue = $.trim($input.html()).replace(editReg, "");
				if (_contentVlue == _placeholder) {
					_self.html("");
				}

				_self.addClass("active");

			}).blur(function() {
                $(this).css("border","none");
				var _self = $(this);
				var _contentVlue = $.trim(_self.html()).replace(editReg, "");

				if (_contentVlue == _placeholder) {
					_contentVlue = "";
				}

				if (_contentVlue == "") {
					$input.html(_placeholder);
				}

				$.ajax({
					url: "<?php  echo $this->createMobileUrl('person',array('op'=>'editmystyle'));?>",
					data: {
						content: _contentVlue
					},
					type: "post",
					dataType: "json",
					success: function(result) {
						if (result == 1) {
							_self.removeClass("active");
						} else {
							_self.blur();
							_self.removeClass("active");
							console.log(result);
						}
					}

				})
			});
		})(Zepto)
	</script>

<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>
