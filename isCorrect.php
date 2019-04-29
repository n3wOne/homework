<?

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_QUIET_EVAL, 1);

function isCorrect($string){
    

	$open = "([{";
	$close =")]}";
    $stack = array();
	$strl = strlen($string);
	
    for($i=0; $i<$strl;$i++){
    	$cur = $string[$i]; 
    	if(stripos($open, $cur)!==false){
    		$last=$cur;
    		array_push($stack, $cur);
    	}elseif (stripos($close,$cur)!==false) {
    		$index = stripos($close,$cur);
    		if($last && $last==$open[$index]){
    			array_pop($stack);
    			$last = $stack[count($stack)-1];
    		} else{

    			echo "string: \"$string\" <b>IS NOT</b> correct<br>";
    			return false;
    		}
    	}
    	$indo = stripos($open, $cur);
    }
if(!$last){ 
	echo "string \"$string\" is <b>CORRECT!</b><br>";
	return true;
}
else{ 
	echo "string: \"$string\" <b>IS NOT</b> correct<br>";
	return false;
}

}
$str = "()(([[{{}}]]))([])";

print_r(isCorrect($str));
assert(isCorrect('()') === true);
assert(isCorrect('()[]{}{[}')===false);