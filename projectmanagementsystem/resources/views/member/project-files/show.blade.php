@extends('layouts.member-app')

@section('page-title')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="{{ $pageIcon }}"></i> {{ $pageTitle }}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ route('member.dashboard') }}">@lang('app.menu.home')</a></li>
                <li class="active">@lang('app.menu.projects')</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection

@push('head-script')

<link rel="stylesheet" href="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.css') }}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li><a href="{{ route('member.projects.show', $project->id) }}"><span>@lang('modules.projects.overview')</span></a>
                                </li>
                                <li><a href="{{ route('member.project-members.show', $project->id) }}"><span>@lang('modules.projects.members')</span></a></li>
                                <li><a href="{{ route('member.tasks.show', $project->id) }}"><span>@lang('app.menu.tasks')</span></a></li>
                                <li class="tab-current"><a href="{{ route('member.files.show', $project->id) }}"><span>@lang('modules.projects.files')</span></a> </li>
                                <li><a href="{{ route('member.time-log.show-log', $project->id) }}"><span>@lang('modules.projects.timeLogs')</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="files-list-panel">
                                    <div class="white-box">
                                        <h2>@lang('modules.projects.files')</h2>

                                        <ul class="list-group" id="files-list">
                                            @forelse($project->files as $file)
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            {{ $file->filename }}
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a target="_blank" href="{{ asset('storage/project-files/'.$project->id.'/'.$file->hashname) }}"
                                                               data-toggle="tooltip" data-original-title="View"
                                                               class="btn btn-info btn-circle"><i
                                                                        class="fa fa-search"></i></a>
                                                            &nbsp;&nbsp;
                                                            <a href="{{ route('member.files.download', $file->id) }}"
                                                               data-toggle="tooltip" data-original-title="Download"
                                                               class="btn btn-inverse btn-circle"><i
                                                                        class="fa fa-download"></i></a>
                                                            &nbsp;&nbsp;

                                                            <span class="m-l-10">{{ $file->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            @lang('messages.noFileUploaded')
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

@endsection

@push('footer-script')
<script src="{{ asset('plugins/bower_components/dropzone-master/dist/dropzone.js') }}"></script>
<script>
    $('#show-dropzone').click(function () {
        $('#file-dropzone').toggleClass('hide show');
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.fileUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB,
        dictDefaultMessage: 'Drop files here OR click to upload',
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("success", function (file, response) {
                console.log(response);
                $('#files-list-panel ul.list-group').html(response.html);
            })
        }
    };

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "{{ route('admin.files.destroy',':id') }}";
                url = url.replace(':id', id);

                var token = "{{ csrf_token() }}";

                $.easyAjax({
                    type: 'DELETE',
                    url: url,
                    data: {'_token': token},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                            $('#files-list-panel ul.list-group').html(response.html);

                        }
                    }
                });
            }
        });
    });

</script>
@endpush