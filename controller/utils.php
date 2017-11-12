<?php
header('Content-type: text/html; charset=utf-8');
//1.统计当前网站在线人数
function olNum(){
    $online_log = "online.txt"; //保存人数的文件,
    $timeout = 30;//30秒内没动作者,认为掉线
    $entries = file($online_log);

    $temp = array();

    for ($i=0;$i<count($entries);$i++) {
        $entry = explode(",",trim($entries[$i]));
        if (($entry[0] != $_SERVER["REMOTE_ADDR"]) && ($entry[1] > time())) {
            array_push($temp,$entry[0].",".$entry[1]."\n"); //取出其他浏览者的信息,并去掉超时者,保存进$temp
        }
    }

    array_push($temp,$_SERVER["REMOTE_ADDR"].",".(time() + ($timeout))."\n"); //更新浏览者的时间
    $users_online = count($temp); //计算在线人数

    $entries = implode("",$temp);
//写入文件
    $fp = fopen($online_log,"w");
    flock($fp,LOCK_EX); //flock() 不能在NFS以及其他的一些网络文件系统中正常工作
    fputs($fp,$entries);
    flock($fp,LOCK_UN);
    fclose($fp);
    return $users_online;
}



//2.统计访问人数,file_get_contents($filepath)表示访客人数
function hisNum(){
    session_start();//定义session，同一IP登录不累加
    $filepath = 'History.txt';
    if(!array_key_exists("temp", $_SESSION)){
        $_SESSION['temp'] = '';
    }
    if ($_SESSION['temp'] == '')//判断$_SESSION[temp]的值是否为空,其中的temp为自定义的变量
    {
        if (!file_exists($filepath))//检查文件是否存在，不存在刚新建该文件并赋值为0
        {
            $fp = fopen($filepath,'w');
            fwrite($fp,0);
            fclose($fp);
            counter($filepath);
        }else
        {
            counter($filepath);
        }
        $_SESSION['temp'] = 1;//登录以后,给$_SESSION[temp]赋一个值1
    }
    //注释下面一行可以实现同一IP登录不累加效果，测试时可以打开
    //session_destroy();
    return file_get_contents($filepath);
}
//counter()方法用来得到文件内的数字
function counter($f_value)
{
    //用w模式打开文件时会清空里面的内容，所以先用r模式打开，取出文件内容，保存到变量
    $fp = fopen($f_value,'r') or die('打开文件时出错。');
    $countNum = fgets($fp,1024);
    fclose($fp);
    $countNum++;
    $fpw = fopen($f_value,'w');
    fwrite($fpw,$countNum);
    fclose($fpw);
}
/////////////////2.统计访问人数结束////////////////////////

//5.转换地址栏url参数
function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    if(count($queryParts)!=0){
        foreach ($queryParts as $param)
        {
            $item = explode('=', $param);
            $params[$item[0]] = $item[1];
        }
    }else{
        $params["page"] = "";
    }
    return $params;
}

?>