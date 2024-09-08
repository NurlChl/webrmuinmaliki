<section class="sm:flex overflow-x-hidden">
    @php
        $routeForm =
            request()->routeIs('posts.create') ||
            request()->routeIs('posts.edit') ||
            request()->routeIs('members.create') ||
            request()->routeIs('members.edit') ||
            request()->routeIs('rules.create') ||
            request()->routeIs('rules.edit') ||
            request()->routeIs('abouts.create') ||
            request()->routeIs('abouts.edit') ||
            request()->routeIs('galleries.create') ||
            request()->routeIs('galleries.edit') ||
            request()->routeIs('aspirations.index') ||
            request()->routeIs('recommendations.index') ||
            request()->routeIs('abouts.dashboard') ||
            request()->routeIs('dashboard');
    @endphp

    @if ($routeForm)
        @include('layouts.navigation-side-form')

        <x-container>
            {{ $slot }}
        </x-container>
    @else
        @include('layouts.navigation-side')

        <x-container-dashboard>
            {{ $slot }}
        </x-container-dashboard>
    @endif
</section>
