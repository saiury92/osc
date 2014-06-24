<?php
/**
 * class Database
 * Build active record
 * 
 */
class Database{
    protected $_query;
    
    protected $_table = null;
    protected $_select;
    protected $_where;
    protected $_order;
    protected $_limit;
    
    public function __construct() {
        mysql_connect(DB::hostname, DB::username, DB::password);
        mysql_select_db(DB::dbname);
        mysql_set_charset('utf8');
        
        $this->_query = '';

        $this->_select = '*';
        $this->_where = ' 1 ';
        $this->_order = null;
        $this->_limit = null;
    }
    public function __destruct() {
        //mysql_close();
    }
    public function from($table){
        $this->_table = $table;
        return $this;
    }
    public function select($select='*'){
        $this->_select = $select;
        return $this;
    }
    public function where($where = '1'){
        $this->_where = $where;
        return $this;
    }
    public function order($order,$type='asc'){
        $this->_order = $order .'' . $type;
        return $this;
    }
    public function limit($start=0,$limit=0){
        $this->_limit = " $start, $limit";
        return $this;
    }
    public function query($query = null){
        if($query == null){
            $this->_query = "select $this->_select from $this->_table where $this->_where ";
            if($this->_order != null){
                $this->_query .= " order by $this->_order";
            }
            if($this->_limit != null ){
                $this->_query .= " limit $this->_limit";
            }
        }
        else{
            $this->_query = $query;
        }
        return mysql_query($this->_query);
    }
    public function num_rows($result){
        return mysql_num_rows($result);
    }
    public function query_array($query=null){
        $result = $this->query($query);
        $data_array = array();
        while($row = mysql_fetch_assoc($result)){
            $data_array[] = $row;
        }
        return $data_array;
    }
    public function getQuery(){
        return $this->_query;
    }
    
    public function update($data,$id){
        $query = '';
        if(is_array($data)){
            foreach ($data as $key => $value){
                $query .= " $key = '$value' ,";
            }
            $query = substr($query, 0, (strlen($query) - 1) );
        }
        else{
            $query = $data;
        }
        $this->_query = "update $this->_table set $query where id = $id";
        mysql_query($this->_query);
        return mysql_affected_rows();
    }
    public function insert($data){
        $query = '';
        if(is_array($data)){
            $colum = '';
            $value_column = '';
            foreach ($data as $key => $value){
                $colum .= $key.',';
                $value_column .= "'$value'" .',';
            }
            $colum = substr($colum, 0, (strlen($colum)-1));
            $value_column = substr($value_column, 0, (strlen($value_column)-1));
            $this->_query = "insert into $this->_table ($colum) VALUES ($value_column)";
        }
        else{
            $this->_query = "insert into $this->_table $data";
        }
        mysql_query($this->_query);
        return mysql_affected_rows();
    }
    public function delete(){
        $this->_query = "delete from {$this->_table} where {$this->_where}";
    }
}