@extends('layouts.base')

@section('content')
    <section class="recordForm">
        <div class="date">2xxx年xxx月xxx日</div>
        <div class="recordFormItem">
                <article class="oxyCol column">
                    <p>内容</p>
                    <div class="divider"></div>
                    <div class="buttonWrapper">
                        <label class="switchOxyButton active">
                            <input type="radio" name="oxygen" value="aerobic">
                            <p>有酸素</p>
                        </label>
                        <label class="switchOxyButton">
                            <input type="radio" name="oxygen" value="aerobic">
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
                <button type="submit" class="commonXLButton">記録する</button>
        </div>
    </section>
@endsection