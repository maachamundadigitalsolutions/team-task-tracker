<?php

// namespace App\Livewire;

// use Livewire\Component;

// class ApiExample extends Component
// {
//     public function render()
//     {
//         return view('livewire.api-example');
//     }
// }


namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ApiExample extends Component
{
    public $profile;

    public function loadProfile()
    {
        $token = session('api_token'); // login સમયે save કરેલો token
        
        $response = Http::withToken($token)
            ->get('http://127.0.0.1:8000/api/profile');

        $this->profile = $response->json();
    }

    public function render()
    {
        return view('livewire.api-example');
    }
}

