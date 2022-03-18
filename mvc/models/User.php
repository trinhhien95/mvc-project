<?php
Class User {
    public function getUser()
    {
        return "Trinh Huu Hien";
    }

    public function User(){
        $qr = "SELECT * FROM user";
        return mysqli_query($this->con, $qr);
    }
}