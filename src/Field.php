<?php

namespace JakubHonisek\LaravelForm;

class Field
{
    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const SELECT = 'select';
    const CHECKBOX = 'checkbox';
    const RADIO = 'radio';
    const PASSWORD = 'password';
    const EMAIL = 'email';
    const SEARCH = 'search';
    const URL = 'url';
    const TEL = 'tel';
    const NUMBER = 'number';
    const HIDDEN = 'hidden';

    const DATE = 'date';
    const DATETIME_LOCAL = 'datetime-local';
    const MONTH = 'month';
    const TIME = 'time';
    const WEEK = 'week';

    // @todo
    //const FILE = 'file';
    //const COLOR = 'color';
    //const IMAGE = 'image';
    //const RANGE = 'range';

    /**
     * @var \JakubHonisek\LaravelForm\Form
     */
    private $form;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $wrapper;

    /**
     * @var null|string
     */
    public $label;

    /**
     * @var string
     */
    public $value;

    /**
     * @var bool
     */
    public $required;

    /**
     * @var bool
     */
    public $empty;

    /**
     * @var string
     */
    public $empty_value;

    /**
     * @var array
     */
    public $options;

    /**
     * @var array
     */
    public $customAttributes;

    /**
     * @var bool
     */
    public $disabled;

    /**
     * Field constructor.
     *
     * @param  \JakubHonisek\LaravelForm\Form  $form
     * @param  string  $name
     * @param  string  $type
     * @param  null|string  $label
     * @param  array  $config
     */
    public function __construct(Form $form, $name, $type, $label = null, $config = [])
    {
        $this->form = $form;
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;

        $this->value = $config['value'] ?? ($this->form->model ? $this->form->model->$name : '');
        $this->value = old($this->name) ?? $this->value;

        $this->required = $config['required'] ?? false;
        $this->empty = $config['empty'] ?? false;
        $this->empty_value = $config['empty_value'] ?? '';
        $this->options = $config['options'] ?? [];
        $this->customAttributes = $config['attrs'] ?? [];
        $this->wrapper = $config['wrapper'] ?? true;
        $this->disabled = $config['disabled'] ?? false;
    }

    /**
     * Returns field attributes.
     *
     * @return string
     */
    public function getAttributes()
    {
        $attrs = $this->customAttributes;
        $attrs['required'] = $this->required;
        $attrs['disabled'] = $this->disabled;

        $attributes = array_map(function ($key) use ($attrs) {
            if (is_bool($attrs[$key])) {
                return $attrs[$key] ? $key : '';
            }
            return $key.'="'.$attrs[$key].'"';
        }, array_keys($attrs));

        return join(' ', $attributes);
    }

    /**
     * Renders input.
     *
     * @return string
     */
    public function render()
    {
        $template = $this->getTemplate();

        return $template->render();
    }

    /**
     * Selects template for input.
     *
     * @return mixed
     */
    protected function getTemplate()
    {
        switch ($this->type) {
            case self::TEXT:
            case self::PASSWORD:
            case self::EMAIL:
            case self::SEARCH:
            case self::URL:
            case self::TEL:
            case self::NUMBER:
            case self::DATE:
            case self::DATETIME_LOCAL:
            case self::MONTH:
            case self::TIME:
            case self::WEEK:
                return view('laravel-form::fields.input', ['field' => $this]);
                break;
            default:
                return view('laravel-form::fields.'.$this->type, ['field' => $this]);
        }
    }

    /**
     * @param  string  $type
     *
     * @return string
     */
    public function getClass($type = 'input')
    {
        return $this->form->getClass($type);
    }
}
