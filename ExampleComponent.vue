<template>
  <div class="">
    <div class="main_img-wrap">
       <p class="main_countdown" v-if="isCountDown">{{ countDownNum }}</p>
       <p class="main_timer" v-if="timerStart">{{ timerNum }}</p>
       <img class="main_img-image" :src="image" v-if="showImage">
     </div>

     <div class="main_wrap" v-if="!isEnd">
       <div class="" style="text-align:center; margin:30px auto 50px;">
           <button @click="countDown(); toggle30s()" v-if="!isStarted">
             ▶︎ 30秒コース
           </button>
           <button @click="countDown(); toggle60s()" v-if="!isStarted">
             ▶︎ 60秒コース
           </button>
           
           <div class="" v-if="!isEnd">
            <p class="problem_text">{{ problemAbout.text }}</p>
            <button class="" v-if="isStarted" @click="answerKill(); result()">▶︎ 斬る</button>
            <button class="" v-if="isStarted" @click="answerCut(); result()">▶︎ 切る</button>
            <button class="" v-if="isStarted" @click="answerWearll(); result()">▶︎ 着る</button>
           </div>
       </div>
     </div>

     <div class="result_wrap" v-if="isEnd">
        <form action="" method="post">
            <p>あなたのスコアは {{ total_score }} 点でした。</p>
        </form>
    </div>
  </div>
</template>

<script>
    export default {

        data: function(){
            return{
                //各メソッド等で使う変数など
                //フラグ
                start30s : false,
                start60s : false,
                isStarted : false,
                kiruFlg  : '',
                comboCount: 0,
                countDownNum : 3, //スタート時のカウントダウン用
                isCountDown : false,
                timerNum : '',
                timerStart: false,
                isEnd : false, //ゲーム終了のフラグ
                total_score : 0,
                scorePlus: 1,
                scoreMinus: 1,
                image : 'images/img1.png', //初期値はタイトル画面
                showImage: true,
                title: '',
                problemAbout: '',

                problem: [
                    {
                        //りんご
                        picture:'images/apple.png',
                        answer: '切る',
                        text: 'りんごを「きる」',
                    },
                    {
                        //みかん
                        picture:'images/orange.png',
                        answer: '切る',
                        text: 'みかんを「きる」',

                    },
                    {
                        //ゾンビ
                        picture:'images/zonbie.png',
                        answer: '斬る',
                        text: 'ゾンビを「きる」',

                    },
                    {
                        //髪
                        picture:'images/hear.jpeg',
                        answer: '切る',
                        text: '髪（かみ）を「きる」',

                    },
                    {
                        //泥棒
                        picture:'images/dorobo.jpeg',
                        answer: '斬る',
                        text: '悪者（わるもの）を「きる」',
                    },
                    {
                        //服
                        picture:'images/huku.jpg',
                        answer: '着る',
                        text: '服（ふく）を「きる」',
                    },
                    {
                        //紙
                        picture:'images/kami.jpeg',
                        answer: '切る',
                        text: '紙（かみ）を「きる」',
                    },
                    {
                        //値切る
                        picture:'images/negiru.jpeg',
                        answer: '切る',
                        text: '買い物で値（ね）「ぎる」',
                    },
                    {
                        //切腹
                        picture:'images/seppuku.jpeg',
                        answer: '切る',
                        text: '腹（はら）を「きる」',
                    },
                    {
                        //電話
                        picture:'images/tell.jpeg',
                        answer: '切る',
                        text: '電話(でんわ)を「きる」',
                    },
                    {
                        //恩に着る
                        picture:'images/thanks.jpeg',
                        answer: '着る',
                        text: '恩（おん）に「きる」',
                    },
                    {
                        //悪魔
                        picture:'images/akuma.jpeg',
                        answer: '斬る',
                        text: '悪魔(あくま)を「きる」',
                    },
                    {
                        //芸能界
                        picture:'images/geinou.jpeg',
                        answer: '切る',
                        text: '芸能界（げいのうかい）を「きる」',
                    },
                    {
                        //切符
                        picture:'images/kippu.jpeg',
                        answer: '切る',
                        text: '切符(きっぷ)を「きる」',
                    },
                    {
                        //つめ
                        picture:'images/tume.jpeg',
                        answer: '切る',
                        text: 'つめを「きる」',
                    },
                    {
                        //野菜
                        picture:'images/yasai.jpeg',
                        answer: '切る',
                        text: '野菜(やさい)を「きる」',
                    },
                    {
                        //指
                        picture:'images/finger.jpeg',
                        answer: '切る',
                        text: '指(ゆび)を「きる」',
                    },
                    {
                        //スイッチ
                        picture:'images/switch.png',
                        answer: '切る',
                        text: 'スイッチを「きる」',
                    },
                    {
                        //トランプ
                        picture:'images/card.jpeg',
                        answer: '切る',
                        text: 'トランプをよく「きる」',
                    },

                ]
            }
        },

        //メソッド
        methods: {
            //各フラグ切り替え
            toggle30s: function(){
                this.start30s = !this.start30s;
            },
            toggle60s: function(){
                this.start60s = !this.start60s;
            },
            answerKill: function(){
                this.kiruFlg = '斬る';
            },
            answerCut: function(){
                this.kiruFlg = '切る';
            },
            answerWearll: function(){
                this.kiruFlg = '着る';
            },

            //スタート時のタイマー（秒数）を決定
            getSecond: function(){
                //30秒or60秒
                if(this.start30s === true && this.start60s === false){
                    this.timerNum = 30;
                }else if(this.start60s === true && this.start30s === false){
                    this.timerNum = 60;
                }else{
                    this.timerNum = 5;
                }
            },
            //順番ランダムでproblemの要素を取得
            getPloblem: function(){
                let random = Math.floor(Math.random() * this.problem.length);
                this.problemAbout = this.problem[random];
                this.image = this.problemAbout.picture;
                this.title = this.problemAbout.text;
            },
            //正解・不正解の判定
            result: function(){
                //効果音の読み込み
                let okSound = new Audio('sounds/true.mp3');
                let ngSound = new Audio('sounds/false.mp3');

                //押されたボタンとproblemのanswerを比較して正解・不正解を判別
                if(this.kiruFlg === this.problemAbout.answer){
                    //正解の場合
                    this.total_score += this.scorePlus;
                    this.soundPlay(okSound);
                    //コンボボーナス
                    ++this.comboCount;

                    console.log('コンボ数：' + this.comboCount);

                    //コンボが一定数になったらボーナスポイントを付与
                    switch(this.comboCount){

                        case 100:
                            this.comboCount = 0;
                            this.total_score += 100;
                        break;
                        
                        case 50:
                            this.total_score += 50;
                        break;

                        case 30:
                            this.total_score += 30;
                        break;

                        case 20:
                            this.total_score += 20;
                        break;

                        case 10:
                            this.total_score += 10;
                        break;
                    }

                }else if(this.kiruFlg !== this.problemAbout.answer){
                    //不正解の場合
                    this.total_score -= this.scoreMinus;
                    this.comboCount = 0;
                    this.soundPlay(ngSound);
                    console.log('コンボ数：' + this.comboCount);
                
                }else{
                    console.log('違うとこに入ってる');
                }

                //フラグをリセット
                this.kiruFlg = '';

                //次の問題を表示
                this.getPloblem();
            },
            //タイマーカウントダウン
            countTimer: function(){
                //最初の問題を取得
                this.getPloblem();
                //秒数を取得
                this.getSecond();

                //カウントダウンタイマー
                this.timerStart = true;
                let timer = window.setInterval(() => {
                    this.timerNum -= 1;

                    //タイマーが０になったら終了
                    if(this.timerNum <= 0){
                        this.timerStart = false;
                        this.isEnd = true;
                        this.showImage = false;

                        //スコアがマイナスの場合は０に
                        if(this.total_score <= 0){
                            this.total_score = 0;
                        }

                        window.clearInterval(timer);
                    }
                }, 1000);
            },
            //スタート時のカウントダウン
            countDown: function(){
                this.showImage = false;
                this.isCountDown = true;
                let count = setInterval(() => {
                    this.countDownNum -= 1;
                    //カウントダウンが０になったらカウントを終了してゲームスタート
                    if(this.countDownNum <= 0){
                      window.clearInterval(count);
                      this.isCountDown = false;
                      this.isStarted = true;
                      this.showImage = true;

                      this.countTimer();
                    }
                }, 800);
            },
            soundPlay: function(sound){
                sound.currentTime = 0;
                sound.play();
            },

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
