<?php
namespace App\Table;

use App\Model\User;
use Exception;
use PDO;

final class UserTable extends Table{

    protected $class = User::class;
    protected $tableName = 'users';

    
    public function findByUsername(string $name) 
    {
        $prepare = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE name = :name");
        $prepare->execute(['name' => $name]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $prepare->fetch();
        if($result === false) {
            throw  new Exception('');
        }
        return $result; 
    }


}    
