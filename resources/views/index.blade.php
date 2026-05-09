@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

@include('components.home.hero')
@include('components.home.ticker')
@include('components.home.clients')
@include('components.home.branded-collections')
@include('components.home.stats')
@include('components.home.products')
@include('components.home.why-us')
@include('components.home.video-testimonials')
@include('components.home.testimonials')
@include('components.home.faqs')
@include('components.home.cta')


@endsection