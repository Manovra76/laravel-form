<?php

function form(\JakubHonisek\LaravelForm\Form $form)
{
    $return = form_start($form);

    foreach ($form->getFields() as $field) {
        $return .= form_field($field);
    }

    $return .= form_end($form);

    return $return;
}

function form_start(\JakubHonisek\LaravelForm\Form $form)
{
    return $form->renderStart();
}

function form_field($field)
{
    return $field->render();
}

function form_end(\JakubHonisek\LaravelForm\Form $form)
{
    return $form->renderEnd();
}
