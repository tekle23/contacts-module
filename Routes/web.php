<?php

use Modules\Contacts\Http\Controllers\ContactsController;

Route::middleware(['auth', 'splade'])->prefix('admin/contacts')->group(function () {
    Route::get('/', [ContactsController::class, 'index'])->name('admin.contacts.index');
    Route::get('create', [ContactsController::class, 'create'])->name('admin.contacts.create');
    Route::post('create', [ContactsController::class, 'store'])->name('admin.contacts.store');
    Route::get('edit/{id}', [ContactsController::class, 'edit'])->name('admin.contacts.edit');
    Route::get('detail/{contact}', [ContactsController::class, 'show'])->name('admin.contacts.show');
    Route::patch('edit/{id}', [ContactsController::class, 'update'])->name('admin.contacts.update');
    Route::delete('delete/{id}', [ContactsController::class, 'destroy'])->name('admin.contacts.delete');
});
