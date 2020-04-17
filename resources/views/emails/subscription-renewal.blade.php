@component('mail::layout')
{{-- Header --}}

@slot('header')
@component('mail::header', ['url' => config('app.url')])
The Code Learner
@endcomponent
@endslot

# Renewal Subscription Plan

##### **Dear Customer**,
A gentle remainder for informing you about you'r annual subscription plan comming to end.<br>

### You can choose Plans from below.

@component('mail::table')
| Single Plan   | Premium Plan  | Business Plan |
| ------------- |:-------------:| -------------:|
| Feature 1     | Feature 1     | Feature 1     |
| Feature 2     | Feature 2     | Feature 2     |
| <a href="#" class="button button-success" >Purchase</a>     | <a href="#" class="button button-success" >Purchase</a>     | <a href="#" class="button button-success" >Purchase</a>    |
@endcomponent

@component('mail::button', ['url' => '', 'color' => 'primary'])
Go to Account
@endcomponent

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} The Code Learners. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent