<?php
namespace App\Models;
use App\Core\Model;

class Auth extends Model
{
    public function isAuth():bool
    {
        return isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] != 0;
    }

    public function login($user, $pass)
    {

        $login_data = $this->db->query("SELECT id FROM utenti WHERE user = '$user' AND pass = '$pass'");

        if($login_data->rowCount() > 0)
        {
            $dati = $login_data->fetch(\PDO::FETCH_OBJ);

            $_SESSION['user_id'] = $dati->id;

            return true;
        }
        else
        {
            return false;
            
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
        return true;
    }

    
}