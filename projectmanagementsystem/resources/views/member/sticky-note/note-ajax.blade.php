@forelse($noteDetails as $key=>$noteDetail)
    <div id="stickyBox_{{$noteDetail->id}}" class="col-lg-4 col-sm-4">
        <div class="panel panel-{{$noteDetail->colour}}">
            <div class="panel-heading"> @lang('modules.sticky.lastUpdated'):- {{ $noteDetail->updated_at->diffForHumans() }}
                <div class="pull-right"><a href="javascript:;"  onclick="showEditNoteModal({{$noteDetail->id}})"><i class="ti-pencil"></i></a> <a href="javascript:;" onclick="deleteSticky({{$noteDetail->id}})" ><i class="ti-close"></i></a> </div>
            </div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <p>{!! nl2br($noteDetail->note_text)  !!}</p>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse