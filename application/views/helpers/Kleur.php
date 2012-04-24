<?php
class Application_View_Helper_Kleur extends Zend_View_Helper_Abstract
{
    /**
     * return kleur
     * @return string kleur 
     */
    public function kleur () {
        $kleur = $this->_getRandomColor();
        return $kleur;
    }
    
    /**
     * Get random color
     * @return string kleur 
     */
    protected function _getRandomColor() {
        $kleur = array('green','red','yellow');
        return $kleur[rand(0,2)];
    }
}
