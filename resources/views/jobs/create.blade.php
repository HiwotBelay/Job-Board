<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Post a New Job</title>
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
        .form-focus { transition: all 0.3s ease; }
        .form-focus:focus { transform: translateY(-1px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
        .floating-label { transition: all 0.2s ease-in-out; }
        .input-group:focus-within .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #2563eb; }
        .input-group input:not(:placeholder-shown) + .floating-label,
        .input-group textarea:not(:placeholder-shown) + .floating-label { transform: translateY(-1.5rem) scale(0.85); color: #2563eb; }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Header Section -->
    <div class="gradient-bg text-white py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4 tracking-tight">
                Post a New Job
            </h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto leading-relaxed">
                Share your opportunity with talented professionals worldwide
            </p>
        </div>
    </div>

    <!-- Main Form Section -->
    <div class="max-w-2xl mx-auto px-4 -mt-8 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-primary-50 to-blue-50 px-8 py-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Job Details</h2>
                <p class="text-gray-600">Fill in the information below to post your job opportunity</p>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form action="{{ route('jobs.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Job Title Field -->
                    <div class="input-group relative">
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
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-50 text-lg peer"
                            />
                            <label for="title" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Job Title
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">e.g., Senior Software Engineer, Marketing Manager</p>
                    </div>

                    <!-- Company Field -->
                    <div class="input-group relative">
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
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-50 text-lg peer"
                            />
                            <label for="company" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Company Name
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Your company or organization name</p>
                    </div>

                    <!-- Location Field -->
                    <div class="input-group relative">
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
                                placeholder=" "
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-50 text-lg peer"
                            />
                            <label for="location" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Location
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">e.g., Ethiopa, NY or Remote</p>
                    </div>

                    <!-- Job Description Field -->
                    <div class="input-group relative">
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
                                class="form-focus w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary-500 focus:ring-4 focus:ring-primary-50 text-lg resize-none peer"
                            ></textarea>
                            <label for="description" class="floating-label absolute left-12 top-4 text-gray-500 font-medium pointer-events-none">
                                Job Description
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Describe the role, responsibilities, requirements, and benefits</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button 
                            type="submit"
                            class="w-full bg-gradient-to-r from-primary-600 to-primary-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 text-lg flex items-center justify-center group"
                        >
                            <svg class="w-5 h-5 mr-3 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Post Job Opportunity
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Additional Info Card -->
        <div class="mt-8 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-6 border border-emerald-100">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div class="flex items-center justify-center w-10 h-10 bg-emerald-500 rounded-full">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-emerald-800 mb-2">Tips for a Great Job Post</h3>
                    <ul class="text-emerald-700 space-y-1 text-sm">
                        <li>• Be specific about the role and requirements</li>
                        <li>• Include salary range and benefits when possible</li>
                        <li>• Mention company culture and growth opportunities</li>
                        <li>• Use clear, professional language</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Back to Jobs Link -->
        <div class="text-center mt-8 mb-12">
            <a href="{{ route('jobs.index') }}" 
               class="inline-flex items-center text-gray-600 hover:text-primary-600 font-medium transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Job Board
            </a>
        </div>
    </div>
</body>
</html>
