@extends('layouts.app')

@section('content')
    <x-landing.hero :banner="$banner" />

    <x-landing.search-bar />

    <x-landing.featured-properties :properties="$properties" />

    <x-landing.testimonials :testimonials="$testimonials" />

    <x-landing.faq :faqs="$faqs" />

@endsection