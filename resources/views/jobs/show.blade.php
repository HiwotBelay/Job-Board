<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $job->title }} - Job Details</title>
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
        .form-focus { transition: all 0.3s ease; }
        .form-focus:focus { transform: translateY(-1px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .file-upload { position: relative; overflow: hidden; display: inline-block; cursor: pointer; }
        .file-upload input[type=file] { position: absolute; left: -9999px; }
        .floating-label { transition: all 0.2s ease-in-out; }
        .input-group:focus-within .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #2563eb; }
        .input-group input:not(:placeholder-shown) + .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #2563eb; }
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
    <div class="gradient-bg text-white py-12 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('jobs.index') }}" 
                   class="inline-flex items-center text-white/80 hover:text-white font-medium transition-colors duration-200 group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Job Listings
                </a>
            </div>

            <!-- Job Header -->
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">
                    {{ $job->title }}
                </h1>
                <div class="flex flex-wrap justify-center items-center gap-6 text-lg opacity-90">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-semibold">{{ $job->company }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $job->location }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 -mt-8 relative z-10">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Job Description -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary-50 to-blue-50 px-8 py-6 border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Job Description
                        </h2>
                    </div>
                    <div class="p-8">
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($job->description)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden sticky top-8">
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 px-6 py-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Apply to this job
                        </h3>
                    </div>

                    <div class="p-6">
                        <form action="{{ route('jobs.apply', $job) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <!-- Name Field -->
                            <div class="input-group relative">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        required
                                        placeholder=" "
                                        class="form-focus w-full pl-10 pr-3 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-50 peer @error('name') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                                    />
                                    <label for="name" class="floating-label absolute left-10 top-3 text-gray-500 font-medium pointer-events-none">
                                        Full Name
                                    </label>
                                </div>
                                @error('name')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="input-group relative">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        id="email" 
                                        required
                                        placeholder=" "
                                        class="form-focus w-full pl-10 pr-3 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-50 peer @error('email') border-red-300 focus:border-red-500 focus:ring-red-50 @enderror"
                                    />
                                    <label for="email" class="floating-label absolute left-10 top-3 text-gray-500 font-medium pointer-events-none">
                                        Email Address
                                    </label>
                                </div>
                                @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- CV Upload Field -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    Upload CV (PDF, DOC, DOCX)
                                </label>
                                <div class="file-upload w-full">
                                    <input 
                                        type="file" 
                                        name="cv" 
                                        id="cv" 
                                        accept=".pdf,.doc,.docx" 
                                        required
                                        onchange="updateFileName(this)"
                                        class="@error('cv') border-red-300 @enderror"
                                    />
                                    <div class="flex items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200 @error('cv') border-red-300 bg-red-50 @enderror">
                                        <div class="text-center">
                                            <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <p class="text-sm text-gray-600 font-medium" id="file-name">
                                                Click to upload your CV
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1">
                                                PDF, DOC, DOCX up to 10MB
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @error('cv')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit"
                                class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group"
                            >
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Submit Application
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-800 mb-1">Application Tips</h4>
                            <ul class="text-xs text-blue-700 space-y-1">
                                <li>• Ensure your CV is up to date</li>
                                <li>• Use a professional email address</li>
                                <li>• Double-check all information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Spacing -->
    <div class="h-16"></div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0]?.name || 'Click to upload your CV';
            document.getElementById('file-name').textContent = fileName;
        }
    </script>
</body>
</html>
