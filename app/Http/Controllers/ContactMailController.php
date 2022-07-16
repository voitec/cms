<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMailRequest;
use App\Mail\ContactMail;
use App\Models\ContactMailMessage;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactMailController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactMailRequest $request
     * @return RedirectResponse
     */
    public function store(StoreContactMailRequest $request): RedirectResponse
    {
        try {
            $mail = new ContactMailMessage();
            $mail->fill($request->validated());
            Mail::to(config('cms.email'))->send(new ContactMail($mail));
        } catch(\Exception $e) {
            session()->flash('email_msg', $e->getMessage());
            return back();
        }
        return redirect(route('home').'#contact')->with(['email_msg' => __('messages.email.success')]);
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\ContactMailMessage  $contactMail
//     * @return \Illuminate\Http\Response
//     */
//    public function show(ContactMailMessage $contactMail)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\ContactMailMessage  $contactMail
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(ContactMailMessage $contactMail)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \App\Http\Requests\UpdateContactMailRequest  $request
//     * @param  \App\Models\ContactMailMessage  $contactMail
//     * @return \Illuminate\Http\Response
//     */
//    public function update(UpdateContactMailRequest $request, ContactMailMessage $contactMail)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\ContactMailMessage  $contactMail
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(ContactMailMessage $contactMail)
//    {
//        //
//    }
}
