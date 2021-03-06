<?php
//1.执行sql语句
function run_sql($sql,$select=false){
    $conn=mysqli_connect("127.0.0.1:3306", "root", "","sjae") or die("Unable to connect!");
    mysqli_query($conn,"SET NAMES 'UTF8'"); //设置存入的字符串格式
    try
    {
        $rs=mysqli_query($conn,$sql);
        mysqli_close($conn);
        if($rs){
            if($select){
                $res=array();
                while($o=mysqli_fetch_assoc($rs)){
                    array_push($res,$o);
                }
                return $res;
            }else{
                return $rs;
            }
        }else{
            echo "操作失败: ".$sql;
            die();
        }

    }
    catch(Exception $e)
    {
        echo $sql;
        var_dump($e);
        mysql_close($conn);
        exit();
    }
}

//2.查询
function db_select($select,$tableName,$field,$value) {
    $sql="select ".$select." from `".$tableName."` where `".$field."`= '".$value."'"; 
    return run_sql($sql,true);
}

//3.查询所有
function db_select_all($select,$tableName) {
    $sql="select ".$select." from ".$tableName;
    return run_sql($sql,true);
}

//4.修改
function db_update($table,$setField,$setVal,$id){
    $sql="update `".$table."` set `".$setField."`='".$setVal."' where `id`=".$id;
    return run_sql($sql,false);
}

//5.新增
function db_insert($table,$nameArr,$valArr){
    for($i=0;$i<count($nameArr);$i++){
        $nameArr[$i]="`".$nameArr[$i]."`";
    }
    $name=implode(',',$nameArr);
    for($i=0;$i<count($valArr);$i++){
        $valArr[$i]="'".$valArr[$i]."'";
    }
    $val=implode(',',$valArr);
    $sql="insert into `".$table."`(".$name.") values(".$val.")";
    return run_sql($sql,false);
}

//6.删除
function db_delete($table,$id){
    $sql="delete from ".$table." where id=".$id;
    return run_sql($sql,false);
}
//7.分页查询
function db_pages($table,$where=false,$orderby=false,$startIndex,$pageSize){
    if($where==false&&$orderby!=false){
        $sql="SELECT * FROM $table ORDER BY $orderby LIMIT $startIndex,$pageSize";
    }else if($where!=false&&$orderby==false){
        $sql="SELECT * FROM $table WHERE $where LIMIT $startIndex,$pageSize";
    }else if($where==false&&$orderby==false){
        $sql="SELECT * FROM $table LIMIT $startIndex,$pageSize";
    }else if($where!=false&&$orderby!=false){
        $sql="SELECT * FROM $table WHERE $where ORDER BY $orderby LIMIT $startIndex,$pageSize";
    }
    return run_sql($sql,true);
}
?>
