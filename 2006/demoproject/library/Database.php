<?php
class Database{
    protected $query;
    
    protected $table;
    protected $select;
    protected $where;
    protected $order;
    protected $limit;
    
    public function __construct() {
        mysql_connect(DB::hostname, DB::username, DB::password);
        mysql_select_db(DB::dbname);
        mysql_set_charset('utf8');
        
        $this->query = '';
        
        $this->table = null;
        $this->select = '*';
        $this->where = ' 1 ';
        $this->order = null;
        $this->limit = null;
    }
    public function __destruct() {
        //mysql_close();
    }
    public function from($table){
        $this->table = $table;
        return $this;
    }
    public function select($select='*'){
        $this->select = $select;
        return $this;
    }
    public function where($where = '1'){
        $this->where = $where;
        return $this;
    }
    public function order($order,$type='asc'){
        $this->order = $order .'' . $type;
        return $this;
    }
    public function limit($start=0,$limit=0){
        $this->limit = " $start, $limit";
        return $this;
    }
    public function query($query = null){
        if($query == null){
            $this->query = "select $this->select from $this->table where $this->where ";
            if($this->order != null){
                $this->query .= " order by $this->order";
            }
            if($this->limit != null ){
                $this->query .= " limit $this->limit";
            }
        }
        else{
            $this->query = $query;
        }
        return mysql_query($this->query);
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
        return $this->query;
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
        $this->query = "update $this->table set $query where id = $id";
        mysql_query($this->query);
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
            $this->query = "insert into $this->table ($colum) VALUES ($value_column)";
        }
        else{
            $this->query = "insert into $this->table $data";
        }
        mysql_query($this->query);
        return mysql_affected_rows();
    }
}