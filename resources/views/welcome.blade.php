<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Job Board - Jobs List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Success Message -->
    @if(session('success'))
    <div class="fixed top-4 right-4 z-50 max-w-sm">
        <div class="bg-emerald-500 text-white px-6 py-4 rounded-lg shadow-lg border-l-4 border-emerald-600 animate-pulse">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    </div>
    @endif

    <!-- Header Section -->
    <div class="gradient-bg text-white py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 tracking-tight">
                Job Board
                <span class="block text-2xl md:text-3xl font-light mt-2 opacity-90">Find Your Dream Career</span>
            </h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
                Discover amazing opportunities from top companies around the world
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 -mt-8 relative z-10">
        <!-- Post Job Button -->
        <div class="text-center mb-12">
            <a href="{{ route('jobs.create') }}" 
               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Post a New Job
            </a>
        </div>

        @if ($jobs->count() > 0)
            <!-- Jobs Grid -->
            <div class="grid gap-6 mb-12">
                @foreach ($jobs as $job)
                    <div class="bg-white rounded-2xl shadow-md card-hover border border-gray-100 overflow-hidden">
                        <div class="p-8">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                                <!-- Job Info -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                                                <a href="{{ route('jobs.show', $job) }}" 
                                                   class="hover:text-primary-600 transition-colors duration-200">
                                                    {{ $job->title }}
                                                </a>
                                            </h2>
                                            <div class="flex flex-wrap items-center gap-4 text-gray-600 mb-3">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                    </svg>
                                                    <span class="font-medium">{{ $job->company }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    <span>{{ $job->location }}</span>
                                                </div>
                                            </div>
                                            <p class="text-gray-700 leading-relaxed">{{ Str::limit($job->description, 150) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col sm:flex-row gap-3 lg:flex-col xl:flex-row">
                                    <!-- Save/Unsave Button -->
                                    @if (session('saved_jobs') && array_key_exists($job->id, session('saved_jobs')))
                                        <form action="{{ route('jobs.unsave', $job->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex items-center justify-center px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-lg transition-colors duration-200 min-w-[100px]">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                                Saved
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('jobs.save', $job->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button class="flex items-center justify-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200 min-w-[100px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                </svg>
                                                Save
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('jobs.edit', $job) }}" 
                                       class="flex items-center justify-center px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white font-medium rounded-lg transition-colors duration-200 min-w-[100px]">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this job?')"
                                            class="flex items-center justify-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 min-w-[100px]">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Saved Jobs Section -->
            @if(session('saved_jobs'))
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-8 mb-12 border border-purple-100">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-purple-800 mb-2">
                            <svg class="w-8 h-8 inline-block mr-3 mb-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            Saved Jobs
                        </h2>
                        <p class="text-purple-600">Your bookmarked opportunities</p>
                    </div>
                    
                    <div class="grid gap-4">
                        @foreach(\App\Models\Job::findMany(session('saved_jobs')) as $savedJob)
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-purple-100 card-hover">
                                <h3 class="text-xl font-bold text-purple-800 mb-2">
                                    <a href="{{ route('jobs.show', $savedJob->id) }}" class="hover:text-purple-600 transition-colors">
                                        {{ $savedJob->title }}
                                    </a>
                                </h3>
                                <div class="flex items-center text-gray-600 gap-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        {{ $savedJob->company }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $savedJob->location }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="bg-white rounded-2xl shadow-lg p-12 max-w-md mx-auto">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Jobs Available</h3>
                    <p class="text-gray-500 mb-6">Be the first to post a job opportunity!</p>
                    <a href="{{ route('jobs.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Post First Job
                    </a>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

    <!-- Footer Spacing -->
    <div class="h-16"></div>
</body>
</html>
