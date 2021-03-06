@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".submit").click(function(){
                $(".process-test").css("display", "block");
                $(".alert").css("display", "none");
            });
        });
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assignment #1 Submission</div>
                <div class="card-body col-12">
                    <p>This section will contain description of assignments if any and the github link to be cloned for project</p>
                    <form action="{{route('gitupdate')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="alt-row-group">
                            <div class="alt-row">
                                <label class="col-3 font-weight-bold">Submission Status</label>
                                <label class="col-8 subStatus">Not Submitted</label>
                            </div>
                            <div class="alt-row">
                                <label class="col-3 font-weight-bold">Grading Status</label>
                                <label class="col-8">Not Graded</label>
                            </div>
                            <div class="alt-row">
                                <label class="col-3 font-weight-bold">Due Date</label>
                                <label class="col-8">Tuesday, May 7, 2019, 11:55pm</label>
                            </div>
                            <div class="alt-row">
                                <label class="col-3 font-weight-bold">Last Modified</label>
                                <label class="col-8 modStatus">--</label>
                            </div>
                            <div class="alt-row">
                                <label class="col-3 font-weight-bold">GitHub Link</label>
                                <input class="col-8 ml-3" type="text" name="gitlink" id="gitlink"/>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            @if (Session::has('success'))
                                <button class="submit" type="submit" class="btn btn-primary">Re-Submit</button>
                                @else
                                <button class="submit" type="submit" class="btn btn-primary">Submit</button>
                            @endif


                        </div>
                    </form>
                    <div id="#status">
                        @if (Session::get('success'))
                            <?php
                                $json = Session::get('success');
                                $obj = (explode(" ",$json));
                            ?>
                            <div class="alert alert-info row mt-3">

                                <div class="col-4">
                                    <p>{{$obj[0]}}</p>
                                    <p>{{$obj[1]}}</p>
                                </div>
                                <div class="col-4">
                                    <p>{{$obj[2]}}</p>
                                    <p>{{$obj[3]}}</p>
                                </div>
                                <div class="col-4">
                                    <p>{{$obj[4]}}</p>
                                    <p>{{$obj[5]}}</p>
                                </div>
                            </div>
                                <div class="process-test alert-info"><p>Processing your code to run unit test, Please wait.</p><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                            @else

                            <div class="process-test alert-info"><p>Processing your code to run unit test, Please wait.</p><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
