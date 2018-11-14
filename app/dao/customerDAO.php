<?php
    namespace app\dao;

    /**
     * 客户表
     */
    class customerDAO extends baseDAO
    {
        protected $table = 't_customer';
        protected $_pk = 'id';
        protected $_pkCache = true;
    }
?>