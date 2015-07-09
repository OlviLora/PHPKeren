<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Digester
 *
 * @author Sitta E P S
 */
class Digester {
    const ALGORITM_MD5 = 0;
    const ALGORITM_SHA1 = 1;
    public $salt = 'syp_ti1_01';

    public function init() {
        // overriding this method is a mandatory 
    }

    // do the digesting 
    public function digest($_message, $_algorithm =self::ALGORITM_MD5) {
        switch ($_algorithm) {
            case self::ALGORITM_MD5:
                return $this->md5($_message);
            case self::ALGORITM_SHA1:
                return $this->sha1($_message);
            default :
                return (NULL);
        }
    }

    // an md5 digesting 
    public function md5($_message) {
        return(md5($_message . $this->salt));
    }

    // a sha1 digesting 
    public function sha1($_message) {
        return(sha1($_message . $this->salt));
    }

}

?>
