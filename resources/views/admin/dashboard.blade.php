<style>
    hr {
        border-top: 1px solid #ccc !important;
        margin-top: 5px !important; margin-bottom: 5px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel Administrador') }} - <span style="color: red;">{{ $user->name }}</span>
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col mt-5 g-2">
                <div class="sm:px-6 lg:px-8">
                    <div class="bg-lightblue dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-xl font-semibold mb-4 text-blue-700 dark:text-blue-300">
                                Atividade de Usuários
                            </h3>
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <canvas id="userChart" class="w-full h-64"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mt-5">
                    <div class="bg-lightblue border border-3 border-success p-4 mt-5 rounded-2">
                        <div>
                            <h1 class="font_150 text-green">Usuários</h1><hr>
                            <span class="text-success text_100">Abra a lista de <strong>USUÁRIOS</strong> existentes no Sistema.</span>
                        </div>
                        <a class="mt-4 btn btn-success" href="{{ route('admin.users.index') }}">Entrar</a>
                    </div>
    
                    <div class="bg-lightblue border border-3 border-primary p-4 mt-5 rounded-2">
                        <div>
                            <h1 class="font_150 text-blue">Contratos</h1><hr>
                            <span class="text-primary text_100">Abra a lista de <strong>CONTRATOS</strong> existentes no Sistema.</span>
                        </div>
                        <a class="mt-4 btn btn-primary" href="{{ route('admin.contracts.index') }}">Entrar</a>
                    </div>
    
                    <!-- <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded" style="margin-right: 40px !Important;">Gerenciar Usuários</a> -->
                    <!-- <a href="{{ route('admin.contracts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-4">Gerenciar Contratos</a> -->
                </div>
            </div>
        </div>
    </div>
    
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('userChart').getContext('2d');
            const userStats = @json($userStats);
            const labels = userStats.map(item => item.month);
            const counts = userStats.map(item => item.count);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Usuários Criados',
                        data: counts,
                        borderColor: 'rgba(37, 99, 235, 1)',
                        backgroundColor: 'rgba(37, 99, 235, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: 'rgba(37, 99, 235, 1)'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Usuários Criados nos Últimos Meses',
                            color: '#FFFF'
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#d4d4d4'
                            },
                            grid: {
                                color: '#d4d4d4'
                            }
                        },
                        y: {
                            ticks: {
                                color: '#d4d4d4'
                            },
                            grid: {
                                color: '#d4d4d4'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
