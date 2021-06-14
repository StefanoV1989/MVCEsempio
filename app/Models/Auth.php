<?php
namespace App\Models;
use App\Core\Model;

class Auth extends Model
{
    public function isAuth($user, $pass):bool
    {
        $pass = sha1(sha1($pass));

        $login_data = $this->db->query("SELECT id FROM utenti WHERE user = '$user' AND pass = '$pass'");
        
        return ($login_data->rowCount() > 0);
    }
    
}