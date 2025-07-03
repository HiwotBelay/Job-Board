<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Job - {{ $job->title }}</title>
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
        .gradient-bg { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
        .form-focus { transition: all 0.3s ease; }
        .form-focus:focus { transform: translateY(-1px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .floating-label { transition: all 0.2s ease-in-out; }
        .input-group:focus-within .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #d97706; }
        .input-group input:not(:placeholder-shown) + .floating-label,
        .input-group textarea:not(:placeholder-shown) + .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #d97706; }
        .input-filled .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #d97706; }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-orange-50 min-h-screen">
    <!-- Header Section -->
    <div class="gradient-bg text-white py-16 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('jobs.show', $job) }}" 
                   class="inline-flex items-center text-white/80 hover:text-white font-medium transition-colors duration-200 group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Job Details
                </a>
            </div>

            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">
                    Edit Job
                </h1>
                <p class="text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
                    Update your job posting to attract the best candidates
                </p>
            </div>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="max-w-2xl mx-auto px-4 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-orange-50 to-amber-50 px-8 py-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Job Information</h2>
                <p class="text-gray-600">Update the details below to modify your job posting</p>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form action="{{ route('jobs.update', $job) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Job Title Field -->
                    <div class="input-group relative {{ old('title', $job->title) ? 'input-filled' : '' }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                required
                                value="{{ old('title', $job->title) }}"
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-50 text-lg peer @error('title') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                            />
                            <label for="title" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Job Title
                            </label>
                        </div>
                        @error('title')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @else
                        <p class="mt-2 text-sm text-gray-500">e.g., Senior Software Engineer, Marketing Manager</p>
                        @enderror
                    </div>

                    <!-- Company Field -->
                    <div class="input-group relative {{ old('company', $job->company) ? 'input-filled' : '' }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="company" 
                                id="company" 
                                required
                                value="{{ old('company', $job->company) }}"
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-50 text-lg peer @error('company') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                            />
                            <label for="company" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Company Name
                            </label>
                        </div>
                        @error('company')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @else
                        <p class="mt-2 text-sm text-gray-500">Your company or organization name</p>
                        @enderror
                    </div>

                    <!-- Location Field -->
                    <div class="input-group relative {{ old('location', $job->location) ? 'input-filled' : '' }}">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="location" 
                                id="location" 
                                required
                                value="{{ old('location', $job->location) }}"
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-50 text-lg peer @error('location') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                            />
                            <label for="location" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Location
                            </label>
                        </div>
                        @error('location')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @else
                        <p class="mt-2 text-sm text-gray-500">e.g., New York, NY or Remote</p>
                        @enderror
                    </div>

                    <!-- Job Description Field -->
                    <div class="input-group relative {{ old('description', $job->description) ? 'input-filled' : '' }}">
                        <div class="relative">
                            <div class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="6" 
                                required
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-50 text-lg resize-none peer @error('description') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                            >{{ old('description', $job->description) }}</textarea>
                            <label for="description" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Job Description
                            </label>
                        </div>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                        @else
                        <p class="mt-2 text-sm text-gray-500">Update the role description, responsibilities, requirements, and benefits</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button 
                            type="submit"
                            class="flex-1 bg-gradient-to-r from-orange-600 to-amber-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 text-lg flex items-center justify-center group"
                        >
                            <svg class="w-5 h-5 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Job
                        </button>
                        
                        <a href="{{ route('jobs.show', $job) }}" 
                           class="flex-1 sm:flex-initial bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-8 rounded-xl transition-colors duration-300 text-lg flex items-center justify-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Tips Card -->
        <div class="mt-8 bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 border border-amber-100">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-10 h-10 bg-amber-500 rounded-full">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-amber-800 mb-2">Editing Tips</h3>
                    <ul class="text-amber-700 space-y-1 text-sm">
                        <li>• Review all fields carefully before updating</li>
                        <li>• Consider adding new requirements or benefits</li>
                        <li>• Update the location if remote work options changed</li>
                        <li>• Refresh the description to attract new candidates</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Current Job Preview -->
        <div class="mt-8 bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-gray-50 to-slate-50 px-6 py-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Current Job Preview
                </h3>
            </div>
            <div class="p-6">
                <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $job->title }}</h4>
                <div class="flex items-center gap-4 text-gray-600 mb-4">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        {{ $job->company }}
                    </span>
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{ $job->location }}
                    </span>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ Str::limit($job->description, 200) }}</p>
            </div>
        </div>
    </div>

    <!-- Footer Spacing -->
    <div class="h-16"></div>
</body>
</html>
