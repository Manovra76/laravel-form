<?php

namespace JakubHonisek\LaravelForm;

class Form
{
    /**
     * @var mixed
     */
    public $model;

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Form constructor.
     */
    public function __construct()
    {
        $this->build();
    }

    /**
     * Adds new field to this form.
     *
     * @param  null  $name
     * @param  string  $type
     * @param  null  $label
     * @param  array  $options
     *
     * @return $this
     */
    protected function addField($name = null, $type = 'text', $label = null, $options = [])
    {
        $this->fields[] = new Field($this, $name, $type, $label, $options);

        return $this;
    }

    /**
     * Adds new button to this form.
     *
     * @param  string  $type
     * @param  string  $text
     * @param  array  $config
     *
     * @return $this
     */
    protected function addButton($type = Button::SUBMIT, $text = 'Submit', $config = [])
    {
        $this->fields[] = new Button($this, $type, $text, $config);

        return $this;
    }

    /**
     * Sets action for this form.
     *
     * @param $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->config['action'] = $action;

        return $this;
    }

    /**
     * Sets method for this form.
     *
     * @param $action
     *
     * @return $this
     */
    public function setMethod($action)
    {
        $this->config['method'] = $action;

        return $this;
    }

    /**
     * Returns all fields.
     *
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Returns form attributes.
     *
     * @return string
     */
    public function getAttributes()
    {
        $attrs = $this->config;

        $attributes = array_map(function ($key) use ($attrs) {
            if (is_bool($attrs[$key])) {
                return $attrs[$key] ? $key : '';
            }
            return $key.'="'.$attrs[$key].'"';
        }, array_keys($this->config));

        return join(' ', $attributes);
    }

    /**
     * Renders start of form.
     *
     * @return string
     */
    public function renderStart()
    {
        $template = $this->getTemplate('start');

        return $template->render();
    }

    /**
     * Renders end of form.
     *
     * @return string
     */
    public function renderEnd()
    {
        $template = $this->getTemplate('end');

        return $template->render();
    }

    /**
     * Selects template for part of form.
     *
     * @param $type
     *
     * @return mixed
     */
    private function getTemplate($type)
    {
        return view('laravel-form::'.$type, ['form' => $this]);
    }

    /**
     * Returns CSS class for part of form.
     *
     * @param  string  $type
     *
     * @return string
     */
    public function getClass($type)
    {
        return config('laravel-form.classes.'.config('laravel-form.style').'.'.$type);
    }
}
