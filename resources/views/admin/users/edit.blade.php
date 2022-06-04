@include('admin.assets.header')



        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="container">

                <div class="container">

                    <div class="row layout-top-spacing">

                        <div id="basic" class="col-lg-12 col-sm-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        @if($errors->any())
                                            @foreach($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    {{$error}}
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Edit User</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('admin.users.update')}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">Name</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$user->name}}" name="name" aria-label="Username">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">email</span>
                                            </div>
                                            <input type="email" value="{{$user->email}}" class="form-control" name="email" placeholder="Email" aria-label="Email">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">Password</span>
                                            </div>
                                            <input type="password" value="{{$user->password}}" class="form-control" name="password" placeholder="Password" aria-label="Email">
                                        </div>

                                        <div class="input-group mb-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>

                                    </form>
                                </div>


                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

@include('admin.assets.footer')
