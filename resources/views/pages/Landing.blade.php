@extends('layouts.app')

@section('content')
    <x-landing.hero />

    <x-landing.search-bar />

    <x-landing.featured-properties />

    <x-landing.testimonials :testimonials="$testimonials" />

    <x-landing.faq :faqs="$faqs" />

@endsection