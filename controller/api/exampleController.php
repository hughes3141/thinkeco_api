<?php

function getUriSegments()
  {
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $uri = explode( '/', $uri );

      return $uri;
  }


print_r(getUriSegments());

echo "<br>";

function getQueryStringParams()
    {
        //return parse_str($_SERVER['QUERY_STRING'], $query);
        parse_str($_SERVER['QUERY_STRING'], $query);

        return $query;
    }

print_r(getQueryStringParams());