<?php 

function record_management($config=array()){
  
  $table = $config['table'];
  $limit = $config['limit'];
  $criteria = $config['criteria'];

  $result = array();
  $result['sums'] = array();

  if (isset($config['sums'])){
    
    foreach ($config['sums'] as $k=>$v){
      if (!empty($criteria))__action('entity_where',$criteria);
      __action('entity_sum_field',$v);
      $total = __action('entity_get',$table);
      $result['sums'][$v] = $total[0]->$v;
    }
    
  }

    if (!empty($criteria))__action('entity_where',$criteria);
    $count = __action('entity_count_all',$table);

    if (!isset($_GET['page'])){
     $page = 1;
    }else{
     $page = $_GET['page'];
    }

    $lastpage = ceil($count / $limit);

    $page = (int) $page;
    
    if ($page > $lastpage) {
       $page = $lastpage;
    }

    if ($page < 1) {
       $page = 1;
    }

    if (!empty($config['sort'])){
      if ($config['sort'][1] == 'desc'){
       __action('entity_order_desc',$config['sort'][0]);
      }else{
       __action('entity_order_asc',$config['sort'][0]);
      }
    }

    if (!empty($criteria))__action('entity_where',$criteria);
    $items = __action('entity_get',
                    $table,
                    $limit,
                    ( ($limit * $page) - $limit ) );


    $result['page'] = $page;
    $result['count'] = $count;
    $result['pagination'] = array();
    $result['pagination']['page'] = $page;
    
    if ($page > 1){
     $result['pagination']['prevpage'] = $page - 1;
    }
    
    if ($page < $lastpage){
     $result['pagination']['nextpage'] = $page + 1;
    }

    if ($count > 0){
     $result['pagination']['lastpage'] = $lastpage;
     $result['pagination']['firstpage'] = 1;
    }
    
    $result['pagination']['count'] = $count;
    $result['record'] = $items;


    return $result;

}
add_listener('record_management','record_management');
