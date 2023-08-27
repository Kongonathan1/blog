<?php 
namespace App\Table;

use App\URL\PaginatedQuery;
use PDO;

Abstract class Table {

    protected $pdo;
    protected $class = null;
    protected $tableName = '';

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(int $id) 
    {
        $prepare = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
        $prepare->execute(['id' => $id]);
        $prepare->setFetchMode(PDO::FETCH_CLASS, $this->class);
        /** @var Post|false */
        return $prepare->fetch();
    }

    public function PrepAnfdFethAll(string $query, ?array $params = null)
    {
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($params);
        return $prepare->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function selectAll(string $order_name = 'id', string $order_dir = 'desc')
    {
        $query = $this->pdo->query("SELECT * FROM {$this->tableName} ORDER BY $order_name $order_dir");
        return $query->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function delete(int $id)
    {
        $this->pdo->query("DELETE FROM {$this->tableName} WHERE id = $id");
    }

    
    public function exist(string $label, string $value, ?int $exception = null)
    {
        $query = "SELECT COUNT(id) FROM {$this->tableName} WHERE $label = :value";
        $params = ['value' => $value];
        if($exception !== null) {
            $query.= " AND id != $exception";
        }
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($params);
        $result = $prepare->fetch(PDO::FETCH_NUM)[0];
        if($result > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function findAllPaginatedPosts(string $order_name = 'id', string $order_dir = 'desc')
    {
        //Initiatialisation pour les requêtes paginées
        $paginatedQuery = new PaginatedQuery(
            "SELECT * FROM {$this->tableName} ORDER BY $order_name $order_dir", 
            "SELECT COUNT(id) FROM {$this->tableName}", $this->pdo
        );

        //Récupération des articles avec pagination
        $categories = $paginatedQuery->PaginatedResults($this->class);
        $pagination = $paginatedQuery;
        return [$categories, $pagination];
    }
}