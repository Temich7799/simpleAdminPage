<?php
class BaseController
{
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = 'root';
    protected $db_name = 'simple_admin_page_db';

    protected function makeQueryToSQL(string $sql)
    {
        $connect = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

        if (!$connect) {
            print('Error: ' . mysqli_connect_error());
            return false;
        } else {
            mysqli_real_escape_string($connect, $sql);
            return mysqli_query($connect, $sql);
        }
    }
}
