# Filename: httprequest.php

<?php
/**
 * HTTPRequest Class
 * @author R. Villar David <my@email.com>
 *
 * Encapsulate request data into the one object providing a
 * single channel for request data access and manipulation.
 *
 */
class HTTPRequest
{
    /**
     * Holds collective request data
     *
     * @var array
     */
    protected $_data = array();

    /**
     * Holds data from the $_POST super global
     *
     * @var array
     */
    protected $_post = array();

    /**
     * Holds data from the $_GET super global
     *
     * @var array
     */
    protected $_get = array();

    /**
     * Holds data from the $_COOKIE super global
     *
     * @var array
     */
    protected $_cookie = array();

    /**
     * Constructor
     * Stores "request data" in GPC order.
     */
    public function __construct()
    {
        $this->_data = array_merge($this->_data, $_REQUEST);
        $this->_get = array_merge($this->_get, $_GET);
        $this->_post = array_merge($this->_post, $_POST);
        $this->_cookie = array_merge($this->_cookie, $_COOKIE);
        $this->_clean();
    }

    /**
     * Store "request data" in GPC order.
     *
     * @param string $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * Read stored "request data" by referencing a key.
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : null;
    }

    /**
     * Allow access to data stored in GET, POST and COOKIE super globals.
     *
     * @param string $var
     * @param string $key
     * @return mixed
     */
    public function getRawData($var, $key)
    {
        switch(strtolower($var)) {
            case �get�:
            $array = $this->_get;
            break;

            case �post�:
            $array = $this->_post;
            break;

            case �cookie�:
            $array = $this->_cookie;
            break;

            default:
            $array = array();
            break;
        }

        if(isset($array[$key])) {
            return $array[$key];
        }
        return null;
    }

    /**
     * Internally clean request data by handling magic_quotes_gpc and then adding slashes.
     *
     */
    protected function _clean()
    {
        if(get_magic_quotes_gpc()) {
            $this->_data = $this->_stripSlashes($this->_data);
            $this->_post = $this->_stripSlashes($this->_post);
            $this->_get = $this->_stripSlashes($this->_get);
        }
    }

    /**
     * Strip slashes code from php.net website.
     *
     * @param mixed $value
     * @return array
     */
    protected function _stripSlashes($value)
    {
        if(is_array($value)) {
            return array_map(array($this,�_stripSlashes�), $value);
        } else {
            return stripslashes($value);
        }
    }
}