// JavaScript Document

jQuery(window).on('load',function(){
	var startPos = 0;
	jQuery(window).on("scroll", function(e){
		var distanceY = jQuery(this).scrollTop();

		scrollPosition = jQuery(window).height() + jQuery(window).scrollTop();//ウィンドウの高さ + スクロール量 を取得
		jQuery('.view').each(function() {
		if(scrollPosition - 100 > jQuery(this).offset().top) {
			jQuery(this).addClass("on");
		}
		});
	});

  var Position = jQuery(window).height() + jQuery(window).scrollTop();//ウィンドウの高さ + スクロール量 を取得
		jQuery('.view').each(function(i) {
		if(Position > jQuery(this).offset().top) {
			jQuery(this).delay(60*i).queue(function() {
				jQuery(this).addClass("on");
			});
		}
	});
});

// slide in animation
function delayScrollAnime() {
  var time = 0.2;//遅延時間を増やす秒数の値
  var value = time;
  jQuery('.delayScroll').each(function () {
    var parent = this;          //親要素を取得
    var elemPos = jQuery(this).offset().top;//要素の位置まで来たら
    var scroll = jQuery(window).scrollTop();//スクロール値を取得
    var windowHeight = jQuery(window).height();//画面の高さを取得
    var childs = jQuery(this).children();  //子要素を取得
  
    if (scroll >= elemPos - windowHeight && !jQuery(parent).hasClass("play")) {//指定領域内にスクロールが入ったらまた親要素にクラスplayがなければ
      jQuery(childs).each(function () {
        if (!jQuery(this).hasClass("fadeUp")) {//アニメーションのクラス名が指定されているかどうかをチェック
          jQuery(parent).addClass("play"); //親要素にクラス名playを追加
          jQuery(this).css("animation-delay", value + "s");//アニメーション遅延のCSS animation-delayを追加し
          jQuery(this).addClass("fadeUp");//アニメーションのクラス名を追加
          value = value + time;//delay時間を増加させる
          //全ての処理を終わったらplayを外す
          var index = jQuery(childs).index(this);
          if((childs.length-1) == index){
            jQuery(parent).removeClass("play");
          }
        }
      })
    }else {
      jQuery(childs).removeClass("fadeUp");//アニメーションのクラス名を削除
      value = time;//delay初期値の数値に戻す
    }
  })
};
jQuery(window).on('load scroll', function(){
  delayScrollAnime();/* アニメーション用の関数を呼ぶ*/
});


// Slick Slide
jQuery(function(){
  jQuery('.slider').slick({
    autoplaySpeed: 3000,
    infinite: true,
    dots: true,
    arrows: false,
    fade: true,
    adaptiveHeight:true,
    customPaging: function(slick,index) {
      var targetImage = slick.$slides.eq(index).find('img').attr('src');
      return '<img src=' + targetImage + '>';
    },
  });
});

jQuery(function(){
  jQuery('.top-sliders').slick({
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    dotsClass: 'slick-dots view view-slideup',
    arrows: false,
    infinite: true,
    speed: 1500,
    fade: true,
  });
});