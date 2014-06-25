<?php
class Pagination{
    private $limit;
    private $totalPage;
    private $DBAll;
    private $pageSiblingNumber; /*so luong page xung quanh page hien tai*/
    private $query = '';

    public function __construct($DBAll= null,$limit=10,$pageSiblingNumber=5){
        $this->DBAll = $DBAll;
        $this->limit = $limit;
        $this->totalPage = 0;
        $this->pageSiblingNumber = $pageSiblingNumber;
    }
    public function exec($start){
        $db = new Database();
        $db = $this->DBAll;
        $result = $db->query();
        $this->totalPage = ceil(mysql_num_rows($result) / $this->limit);
        $result_array = $db->limit($start, $this->limit)->query_array();
        $this->query = $db->getQuery();
        return $result_array;
    }
        
    public function setDBAll($DBAll){
        $this->DBAll = $DBAll;
    }
    public function setLimit($limit){
        $this->limit = $limit;
    }
    public function setPageSiblingNumber($pageSiblingNumber){
        $this->pageSiblingNumber = $pageSiblingNumber;
    }
    public function getTotalPage(){
        return $this->totalPage;
    }
    public function getPageSiblingNumber(){
        return $this->pageSiblingNumber;
    }
    public function getLimit(){
        return $this->limit;
    }
    public function getQuery(){
        return $this->query;
    }
    //in phan trang
    public function print_pagination($page,$urlPage){
        //neu hon 2 trang moi hien phan trang
        if($this->totalPage <= 1){
            return '';
        }
        $print = '';
        $print .= '<div id="pagination">'
                .'<ul>';
        //Hien first
        if($page > 1){
            $print .= '<li><a href="'.$urlPage.'page=1">First</a></li>';
        } //het hien first
        
        //hien pre
        if($page > 1){
            $print .= '<li><a href="'.$urlPage.'page='.($page-1).'">pre</a></li>';
        }//het hien pre
        
        //hien ... neu pre co nhieu
        if($page-$this->pageSiblingNumber > 1){
            $print .= '<li><a>...</a></li>';
        }

        // Hien sibling pre
        for($i = $this->pageSiblingNumber ; $i >= 1 ; $i--){
            if($page - $i >= 1){    
                $print .= '<li><a href="'.$urlPage.'page='.($page-$i).'">'.($page-$i).'</a></li>';
            }//het if
        } //het hien sibling pre
        
        //current page
        $print .= '<li class="page-current"><a href="'.$urlPage.'page='.$page.'">'.$page.'</a></li>';
        
        // Hien sibling next
        for($i = 1 ; $i <= $this->pageSiblingNumber ; $i++){
            if($page + $i <= $this->totalPage){
                $print .= '<li><a href="'.$urlPage.'page='.($page+$i).'">'.($page+$i).'</a></li>';
            }//het if
        } //het hien sibling next
        
        //hien ... neu next co nhieu
        if($page+$this->pageSiblingNumber < $this->totalPage){
            $print .= '<li><a>...</a></li>';
        }
     
        //hien next
        if($page < $this->totalPage){
            $print .= '<li><a href="'.$urlPage.'page='.($page+1).'">next</a></li>';
        }//het hien pre
    
        //Hien last
        if($page < $this->totalPage){
            $print .= '<li><a href="'.$urlPage.'page='.$this->totalPage.'">Last</a></li>';
        } //het hien last
        $print .= '</ul>'
            .'</div>';
        return $print;
    }

}