
<?php
//печать массива
function print_arr($array){
	echo "<pre>" . print_r($array, true) . "</pre>";
}

/**
* Получение массива категорий
**/
function get_cat($row){
	$arr_cat = array();
	 for($i=0; $i<=count($row); $i++) {
			$arr_cat[$row[$i]['id']] = $row[$i];
	}
	return $arr_cat;
}

$arraycat1 = get_cat($arraycat) ;
//$arraycat2 =  get_cat($arraycat1);
//var_dump($arraycat1);
//дерево
function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {
		// var_dump($node);
		if (!$node['parent']){
			$tree[$id] = &$node;

			// $tree[$id]['childs'][$id] =

		}else{
			$tree[!$node['parent']]['childs'][$id] = &$node;
            // $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
//пример как делать дальше
	// for(i=0; paraent_arr.length < 0; i++) {
	// 	parent_arr[i]['childs'] = childs_array[i];
	// }

	return $tree;
}


/**
* Дерево в строку HTML
**/
 function categories_to_string($data){
 foreach($data as $item){
 	$string .= categories_to_template($item);
 	 }
   for ($i=0; $i<=count($arraycat);$i++){
    $string .= categories_to_template($i);
   }
 	return $string;
}

/**
* Шаблон вывода категорий
**/
 function categories_to_template($category){
 	ob_start();
  include 'cattestSHABLON.php';
	return ob_get_clean();
 }

//var_dump($arraycat);//массив из базы категорий
//
$categories_tree = map_tree($arraycat1);//дерево категорий
//
//var_dump($categories_tree);//вывод дерева

$categories_menu = categories_to_string($categories_tree);//вывод категорий меню
//
// var_dump($categories_menu);//вывод категори в HTML
//
//var_dump($categories_tree);
 print_arr($categories_tree);
 echo $categories_menu;



?>
