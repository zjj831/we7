<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<title>发布Po图</title>
	<link href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/style.min.css">
<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/po.min.css">
</head>
<body>
<div class="sekuai" style="width:45px;height:45px;display: none;position:absolute;right:0;top:0;"></div>
	<!-- head layout -->
	<div class="po-box">
		<div class="ih-title">
			<div class="ih-title__item not js-not">取消</div>
			<div class="ih-title__item po-wz">写文章</div>
			<div class="ih-title__item po-rh">
				<div class="yl">预览</div>
				<div class="fb">发布</div>
			</div>
		</div>
		<div class="ih-title weui-cell">
	        <div class="weui-cell__bd">
	            <input class="weui-input js-title" type="text" placeholder="标题">
	        </div>
	    </div>
	    <div class="weui-cells_form js-form_height">
	        <div class="weui-cell">
	        	<div class="po-text js-content" contentEditable="true" placeholder="分享美好生活方式.">分享美好生活方式.</div>
	        </div>
	    </div>
	    <div class="po-bottom__rh">
	    	<div class="add">
	    		<div class="add-s js-click_img">
	    			<img src="../addons/lwx_helloting/template/mobile/public/images/common_btn_pho.png" alt="">
	    		</div>
	    	</div>
	    </div>
	</div>
	<!-- 弹出层 -->
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

	 <!--预览效果-->
	<div class="ih-box__yl">
		<div class="ih-title">
			<div class="ih-title__item not js-notyl">取消</div>
			<div class="ih-title__item po-wz">预览</div>
			<div class="ih-title__item po-rh">
				<div class="yl"></div>
				<div class="fb">发布</div>
			</div>
		</div>
		<section class="ih-boxs">
				<div class="ih-hd__title">
					<h1 class="js-title__yl">哥哥</h1>
				</div>
				<div class="ihjs-content">
				</div>
				<div class="ih-bd__box">
					<ul class="weui-media-box__info ih-media-box__info">
		                <li class="weui-media-box__info__meta ih-media-box__info__meta weui-media-box__info__meta_extra">点赞 <span class="js-dztext">0</span></li>
		                <li class="weui-media-box__info__meta ih-media-box__info__meta">创建于 <?php  echo date('m-d', time())?></li>
		            </ul>
				</div>
				</div>
				<div class="ih-bd__box">
					<div class="ih-function__info">
						<div class="ih-function-praise__info js-goods_n"></div>
					</div>
				<!-- 点赞头像列表 -->
				</div>
		</section>
	</div>


	<div id="data"></div>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.min.js"></script>
	<script src="https://cdn.bootcss.com/touchjs/0.2.14/touch.min.js"></script>
	<script src="../addons/lwx_helloting/template/mobile/public/js/common.js"></script>	
	<script>
		(function($) {
			var Main = {
				handleWeixinJssdk: function() {
					// wechat .config
					wx.config({
					      debug: false,

					      appId: "<?php  echo $appId;?>",

					      timestamp: "<?php  echo $timestamp;?>",

					      nonceStr: "<?php  echo $nonceStr;?>",

					      signature: "<?php  echo $signature;?>",

					      jsApiList: [

					          'openLocation',

					          'getLocation',

					          'chooseImage',

					          'previewImage',

					          'uploadImage',

					          'downloadImage',

					      ]

					  });



				},
				handleFocusInput: function() {
					$(".po-text").focus(function() {
						var _self = $(this);
						if (_self.html() == _self.attr("placeholder")) {
							_self.html("");
						}
					}).blur(function() {
						if(!$.trim($(this).html()) != "") {
							$(this).html($(this).attr("placeholder"));
						}
					});
				},
				handleOutBack: function(e) {
					$(e).on("click", function() {
						history.go(-1);
					});
				},
				handleCommit: function(e) {
					$(".fb").on("touchend",function(){
						var _title = $.trim($(".js-title").val());
						var _content = $.trim($(".js-content").html());

						if (_title == "") {
							ih.dialogAlert(null, "标题不能为空");
							return false;
						}

						if (_content == "分享美好生活方式.") {
							ih.dialogAlert(null, "文章内容不能为空");
							return false;
						}
                        $(".sekuai").show();

						$.ajax({
							url: "<?php  echo $this->createMobileUrl('person',array('op'=>'addPonote'));?>",
							type: "post",
							data: {
								title: _title,
								content: _content,
								thumb_url: e.map
							},
							dataType: "json",
							success: function(result) {
							    console.log(result);
								if (result == 1) {
									ih.dialogAlert(null, "发布Po图成功", function() {
										location.href = "<?php  echo $this->createMobileUrl('feedback');?>";
									});
								} else {
									ih.dialogAlert(null, "发布Po图失败");
								}

							}
						})
					});
				},
				handleClickImg: function() {

						var that=this;
                    wx.ready(function () {
// 设置 获取上传图片
                        var images = {
                            localIds: [],
                            map: []
                        };
                        var i = 0;
                        //多图上传
                        function coverImage() {

                            wx.chooseImage({

                                count: 9, // 默认9

                                sizeType: 'original', // 可以指定是原图还是压缩图，默认二者都有

                                sourceType: ['camera', 'album'], // 可以指定来源是相册还是相机，默认二者都有

                                success: function (res) {

                                    i = 0;
                                    images.localIds = res.localIds;
                                    var _length = images.localIds.length;
                                    if (images.map.length < 9) {
                                        uploadImage(images);
                                    } else {
                                        ih.dialogAlert(null, "最多上传4张图片");
                                    }
                                },

                            fail:function(e){
                            //    alert("网络错误");
							}

                            });

                        };

                        function uploadImage (res) {
                            wx.uploadImage({
                                localId: res.localIds[i],//选择接口返回的图片标识
                                isShowProgressTips: 1,
                                success: function (rep) {
                                    //图片上传成功提示后台程序下载微信服务器上图片
                                    var _length = rep.serverId.length;
                                    if (_length > 0) {
                                        var serverId = rep.serverId;
                                        $.ajax({
                                            url: "<?php  echo $this->createMobileUrl('feedback',array('op'=>'uploadimg'))?>",
                                            type: "POST",
                                            async: false,
                                            data: {
                                                'media_id': serverId,
                                            },
                                            success: function (data) {
                                                i++;
                                                var $box = $(".js-content");
                                                var html = '<div class="po-box__img" contentEditable="false"><div class="po-close__img"></div><img style="width: 100%" src="http://h5.lwest.cn/we7/attachment/lwx_helloting/'+ data +'" alt="" /></div><br>';
                                                images.map.push(data);
                                                $box.append(html);


                                                $(".po-close__img").off("tap").on("tap", function() {
                                                    $(this).parents(".po-box__img").remove();
                                                    // console.log($(this).parents(".po-box__img"), $(this).parents(".po-box__img").index());
                                                });

                                                if (i < images.localIds.length) {
                                                    uploadImage(images);
                                                }
                                            }
                                        });
                                    }
                                },
                                fail: function (res) {
                                    alert("图片上传失败!");
                                }
                            });
                        }


                        $(".js-click_img").on("tap", function() {
                            coverImage();
                        });

                        that.handleCommit(images);	// 发布 po 图
                    });

				},
				handlePreview: function() {
					$(".po-rh").on("tap", ".yl", function() {
						var _title = $.trim($(".js-title").val());
						var _content = $.trim($(".js-content").html());
						if (_title == "") {
							ih.dialogAlert(null, "标题不能为空");
							return false;
						}

						if (_content == "分享美好生活方式.") {
							ih.dialogAlert(null, "文章内容不能为空");
							return false;
						}

						$(".js-title__yl").html(_title);
						$(".ihjs-content").html(_content);

						$(".ih-box__yl").addClass("active");

					});
				},
				handlenoyl: function() {
					// 取消预览
					$(".js-notyl").off("tap").on("tap", function() {
						$(".ih-box__yl").removeClass("active");
					});
				},
				init: function() {

					// 设置正文高度
					var _body = $("body").height();
					$(".js-form_height").height(_body - 44 - 44);


					this.handleWeixinJssdk();
					this.handleFocusInput();	// 模拟 input 方式
					this.handleOutBack(".js-not");	// 返回 history.go(-1)
					this.handleClickImg();	// 点击上传图片
					this.handlePreview();	// 预览
					this.handlenoyl(); // 取消预览
				}
			};

			Main.init();
		})(Zepto)
	</script>
<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>
