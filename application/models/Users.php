<?php


class Application_Model_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_primary = 'usersID';
    
    public function getUser ($identity) {
        
        $select = $this->select()->where('username = ? ', $identity);
        $result = $this->fetchAll($select)->current();
        return $result;
    }
}

