<?php
class Pagination{
    private $limit;
    private $totalPage;
    private $query;
    private $pageSiblingNumber; /*so luong page xung quanh page hien tai*/


    public function __construct($query='',$limit=10,$pageSiblingNumber=5){
        $this->limit = $limit;
        $this->query = $query;
        $this->totalPage = 0;
        $this->pageSiblingNumber = $pageSiblingNumber;
    }
    public function query($start){
        $result = mysql_query($this->query);
        $this->totalPage = ceil(mysql_num_rows($result) / $this->limit );
        $query = $this->query . " limit $start, $this->limit";
        return mysql_query($query);
    }
        
    public function setQuery($query){
        $this->query = $query;
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
    //in phan trang
    public function print_pagination($page,$urlPage){
        //neu hon 2 trang moi hien phan trang
        if($this->totalPage <= 1){
            return;
        }
        echo '<div id="pagination">'
                .'<ul>';
        //Hien first
        if($page > 1){
            echo '<li><a href="'.$urlPage.'page=1">First</a></li>';
        } //het hien first
        
        //hien pre
        if($page > 1){
            echo '<li><a href="'.$urlPage.'page='.($page-1).'">pre</a></li>';
        }//het hien pre
        
        //hien ... neu pre co nhieu
        if($page-$this->pageSiblingNumber > 1){
            echo '<li><a>...</a></li>';
        }

        // Hien sibling pre
        for($i = $this->pageSiblingNumber ; $i >= 1 ; $i--){
            if($page - $i >= 1){    
                echo '<li><a href="'.$urlPage.'page='.($page-$i).'">'.($page-$i).'</a></li>';
            }//het if
        } //het hien sibling pre
        
        //current page
        echo '<li class="page-current"><a href="'.$urlPage.'page='.$page.'">'.$page.'</a></li>';
        
        // Hien sibling next
        for($i = 1 ; $i <= $this->pageSiblingNumber ; $i++){
            if($page + $i <= $this->totalPage){
                echo '<li><a href="'.$urlPage.'page='.($page+$i).'">'.($page+$i).'</a></li>';
            }//het if
        } //het hien sibling next
        
        //hien ... neu next co nhieu
        if($page+$this->pageSiblingNumber < $this->totalPage){
            echo '<li><a>...</a></li>';
        }
     
        //hien next
        if($page < $this->totalPage){
            echo '<li><a href="'.$urlPage.'page='.($page+1).'">next</a></li>';
        }//het hien pre
    
        //Hien last
        if($page < $this->totalPage){
            echo '<li><a href="'.$urlPage.'page='.$this->totalPage.'">Last</a></li>';
        } //het hien last
        echo '</ul>'
            .'</div>';

    }

}