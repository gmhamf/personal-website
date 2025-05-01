@extends('layouts.app')

@section('title', __('إدارة المهام'))

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- الهيدر -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gold-500 mb-4">
            <i class="fas fa-tasks mr-2"></i>{{ __('إدارة المهام') }}
        </h1>
    </div>

    <!-- نموذج الإضافة -->
    <div class="bg-gray-800 rounded-xl p-6 mb-8 border border-gold-500">
        <form id="taskForm" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block mb-2 text-gold-500">{{ __('العنوان') }}</label>
                    <input type="text" id="title" class="w-full bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-gold-500">
                </div>
                <div>
                    <label class="block mb-2 text-gold-500">{{ __('الوصف') }}</label>
                    <textarea id="description" class="w-full bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-gold-500"></textarea>
                </div>
                <div>
                    <label class="block mb-2 text-gold-500">{{ __('التاريخ') }}</label>
                    <input type="date" id="due_date" class="w-full bg-gray-700 rounded-lg p-3 focus:ring-2 focus:ring-gold-500">
                </div>
            </div>
            <button type="submit" class="w-full bg-gold-500 hover:bg-gold-600 text-white py-3 rounded-lg transition">
                {{ __('إضافة مهمة') }}
            </button>
        </form>
    </div>

    <!-- قائمة المهام -->
    <div class="bg-gray-800 rounded-xl p-6 border border-gold-500">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl text-gold-500">{{ __('المهام الحالية') }}</h2>
            <select id="filter" class="bg-gray-700 rounded-lg p-2 text-gold-500">
                <option value="all">{{ __('الكل') }}</option>
                <option value="completed">{{ __('مكتملة') }}</option>
                <option value="pending">{{ __('معلقة') }}</option>
            </select>
        </div>

        <div class="space-y-4">
            @foreach($tasks as $task)
            <div class="task bg-gray-700 p-4 rounded-lg border-l-4 {{ $task->completed ? 'border-green-500' : 'border-red-500' }}">
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
                        <p class="text-gray-400 mt-2">{{ $task->description }}</p>
                        <div class="mt-3 text-sm text-gold-500">
                            <i class="fas fa-calendar-day mr-2"></i>{{ $task->due_date }}
                        </div>
                    </div>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <button class="toggle-status px-4 py-2 rounded-lg {{ $task->completed ? 'bg-yellow-500' : 'bg-green-500' }} text-white"
                                data-id="{{ $task->id }}">
                            {{ $task->completed ? __('إعادة فتح') : __('إكمال') }}
                        </button>
                        <button class="delete-task bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg transition"
                                data-id="{{ $task->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // إضافة مهمة
    document.getElementById('taskForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const data = {
            title: document.getElementById('title').value,
            description: document.getElementById('description').value,
            due_date: document.getElementById('due_date').value,
            _token: '{{ csrf_token() }}'
        };

        try {
            const response = await fetch('/tasks', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
            });

            if(response.ok) window.location.reload();
        } catch (error) {
            console.error('Error:', error);
        }
    });

    // إدارة المهام
    document.querySelectorAll('.toggle-status').forEach(btn => {
        btn.addEventListener('click', async () => {
            const taskId = btn.dataset.id;

            try {
                await fetch(`/tasks/${taskId}/toggle`, {
                    method: 'PUT',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                });
                window.location.reload();
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });

    document.querySelectorAll('.delete-task').forEach(btn => {
        btn.addEventListener('click', async () => {
            if(confirm('{{ __("هل أنت متأكد؟") }}')) {
                const taskId = btn.dataset.id;

                try {
                    await fetch(`/tasks/${taskId}`, {
                        method: 'DELETE',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                    });
                    window.location.reload();
                } catch (error) {
                    console.error('Error:', error);
                }
            }
        });
    });

    // الفلترة
    document.getElementById('filter').addEventListener('change', (e) => {
        window.location.href = `/tasks?filter=${e.target.value}`;
    });
});
</script>
@endpush
@endsection
