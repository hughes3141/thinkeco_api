<?php

function getUriSegments()
  {
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $uri = explode( '/', $uri );

      return $uri;
  }


//print_r(getUriSegments());

echo "<br>";

function getQueryStringParams()
    {
        //return parse_str($_SERVER['QUERY_STRING'], $query);
        parse_str($_SERVER['QUERY_STRING'], $query);

        return $query;
    }

//print_r(getQueryStringParams());

function add($a, $b) {
  return $a + $b;
}

echo add(...[1, 2]);

echo "<br>";

$a = [1, 2];
echo add(...$a);

function foobar($arg, $arg2) {
  echo " got $arg and $arg2";
}
class foo {
  function bar($arg, $arg2) {
      echo __METHOD__, " got $arg and $arg2\n";
  }
}


// Call the foobar() function with 2 arguments
call_user_func_array("foobar", array("one", "two"));

// Call the $foo->bar() method with 2 arguments
$foo = new foo;
call_user_func_array(array($foo, "bar"), array("three", "four"));