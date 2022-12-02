<?php
    class User {
        public $UId;
        public $Username;
        public $Password;
        public $IsLoggedIn = false;
        public function __construct($UId, $Username, $Password) {
            $this->Uid = $UId;
            $this->Username = $Username;
            $this->Password = $Password;
        }

        public function Login() {
            if ($this->IsLoggedIn) return;
            $this->IsLoggedIn = true;
        }
        public function Logout() {
            if (!$this->IsLoggedIn) return;
            $this->IsLoggedIn = !$this->IsLoggedIn;
        }
    }
?>