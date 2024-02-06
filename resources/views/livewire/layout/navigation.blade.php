<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function goToIndex(): void
    {
        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center cursor-pointer shrink-0">
                    <a wire:click='goToIndex'>
                        <div class='flex items-center justify-center w-12 h-10 mt-2 opacity-80'>
                            <img class='object-cover w-full h-full rounded-md' src="{{ asset('logo-top.png') }}"
                                alt="logo" title="logo" />
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                     <!-- 
    'nav-home' => 'Home',
    'nav-subscribe' => 'Subscribe',
    'nav-job-seekers' => 'Job seekers',
    'nav-job-list' => 'Job list',
    'nav-create-post' => 'Create post',-->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        <p class='text-xs lg:text-sm'>
                            {{ __('nav.nav-home') }}
                        </p>
                    </x-nav-link>
                    <x-nav-link :href="route('notes.create')" :active="request()->routeIs('notes.create')" wire:navigate>
                        <p class='text-xs lg:text-sm'>
                            {{ __('nav.nav-subscribe') }}
                        </p>
                    </x-nav-link>
                    <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')" wire:navigate>
                        <p class='text-xs lg:text-sm'>
                            {{ __('nav.nav-job-seekers') }}
                        </p>
                    </x-nav-link>
                    <x-nav-link :href="route('notes.jobs')" :active="request()->routeIs('notes.jobs')" wire:navigate>
                        <p class='text-xs lg:text-sm'>
                             {{ __('nav.nav-job-list') }}
                        </p>
                    </x-nav-link>
                    <x-nav-link href="{{ route('notes.post-create') }}" :active="request()->routeIs('notes.post-create')">
                        <p class='text-xs lg:text-sm'>
                            {{ __('nav.nav-create-post') }}
                        </p>
                    </x-nav-link>
                  
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-live-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                             {{ __('profilez.profile1') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-live-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" 
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notes.create')" :active="request()->routeIs('notes.create')" wire:navigate>
                {{ __('Create profile') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')" wire:navigate>
                {{ __('Job seekers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notes.jobs')" :active="request()->routeIs('notes.jobs')" wire:navigate>
                {{ __('Job list') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notes.post-create')" :active="request()->routeIs('notes.post-create')" wire:navigate>
                {{ __('Create a job advertisement') }}
            </x-responsive-nav-link>



        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800 dark:text-gray-200" x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                    x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>
