@component('mail::message')
<div class="table-responsive">
    <div class="table">
        <p class="text-capitalize">Please click the link below to proceed.</p>
        <p class="text-justify">{{ $verification['body'] }}</p>
        <span>Click this</span>
        <a href="{{ $verification['url'] }}">link</a>
        <span> to continue</span>
        <br>
        <p>{{ $verification['thankyou'] }}</p>
    </div>
</div>
@endcomponent