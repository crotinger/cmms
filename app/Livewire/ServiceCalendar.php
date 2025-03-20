<?php

namespace App\Livewire;

use App\Models\ServiceOrder;
use Carbon\Carbon;
use Livewire\Component;

class ServiceCalendar extends Component
{
    public Carbon $currentMonth;
    public array $days = [];

    public function mount(): void
    {
        $this->currentMonth = Carbon::now()->startOfMonth();
        $this->generateDays();
    }

    public function previousMonth(): void
    {
        $this->currentMonth = $this->currentMonth->copy()->subMonth()->startOfMonth();
        $this->generateDays();
    }

    public function nextMonth(): void
    {
        $this->currentMonth = $this->currentMonth->copy()->addMonth()->startOfMonth();
        $this->generateDays();
    }

    private function generateDays(): void
    {
        $start = $this->currentMonth->copy()->startOfWeek();
        $end = $this->currentMonth->copy()->endOfMonth()->endOfWeek();

        $this->days = collect(range($start->timestamp, $end->timestamp, 86400))
            ->map(fn($timestamp) => Carbon::createFromTimestamp($timestamp))
            ->toArray();
    }

    public function getOrdersForDate(Carbon $date)
    {
        return ServiceOrder::whereDate('service_date', $date->toDateString())->get();
    }

    public function render()
    {
        return view('livewire.service-calendar', [
            'currentMonth' => $this->currentMonth,
            'days' => $this->days,
        ]);
    }
}
