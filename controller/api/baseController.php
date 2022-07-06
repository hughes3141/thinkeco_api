<?php
class BaseController
{
    /**
     * __call magic method.
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Get URI elements.
     * 
     * @return array
     * 
     * Additional expanations:
     *  parse_url: This function parses a URL and returns an associative array containing any of the various components of the URL that are present. The values of the array elements are not URL decoded.
     * 
     * $_SERVER['REQUEST_URI']: 'REQUEST_URI' The URI which was given in order to access this page; for instance, '/index.html'.
     * 
     * So what this means is we take the url given from the endpoint and we are returned an array of each component of the path as separated by backslashes. e.g. :
     * 
     * Path: http://localhost/index.php/user/list?limit=2
     * 
     * print_r($url): 
     * 
     * Array (     [0] =>      [1] => index.php     [2] => user     [3] => list )
     * 
     * 
     * 
     */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }
 
    /**
     * Get querystring params.
     * 
     * parse_str(string $string, array &$result): void
     * 
     * Parses string as if it were the query string passed via a URL and sets variables in the current scope (or in the array if result is provided).
     * 
     * e.g. :
     * 
     * <?php
     * $str = "first=value&arr[]=foo+bar&arr[]=baz";
     *  // Recommended
     * parse_str($str, $output);
     * echo $output['first'];  // value     
     * echo $output['arr'][0]; // foo bar
     * echo $output['arr'][1]; // baz
     * 
     * 
     *'QUERY_STRING'
     * The query string, if any, via which the page was accessed.
     * 
     * So: this function takes what comes from the query line of the url and returns it as an associative array
     * 
     * e.g.
     * 
     * URL = ?topic=0&something=1&this=nothing
     * 
     * Output: Array ( [topic] => 0 [something] => 1 [this] => nothing )
     * 
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
        //Below is what was from the original tutorial, but does not seem to work, apparently becuase it does not return $query which is the array that we are trying to get.
        //return parse_str($_SERVER['QUERY_STRING'], $query);
        
        //The below code is adapted to return $query:

        parse_str($_SERVER['QUERY_STRING'], $query);
        return $query;
    }
 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}