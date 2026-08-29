/* for IE&Edge */

var _ua = (function(){
    return {
     ltIE6:typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined",
     ltIE7:typeof window.addEventListener == "undefined" && typeof document.querySelectorAll == "undefined",
     ltIE8:typeof window.addEventListener == "undefined" && typeof document.getElementsByClassName == "undefined",
     ltIE9:document.uniqueID && typeof window.matchMedia == "undefined",
     gtIE10:document.uniqueID && window.matchMedia,
     Trident:document.uniqueID,
     Gecko:'MozAppearance' in document.documentElement.style,
     Presto:window.opera,
     Blink:window.chrome,
     Webkit:typeof window.chrome == "undefined" && 'WebkitAppearance' in document.documentElement.style,
     Touch:typeof document.ontouchstart != "undefined",
     Mobile:(typeof window.orientation != "undefined") || (navigator.userAgent.indexOf("Windows Phone") != -1),
     ltAd4_4:typeof window.orientation != "undefined" && typeof(EventSource) == "undefined",
     Pointer:window.navigator.pointerEnabled,
     MSPoniter:window.navigator.msPointerEnabled
    }
   })();
   
   if(_ua.Trident && !_ua.ltIE9){
       jQuery(function() {
           jQuery('.big_title_show_area_inn_box').backgroundBlur({
               imageURL : '/cms/wp-content/themes/zerif-lite/images/background-blur.png',
               blurAmount : 4
           });
       });
   }