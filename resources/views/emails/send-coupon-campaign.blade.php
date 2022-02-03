@component('mail::message')

<p style="text-align: center; color:black; font-weight: 600; font-size: 1.875em;">{{ $mailCampaign->title }}</p>

{{-- ![Alt text](/path/to/img.jpg "Optional title") --}}

{{-- <center>
    <img src="{{ asset('storage/images/loyalty/' . $point->image_path) }}" alt=""/>
</center> --}}

<p style="text-align: center;">
<img src="{{ asset('storage/images/loyalty/' . $mailCampaign->image_path) }}" alt=""/></p>
{{-- <img style="display: block; margin-left: auto; margin-right: auto; width: 50%;" src="{{ asset('storage/images/loyalty/' . $point->image_path) }}" alt=""/> --}}

<br>
<p style="text-align: center; color:black; font-weight: 500; font-size: 1.125rem; line-height: 1.75rem;">
    {{ $mailCampaign->description }}</p>
<p style="color:black; font-weight: 400; font-size: 0.875rem; line-height: 1.25rem;">
        Campaign details: </p>
<p style="color:black; font-weight: 300; font-size: 0.875rem; line-height: 1.25rem;">
            Category: {{ $mailCampaign->category->name ?? "No Category" }}</p>
<p style="color:black; font-weight: 300; font-size: 0.875rem; line-height: 1.25rem;">
                Venue: {{ $mailCampaign->venue->title ?? "No Venue" }}</p>
<p style="color:black; font-weight: 300; font-size: 0.875rem; line-height: 1.25rem;">
                    Your time to complete all points:
                    {{ $myPoint->user_time_to_redeem ?? "till end of the campaign"}} </p>
<p style="color:black; font-weight: 300; font-size: 0.875rem; line-height: 1.25rem;">
<p style="color:black; font-weight: 300; font-size: 0.875rem; line-height: 1.25rem;">
{{ $mailCampaign->start_date || $mailCampaign->end_date ? "Campaign is valid between:" : ""}}
{{ $mailCampaign->start_date ? date('j M, Y', strtotime($mailCampaign->start_date)) : " "}} - {{ $mailCampaign->end_date ? date('j M, Y', strtotime($mailCampaign->end_date)) : "" }}
</p>

@component('mail::button', ['url' => config('app.url') . '/coupons/' . $mailCampaign->slug, 'color' => 'go'])
Check the offer now !
@endcomponent


Have a great day,<br>
{{ config('app.name') }} Team
@endcomponent