<?php
include('config.php');
include('libs/functions.php');
include('libs/Sql.php');
//include('libs/MySql.php');
include('libs/PostgreSql.php');

session_start();


//testing mysql
/*
$obj = new MySql();
$res = array();
$resArrectRow = array();

//insert1
$setAr = array('key'=>'user15_1','data'=>'testing1');
$resInsertMySql = $obj->insert()->from('MY_TEST')->setting($setAr)->exec()->getNumberAffectedRecords();
if($resInsertMySql > 0)
    $resArrectRow[] = array('mes'=>"added $resInsertMySql record(s)", 'flag'=>'succes');
else 
    $resArrectRow[] = array('mes'=>"ERROR_INS",'flag'=>"fail");

//insert2
$setAr = array('key'=>'user15_2','data'=>'testing2');
$resInsertMySql = $obj->insert()->from('MY_TEST')->setting($setAr)->exec()->getNumberAffectedRecords();
if($resInsertMySql > 0)
     $resArrectRow[] = array('mes'=>"added $resInsertMySql record(s)", 'flag'=>'succes');
else 
    $resArrectRow[] = array('mes'=>"ERROR_INS", 'flag'=>"fail");

//select
$resSelectMySqlAfterInsert = $obj->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_1'")->exec()->getAssoc();
if($resSelectMySqlAfterInsert === false)
    $resArrectRow[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'insert','result'=>$resSelectMySqlAfterInsert);
    $resSel = $obj->getNumberSelectedRecords();
    $resArrectRow[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}

//update
$resUpdateMySql = $obj->update()->from('MY_TEST')->
                        set(array('data'=>'update record'))->
                        where("`key` = 'user15_2' AND `data`='testing2'")->
                        exec()->getNumberAffectedRecords();
if($resUpdateMySql > 0)
    $resArrectRow[] = array('mes'=>"updated $resUpdateMySql record(s)", 'flag'=>'succes');
else 
    $resArrectRow[] = array('mes'=>"ERROR_UPD", 'flag'=>"fail");

//select
$resSelectMySqlAfterUpdate = $obj->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_2'")->exec()->getAssoc();
if($resSelectMySqlAfterUpdate === false)
    $resArrectRow[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'update','result'=>$resSelectMySqlAfterUpdate);
    $resSel = $obj->getNumberSelectedRecords();
    $resArrectRow[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}

//delete
$resDeleteMySql =  $obj->delete()->from('MY_TEST')->where("`key` = 'user15_2' AND `data`='testing2'")->exec()->getNumberAffectedRecords();
if($resDeleteMySql > 0)
     $resArrectRow[] = array('mes'=>"deleted $resDeleteMySql record(s)", 'flag'=>'succes');
else 
    $resArrectRow[] = array('mes'=>"ERROR_DEL", 'flag'=>"fail");

//selectDelete
$resSelectMySqlAfterDelete = $obj->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_1'")->exec()->getAssoc();
if($resSelectMySqlAfterDelete === false)
    $resArrectRow[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'delete','result'=>$resSelectMySqlAfterDelete);
    $resSel = $obj->getNumberSelectedRecords();
    $resArrectRow[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}
*/


//testing pgmysql
$objPg = new PosgreSql();
$resPg = array();
$resArrectRowPg = array();

//insert1
$setAr = array('key'=>'user15_1','data'=>'testing1');
$resInsertPgSql = $objPg->insert()->from('MY_TEST')->setting($setAr)->exec()->getNumberAffectedRecords();
if($resInsertPgSql > 0)
    $resArrectRowPg[] = array('mes'=>"added $resInsertPgSql record(s)", 'flag'=>'succes');
else 
    $resArrectRowPg[] = array('mes'=>"ERROR_INS",'flag'=>"fail");

//insert2
$setAr = array('key'=>'user15_2','data'=>'testing2');
$resInsertPgSql = $objPg->insert()->from('MY_TEST')->setting($setAr)->exec()->getNumberAffectedRecords();
if($resInsertPgSql > 0)
     $resArrectRowPg[] = array('mes'=>"added $resInsertPgSql record(s)", 'flag'=>'succes');
else 
    $resArrectRowPg[] = array('mes'=>"ERROR_INS", 'flag'=>"fail");

//select
$resSelectPgSqlAfterInsert = $objPg->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_1'")->exec()->getAssoc();
if($resSelectPgSqlAfterInsert === false)
    $resArrectRowPg[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'insert','result'=>$resSelectPgSqlAfterInsert);
    $resSel = $objPg->getNumberSelectedRecords();
    $resArrectRowPg[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}

//update
$resUpdatePgSql = $objPg->update()->from('MY_TEST')->
                        set(array('data'=>'update record'))->
                        where("`key` = 'user15_2' AND `data`='testing2'")->
                        exec()->getNumberAffectedRecords();
if($resUpdatePgSql > 0)
    $resArrectRowPg[] = array('mes'=>"updated $resUpdatePgSql record(s)", 'flag'=>'succes');
else 
    $resArrectRowPg[] = array('mes'=>"ERROR_UPD", 'flag'=>"fail");

//select
$resSelectPgSqlAfterUpdate = $objPg->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_2'")->exec()->getAssoc();
if($resSelectPgSqlAfterUpdate === false)
    $resArrectRowPg[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'update','result'=>$resSelectPgSqlAfterUpdate);
    $resSel = $objPg->getNumberSelectedRecords();
    $resArrectRowPg[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}

//delete
$resDeletePgSql =  $objPg->delete()->from('MY_TEST')->where("`key` = 'user15_2' AND `data`='testing2'")->exec()->getNumberAffectedRecords();
if($resDeletePgSql > 0)
     $resArrectRowPg[] = array('mes'=>"deleted $resDeletePgSql record(s)", 'flag'=>'succes');
else 
    $resArrectRowPg[] = array('mes'=>"ERROR_DEL", 'flag'=>"fail");

//selectDelete
$resSelectPgSqlAfterDelete = $objPg->select(array('key', 'data'))->from('MY_TEST')->where("`key` = 'user15_1'")->exec()->getAssoc();
if($resSelectPgSqlAfterDelete === false)
    $resArrectRowPg[] = array('mes'=>"ERROR_SELECT", 'flag'=>"fail");
else
{
    $res [] = array('operation'=>'delete','result'=>$resSelectMySqlAfterDelete);
    $resSel = $objPg->getNumberSelectedRecords();
    $resArrectRowPg[] = array('mes'=>"select $resSel record(s)", 'flag'=>'succes');
}





$flashMessage = getFlash();

include('templates/index.php');