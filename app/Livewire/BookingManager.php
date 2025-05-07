<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $propertyId;
    public $startDate;
    public $endDate;

    public function submit()
    {
        $this->validate([
            'propertyId' => 'required|exists:properties,id',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        session()->flash('message', 'Réservation effectuée !');
        $this->reset(['propertyId', 'startDate', 'endDate']);
    }

    public function render()
    {
        return view('livewire.booking-manager', [
            'properties' => Property::all(),
        ]);
    }
}
?>