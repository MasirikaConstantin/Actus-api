@extends('base')
@section('contenus')
    
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse ($posts as $post )
    <div class="expert-card rounded-xl bg-gray-700 p-4 text-white transition-all duration-300 hover:transform hover:scale-105">
        <div class="relative mb-4">
            <img src="{{ $post->imageUrl() }}" alt="{{ $post->titre }}" class="w-full h-64 object-cover rounded-lg">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-lg"></div>
        </div>
        <h3 class="text-xl font-bold mb-2">{{ $post->titre }}</h3>
        <p class="text-orange-500 font-medium mb-2">{{ $post->categorie->nom }}</p>
        <p class="text-gray-300 text-sm mb-4">{{ $post->type->etat }}</p>
        <div class="flex gap-4">
            <a href="#" class="social-icon text-gray-400 hover:text-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
            </a>
            <a href="#" class="social-icon text-gray-400 hover:text-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124-4.09-.193-7.715-2.157-10.141-5.126-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
            </a>
            <a href="#" class="social-icon text-gray-400 hover:text-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667h-3.554v-11.452h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zm-15.11-13.019c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019h-3.564v-11.452h3.564v11.452zm15.106-20.452h-20.454c-.979 0-1.771.774-1.771 1.729v20.542c0 .956.792 1.729 1.771 1.729h20.454c.978 0 1.778-.773 1.778-1.729v-20.542c0-.955-.8-1.729-1.778-1.729z"/></svg>
            </a>
        </div>
    </div>
    @empty
    
@endforelse
</div>






<section class="py-2 ">
    <div class="max-w mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête de la section -->
        

        <!-- Grille des membres -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">

        <!-- Membre 2 -->
            <div class="group float-animation">
<p class="mt-4 mb-6 font-bold" >Les Catégories</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 bg-gray-300 rounded rounded-xl px-2 py-2">
                    @forelse ($categories as $categorie )

                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $categorie->name }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $categorie->description }}</p>
                        <a href="#" class="inline-flex me-6 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-200 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            icon
                            <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                        <span>{{ $categorie->icon }}</span>

                        </div>

                        
                    @empty
                        
                    @endforelse        
            </div>
        </div>
            
            <!-- Membre 1 -->
            <div class="group float-animation">
<p class="mt-4 mb-6 font-bold" >Les Urls</p>
                
                <div class="grid grid-cols-1 bg-gray-500 rounded rounded-xl px-2 py-2  md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @forelse ($socials as $social )

                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $social->name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $social->url }}</p>
                <a href="{{ $social->url }}" class="inline-flex me-6 items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-200 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    url
                    <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <span></span>

                </div>

                
                @empty
                    
                @endforelse 
            </div>


            
        </div>

        <!-- Bouton Voir plus -->
        
    </div>
</section>
@endsection