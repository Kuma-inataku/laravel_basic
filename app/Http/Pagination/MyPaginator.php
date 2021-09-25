<?php

namespace App\Http\Pagination;

use Illuminate\Contracts\Pagination\Paginator;

class MyPaginator
{
  private $paginator;

  public function __construct(Paginator $paginator)
  {
    $this->paginator = $paginator;
  }

  public function link()
  {
    $prev = $this->paginator->currentPage() == 1 ? ' disabled' : '' ;
    $next = $this->paginator->currentPage() == $this->paginator->count() ? ' disabled' : '';
    $result = '<ul class="pagination" role="navgation">';
    $result .= '<li class="page-item'. $prev . '"><a class = "page-link" href="'.$this->paginator->previousPageUrl().'">←前のぺージ</a></li>';
    $result .= '<li class="page-item disabled">'.'<a class = "page-link">'.$this->paginator->currentPage().'</a></li>';
    $result .= '<li class="page-item'. $next . '"><a class = "page-link" href="'.$this->paginator->nextPageUrl().'">次のぺージ→</a></li>';
    $result .= '</ul>';
    return $result;
  }
}