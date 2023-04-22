<?php

namespace Modules\Contacts\Http\Forms;

use ProtoneMedia\Splade\AbstractForm;
use ProtoneMedia\Splade\FormBuilder\Email;
use ProtoneMedia\Splade\FormBuilder\Input;
//use ProtoneMedia\Splade\Components\Form\Input;
//use ProtoneMedia\Splade\Components\Form\Textarea;
//use ProtoneMedia\Splade\FormBuilder\Input as FormBuilderInput;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;

class CreateContactsForm extends AbstractForm
{
    public function configure(SpladeForm $form)
    {
        SpladeForm::make()->stay();
        $form
            ->action(route('admin.contacts.store'))
            ->method('POST')
            ->class('space-y-4')
            ->preserveScroll()
            //->submitOnChange(watchFields: 'theme')
            ->fill([]);
    }

    public function fields(): array
    {
        return [
            Input::make('name')->label('Name'),
            Email::make('email')->label('Email')->rules('required', 'max:255'),
            Input::make('subject')->label('Subject')->rules('required', 'max:255'),
            Textarea::make('body')->label('Body')->rules('required'),
            // Input::make('theme'),
            Submit::make()->label('Send'),

        ];
    }
}
