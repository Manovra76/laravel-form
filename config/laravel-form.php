<?php

return [

    /**
     * Front-end style of form (HTML structure and CSS)
     * Available options:
     *      "bs4": Bootstrap 4
     */
    'style' => 'bs4',

    /**
     * Classes for parts of form and fields, based on selected style
     */
    'classes' => [
        'bs4' => [
            // buttons
            'button-submit' => 'btn btn-primary',
            'button-reset' => 'btn btn-secondary',
            // wrapper
            'wrapper' => 'form-group',
            // inputs
            'input' => 'form-control',
            'invalid-input' => 'is-invalid',
            'invalid-feedback' => 'invalid-feedback',
            'radio-wrapper' => 'custom-control custom-radio',
            'checkbox-wrapper' => 'custom-control custom-checkbox',
            'control-input' => 'custom-control-input',
            'control-label' => 'custom-control-label',
        ],
    ],

];
