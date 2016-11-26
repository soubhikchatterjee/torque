<i class="fa fa-cog margin-left15"></i> {{ trans('main.type') }} 
<span class="text-muted"> <code>{{ strtoupper($key_type) }}</code></span>
<i class="fa fa-clock-o margin-left15"></i> {{ trans('main.ttl') }} 
<span class="text-muted"> <code>{{ $ttl < 0 ? trans('main.no_expiry') : $ttl }}</code></span>
<i class="fa fa-info-circle margin-left15"></i> {{ trans('main.size') }} 
<span class="text-muted"> <code>{{ count($data) }}</code></span>