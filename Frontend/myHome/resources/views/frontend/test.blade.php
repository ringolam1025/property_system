@extends('layouts.frontend')
@section('content')

{{--@foreach ($propertyData as $property)
  {{ $property->property_eName }}
  @foreach ($property->propertyPhoto as $photo)
    
    <div class="property-offer-image bg-holder" style="background: url('{{ asset('assets/property/'.$photo->path) }}');">
    </div>
  @endforeach
@endforeach--}}


@for ($i=0; $i < 2; $i++)
  {{ $propertyData[$i]->property_eName }}

  {{ asset('assets/property/'.$propertyData[$i]->propertyPhoto[rand (0,(sizeof($propertyData[$i]->propertyPhoto)-1))]->path) }}

@endfor

@endsection
