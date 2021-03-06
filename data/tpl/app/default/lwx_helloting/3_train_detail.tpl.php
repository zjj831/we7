<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="format-detection" content="telephone=no, email=no" />
	<title>培训视频</title>
	<link href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/style.min.css">
	
<link rel="stylesheet" href="../addons/lwx_helloting/template/mobile/public/css/train.min.css">

</head>
<body>
	<!-- head layout -->
<div class="ih-box ih-box__train_detail">

  <div class="ih-overflow">
    <div class="ih-box__fd">
      <div class="ih-box__fd_fd">
        <div><?php  echo $note['title'];?></div>
        <div class="time"><?php  echo date('Y-m-d',$note['createtime']);?></div>
      </div>
      <div class="collection">
        <?php  if($ifcollect==2) { ?>
        <img class="js-collection_n" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_collect_n.png" alt="">
        <?php  } else { ?>
        <img class="js-collection_s" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_collect_s.png" alt="">
        <?php  } ?>
      </div>
    </div>
    <div class="ih-box__bd">
      <div id="mod_player"></div>
      <div class="ih-operation__ft">
          <div class="ih-operation__ft_item">
              <div class="js-goods">
              <?php  if($iflike == 1) { ?>
                <img class="js-goods_s" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_like_s.png" alt="">
              <?php  } else { ?>
                <img class="js-goods_n"  src="../addons/lwx_helloting/template/mobile/public/images/common_btn_like_n.png" alt="">
              <?php  } ?>
             </div>
              <span class="js-dztext"><?php  echo $note['likeno'];?></span>
          </div>

        <div class="ih-operation__ft_item">
  			<img src="../addons/lwx_helloting/template/mobile/public/images/comment.png" alt=""><span><?php  echo $note['commentno'];?></span>
        </div>
      </div>
    </div>
    <div class="ih-box__ft">
      <div class="ih-box__item">评论(<?php  echo $note['commentno'];?>)</div>
      <div class="js-box_item">
       <?php  if(is_array($commentlist)) { foreach($commentlist as $comment) { ?>
        <div class="ih-box__item">
          <div class="ih-box__fd">
            <div class="ih-border__image">
              <img src="<?php  echo $comment['avatar'];?>" alt="">
            </div>
          </div>
          <div class="ih-box__bd">
         <?php  echo $comment['content'];?>
          </div>
          <div class="ih-box__ft">
            <?php  echo date('m-d',$comment['createtime']);?>
          </div>
        </div>
       <?php  } } ?>
      </div>
 
      </div>
    </div>

  <div class="ih-eidt">
		<input type="text" placeholder="说点什么......">
		<div class="ih-eidt__ft">
			<!-- <div class="ih-icon"><img src="/public/images/common_btn_expression.png" alt=""></div>
			<div class="ih-icon"><img src="/public/images/common_icon_collect.png" alt=""></div> -->
			<div class="ih-click__fb js-comment">发布</div>
		</div>
	</div>

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
  <script src="http://imgcache.qq.com/tencentvideo_v1/tvp/js/tvp.player_v2_zepto.js" type="text/javascript" ></script>
	<script src="../addons/lwx_helloting/template/mobile/public/js/common.js"></script>

	
<script>
  ;(function($) {
      var Main = {
          video: function() {
              var video = new tvp.VideoInfo();

              video.setVid("<?php  echo $note['video_url']?>");

              var player =new tvp.Player();

              player.create({
                  width:"100%",
                  height:188,
                  video:video,
                  modId:"mod_player",
              });

          },
      handleClickgood: function() {
        var ft = "<?php  echo $iflike?>";

        if (ft == "2") {
          a();
        }

        if (ft == "1") {
          b();
        }

        function a () {
          // 点赞
          $(".js-goods").on("tap",".js-goods_n", function(e) {
            $(".js-goods").off("tap",".js-goods_n");
            var _self = $(this);
            var numDz = $(".js-dztext").html();

            $.ajax({
              url: "<?php  echo $this->createMobileUrl('list',array('op'=>'addnotelike'));?>",
              data: {
                id: <?php  echo $id;?>
              },
              type: "get",
              success: function(result) {
                if (result == 1) {
                  var html = '<img class="js-goods_s" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_like_s.png" alt="">';
                  _self.parent().html(html);

                  $(".js-dztext").html(parseInt(numDz) + 1);

                  b();
                } else {
                  console.log("点赞失败");
                  a();
                }
              }
            })
          });
        } 
        
        function b () {
          // 取消点赞
          $(".js-goods").on("tap",".js-goods_s",  function(e) {
            $(".js-goods").off("tap",".js-goods_s");
            var _self = $(this);
            var numDz = $(".js-dztext").html();

            $.ajax({
              url: "<?php  echo $this->createMobileUrl('list',array('op'=>'chalenotelike'));?>",
              data: {
                id: <?php  echo $id;?>
              },
              type: "get",
              success: function(result) {
                if (result == 1) {
                  var html = '<img class="js-goods_n" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_like_n.png" alt="">';
                  _self.parent().html(html);
                  $(".js-dztext").html(parseInt(numDz) - 1);
                  a();
                } else {
                  console.log("取消点赞失败");
                  b();
                }
              }
            })
          });
        }
      },
      handleClickcollection: function() {
          var ft = "<?php  echo $ifcollect?>";

          if (ft == "2") {
            a();
          }

          if (ft == "1") {
            b();
          }
          
          function a () {
            // 收藏
            $(".collection").on("tap",".js-collection_n" , function(e) {
              $(".collection").off("tap", ".js-collection_n");
              var _self = $(this);
              $.ajax({
                url: "<?php  echo $this->createMobileUrl('list',array('op'=>'addnotecollect'));?>",
                data: {
                  id: <?php  echo $id;?>
                },
                type: 'post',
                success: function(result) {
                  if (result == 1) {
                    ih.dialogAlert(null, "收藏成功!", function () {
                      var html = '<img class="js-collection_s" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_collect_s.png" alt="">';
                      
                      _self.parent().html(html);
                      b();
                    });
                  } else {
                    ih.dialogAlert(null, "已经收藏，不可重复");
                  }
                }
              })
            });
          }

          function b () {
            // 取消收藏
            $(".collection").on("tap", ".js-collection_s", function(e) {
              $(".collection").off("tap", ".js-collection_s");
              var _self = $(this);
              $.ajax({
                url: "<?php  echo $this->createMobileUrl('list',array('op'=>'chalenotecollect'));?>",
                data: {
                  id: <?php  echo $id;?>
                },
                type: 'post',
                success: function(result) {
                  if (result == 1) {
                    ih.dialogAlert(null, "取消收藏成功!", function () {
                      var html = '<img class="js-collection_n" src="../addons/lwx_helloting/template/mobile/public/images/common_btn_collect_n.png" alt="">';

                      _self.parent().html(html);
                      a();
                    });
                  } else {
                    ih.dialogAlert(null, "取消收藏失败!");
                  }
                }
              })
            });
          }
      },
      handleClickcomment: function() {
        // 评论
        $(".ih-eidt").off("tap", ".js-comment").on("tap",".js-comment", function() {
          var eidtContent = $(this).parent(".ih-eidt__ft").siblings("input[type=text]").val();
          var _num = "{count($commentlist)}";
          var $em = $(".ih-boxs__title .ih-em")

          if ($.trim(eidtContent) == "") {
            ih.dialogAlert(null, "评论内容不能为空");

            return false;
          }

          if ( _num == "0") {
            $(".ih-box__comment").empty();
          }

          $.ajax({
            url: "<?php  echo $this->createMobileUrl('list',array('op'=>'addnotecomment'));?>",
            data: {
              id: <?php  echo $id;?>,
              content: eidtContent
            },
            success: function(result) {
              if (result == 1) {
                var html = '<div class="ih-box__item">'
                    + '<div class="ih-box__fd">'
                    + '<div class="ih-border__image">'
                    + '<img src="<?php  echo $avatar;?>" alt=""></div></div>'
                    + '<div class="ih-box__bd">' + eidtContent + '</div>'
                    + '<div class="ih-box__ft">'
                    +  new Date().format("MM-dd")  +'</div></div>';

                $(".js-box_item").prepend(html);
                $(".ih-eidt input[type=text]").val("");

                var plnum = $em.html();
                $em.html(parseInt(plnum)+1);

              } else {
                console.log(result);
              }
            }
          })
        })
      },
      init: function() {
        this.handleClickcollection();
        this.handleClickgood();
        this.handleClickcomment();
        this.video();
      }
    };

    Main.init();

  })(Zepto)
</script>

<script>;</script><script type="text/javascript" src="http://h5.lwest.cn/we7/app/index.php?i=3&c=utility&a=visit&do=showjs&m=lwx_helloting"></script></body>
</html>
