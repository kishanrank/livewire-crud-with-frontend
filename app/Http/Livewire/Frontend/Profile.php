<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user, $name, $email;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function render()
    {
        return view('livewire.frontend.profile');
    }

    /*
    * Update user profile
    */

    public function updateProfile()
    {
        $rules = [
            'name' => 'required',
        ];

        $this->validate($rules);
        $this->user->update(['name' => $this->name]);
        session()->flash('message', 'Profile Updated Successfully.');
    }
}
