<?php

namespace Themosis\Ajax;

use Themosis\Hook\IHook;

class AjaxBuilder implements IAjax
{
    /**
     * Action instance.
     */
    protected $action;

    public function __construct(IHook $action)
    {
        $this->action = $action;
    }

    /**
     * Listen to AJAX API calls.
     *
     * @param string          $name     The AJAX action name.
     * @param \Closure|string $callback A callback function name, a closure or a string defining a class and its method.
     * @param string|bool     $logged   true, false or 'both' type of users.
     *
     * @return \Themosis\Ajax\IAjax
     */
    public function listen($name, $callback, $logged = 'both')
    {
        // Front-end ajax for non-logged users
        // Set $logged to false
        if ($logged === false || $logged === 'no') {
            $this->action->add('wp_ajax_nopriv_'.$name, $callback);
        }

        // Front-end and back-end ajax for logged users
        if ($logged === true || $logged === 'yes') {
            $this->action->add('wp_ajax_'.$name, $callback);
        }

        // Front-end and back-end for both logged in or out users
        if ($logged === 'both') {
            $this->action->add('wp_ajax_nopriv_'.$name, $callback);
            $this->action->add('wp_ajax_'.$name, $callback);
        }

        return $this;
    }

    /**
     * Function in place for backwards compatibility.
     *
     * @deprecated
     *
     * @param $name
     * @param $logged
     * @param $callback
     *
     * @return IAjax
     */
    public function run($name, $logged, $callback)
    {
        return $this->listen($name, $callback, $logged);
    }
}
