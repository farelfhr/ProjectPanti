<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Donasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Filter Donasi</h3>
                        <a href="{{ route('panti.donations.export', request()->query()) }}" 
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            📊 Export CSV
                        </a>
                    </div>
                    <form method="GET" action="{{ route('panti.donations.history') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <x-input-label for="type" :value="__('Jenis Donasi')" />
                            <select id="type" name="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Semua Jenis</option>
                                <option value="tunai" {{ request('type') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="non-tunai" {{ request('type') == 'non-tunai' ? 'selected' : '' }}>Non-Tunai</option>
                            </select>
                        </div>
                        
                        <div>
                            <x-input-label for="start_date" :value="__('Tanggal Mulai')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="request('start_date')" />
                        </div>
                        
                        <div>
                            <x-input-label for="end_date" :value="__('Tanggal Akhir')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="request('end_date')" />
                        </div>
                        
                        <div class="flex items-end">
                            <x-primary-button type="submit" class="w-full">
                                Filter
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Grafik Donasi (12 Bulan Terakhir)</h3>
                    <div class="h-64">
                        <canvas id="donationChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Donations Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Daftar Donasi</h3>
                    
                    @if($donations->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Donatur</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah/Item</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catatan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($donations as $donation)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donation->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $donation->user->name ?? 'Anonim' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $donation->type == 'tunai' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                                    {{ ucfirst($donation->type) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @if($donation->type == 'tunai')
                                                    Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                                @else
                                                    {{ $donation->donation_items ?? 'Item' }}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $donation->status == 'completed' ? 'bg-green-100 text-green-800' : ($donation->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($donation->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ Str::limit($donation->notes, 50) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if($donation->status == 'pending')
                                                    <div class="flex space-x-2">
                                                        <form action="{{ route('panti.donations.confirm', $donation) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" 
                                                                    class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs"
                                                                    onclick="return confirm('Konfirmasi donasi ini?')">
                                                                ✓ Konfirmasi
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('panti.donations.reject', $donation) }}" method="POST" class="inline">
                                                            @csrf
                                                            <button type="submit" 
                                                                    class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs"
                                                                    onclick="return confirm('Tolak donasi ini?')">
                                                                ✗ Tolak
                                                            </button>
                                                        </form>
                                                    </div>
                                                @elseif($donation->status == 'completed')
                                                    <span class="text-green-600 text-xs">✓ Dikonfirmasi</span>
                                                @elseif($donation->status == 'cancelled')
                                                    <span class="text-red-600 text-xs">✗ Ditolak</span>
                                                @else
                                                    <span class="text-gray-500 text-xs">{{ ucfirst($donation->status) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-4">
                            {{ $donations->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500">Belum ada donasi yang masuk.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('donationChart').getContext('2d');
            
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($donationChartData['months']),
                    datasets: [
                        {
                            label: 'Donasi Tunai (Rp)',
                            data: @json($donationChartData['cash']),
                            borderColor: 'rgb(34, 197, 94)',
                            backgroundColor: 'rgba(34, 197, 94, 0.1)',
                            tension: 0.1
                        },
                        {
                            label: 'Donasi Non-Tunai (Jumlah)',
                            data: @json($donationChartData['nonCash']),
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout> 