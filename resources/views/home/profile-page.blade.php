@extends('home.home-layout')



@section('content')


<div class="people-section-wrapper">
    <div class="profile-card-wrapper">
        <div class="banner-img-container">
            <img src="{{ asset("images/default-images/default_banner.jpeg") }}" alt="default banner image"
            class="default-banner-image">
            <div class="profile-pic-container">
                @if(auth()->user()->gender === 'male' && auth()->user()->profile_pic_path == NULL)
                    <img src="{{asset('images/default-images/male-pic.jpg')}}" alt="default male profile pic"
                class="default-male-profile-pic">
                @elseif (auth()->user()->gender === 'female' && auth()->user()->profile_pic_path == NULL)
                    <img src="{{asset('images/default-images/female-pic.jpeg')}}" alt="SOME PIC" class="default-female-profile-pic">
                @else
                    <img src="{{asset('images/other_images/' . auth()->user()->profile_pic_path)}}" alt="actual profile pic" class="default-female-profile-pic">
                @endif
            </div>
        </div>


        <section class="profile-card-information">
            <div class="edit-profile-btn-wrapper">
                <button class="edit-profile-btn">Edit profile</button>
            </div>

            <div class="user-basic-info-wrapper">
                <div class="user-username">{{Auth::user()->name}}</div>
                <div class="user-email">{{Auth::user()->email}}</div>

                <div class="user-bio">
                    @if (Auth::user()->bio === NULL)
                        Not much to say for this user...
                    @else
                        {{Auth::user()->bio}}
                    @endif                
                </div>

                <div style="display:flex; gap: .5rem; align-items: center;">
                    <img src="{{asset('images/default-images/calendar-icon.png')}}" alt="little calendar icon"
                    class="little-calendar-icon">
                    <div class="join-date">Joined {{Auth::user()->created_at_date()}}</div>
                </div>
            </div>

            <section class="posts-section">
                posts go here
            </section>

        </section>
    </div>
</div>

@endsection