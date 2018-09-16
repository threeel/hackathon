@extends('layouts.app')

@section('content')
    <main class="profile-page">
        <section class="section-profile-cover section-shaped my-0">
            <!-- Circles background -->
            <div class="shape shape-style-1 shape-primary alpha-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="card card-profile shadow mt--500">
                    <div class="px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">

                            </div>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center ">
                                <div class="card-profile-actions py-4 mt-lg-0">
                                    @isset($dataBubble)
                                        <a href="{{ $dataBubble->jupyter_url }}"
                                           target="_blank"
                                           class="btn btn-sm btn-info mr-4">Jupyter</a>
                                        <a href="{{ $dataBubble->nteract_url }}"
                                           target="_blank"
                                           class="btn btn-sm btn-default float-right">nteract</a>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <form action="{{ route('workspace.create') }}" method="post">
                                        @csrf
                                        <select name="bubble_type" class="form-control" id="">
                                            @foreach($bubbleTypes as $bubbleType)
                                                <option value="{{ $bubbleType->slug }}">{{ $bubbleType->name }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-primary mt-4">Create Bubble</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="container">
                                <form method="post" action="{{ route('workspace.files') }}"
                                      enctype="multipart/form-data" id="">
                                    @csrf

                                    {{--<label class="btn btn-outline-success" for="upload">--}}

                                        <input id="upload" type="file" class="form-control-file" name="workspace_file"/>
                                        {{--Upload--}}
                                    {{--</label>--}}


                                    <br>
                                    {{--<button class="btn btn-clipboard">Upload File</button>--}}

                                </form>
                            </div>

                            @isset($dataBubble)
                                <iframe src="{{ $dataBubble->jupyter_url }}" frameborder="0"></iframe>
                            @endisset

                        </div>
                        {{--<div class="mt-5 py-5 border-top text-center">--}}
                            {{--<div class="row justify-content-center">--}}
                                {{--<div class="col-lg-9">--}}
                                    {{--<p>An artist of considerable range, Ryan — the name taken by Melbourne-raised,--}}
                                        {{--Brooklyn-based Nick Murphy — writes, performs and records all of his own music,--}}
                                        {{--giving it a warm, intimate feel with a solid groove structure. An artist of--}}
                                        {{--considerable range.</p>--}}
                                    {{--<a href="#">Show more</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
