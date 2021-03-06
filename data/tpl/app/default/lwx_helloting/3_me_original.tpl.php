<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<title>我的原创</title>
	<link href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/style.min.css">
	
	<!-- css Use as much as possible cdn -->

	
</head>
<body>
	<!-- head layout -->
	

	
	<div class="ih-box ih-box__primary">
		<?php  if(is_array($originalList)) { foreach($originalList as $original) { ?>
		
		<div class="ih-box__item ih-href" data-href="<?php  echo $this->createMobileUrl('list',array('op'=>'noteDetail','id'=>$original['id']));?>" data-id="<?php  echo $original['id'];?>">
			<div class="ih-box__hd">
				<div class="ih-hd__preview" 
				  <?php  if($original['thumb_url']['0']== "") { ?> 
				style="background:url(../addons/lwx_helloting/template/mobile/public/images/common_icon_picture.png) no-repeat;background-size: 100% 100%;background-position: 50% 50%;"
				<?php  } else { ?> 
				style="background:url(../attachment/lwx_helloting/<?php  echo $original['thumb_url']['0'];?>) no-repeat;background-size: 100% 100%;background-position: 50% 50%;"
				<?php  } ?>
				
				></div>
			
			</div>
			<div class="ih-box__bd">
				<p class="ih-bd__title"><?php  echo $nickname;?></p>
				<p class="ih-bd__content"><?php  echo $original['title'];?></p>
			</div>
			<div class="ih-box__ft">
				<div class="time">
					<?php  echo date('m-d',$original['createtime']);?>
				</div>
			</div>

			<div class="ih-box__item__out">
				<div class="ih-box__item__out_hd">
					删除
				</div>
				<div class="ih-box__item__out_ft">
					取消
				</div>
			</div>

		</div>
 		<?php  } } ?>
	</div>
	
	<!-- 提示框 -->
	<div class="ih-dialog__box">
		<div class="ih-mask"></div>
		<div class="ih-dialog">
			<div class="ih-dialog__hd">
				<div class="ih-dialog__title">
					提示
				</div>
			</div>
			<div class="ih-dialog__bd">
				提示内容
			</div>
			<div class="ih-dialog__ft">
				<div class="ih-btn__box">
					<div class="ih-btn ih-dialog__ok" style="color:#e96c68">确定</div>
				</div>
			</div>
		</div>
	</div>


	
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script src="https://cdn.bootcss.com/touchjs/0.2.14/touch.min.js"></script>
	<script src="../addons/lwx_helloting/template/mobile/public/js/common.js"></script>

	<script>
		;(function($) {
			$(".ih-box__item").off("swipeLeft").on("swipeLeft", function(e) {
				e.stopPropagation
				$(this).addClass("ih-active__transform");
			});


			// 取消删除
			$(".ih-box__item__out_ft").off("tap").on("tap", function(e) {
				e.stopPropagation();
				$(this).parents(".ih-box__item").removeClass("ih-active__transform");
			});

			// 删除

			$(".ih-box__item__out_hd").off("tap").on("tap", function(e) {
				e.stopPropagation();

				var _self = $(this);
				var $item = _self.parents(".ih-box__item");

				var _id = $item.data("id");

				$.ajax({
					url: "<?php  echo $this->createMobileUrl('person',array('op'=>'del_original'));?>",
					data: {
						id: _id
					},
					type: 'post',
					success: function(result) {
						if (result == 1) {
							ih.dialogAlert(null, "删除原创成功!", function () {
								$item.remove();
							});
						} else {
							ih.dialogAlert(null, "删除原创失败!");
						}
					}
				})
			});

		})(Zepto)
	</script>

	


<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>
