<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Job Board - Jobs List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 font-sans">

    @if(session('success'))
    <div class="max-w-md mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="text-4xl font-bold mb-6 text-center text-indigo-600">Job Board</h1>

    <div class="max-w-4xl mx-auto">

        <a href="{{ route('jobs.create') }}" 
           class="inline-block mb-6 bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
           Post a New Job
        </a>

        @if ($jobs->count() > 0)
            <ul class="space-y-4">
                @foreach ($jobs as $job)
                    <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">
                                <a href="{{ route('jobs.show', $job) }}" class="text-blue-600 hover:underline">
                                    {{ $job->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600">{{ $job->company }}</p>
                            <p class="text-gray-500">{{ $job->location }}</p>
                            <p class="mt-1">{{ Str::limit($job->description, 100) }}</p>
                        </div>

                        <div class="space-x-2">
                            <a href="{{ route('jobs.edit', $job) }}" 
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded transition">
                               Edit
                            </a>

                            <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this job?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-gray-500">No jobs posted yet.</p>
        @endif

    </div>

    {{ $jobs->links() }}

</body>
</html>
