<div class="size" style="width:60vw; margin:auto;">
    <img src="{{ asset('img/logo2.png') }}" style=" padding-right:5px; width:50px; height:50px; " alt="">
    <h1>
        <b style="margin-bottom:5px;"> Shwe Maw Kun Private School </b>
    </h1>
    <div
        style=" width:50vw;  border:1px; border-style:solid; border-radius:10px; padding:20px;
            box-shadow: 0px 0px 11px 0px rgba(0,0,0,1);
-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,1);
-moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,1); margin-bottom:20px;">
        <h3 class="" style="font-size:30px;"> Dear <b
                style="font-size:30px;    color:darkblue ;
    text-shadow: 0px 0px 4px #F3cd5d;">Sale Department</b>
        </h3>
        <h4 style=" font-size:20px; ;"> <b style="color:red;">Shwe Maw Kun</b> You have one new applicant.</h4>
        <img src="{{ asset('img/cover.jpg') }}" class="" style="width:30vw; magin-top:10px; margin-left:20vw;"
            alt="">
        <div style="border: 1px solid black; padding: 10px;">
            <h3 style="margin: 5px 0 10px 0;">Waiting List Applicant Data</h3>
            <ul style="list-style-type: none; padding: 0px;">
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ကျောင်းသား/သူ၏အမည်
                        : </span>
                    <span>{{ $studentname }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ကျား/မ
                        : </span>
                    <span>{{ $gender }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ကျောင်းသား/သူ၏
                        မွေးသက္ကရာဇ်
                        : </span>
                    <span>{{ $dateofbirth }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">
                        စုံစမ်းလိုသည့်အတန်း : </span>
                    <span>{{ $course }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">
                        ရွှေမော်ကွန်းကျောင်းတွင်တက်ရောက်နေသောမောင်နှမအရင်း : </span>
                    <span>{{ $ans1 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ကျောင်းသား/သူ၏
                        လူမျိုး/ဘာသာ : </span>
                    <span>{{ $ans2 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ဖခင်အမည်နှင့်အလုပ်အကိုင်
                        : </span>
                    <span>{{ $ans3 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">မိခင်အမည်နှင့်အလုပ်အကိုင်
                        : </span>
                    <span>{{ $ans4 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">အုပ်ထိန်းသူ၏အမည်နှင့်တော်စပ်ပုံ
                        : </span>
                    <span>{{ $ans5 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">မိဘ/အုပ်ထိန်းသူ၏ဖုန်းနံပါတ်
                        : </span>
                    <span>{{ $ans6 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">မိဘ/အုပ်ထိန်းသူ၏နေရပ်လိပ်စာ
                        : </span>
                    <span>{{ $ans7 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">ကျောင်းသား/သူ၏
                        လူမျိုး/ဘာသာ : </span>
                    <span>{{ $ans7 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၁။
                        ရွှေမော်ကွန်း ကိုယ်ပိုင်အလယ်တန်းကျောင်းကို မည်ကဲ့သို့သိရှိပါသနည်း။ မည်သူ့အဆက်အသွယ် နှင့်
                        သိရှိခဲ့ ပါသနည်း။ : </span>
                    <span>{{ $ans8 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၂။
                        မိဘ/အုပ်ထိန်းသူများ အနေနှင့် မိမိ၏သား/သမီးများအပေါ် ထားရှိသည့် မျှော်မှန်းချက် နှင့်
                        ကျောင်းအပေါ်ထားရှိသည့် ရည်ရွယ်ချက်။ : </span>
                    <span>{{ $ans9 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၃။
                        မိဘ/အုပ်ထိန်းသူများ အနေနှင့် မိမိ၏ သား/ သမီး များအပေါ် ပညာရေးနှင့်ပတ်သက်၍ မည်ကဲ့သို့ပံ့ပိုး
                        ပေးနိုင်ပါသနည်း။ : </span>
                    <span>{{ $ans10 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၄။
                        မိဘ/အုပ်ထိန်းသူများအနေနှင့် မိမိတို့၏ သား/သမီးများကို ပြည်သူ့နီတိနှင့်ပတ်သက်၍ မည်ကဲ့သို့ သင်ကြား
                        ပေးထားပါသနည်း။ : </span>
                    <span>{{ $ans11 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၅။
                        မိဘ/အုပ်ထိန်းသူများအနေနှင့် မိမိ သား/ သမီးများ၏ ပညာရေးနှင့်ပတ်သက်၍ ကျောင်းသား/ မိဘ/ ဆရာ သုံးဦး
                        သုံးဖလှယ် ပူးပေါင်းမှု ပြုနိုင်ပါသလား။ မည်ကဲ့သို့ပြုလုပ်ပါမည်နည်း။ : </span>
                    <span>{{ $ans12 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၆။
                        မိဘ/အုပ်ထိန်းသူများအနေနှင့် မိမိကလေး၏ ကျန်းမာရေးအခြေအနေကို ကျောင်းရှိ ဆရာ/ ဆရာမ များနှင့်
                        ပွင့်လင်းစွာ ဆွေးနွေးတင်ပြမှု ပြုလုပ်နိုင်ပါသလား။ : </span>
                    <span>{{ $ans13 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၇။
                        ကျောင်းဘက်မှသိထားသင့်သော မိမိကလေး၏ ကျန်းမာရေးနှင့်ပတ်သက်၍ အောက်ဖော်ပြပါအချက်များနှင့်
                        ကိုက်ညီမှုရှိခဲ့ပါက ထိုအချက်များကို အမှန်ခြစ်ပေးပါရန်။ : </span>
                    <span>{{ $ans14 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၈။
                        ကလေးများ၏ကျန်းမာရေးနှင့်ပတ်သက်၍ အခြားသိထားသင့်သောအချက်များရှိပါက ဖြည့်စွက်ပေးရန်။ : </span>
                    <span>{{ $ans15 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၉။
                        မိဘ/အုပ်ထိန်းသူများအနေနှင့် Social Media (Facebook) ကို မည်ကဲ့သို့အသုံးပြုပါသနည်း။ : </span>
                    <span>{{ $ans16 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၁၀။
                        မိဘ/အုပ်ထိန်းသူများအနေနှင့် ရွှေမော်ကွန်းကိုယ်ပိုင်အလယ်တန်းကျောင်း၏ စည်းကမ်းပိုင်းနှင့် ပတ်သက်၍
                        မည်မျှအထိ သိရှိနားလည်ထားပါသနည်း။ : </span>
                    <span>{{ $ans17 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span
                        style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">၁၁။
                        ရွှေမော်ကွန်း ကိုယ်ပိုင် အလယ်တန်းကျောင်း မှ ချမှတ်ထားသော စည်းကမ်းချက်များအား မိဘ/အုပ်ထိန်းသူများ
                        ဘက်မှ ပူးပေါင်းလိုက်နာ ဆောင်ရွက်နိုင်ပါ သလား။ : </span>
                    <span>{{ $ans18 }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">
                        Form ဖြည့်သူ၏အမည် ၊ တော်စပ်ပုံနှင့် ဖုန်းနံပါတ် : </span>
                    <span>{{ $subname }}</span>
                </li>
                <li style="margin: 0 0 10px 0; border-bottom: 0.5px solid gray; padding-bottom: 10px;">
                    <span style="font-weight: bold; text-transform: capitalize; display: block; margin-bottom: 10px;">
                        Form ဖြည့်သူ၏ Email : </span>
                    <span>{{ $subemail }}</span>
                </li>
            </ul>
        </div>
    </div>
</div>
