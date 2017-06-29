<?php

class Security
{
        private $accessLevel;
        private $nav;

        public function  __construct()
        {
            session_start();
            $this->accessLevel = $_SESSION["accessLevel"];
            $this->init();
        }

        //checks for access and creates navbar based upon access.
        private function init()
        {
            if ($this->accessLevel == "admin" || $this->accessLevel == "user")
            {
                   if ($this->accessLevel == "user")
                   {
                        $this->userNav();
                   }
                   else
                   {
                        $this->adminNav();
                   }
            }
            else
            {
                header("Location: index.php");
            }
        }

        //sets the access level for a page.
        public function access($level)
        {
             if ($this->accessLevel != $level)
             {
                 header("Location: index.php");
             }
        }

        public function getNav()
        {
            return $this->nav;
        }

        //create user navigation
        private function userNav()
        {
                $this->nav = '<p><a href="page1.php">Page 1</a>&nbsp;<a href="page2.php">Page 2</a>&nbsp;<a href="logout.php">Log out</a></p>';

        }

        //create admin navigation
        private function adminNav()
        {
                $this->nav = '<p><a href="page1.php">Page 1</a>&nbsp;<a href="page2.php">Page 2</a>&nbsp;<a href="page3.php">Page 3</a>&nbsp;<a href="logout.php">Log out</a></p>';

        }
        
        public function getSid()
        {
            return session_id();

        }
}
?>
