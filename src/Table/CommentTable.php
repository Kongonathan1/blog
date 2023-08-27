<?php
namespace App\Table;

use App\Model\Comment;
use Exception;
use PDO;

final class CommentTable extends Table {
    
    protected $class = Comment::class;
    protected $tableName = 'comments';

    
    public function add(Comment $comment, int $postId)
    {
        $prepare= $this->pdo->prepare("INSERT INTO {$this->tableName} SET username= :username, content= :content, created_at= :created_at, post_id = :postId");
        $status = $prepare->execute([
            'username' => $comment->getUsername(),
            'content' => $comment->getContent(),
            'created_at' => date('Y-m-d H:i:s'),
            'postId' => $postId
        ]);
        if($status === false) {
            throw new Exception("La mise à jour de l'article à échouer");
        }
    }

    public function take(int $postID)
    {
        $prepare = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE post_id = ?");
        $prepare->execute([$postID]);
        return $prepare->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function count(int $postID)
    {
        
        $prepare = $this->pdo->prepare("SELECT COUNT(id) FROM {$this->tableName} WHERE post_id = ?");
        $prepare->execute([$postID]);
        $prepare->setFetchMode(PDO::FETCH_NUM);
        return $prepare->fetch()[0];
    
    }
    
    public function delete(int $postID)
    {
        $prepare = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE post_id = ?");
        $prepare->execute([$postID]);
    }

}