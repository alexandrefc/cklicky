<?php

namespace App\Http\Livewire;

use App\Http\Repositories\PointRepository;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class LoadMore extends Component
{
    protected $listeners = [
        'load-more' => 'loadMore',
    ];

    public Model $model;

    

    public function loadMore(PointRepository $pointRepository)
    {
        $point = $pointRepository->getAllTestingPoints();
       
        
    }
    public function render()
    {
        return view('livewire.load-more');
    }
}
