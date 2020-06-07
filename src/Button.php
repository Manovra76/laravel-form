<?php

namespace JakubHonisek\LaravelForm;

class Button
{
    const SUBMIT = 'submit';
    const RESET = 'reset';

    /**
     * @var \JakubHonisek\LaravelForm\Form
     */
    public $form;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $wrapper = true;

    /**
     * Button constructor.
     *
     * @param  \JakubHonisek\LaravelForm\Form  $form
     * @param  string  $type
     * @param  string  $text
     * @param  array  $config
     */
    public function __construct(Form $form, $type, $text, $config = [])
    {
        $this->form = $form;
        $this->text = $text;
        $this->type = $type;
        $this->wrapper = $config['wrapper'] ?? true;
    }

    /**
     * Renders button.
     *
     * @return string
     */
    public function render()
    {
        $template = $this->getTemplate();

        return $template->render();
    }

    /**
     * Selects template for button.
     *
     * @return mixed
     */
    protected function getTemplate()
    {
        return view('laravel-form::fields.button', ['field' => $this]);
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
