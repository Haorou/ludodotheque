<?php
require_once("model/ManagerPDO.php");

    class MediathequeManager extends ManagerPDO
    {
        private $_db;
        
        public function __construct()
        {
            $db = $this->dbConnect();
            $this->setDb($db);
        }
        
        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }