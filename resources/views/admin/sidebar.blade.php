<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            {{ __('title.admin') }}
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin') }}">
                        {{ __('dashboard') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/permission') }}">
                        {{ __('permission.title') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
