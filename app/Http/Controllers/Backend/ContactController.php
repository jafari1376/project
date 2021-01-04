<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Contact;
use App\User;


class ContactController extends Controller
{
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $contacts=Contact::with('user')->latest()->paginate(10);
        return  response()->view('admin.contacts.index',compact(['contacts','user']));

    }

    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $contact=Contact::with('user')->findOrFail($id);
        return  response()->view('admin.contacts.show',compact(['contact','user']));
    }

    public function destroy($id)
    {
        $contact=Contact::findOrFail($id);
        $contact->delete();
        alert()->success('اطلاعات انتقادادات و پیشنهادات با موفقیت حذف شد.',' انتقادات و پیشنهادات')->persistent('بستن');
        return back();
    }
}
