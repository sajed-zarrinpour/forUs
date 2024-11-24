<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPositions extends Component
{
    use WithPagination;

    public $search = '';  // This will hold the search query

    // Update the pagination style to be Tailwind compatible
    protected $paginationTheme = 'tailwind';

    // Reset search input
    public function resetFilters()
    {
        $this->reset('search');
    }

    // This method will reset the pagination when the search query is updated
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search update
    }

    public function filter()
    {
        $this->render();
    }

    public function render()
    {
        // Search query logic: filter positions based on the input
        $positions = Position::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('location', 'like', '%' . $this->search . '%')
                      ->orWhere('organazaion', 'like', '%' . $this->search . '%'); // Corrected spelling
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.search-positions', [
            'positions' => $positions,
        ]);
    }

    public function delete($id)
    {
        Position::find($id)->delete();
    }
}