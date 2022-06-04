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

                                        @if(\Illuminate\Support\Facades\Session::has('done'))
                                            <div class="alert alert-success" role="alert">
                                                {{\Illuminate\Support\Facades\Session::get('done')}}
                                            </div>
                                        @endif
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Add Skill</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form method="post" action="{{route('admin.users.store')}}">
                                        @csrf
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">Name</span>
                                            </div>
                                            <input type="text" class="form-control" name="name" placeholder="User Name" aria-label="Username">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">Email</span>
                                            </div>
                                            <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">
                                        </div>

                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">Password</span>
                                            </div>
                                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password">
                                        </div>
                                        
                                        <div class="input-group mb-4">
                                            <button type="submit" class="btn btn-primary">Add</button>
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
