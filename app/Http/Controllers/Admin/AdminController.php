<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\User;
use App\Notifications\SendContactEmail;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\SendReservationEmail;

use Brian2694\Toastr\Facades\Toastr;
class AdminController extends Controller
{

    function profile(){
        return view('admin.profile.show');
    }
    function index()
    {
        return view('admin.dashboard');
    }
    function user()
    {
        return view('user.dashboard');
    }


    function restoreReservation($id)
    {
        Reservation::withTrashed()->find($id)->restore();
        return redirect()->route('reservation.index');
    }
    function forcedDeleteReservation($id)
    {
        Reservation::withTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
    function cancelReservation($id)
    {
        $reservation =  Reservation::find($id);
        $reservation->status = 'cancelled';
        $reservation->save();
        Toastr::error(' Reservation Has been cancelled', 'Cancelled', ["positionClass" => "toast-top-right"]);
        return redirect()->route('reservation.index');
    }
    function confirmedReservation($id)
    {
        // $user = User::all();
        $reservation = Reservation::find($id);
        $reservation->status = 'confirmed';
        $reservation->save();

        $details = [
            'name' => $reservation->name,
            'email' => $reservation->email,
            'phone' => $reservation->phone,
            'date' => $reservation->date,
            'time' => $reservation->time,
            'people' => $reservation->people,

        ];

        Notification::send($reservation, new SendReservationEmail($details));
        Toastr::success(' Confirmation Mail Has been Send', 'Confirmed', ["positionClass" => "toast-top-right"]);
        return redirect()->route('reservation.index');
    }

    function contact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;


        $contact->save();

        $details = [
            'name' => $contact->name,
            'email' => $contact->email,
            'subject' => $contact->subject,
            'message' => $contact->message,
        

        ];
        Notification::route('mail','resturantlyreservation@gmail.com')->notify(new SendContactEmail($details));
        Toastr::success(' Thanks For Contacting With Us', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    function contactShow(){
        return view('admin.contact.index',[
            'contacts'=>Contact::latest()->get(),
            
        ]);
    }

    function contactSeen($id){
        Reservation::find($id)->delete();

        return redirect()->view('admin.contact.index');
    }
}
