@props(['listing'])

<x-card>
                    <div class="flex">
                        <img
                            class="hidden w-49 mr-6 md:block"
                            src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.png')}}"
                            alt=""  width="300" height="400"
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listings/{{ $listing->id}}">{{ $listing->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-5">{{ $listing->company }}</div>

                            < x-listing-tags :tagsCsv="$listing->tags"/>

                            <div class="text-lg mt-5">
                                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                            </div>
                         </div>
                    </div>
                </x-card>
