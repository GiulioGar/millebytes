<?php 

namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model {
    protected $table = 't_user_info';
    protected $allowedFields = ['first_name','second_name','email','pwd','reg_date','confirm','active'];
}