@component('mail::message')

# Heading 1
## Heading 2
### Heading 3
#### Heading 4
##### Heading 5
###### Heading 6

This is a sentence

This is a sentence with **bolded text**.

@component('mail::button', ['url' => '', 'color' => 'success'])
Button One
@endcomponent

@component('mail::button', ['url' => '', 'color' => 'primary'])
Button Two
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

@component('mail::table')
| Items             | Quantity  | Total Price  |
| ------------------|:---------:|-------------:|
| Apple Iphone 10x  | 1 Nos     | $1200.00     |
| Backcase cover    | 2 Nos     | $15.00       |
| Total             | 3 Nos     | $1215.00     |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
