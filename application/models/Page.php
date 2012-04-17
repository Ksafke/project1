<?php

class Application_Model_Page extends Zend_Db_Table_Abstract
{
    protected $_name = 'page';
    protected $_primary = 'pageID';
    
    /**
     * return $rows Zend_Db_Table_Abstract
     * @param string $local 
     */
    public function getMenu($local) {
        
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
        $select->setIntegrityCheck(false)
               ->join('pageLocal', 'page.pageID = pageLocal.pageID')
               ->where('page.menu = ?', 'ja')
               ->where('page.status = ?', 'online')
               ->where('pageLocal.local = ?', $local);
        
        $rows = $this->fetchAll($select);
        return $rows;
        
    }
    
    /**
     * return $rows Zend_Db_Table_Abstract
     * @param string $titleUrl 
     */
    public function getPage($titleUrl) {
        
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART);
        $select->setIntegrityCheck(false)
               ->join('pageLocal', 'page.pageID = pageLocal.pageID')
               ->where('pageLocal.titleURL = ?', $titleUrl);
        
        $row = $this->fetchAll($select)->current();
        return $row;
        
    }

}

