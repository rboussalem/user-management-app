@if (session()->has('status'))
    <div class="alert alert-primary py-4 text-center font-weight-bold" role="alert">
    Notification : {{session()->get('status')}}
    </div>
@endif