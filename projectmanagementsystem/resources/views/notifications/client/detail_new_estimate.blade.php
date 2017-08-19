<div class="media">
    <div class="media-body">
        <h5 class="media-heading"><span class="btn btn-circle btn-inverse"><i class="icon-doc"></i></span> New Invoice for Project - {{ ucwords($notification->data['project']['project_name']) }}</h5>
        Invoice of {{ $notification->data['currency'].' '.$notification->data['total'] }} is generated.
    </div>
    <h6><i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->data['created_at'])->diffForHumans() }}</i></h6>
</div>