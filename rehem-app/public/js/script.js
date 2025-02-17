document.addEventListener("DOMContentLoaded", function() {
    // 時間（分:秒）フォーマットに変換する関数
    function formatTime(minutes) {
        const hours = Math.floor(minutes / 60); // 分を計算
        const remainingMinutes = minutes % 60; // 残りの秒数
        if (hours === 0) {
            return `<span class="highlight">${remainingMinutes}</span><span>分</span>`; // クラスを付けて分を返す
        } else {
            return `<span class="highlight">${hours}</span><span>時間</span><span class="highlight">${remainingMinutes}</span><span>分</span>`; // クラスを付けて時間:分を返す
        }
        
    }

    // スライダーの値が変わるたびに表示を更新
    const slider = document.getElementById('slider');
    const sliderValue = document.getElementById('sliderValue');

    slider.addEventListener('input', function() {
        const timeFormatted = formatTime(this.value);
        sliderValue.innerHTML = timeFormatted;
    });
});
