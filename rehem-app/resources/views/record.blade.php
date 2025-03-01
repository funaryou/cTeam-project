@extends('layouts.base')

@section('content')
    <section class="recordForm">
        <div class="date"><div class="icon calender"></div><p>{{$today}}</p></div>
        <div class="recordFormItem">
            <form action="{{ route('day_record') }}" method="POST" class="column">
                @csrf
                <article class="oxyCol column">
                    <p>内容</p>
                    <div class="divider"></div>
                    <div class="buttonWrapper">
                        <label class="switchOxyButton active">
                            <input type="radio" name="oxy" value="aerobic" checked>
                            <div class="aerobicIcon icon"></div>
                            <p>有酸素</p>
                        </label>
                        <label class="switchOxyButton">
                            <input type="radio" name="oxy" value="anoxic">
                            <div class="anoxicIcon icon"></div>
                            <p>無酸素</p>
                        </label>
                    </div>
                    <div class="divider"></div>
                </article>
                <article class="timeCol column">
                    <p>時間</p>
                    <div class="divider"></div>
                    <input id="slider" type="range" name="value" min="0" max="180" value="0">
                    <p class="sliderValue" id="sliderValue"><span class="highlight">0</span><span>分</span></p>
                    <div class="divider"></div>
                </article>
                <button type="submit" class="commonXLButton"><div class="icon record"></div><p>記録する</p></button>
            </form>
        </div>
    </section>
@endsection