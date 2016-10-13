<?php

namespace Clem\Notifiers;

use Illuminate\Session\Store;


class FlashNotifier
{

    //This will hold our session instance
    protected $session;

    //A session key to be used
    protected $key = 'flash_notification';

    /**
     * Create a session store instance.
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }


    /**
     * Flash an information message.
     *
     * @param  string $message
     * @return $this
     */
    public function info($message)
    {
        $this->message($message, 'info');

        return $this;
    }


    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success');

        return $this;
    }


    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message)
    {
        $this->message($message, 'danger');

        return $this;
    }


    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning');

        return $this;
    }


    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @param  string $level
     * @return $this
     */
    public function overlay($message, $title = 'Message', $level = 'info')
    {
        $this->message($message, $level);
        $this->session->flash("{$this->key}.overlay", true);
        $this->session->flash("{$this->key}.title", $title);

        return $this;
    }
    

    /**
     * Flash a default message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($message, $level = 'info')
    {
        $this->session->flash("{$this->key}.message", $message);
        $this->session->flash("{$this->key}.level", $level);

        return $this;
    }


    /**
     * Make the flash message important.
     */
    public function important()
    {
        $this->session->flash("{$this->key}.important", true);

        return $this;
    }


    /**
     * Check if flash message is present
     * 
     * @return boolean
     */
    public function hasMessage()
    {
        return $this->session->has("{$this->key}");
    }


    /**
     * Get the key value.
     * 
     * @param string $key
     * @return string
     */
    public function get($key)
    {
        return $this->session->get("{$this->key}.{$key}");
    }


    /**
     * Checkif the given key is present
     * 
     * @param string $key
     * @return boolean
     */
    public function is($key)
    {
        return $this->session->has("{$this->key}.{$key}");
    }


    /**
     * Get the message
     */
    public function body()
    {
        return $this->session->get("{$this->key}.message");
    }


    /**
     * Get the message level
     */
    public function level()
    {
        return $this->session->get("{$this->key}.level");
    }


    /**
     * Get the message title
     */
    public function title()
    {
        return $this->session->get("{$this->key}.title");
    }
}