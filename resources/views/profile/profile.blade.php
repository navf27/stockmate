@extends('layouts.layout5')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">User Profile</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-with-nav">
                        {{-- <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile"
                                            role="tab" aria-selected="false">Profile</a> </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            {{-- @error('name', 'username', 'email', 'profession', 'description', 'instagram',
                            'whatsapp',
                            'picture')
                            <p>{{ $message }}</p>
                            @enderror --}}
                            <form action="{{ route('profile.update', ['id' => $user->id]) }}"
                                enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Full Name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control" name="username"
                                                placeholder="Username" value="{{ $user->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" class="form-control"
                                                value="{{ $user->email }}" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="profession">Profession</label>
                                            <input type="text" id="profession" class="form-control"
                                                value="{{ $user->profession }}" name="profession"
                                                placeholder="Profession">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="description">Short Description</label>
                                            <input type="text" id="description" class="form-control"
                                                value="{{ $user->description }}" name="description"
                                                placeholder="Short Description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="instagram">Instagram Link</label>
                                            <input type="text" id="instagram" class="form-control"
                                                value="{{ $user->instagram }}" name="instagram"
                                                placeholder="Instagram Link">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="whatsapp">Whatsapp Link</label>
                                            <input type="text" id="whatsapp" class="form-control"
                                                value="{{ $user->whatsapp }}" name="whatsapp"
                                                placeholder="Whatsapp Link">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="pic">Profile Picture</label>
                                            <input type="file" id="pic" class="form-control" name="picture">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3 mb-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-secondary">
                        <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('storage/profile/' . $user->picture) }}" alt="..."
                                        class="avatar-img rounded-circle">
                                    {{-- <input type="button" class="fa fa-edit"> --}}
                                    {{-- <a href=""><i class="fa fa-edit"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">{{ $user->name }}</div>
                                <div class="job">{{ $user->profession }}</div>
                                <div class="desc">{{ $user->description }}</div>
                                <div class="social-media">
                                    <a class="btn btn-danger btn-twitter btn-sm btn-link" href="{{ $user->instagram }}"
                                        target="blank">
                                        <span class="btn-label just-icon"><i class="flaticon-instagram"></i>
                                        </span>
                                    </a>
                                    {{-- <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                        <span class="btn-label just-icon"><i class="flaticon-google-plus"></i>
                                        </span>
                                    </a> --}}
                                    <a class="btn btn-success btn-sm btn-link" href="{{ $user->whatsapp }}"
                                        target="blank">
                                        <span class="btn-label just-icon"><i class="flaticon-whatsapp"></i>
                                        </span>
                                    </a>
                                    {{-- <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                        <span class="btn-label just-icon"><i class="flaticon-dribbble"></i>
                                        </span>
                                    </a> --}}
                                </div>
                                {{-- <div class="view-profile">
                                    <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number">125</div>
                                    <div class="title">Post</div>
                                </div>
                                <div class="col">
                                    <div class="number">25K</div>
                                    <div class="title">Followers</div>
                                </div>
                                <div class="col">
                                    <div class="number">134</div>
                                    <div class="title">Following</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection