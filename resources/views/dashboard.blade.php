<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse ($articles as $article)
                        <article class="space-y-1">
                            <h2 class="font-semibold text-2xl">
                                {{ $article->title }}
                            </h2>

                            <p class="">
                                {{ $article->body }}
                            </p>

                            <div>
                                @foreach ($article->tags as $tag)
                                    <span class="text-xs px-2 py-1 mx-1 rounded bg-indigo-50 text-indigo-500">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </article>
                    @empty 
                        <span>No articles found</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
