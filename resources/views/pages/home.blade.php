@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto mt-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create new post</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body row">
                            <div class="form-group col-10">
                                <textarea class="form-control" id="postContent" placeholder="Your post content..."></textarea>
                            </div>
                            <div class="card-footer col-2 mt-2">
                                <button type="submit" class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
