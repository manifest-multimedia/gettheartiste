<x-neptune-layout>
<x-slot name="title">
    GetTheArtiste &mdash; Dashboard
</x-slot>
{{-- Header --}}
<div class="col">
    <x-neptune-large-header />
  </div>
    <!-- Content Wrapper START -->
        <div class="row">
            <x-net-revenue-widget />
            <x-bounce-rate-widget />
            <x-orders-widget />
            <x-total-expense-widget />
        </div>

        <x-overal-rating-widget />
        <x-total-overview-widget />
    </div>

    <x-latest-transactions />

</x-neptune-layout>
