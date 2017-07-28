<?php 
class PosgreSql extends Sql
{
     public function __construct() 
    {
        parent::__construct();
        $this->link = pg_connect("host=".HOSTPG." port=5432 dbname=".DATABASEPG." user=".USERPG." password=".PSWPG);
        //$this->link = pg_connect("host='10.6.0.75' port=5432 dbname=user1 user=anna password=111");
        if (!$this->link) 
            throw new Exception(ERROR_CONNECT);      
    }
    
    public function __destruct()
    {
        pg_close($this->link);
    }
    
    
    public function getAssoc()
    {
        $result = pg_query($this->execQuery, $this->link);
        if($result) 
        {
            $selection=array();
            while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $selection[] = $row;
            }
            return $selection;
        }
        
        pg_free_result($result);
        
        return $result;
    }
    
    function getOneAssoc()
    {
        $result = pg_query($this->execQuery, $this->link);
        if($result)
            return pg_fetch_array($result, null, PGSQL_ASSOC);	
        else 
            return $result; 
    }
    
    function getOneRow()
    {
        $result = pg_query($this->execQuery,$this->link);
        if($result)
        {
            $selection = pg_fetch_row($result, 0);
            return $selection[0];
        }
        else 
            return $result; 
    }
    
    
}