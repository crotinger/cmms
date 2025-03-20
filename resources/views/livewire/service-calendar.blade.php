<div class="p-4 bg-white shadow rounded-md">
    <header class="flex justify-between items-center mb-4">
        <button wire:click="previousMonth" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">&lt;</button>
        <h2 class="text-2xl font-bold text-center">{{ $currentMonth->format('F Y') }}</h2>
        <button wire:click="nextMonth" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">&gt;</button>
    </header>

    <div class="grid grid-cols-7 gap-1 text-center bg-gray-100 p-2 rounded">
        @foreach(['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $weekday)
            <div class="font-semibold py-2">{{ $weekday }}</div>
        @endforeach

        @foreach($days as $day)
            <div class="border p-2 h-24 rounded-md flex flex-col items-center {{ $day->month !== $currentMonth->month ? 'bg-gray-200 text-gray-500' : 'bg-white' }}">
                <div class="font-medium">{{ $day->day }}</div>
                
                @foreach($this->getOrdersForDate($day) as $order)
                    <div class="mt-1 text-xs bg-blue-500 text-white px-2 py-1 rounded-md">
                        {{ $order->pivot_model }}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
