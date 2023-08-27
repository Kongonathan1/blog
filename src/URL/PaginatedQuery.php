<?php
namespace App\URL;

use App\Helpers\Number;
use App\Model\Post;
use Exception;
use PDO;

class PaginatedQuery {

    private $sqlQuery;
    private $sqlCount;
    private $currentPage;
    private $pdo;
    private $perPage;

    public function __construct(string $sqlQuery, string $sqlCount, PDO $pdo, int $perPage = 9 , ?int $currentPage = null)
    {
        $this->sqlQuery = $sqlQuery;
        $this->sqlCount = $sqlCount;
        $this->perPage = $perPage;
        if($currentPage === null) { 
            $this->currentPage = Number::GETPositiveInt('page', 1);
        }
        if(!isset($this->pdo)) { 
            $this->pdo = $pdo;
        }
    }
    
    /**
     * PaginatedResults
     *
     * @param  mixed $classRefference
     * @return void
     */
    public function PaginatedResults($classRefference)
    {
        $offset = ($this->currentPage - 1) * $this->perPage;
        $query = $this->pdo->query($this->sqlQuery ." LIMIT {$this->perPage} OFFSET $offset ");
        /** @var Post[]|false */
        $posts = $query->fetchAll(PDO::FETCH_CLASS, $classRefference);
        return $posts;
    }

    public function Previous(?string $link = "")
    {
        if($this->currentPage > 1){
            $link .= "?page=" . ($this->currentPage - 1);
            return <<<HTML
            <a href="{$link}" class="button previous">Page précédente</a>
            HTML;
        }
        
    }

    public function Next(?string $link = "")
    {
        if($this->currentPage < $this->getPages()){
            $link .= "?page=" . ($this->currentPage + 1);
            return <<<HTML
            <a href="{$link}" class="button previous">Page suivante</a>
            HTML;
        }
        
    }

    private function getPages():int
    {
        $query = $this->pdo->query($this->sqlCount);
        $query->setFetchMode(PDO::FETCH_NUM);
        $count = (int)($query->fetch()[0]);
        $pages = ceil($count/$this->perPage);

        if($this->currentPage > $pages) {
            throw new Exception('Le numéro de la page est incorrecte');
        }
        return $pages;
    }

    public function goodCSS()
    {
        $pages = $this->getPages();
        if(($this->currentPage < $pages ) && ($this->currentPage <= 1)){
            return<<<HTML
            <div></div>
            HTML;
        }
    }

}
/**
 *      VARIABLES:
 *  -- SqlQuery
 *  -- Perpages
 *  -- sqlCount
 *      PARAMETRES EXTERNES:
 *  -- PDO
 *  -- Current page
 * 
 *      METHODES:
 *  -- PaginatedResults($classRefference)
 *  -- Next($link)
 *  -- Previous($link)
 */