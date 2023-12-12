<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        $meldingen = Notification::all();
        $data = [];
        foreach($meldingen as $melding) {
            $melding->new_stock_ordered = $melding->amount;
            unset($melding->amount);
            unset($melding->updated_at);
            unset($melding->for_role_id);

            $melding->product = $melding->product->name;
            unset($melding->product_id);

            array_push($data, $melding);
        }

        //links per row
        $link_array = [
            ['route' => "notification.edit", 'icon' => "fa-solid fa-check"],
            ['route' => "notification.destroy", 'icon' => "fa-solid fa-xmark"],
        ];

        $table = "notifications";

        return view("meldingen.index", ['meldingen' => $data, 'linkjes' => $link_array, 'table' => $table]);
    }

    public function destroy(Notification $notification) {
        $notification->delete();

        return redirect()->route('notification.index');
    }

    public function edit(Notification $notification) {
        $data = ["isApproved" => 1];
        $notification->update($data);
        return redirect()->route('notification.index');
    }
}
