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
    
    
    
    
    
    
    
    
}