;function log(text){
	console.log(text);
}
//将2016-6-28转换成8位：20160628，该方法临时使用，需要重写
function parseDate(date) {
    var arr=date.split("-");
    if(arr[1].length===1){
        arr[1]="0"+arr[1];
    }
    if(arr[2].length===1){
        arr[2]="0"+arr[2];
    }
    return arr.join("");
}
//获取object长度
function  getObjLen(obj){
    return Object.keys(obj).length;
}
//点击超链接打开小窗口
function openNewWindow(url){
    window.open(url,'','height=500,width=700,top=200,left=500,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')
}
//判断小数
function checkFloat(c) {
    var r = /^[1-9]?[0-9]*\.[0-9]*$/;
    return r.test(c);
}
//倒计时           //要控制不能点击的元素,倒计时间,添加倒计时显示的元素
function countdown(eleCtrl,time,countEle){
       var inte = setInterval(function(){
           if(time>=0){
            $(countEle).html("&nbsp;&nbsp("+time+")");
            time--;
           }else{
               $(eleCtrl).prop("disabled",false);
               clearInterval(inte);
               $(countEle).html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp");
           }
        },1000);
}
//获取url参数
function getQueryString(name){
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}