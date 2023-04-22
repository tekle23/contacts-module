<?php

namespace Modules\Contacts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contacts\Http\Forms\CreateContactsForm;
use Modules\Contacts\Models\Contact;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;

class ContactsController extends Controller
{
    public function index()
    {
        $status = [
            'yes' => 'Yes',
            'no' => 'No',
        ];

        $contacts = Querybuilder::for(Contact::class)
            ->defaultSort('name')
            ->allowedFilters(['name', 'seen'])
            ->paginate(10)
            ->withQueryString();


        return view('contacts::index', [

            'contacts' => SpladeTable::for($contacts)
                ->defaultSort('name')
                ->column('name', canBeHidden: false, sortable: true, searchable: true)
                ->column('email', canBeHidden: true, sortable: true, searchable: true)
                ->column('subject', canBeHidden: true)
                ->selectFilter('seen', $status)
                ->column('seen')
                ->column('action')
            /* ->rowLink(function (Contact $contact) {
                    return route('admin.contacts.show', $contact);
                }) */
        ]);
    }

    public function create()
    {
        return view('contacts::create', [
            //'form' => $form,
            'form' => CreateContactsForm::class,
        ]);
    }

    public function show(Contact $contact)
    {
        return view('contacts::detail', [
            'contact' => $contact
        ]);
    }

    public function store(Request $request, CreateContactsForm $form)
    {
        $data = $form->validate($request);
        Contact::create($data);
        Toast::title('success')->autoDismiss(5);
        //SpladeForm::make()->stay(actionOnSuccess: 'reset');
        return redirect(route('admin.contacts.index'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts::edit', [
            'form' => CreateContactsForm::class,
            'contact' => $contact
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Contact::findOrFail($id)->update([
            'name' => $request->input('name')
        ]);

        return redirect(route('app.contacts.index'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        Toast::title('success')->autoDismiss(5);
        return redirect(route('admin.contacts.index'));
    }
}
