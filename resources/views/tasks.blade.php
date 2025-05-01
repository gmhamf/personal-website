<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Neon Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @keyframes slideIn {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(234, 179, 8, 0.3);
        }
        .progress-ring__circle {
            transition: stroke-dashoffset 0.35s;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
        .hover-tilt {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-tilt:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(2deg);
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#0f0f0f] to-[#1a1a1a] min-h-screen p-8 text-gray-200 font-sans">

<!-- Notification -->
<div id="notification" class="fixed top-5 right-5 bg-emerald-500/90 text-white px-6 py-3 rounded-xl shadow-xl transform translate-y-[-200%] transition-transform duration-300 flex items-center space-x-3">
    <i class="fas fa-check-circle"></i>
    <span class="notification-message"></span>
</div>

<header class="bg-[#1a1a1a]/80 backdrop-blur-xl rounded-2xl p-5 mb-8 shadow-xl max-w-4xl mx-auto border border-amber-500/20 neon-glow hover-tilt">
    <nav class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div class="h-10 w-10 bg-amber-500/10 rounded-lg flex items-center justify-center">
                <i class="fas fa-clipboard-list text-amber-400 text-xl"></i>
            </div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">
                Neon Task Manager
            </h1>
        </div>

        <!-- زر الرجوع المميز -->
        <a href="/" class="flex items-center space-x-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-lg shadow hover:from-amber-600 hover:to-orange-600 transition-all transform hover:scale-105">
            <i class="fas fa-arrow-left transition-transform duration-300 hover:-translate-x-1"></i>
            <span>Back to Home</span>
        </a>
    </nav>
</header>

<main class="max-w-4xl mx-auto space-y-8">

    <!-- Add Task Card -->
    <div class="bg-[#1a1a1a]/80 backdrop-blur-xl rounded-2xl p-6 shadow-2xl border border-amber-500/20 neon-glow hover-tilt">
        <form id="taskForm" class="space-y-5">
            <div class="flex space-x-4">
                <div class="flex-1 relative">
                    <input type="text" id="taskTitle" placeholder="Task title"
                           class="w-full p-4 bg-[#222222] rounded-xl border-2 border-amber-500/20 focus:border-amber-500/40 text-gray-200 placeholder-gray-500 transition-all outline-none"
                           required>
                </div>
                <div class="relative">
                    <input type="date" id="taskDueDate"
                           class="w-48 p-4 bg-[#222222] rounded-xl border-2 border-amber-500/20 focus:border-amber-500/40 text-gray-200 transition-all outline-none"
                           min="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <div class="relative">
                <textarea id="taskDescription" rows="3" placeholder="Description"
                          class="w-full p-4 bg-[#222222] rounded-xl border-2 border-amber-500/20 focus:border-amber-500/40 text-gray-200 placeholder-gray-500 resize-none transition-all outline-none"></textarea>
            </div>

            <button type="submit" id="submitBtn"
                    class="w-full px-8 py-3.5 bg-gradient-to-r from-amber-400 to-orange-400 hover:from-amber-500 hover:to-orange-500 text-gray-900 font-bold rounded-xl transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg">
                <i class="fas fa-plus mr-2"></i>Create Task
            </button>
        </form>
    </div>

    <!-- Tasks Container -->
    <div id="tasksContainer" class="space-y-4">
        @foreach($tasks as $task)
            <div class="task-card group bg-[#1a1a1a]/80 backdrop-blur-xl p-5 rounded-2xl border-2 border-amber-500/20 hover:border-amber-500/40 transition-all neon-glow hover-tilt"
                 data-id="{{ $task->id }}"
                 data-due-date="{{ $task->due_date->format('Y-m-d') }}"
                 data-progress="{{ $task->progress }}">
                <div class="flex items-start justify-between">
                    <div class="relative mr-4">
                        <svg class="progress-ring w-12 h-12">
                            <circle class="progress-ring__circle" stroke="currentColor" stroke-width="4"
                                    fill="transparent" r="20" cx="24" cy="24"/>
                        </svg>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                            <i class="fas {{ $task->completed ? 'fa-check text-emerald-400' : 'fa-spinner text-amber-400' }} text-lg"></i>
                            <span class="text-xs text-amber-400 block mt-1 progress-text">{{ $task->progress }}%</span>
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold {{ $task->completed ? 'line-through text-gray-500' : 'text-gray-200' }}">
                                {{ $task->title }}
                            </h3>
                            <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button onclick="toggleTask({{ $task->id }})" class="p-2 bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 rounded-lg">
                                    <i class="fas {{ $task->completed ? 'fa-undo' : 'fa-check' }} text-sm"></i>
                                </button>
                                <button onclick="showEditModal({{ $task->id }})" class="p-2 bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 rounded-lg">
                                    <i class="fas fa-edit text-sm"></i>
                                </button>
                                <button onclick="deleteTask({{ $task->id }})" class="p-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>

                        @if($task->description)
                            <p class="mt-2 text-gray-400 text-sm leading-relaxed">
                                {{ $task->description }}
                            </p>
                        @endif

                        <div class="mt-3 flex items-center space-x-4 text-sm">
                            <div class="flex items-center space-x-2 text-amber-400">
                                <i class="fas fa-calendar-day"></i>
                                <span>{{ $task->due_date->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-emerald-400">
                                <i class="fas fa-clock"></i>
                                <span>{{ $task->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</main>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4">
    <div class="bg-[#1a1a1a]/90 backdrop-blur-xl rounded-2xl p-6 max-w-md w-full border border-amber-500/20 neon-glow">
        <form id="editForm" class="space-y-4">
            <div class="flex justify-between items-center pb-2 border-b border-amber-500/20">
                <h3 class="text-xl font-bold text-amber-400">Edit Task</h3>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-amber-400">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm text-amber-400 mb-2">Task Title</label>
                    <input type="text" id="editTitle" class="w-full p-3 bg-[#222222] rounded-lg border border-amber-500/20 focus:border-amber-500/40 text-gray-200" required>
                </div>

                <div>
                    <label class="block text-sm text-amber-400 mb-2">Description</label>
                    <textarea id="editDescription" rows="3" class="w-full p-3 bg-[#222222] rounded-lg border border-amber-500/20 focus:border-amber-500/40 text-gray-200"></textarea>
                </div>

                <div>
                    <label class="block text-sm text-amber-400 mb-2">Due Date</label>
                    <input type="date" id="editDueDate" class="w-full p-3 bg-[#222222] rounded-lg border border-amber-500/20 focus:border-amber-500/40 text-gray-200" required>
                </div>

                <div>
                    <label class="block text-sm text-amber-400 mb-2">Progress</label>
                    <input type="range" id="editProgress" min="0" max="100"
                           class="w-full bg-amber-500/20 rounded-lg"
                           oninput="document.getElementById('progressValue').textContent = this.value + '%'">
                    <span id="progressValue" class="text-amber-400 text-sm block text-center"></span>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-700/50 hover:bg-gray-700 text-gray-300 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-amber-500/90 hover:bg-amber-600 text-gray-900 font-bold rounded-lg">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
<footer class="glass-effect border-t border-amber-500/20 backdrop-blur-xl py-8 mt-12 neon-glow" data-aos="fade-up" data-aos-duration="1000">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Social Links -->
        <div class="flex justify-center space-x-6 mb-6">
            <a href="https://github.com/gmhamf" target="_blank"
               class="social-icon p-3 bg-amber-500/10 rounded-full hover:bg-amber-500/20 transition-all duration-300 group">
                <i class="fab fa-github text-2xl text-amber-400 group-hover:text-orange-400 group-hover:scale-110 transition-transform"></i>
            </a>
            <a href="https://www.linkedin.com/in/mohammed-sadeq-zuhair-sadeq-1aa6112b7/" target="_blank"
               class="social-icon p-3 bg-amber-500/10 rounded-full hover:bg-amber-500/20 transition-all duration-300 group">
                <i class="fab fa-linkedin text-2xl text-amber-400 group-hover:text-orange-400 group-hover:scale-110 transition-transform"></i>
            </a>
        </div>

        <!-- Contact Info -->
        <div class="text-center space-y-2 text-amber-400/80">
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-6">
                <div class="flex items-center space-x-2 hover:text-orange-400 transition-colors">
                    <i class="fas fa-phone"></i>
                    <span>+964 780 087 3450</span>
                </div>
                <div class="hidden md:block">•</div>
                <div class="flex items-center space-x-2 hover:text-orange-400 transition-colors">
                    <i class="fas fa-envelope"></i>
                    <span>gmhamf@gmail.com</span>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-4 border-t border-amber-500/10 mt-4">
                <p class="text-sm font-light">
                    © 2025 Mohammed Sadeq Zuhair. All rights reserved.<br class="md:hidden">
                    <i class="fas fa-heart text-red-400"></i>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.glass-effect {
    background: linear-gradient(135deg, rgba(26,26,26,0.7) 0%, rgba(15,15,15,0.9) 100%);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.neon-glow {
    box-shadow: 0 0 25px rgba(234, 179, 8, 0.15);
}

.social-icon {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 0 15px rgba(234, 179, 8, 0.1);
}

.social-icon:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 25px rgba(234, 179, 8, 0.3);
}
</style>

<script>
// Progress Rings Initialization
function initProgressRings() {
    document.querySelectorAll('.progress-ring').forEach(ring => {
        const circle = ring.querySelector('circle');
        const radius = circle.r.baseVal.value;
        const circumference = 2 * Math.PI * radius;
        const progress = parseFloat(ring.closest('.task-card').dataset.progress);

        circle.style.strokeDasharray = circumference;
        circle.style.strokeDashoffset = circumference - (progress / 100 * circumference);
    });
}

// Notification System
function showNotification(message, type = 'success') {
    const notification = document.getElementById('notification');
    notification.querySelector('.notification-message').textContent = message;
    notification.className = `fixed top-5 right-5 px-6 py-3 rounded-xl shadow-xl transform transition-transform duration-300 flex items-center space-x-3 ${type === 'error' ? 'bg-red-500/90' : 'bg-emerald-500/90'}`;
    notification.style.transform = 'translateY(0)';
    setTimeout(() => notification.style.transform = 'translateY(-200%)', 3000);
}

// Create New Task
document.getElementById('taskForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating...';

    try {
        const response = await fetch("{{ route('tasks.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                title: document.getElementById('taskTitle').value,
                description: document.getElementById('taskDescription').value,
                due_date: document.getElementById('taskDueDate').value,
                progress: 0
            })
        });

        const data = await response.json();

        if(data.status === 'success') {
            const taskDiv = createTaskElement(data.task);
            document.getElementById('tasksContainer').prepend(taskDiv);
            document.getElementById('taskForm').reset();
            initProgressRings();
            showNotification('Task created successfully!');
        }
    } catch (error) {
        showNotification('Error creating task!', 'error');
    } finally {
        btn.innerHTML = '<i class="fas fa-plus mr-2"></i>Create Task';
    }
});

// Create Task Element
function createTaskElement(task) {
    const div = document.createElement('div');
    div.className = 'task-card group bg-[#1a1a1a]/80 backdrop-blur-xl p-5 rounded-2xl border-2 border-amber-500/20 hover:border-amber-500/40 transition-all neon-glow hover-tilt';
    div.dataset.id = task.id;
    div.dataset.dueDate = task.due_date;
    div.dataset.progress = task.progress;

    div.innerHTML = `
        <div class="flex items-start justify-between">
            <div class="relative mr-4">
                <svg class="progress-ring w-12 h-12">
                    <circle class="progress-ring__circle" stroke="currentColor" stroke-width="4"
                            fill="transparent" r="20" cx="24" cy="24"/>
                </svg>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                    <i class="fas ${task.completed ? 'fa-check text-emerald-400' : 'fa-spinner text-amber-400'} text-lg"></i>
                    <span class="text-xs text-amber-400 block mt-1 progress-text">${task.progress}%</span>
                </div>
            </div>

            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold ${task.completed ? 'line-through text-gray-500' : 'text-gray-200'}">
                        ${task.title}
                    </h3>
                    <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button onclick="toggleTask(${task.id})" class="p-2 bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 rounded-lg">
                            <i class="fas ${task.completed ? 'fa-undo' : 'fa-check'} text-sm"></i>
                        </button>
                        <button onclick="showEditModal(${task.id})" class="p-2 bg-blue-500/10 hover:bg-blue-500/20 text-blue-400 rounded-lg">
                            <i class="fas fa-edit text-sm"></i>
                        </button>
                        <button onclick="deleteTask(${task.id})" class="p-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-lg">
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </div>
                </div>
                ${task.description ? `<p class="mt-2 text-gray-400 text-sm leading-relaxed">${task.description}</p>` : ''}
                <div class="mt-3 flex items-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2 text-amber-400">
                        <i class="fas fa-calendar-day"></i>
                        <span>${new Date(task.due_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</span>
                    </div>
                    <div class="flex items-center space-x-2 text-emerald-400">
                        <i class="fas fa-clock"></i>
                        <span>${new Date(task.created_at).toLocaleDateString()}</span>
                    </div>
                </div>
            </div>
        </div>
    `;
    return div;
}

// Edit Task Functions
let currentEditTaskId = null;

function showEditModal(taskId) {
    const taskElement = document.querySelector(`[data-id="${taskId}"]`);
    currentEditTaskId = taskId;

    document.getElementById('editTitle').value = taskElement.querySelector('h3').textContent;
    document.getElementById('editDescription').value = taskElement.querySelector('p.text-gray-400')?.textContent || '';
    document.getElementById('editDueDate').value = taskElement.dataset.dueDate;
    document.getElementById('editProgress').value = taskElement.dataset.progress;
    document.getElementById('progressValue').textContent = taskElement.dataset.progress + '%';

    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    currentEditTaskId = null;
}

// Update Task
document.getElementById('editForm').addEventListener('submit', (e) => {
    e.preventDefault();
    if (!currentEditTaskId) return;

    const formData = {
        title: document.getElementById('editTitle').value,
        description: document.getElementById('editDescription').value,
        due_date: document.getElementById('editDueDate').value,
        progress: document.getElementById('editProgress').value,
        _token: document.querySelector('meta[name="csrf-token"]').content
    };

    fetch(`/tasks/${currentEditTaskId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const taskElement = document.querySelector(`[data-id="${currentEditTaskId}"]`);
            taskElement.querySelector('h3').textContent = data.task.title;
            taskElement.dataset.dueDate = data.task.due_date;
            taskElement.dataset.progress = data.task.progress;
            taskElement.querySelector('p.text-gray-400').textContent = data.task.description || '';
            taskElement.querySelector('.progress-text').textContent = data.task.progress + '%';

            const circle = taskElement.querySelector('.progress-ring__circle');
            const radius = circle.r.baseVal.value;
            const circumference = 2 * Math.PI * radius;
            circle.style.strokeDashoffset = circumference - (data.task.progress / 100 * circumference);

            closeEditModal();
            showNotification('Task updated successfully!');
        }
    });
});

// Toggle Task Status
function toggleTask(taskId) {
    fetch(`/tasks/${taskId}/toggle`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const taskElement = document.querySelector(`[data-id="${taskId}"]`);
            const icon = taskElement.querySelector('.fa-spinner, .fa-check');
            icon.classList.toggle('fa-spinner');
            icon.classList.toggle('fa-check');
            icon.classList.toggle('text-amber-400');
            icon.classList.toggle('text-emerald-400');
            taskElement.querySelector('h3').classList.toggle('line-through');
            taskElement.querySelector('h3').classList.toggle('text-gray-500');
            showNotification('Task status updated!');
        }
    });
}

// Delete Task
function deleteTask(taskId) {
    if (confirm('Are you sure you want to delete this task?')) {
        fetch(`/tasks/${taskId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.querySelector(`[data-id="${taskId}"]`).remove();
                showNotification('Task deleted successfully!');
            }
        });
    }
}

// Initialize on load
initProgressRings();
</script>

</body>
</html>
