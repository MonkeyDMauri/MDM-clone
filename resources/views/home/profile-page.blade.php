@extends('home.home-layout')



@section('content')

<meta name="current-loggedIn-username" content="{{auth()->user()->name}}">
<meta name="current-loggedIn-email" content="{{auth()->user()->email}}">

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

            <div class="post-btn-wrapper">
                <button class="post-btn post-btn-flex">Post</button>
                @if(session('success'))
                    <h3>{{session('success')}}</h3>
                @endif
                @error('title')
                    <h3 class="error">Error: {{$message}}</h3>
                @enderror
                @error('description')
                    <h3 class="error">Error: {{$message}}</h3>
                @enderror
            </div>

            <section class="posts-section">
                posts go here
            </section>

            {{-- This popup will show up when user wants to create a post, therefor it is not displayed by  default --}}
            <div class="post-form-popup-wrapper">
                <div class="post-form-popup-wrap">
                    <h1 style="margin: 0;">Create Post</h1>
                    <form action="{{route('post.create')}}" method="POST">                        
                        @csrf
                        {{-- element containing post form --}}
                        <div class="post-form">
                            <div class="post-form-field">
                                <label for="title">Title</label> <br>
                                <input type="text" id="title" name="title">
                            </div>

                            <div class="post-form-field">
                                <label for="desc">Description</label> <br>
                                <textarea name="description" id="desc">Enter a description</textarea>
                            </div>

                            <div class="post-form-btn-wrapper">
                                <button class="post-btn">Post</button>
                                <button class="post-cancel-btn" type="button">Cancel</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <div class="edit-profile-popup-wrapper">
        <div class="edit-profile-popup-wrap">
            <h1>Edit profile</h1>
            <form action="" method="POST">
                <div class="edit-profile-form-wrapper">
                    <div class="edit-profile-form-input-container">
                        <label for="edit-name" class="edit-profile-label">Name</label>
                        <br>
                        <input type="text" name="name" id="edit-name">
                    </div>
                    
                    <div class="edit-profile-form-input-container">
                        <label for="edit-email" class="edit-profile-label">Email</label>
                        <br>
                        <input type="text" name="email" id="edit-email">
                    </div>
                    
                    <div class="edit-profile-form-input-container">
                        <label for="edit-gender" class="edit-profile-label">Gender</label>
                        <br>
                        <select name="gender" id="edit-gender" >
                            <option value="male">male</option>
                            <option value="femail">female</option>
                        </select>
                    </div>

                    <button class="edit-profile-form-save-btn">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection