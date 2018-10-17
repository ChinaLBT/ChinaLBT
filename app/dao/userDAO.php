<?php

namespace app\dao;

/**
 * 用户表
 */
class userDAO extends baseDAO
{
    protected $table = 't_admin';
    protected $_pk = 'id';
    protected $_pkCache = true;
}