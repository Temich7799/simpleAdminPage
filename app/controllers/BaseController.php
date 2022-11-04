<?php
class BaseController
{
    protected $app;

    public function __construct()
    {
    }

    protected function makeQueryToSQL(string $sql)
    {
        $connect = mysqli_connect('localhost', 'root', 'root', 'simple_admin_page_db');

        if (!$connect) {
            print('Error: ' . mysqli_connect_error());
            return false;
        } else {
            mysqli_real_escape_string($connect, $sql);
            return mysqli_query($connect, $sql);
        }
    }
}
