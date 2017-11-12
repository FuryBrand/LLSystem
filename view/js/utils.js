;function searchWeather(city){
	$.ajax({
		url: 'http://api.map.baidu.com/telematics/v3/weather?location='+city+'&output=json&ak=HnGRspk525YjPCWzD5zxI2aW',
		type: 'get',
		dataType: 'jsonp',
		data: {},
	})
	.done(function(data) {
		var weather;
		if(data.error===0){
			weather=data.results[0].weather_data[0].weather;
		}else{
			weather='default';
		}
		getWeatherPic(weather);
	})
	.fail(function(a,b,c) {
		setBg('default');
	});
}

function getWeatherPic(weather){
	var day=isDaytime();
	if(day){
		if(weather.indexOf('霾')>=0||
				weather.indexOf('霾')>=0||
				weather.indexOf('多云')>=0||
				weather.indexOf('阴')>=0){
			setBg("day_1");
		}else if(weather.indexOf('雨')>=0||
				weather.indexOf('雪')>=0){
			setBg("day_3");
		}else if(weather.indexOf('晴')>=0){
			setBg("day_0");
		} else{
			setBg("default");
		}
	}else{
		if(weather.indexOf('霾')>=0||
				weather.indexOf('霾')>=0||
				weather.indexOf('多云')>=0||
				weather.indexOf('阴')>=0){
			setBg("night_1");
		}if(weather.indexOf('晴')>=0){
			setBg("night_0");
		}else if(weather.indexOf('雨')>=0||
				weather.indexOf('雪')>=0){
			setBg("night_3");
		}else{
			setBg("default");
		}
	}
}

function  isDaytime(){
	var d = new Date(),
	h = d.getHours();
	if(h>6&&h<18){
		return true;
	}else{
		return false;
	}
}

function setBg(img){
	$("#index").css("backgroundImage","url(img/weather/"+img+".jpg)");
}

function sendMail(){
    var name=$("#contact_name").val(),
        email=$("#contact_email").val(),
        subj=$("#contact_subject").val(),
        msg=$("#contact_message").text(),
        mailTxt;
    mailTxt=name+":发送了:"+msg+"。"+"回信:"+email;
    if (confirm("确定提交?")){
        parent.location.href='mailto:964981348@qq.com?subject='+subj+"&body="+mailTxt;
    }
}

function log(text){
	console.log(text);
}