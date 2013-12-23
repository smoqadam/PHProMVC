<?php

class Model {
    
    private $_pdo ;
    private $_query = '';
    protected $table = '';
    protected $pk = '';

    /**
     * سازنده و ساخت شیء از کلاس PDO
     */
    function __construct() {
       
        $dns = Config::get("driver");
        $dbName = Config::get("dbName");
        $username = Config::get("dbUsername");
        $password = Config::get("dbPassword");
        
        if($this->table == ''){
            $this->table = get_class($this);
        }
        
        $this->_pdo= new PDO($dns . ':host=localhost;dbname=' . $dbName, $username, $password);
    }

    
    /**
     * اجرای دستور mysql و برگرداندن ردیف های پیدا شده
     * @param String $fields
     * @param String $where
     * @param String $order
     * @param int | String $limit
     * @return array 
     */
    function get_rows($fields = '*', $where = ' 1=1 ', $order = 'ASC', $limit = 10) {
        $this->_query = "select $fields from {$this->table} where {$where} ORDER BY {$this->pk} $order LIMIT $limit";
        $stm = $this->_pdo->query($this->_query);
        return $stm->fetchAll();
    }

    /**
     * اجرای دستور select و برگرداندن یک ردیف
     * @param String $fields
     * @param String $where
     * @param String $order
     * @param int | String $limit
     * @return array 
     */
    function get_row($fields = '*', $where = ' 1=1 ', $order = '', $limit = 10) {
        $this->_query = "select $fields from {$this->table} where {$where} ORDER BY {$this->pk} $order LIMIT $limit";
        $stm = $this->_pdo->query($this->_query);
        return $stm->fetch();
    }

    
    /**
     * حذف یک ردیف
     * @param int $id 
     */
    function delete($id) {
        $this->_query = "delete from $this->table where id = '$id'";
        $this->_pdo->exec($this->_query);
    }

    
    /**
     * ویرایش یک ردیف
     * $data = array() ; // 
     * @param string $data
     * @param string $where 
     * 
     */
    function update($data, $where = ' 1 = 1 ') {
        $this->_query = " update {$this->table} set $data where $where";
        $this->_pdo->exec($this->_query);
    }

    /**
     *
     * @param string $fields
     * @param string $data 
     */
    function insert($fields, $data) {
        $this->_query = " insert into $this->table ($fields) VALUES ($data)";
        $this->_pdo->exec($this->_query);
    }
    
    /**
     * اجرای یک کوئری
     * @param string $query 
     */
    function run($query) {
        $this->query = $query;
        $this->_pdo->exec($query);
    }
    
    /**
     * آخرین کوئری اجرا شده
     * @return string 
     */
    function last_query(){
        return $this->_query;
    }
}