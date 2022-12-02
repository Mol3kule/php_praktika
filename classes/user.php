<?php
    class User {
        static $UId;
        static $Username;
        static $Password;
        public function __construct($UId, $Username, $Password) {
            $this->Uid = $UId;
            $this->Username = $Username;
            $this->Password = $Password;
        }
    }
    $User = new User(null, null, null);
?>