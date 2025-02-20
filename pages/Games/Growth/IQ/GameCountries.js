'use strict'

//звук
let audioCardDone = new Audio('/sound/interface-124464_RpPW8qfY.mp3');
let audioComplete = new Audio('/sound/680126__strangehorizon__g_neck_pop.wav');
let audioVictory = new Audio('/sound/successfull.mp3');
let audioStart = new Audio('/sound/start-game.mp3');


//правильные-неправильные ответы
let rightAnswer = 0;
let wrongAnswer = 0;
// переменные с кнопками 
let button1 = document.querySelector('.button-count__1');
let button2 = document.querySelector('.button-count__2');
let button3 = document.querySelector('.button-count__3');
let button4 = document.querySelector('.button-count__4');
let button5 = document.querySelector('.button-count__5');
let button6 = document.querySelector('.button-count__6');
let arrButtons = [button1, button2, button3, button4, button5, button6];
let numbrButtnsForMode;



//переменные с иконками флагов изи мод
let SwitzerlandImg = "/pages/Games/Growth/IQ/img/easy-mode/ch.png";
let ArmeniaImg = "/pages/Games/Growth/IQ/img/easy-mode/am.png";
let AustriaImg = "/pages/Games/Growth/IQ/img/easy-mode/at.png";
let BrazilImg = "/pages/Games/Growth/IQ/img/easy-mode/br.png";
let NorwayImg = "/pages/Games/Growth/IQ/img/easy-mode/no.png";
let BelarusImg = "/pages/Games/Growth/IQ/img/easy-mode/by.png";
let ChinaImg = "/pages/Games/Growth/IQ/img/easy-mode/cn.png";
let GermanyImg = "/pages/Games/Growth/IQ/img/easy-mode/de.png";
let DenmarkImg = "/pages/Games/Growth/IQ/img/easy-mode/dk.png";
let EstoniaImg = "/pages/Games/Growth/IQ/img/easy-mode/ee.png";
let FinlandImg = "/pages/Games/Growth/IQ/img/easy-mode/fi.png";
let FranceImg = "/pages/Games/Growth/IQ/img/easy-mode/fr.png";
let BritishImg = "/pages/Games/Growth/IQ/img/easy-mode/gb.png";
let GreeceImg = "/pages/Games/Growth/IQ/img/easy-mode/gr.png";
let IsrailImg = "/pages/Games/Growth/IQ/img/easy-mode/il.png";
let IndiaImg = "/pages/Games/Growth/IQ/img/easy-mode/in.png";
let ItalyImg = "/pages/Games/Growth/IQ/img/easy-mode/it.png";
let JapanImg = "/pages/Games/Growth/IQ/img/easy-mode/jp.png";
let KoreaImg = "/pages/Games/Growth/IQ/img/easy-mode/kr.png";
let KZImg = "/pages/Games/Growth/IQ/img/easy-mode/kz.png";
let LatviaImg = "/pages/Games/Growth/IQ/img/easy-mode/lv.png";
let NewZilandImg = "/pages/Games/Growth/IQ/img/easy-mode/nz.png";
let PolandImg = "/pages/Games/Growth/IQ/img/easy-mode/pl.png";
let PortugalImg = "/pages/Games/Growth/IQ/img/easy-mode/pt.png";
let RussianImg = "/pages/Games/Growth/IQ/img/easy-mode/ru.png";
let SwedenImg = "/pages/Games/Growth/IQ/img/easy-mode/se.png";
let SyriaImg = "/pages/Games/Growth/IQ/img/easy-mode/sy.png";
let TurkeyImg = "/pages/Games/Growth/IQ/img/easy-mode/tr.png";
let USAImg = "/pages/Games/Growth/IQ/img/easy-mode/um.png";
let CanadaImg = "/pages/Games/Growth/IQ/img/easy-mode/ca.png";
let AustraliaImg = "/pages/Games/Growth/IQ/img/easy-mode/hm.png";
let IraqImg = "/pages/Games/Growth/IQ/img/easy-mode/iq.png";
let IranImg = "/pages/Games/Growth/IQ/img/easy-mode/ir.png";
let SerbiaImg = "/pages/Games/Growth/IQ/img/easy-mode/rs.png";
let GruziaImg = "/pages/Games/Growth/IQ/img/easy-mode/ge.png";
let KNDRImg = "/pages/Games/Growth/IQ/img/easy-mode/kp.png";
let LitvaImg = "/pages/Games/Growth/IQ/img/easy-mode/lt.png";
let MoldoviaImg = "/pages/Games/Growth/IQ/img/easy-mode/md.png";
let MexicaImg = "/pages/Games/Growth/IQ/img/easy-mode/mx.png";
let SaudAraviaImg = "/pages/Games/Growth/IQ/img/easy-mode/sa.png";

let arrCounrysImgEasy = [SwitzerlandImg, ArmeniaImg, AustriaImg, BrazilImg, NorwayImg, BelarusImg, ChinaImg, GermanyImg, DenmarkImg, EstoniaImg, FinlandImg, FranceImg, BritishImg, GreeceImg, IsrailImg, IndiaImg, ItalyImg, JapanImg, KoreaImg, KZImg, LatviaImg, NewZilandImg, PolandImg, PortugalImg, RussianImg, SwedenImg, SyriaImg, TurkeyImg, USAImg, CanadaImg, AustraliaImg, IraqImg, IranImg, SerbiaImg, GruziaImg, KNDRImg, LitvaImg, MoldoviaImg, MexicaImg, SaudAraviaImg];
let arrCounrysTextEasy = ['Швейцария', 'Армения', 'Австрия', 'Бразилия', 'Норвегия', 'Беларусь', 'Китай', 'Германия', 'Дания', 'Эстония', 'Финляндия', 'Франция', 'Британия', 'Греция', 'Израиль', 'Индия', 'Италия', 'Япония', 'Корея', 'Казахстан', 'Латвия', 'Нов.Зеландия', 'Польша', 'Португалия', 'Россия', 'Швеция', 'Сирия', 'Турция', 'США', 'Канада', 'Австралия', 'Ирак', 'Иран', 'Сербия', 'Грузия', 'Северн. Корея', 'Литва', 'Молдавия', 'Мексика', 'Сауд. Аравия'];




//переменные с иконками флагов нормал мод
let ArabEmiratesImg = "/pages/Games/Growth/IQ/img/normal-mode/ae.png";
let AfganistanImg = "/pages/Games/Growth/IQ/img/normal-mode/af.png";
let AngolaImg = "/pages/Games/Growth/IQ/img/normal-mode/ao.png";
let ArgentinImg = "/pages/Games/Growth/IQ/img/normal-mode/ar.png";
let AzerbaijanImg = "/pages/Games/Growth/IQ/img/normal-mode/az.png";
let KamerunImg = "/pages/Games/Growth/IQ/img/normal-mode/cm.png";
let BelgiumImg = "/pages/Games/Growth/IQ/img/normal-mode/be.png";
let BalgarImg = "/pages/Games/Growth/IQ/img/normal-mode/bg.png";
let BoliviaImg = "/pages/Games/Growth/IQ/img/normal-mode/bo.png";
let BagamesImg = "/pages/Games/Growth/IQ/img/normal-mode/bs.png";
let ChiliImg = "/pages/Games/Growth/IQ/img/normal-mode/cl.png";
let ColumbiaImg = "/pages/Games/Growth/IQ/img/normal-mode/co.png";
let CostaRicaImg = "/pages/Games/Growth/IQ/img/normal-mode/cr.png";
let CubaImg = "/pages/Games/Growth/IQ/img/normal-mode/cu.png";
let CyprImg = "/pages/Games/Growth/IQ/img/normal-mode/cy.png";
let ChehiaImg = "/pages/Games/Growth/IQ/img/normal-mode/cz.png";
let DominicanImg = "/pages/Games/Growth/IQ/img/normal-mode/do.png";
let AlgirImg = "/pages/Games/Growth/IQ/img/normal-mode/dz.png";
let EcuadorImg = "/pages/Games/Growth/IQ/img/normal-mode/ec.png";
let EgyptImg = "/pages/Games/Growth/IQ/img/normal-mode/eg.png";
let SpainImg = "/pages/Games/Growth/IQ/img/normal-mode/es.png";
let ScotlandImg = "/pages/Games/Growth/IQ/img/normal-mode/gb-sct.png";
let GrinlandImg = "/pages/Games/Growth/IQ/img/normal-mode/gl.png";
let HarvatImg = "/pages/Games/Growth/IQ/img/normal-mode/hr.png";
let KeniaImg = "/pages/Games/Growth/IQ/img/normal-mode/ke.png";
let MadagascarImg = "/pages/Games/Growth/IQ/img/normal-mode/mg.png";
let MakedonImg = "/pages/Games/Growth/IQ/img/normal-mode/mk.png";
let NigeriaImg = "/pages/Games/Growth/IQ/img/normal-mode/ng.png";
let NiderlandImg = "/pages/Games/Growth/IQ/img/normal-mode/nl.png";
let PanamaImg = "/pages/Games/Growth/IQ/img/normal-mode/pa.png";
let PacestanImg = "/pages/Games/Growth/IQ/img/normal-mode/pk.png";
let YemenImg = "/pages/Games/Growth/IQ/img/normal-mode/ye.png";
let HonkongImg = "/pages/Games/Growth/IQ/img/normal-mode/hk.png";
let HaitiImg = "/pages/Games/Growth/IQ/img/normal-mode/ht.png";
let IndonezImg = "/pages/Games/Growth/IQ/img/normal-mode/id.png";
let IrlandImg = "/pages/Games/Growth/IQ/img/normal-mode/ie.png";
let IslandImg = "/pages/Games/Growth/IQ/img/normal-mode/is.png";
let JamaykaImg = "/pages/Games/Growth/IQ/img/normal-mode/jm.png";
let KirgizImg = "/pages/Games/Growth/IQ/img/normal-mode/kg.png";
let KombodgaImg = "/pages/Games/Growth/IQ/img/normal-mode/kh.png";
let LucsenburgImg = "/pages/Games/Growth/IQ/img/normal-mode/lu.png";
let LiviaImg = "/pages/Games/Growth/IQ/img/normal-mode/ly.png";
let MorokoImg = "/pages/Games/Growth/IQ/img/normal-mode/ma.png";
let PuertoRicoImg = "/pages/Games/Growth/IQ/img/normal-mode/pr.png";
let PalestinaImg = "/pages/Games/Growth/IQ/img/normal-mode/ps.png";
let RuminiaImg = "/pages/Games/Growth/IQ/img/normal-mode/ro.png";
let SudanImg = "/pages/Games/Growth/IQ/img/normal-mode/sd.png";
let SingapurImg = "/pages/Games/Growth/IQ/img/normal-mode/sg.png";
let SloveniaImg = "/pages/Games/Growth/IQ/img/normal-mode/si.png";
let SlovakiaImg = "/pages/Games/Growth/IQ/img/normal-mode/sk.png";
let TailandImg = "/pages/Games/Growth/IQ/img/normal-mode/th.png";
let TadjicistanImg = "/pages/Games/Growth/IQ/img/normal-mode/tj.png";
let TurkmenistanImg = "/pages/Games/Growth/IQ/img/normal-mode/tm.png";
let TaivanImg = "/pages/Games/Growth/IQ/img/normal-mode/tw.png";
let UzbecistanImg = "/pages/Games/Growth/IQ/img/normal-mode/uz.png";
let VaticanImg = "/pages/Games/Growth/IQ/img/normal-mode/va.png";
let VenesuelaImg = "/pages/Games/Growth/IQ/img/normal-mode/ve.png";
let VietnamImg = "/pages/Games/Growth/IQ/img/normal-mode/vn.png";

let arrCounrysImgNormal = [ArabEmiratesImg, AfganistanImg, AngolaImg, ArgentinImg, AzerbaijanImg, KamerunImg, BelgiumImg, BalgarImg, BoliviaImg, BagamesImg, ChiliImg, ColumbiaImg, CostaRicaImg, CubaImg, CyprImg, ChehiaImg, DominicanImg, AlgirImg, EcuadorImg, EgyptImg, SpainImg, ScotlandImg, GrinlandImg, HarvatImg, KeniaImg, MadagascarImg, MakedonImg, NigeriaImg, NiderlandImg, PanamaImg, PacestanImg, YemenImg, HonkongImg, HaitiImg, IndonezImg, IrlandImg, IslandImg, JamaykaImg, KirgizImg, KombodgaImg, LucsenburgImg, LiviaImg, MorokoImg, PuertoRicoImg, PalestinaImg, RuminiaImg, SudanImg, SingapurImg, SloveniaImg, SlovakiaImg, TailandImg, TadjicistanImg, TurkmenistanImg, TaivanImg, UzbecistanImg, VaticanImg, VenesuelaImg, VietnamImg];
let arrCounrysTextNormal = ['Араб. Эмираты', 'Афганистан', 'Ангола', 'Аргентина', 'Азербайджан', ' Камерун', 'Бельгия', 'Болгария', 'Боливия', 'Багамские Ост.', 'Чили', 'Колумбия', 'Коста-Рика', 'Куба', 'Кипр', 'Чехия', 'Доминикан', 'Алжир', 'Эквадор', 'Египет', 'Испания', 'Шотландия', 'Гренландия', 'Хорватия', 'Кения', 'Мадагаскар', 'Македония', 'Нигерия', 'Нидерланды', 'Панама', 'Пакистан', 'Емен', 'Гонконг', 'Гаити', 'Индонезия', 'Ирландия', 'Исландия', 'Ямайка', 'Киргизия', 'Камбоджа', 'Люксенбург', 'Ливия', 'Морокко', 'Пуэрто-Рико', 'Палестина', 'Румыния', 'Судан', 'Сингапур', 'Словения', 'Словакия', 'Таиланд', 'Таджикистан', 'Туркменистан', 'Тайвань', 'Узбекистан', 'Ватикан', 'Венесуэла', 'Вьетнам'];



//переменные с иконками флагов хард мод
let AndorraImg = "/pages/Games/Growth/IQ/img/hard-mode/ad.png";
let AlbaniaImg = "/pages/Games/Growth/IQ/img/hard-mode/al.png";
let AntarcticaImg = "/pages/Games/Growth/IQ/img/hard-mode/aq.png";
let AmericanSamoaImg = "/pages/Games/Growth/IQ/img/hard-mode/as.png";
let BosniaAndHerzegovinaImg = "/pages/Games/Growth/IQ/img/hard-mode/ba.png";
let BarbadosImg = "/pages/Games/Growth/IQ/img/hard-mode/bb.png";
let BangladeshImg = "/pages/Games/Growth/IQ/img/hard-mode/bd.png";
let BahrainImg = "/pages/Games/Growth/IQ/img/hard-mode/bh.png";
let BurundiImg = "/pages/Games/Growth/IQ/img/hard-mode/bi.png";
let BermudaImg = "/pages/Games/Growth/IQ/img/hard-mode/bm.png";
let BhutanImg = "/pages/Games/Growth/IQ/img/hard-mode/bt.png";
let BotswanaImg = "/pages/Games/Growth/IQ/img/hard-mode/bw.png";
let CentralAfricanRepublicImg = "/pages/Games/Growth/IQ/img/hard-mode/cf.png";
let CongoImg = "/pages/Games/Growth/IQ/img/hard-mode/cg.png";
let CookIslandsImg = "/pages/Games/Growth/IQ/img/hard-mode/ck.png";
let CaboVerdeImg = "/pages/Games/Growth/IQ/img/hard-mode/cv.png";
let WesternSaharaImg = "/pages/Games/Growth/IQ/img/hard-mode/eh.png";
let GabonImg = "/pages/Games/Growth/IQ/img/hard-mode/ga.png";
let GhanaImg = "/pages/Games/Growth/IQ/img/hard-mode/gh.png";
let GambiaImg = "/pages/Games/Growth/IQ/img/hard-mode/gm.png";
let GuatemalaImg = "/pages/Games/Growth/IQ/img/hard-mode/gt.png";
let GuamImg = "/pages/Games/Growth/IQ/img/hard-mode/gu.png";
let GuineaBissauImg = "/pages/Games/Growth/IQ/img/hard-mode/gw.png";
let GuyanaImg = "/pages/Games/Growth/IQ/img/hard-mode/gy.png";
let HondurasImg = "/pages/Games/Growth/IQ/img/hard-mode/hn.png";
let HungaryImg = "/pages/Games/Growth/IQ/img/hard-mode/hu.png";
let JerseyImg = "/pages/Games/Growth/IQ/img/hard-mode/je.png";
let JordanImg = "/pages/Games/Growth/IQ/img/hard-mode/jo.png";
let KuwaitImg = "/pages/Games/Growth/IQ/img/hard-mode/kw.png";
let CaymanIslandsImg = "/pages/Games/Growth/IQ/img/hard-mode/ky.png";
let LaoPeoplesDemocraticRepublicImg = "/pages/Games/Growth/IQ/img/hard-mode/la.png";
let LebanonImg = "/pages/Games/Growth/IQ/img/hard-mode/lb.png";
let SriLankaImg = "/pages/Games/Growth/IQ/img/hard-mode/lk.png";
let LiberiaImg = "/pages/Games/Growth/IQ/img/hard-mode/lr.png";
let MonacoImg = "/pages/Games/Growth/IQ/img/hard-mode/mc.png";
let MaliImg = "/pages/Games/Growth/IQ/img/hard-mode/ml.png";
let MongoliaImg = "/pages/Games/Growth/IQ/img/hard-mode/mn.png";
let MaltaImg = "/pages/Games/Growth/IQ/img/hard-mode/mt.png";
let MalaysiaImg = "/pages/Games/Growth/IQ/img/hard-mode/my.png";
let MozambiqueImg = "/pages/Games/Growth/IQ/img/hard-mode/mz.png";
let NamibiaImg = "/pages/Games/Growth/IQ/img/hard-mode/na.png";
let NigerImg = "/pages/Games/Growth/IQ/img/hard-mode/ne.png";
let NorfolkIslandImg = "/pages/Games/Growth/IQ/img/hard-mode/nf.png";
let NicaraguaImg = "/pages/Games/Growth/IQ/img/hard-mode/ni.png";
let NepalImg = "/pages/Games/Growth/IQ/img/hard-mode/np.png";
let NauruImg = "/pages/Games/Growth/IQ/img/hard-mode/nr.png";
let OmanImg = "/pages/Games/Growth/IQ/img/hard-mode/om.png";
let FrenchPolynesiaImg = "/pages/Games/Growth/IQ/img/hard-mode/pf.png";
let PapuaNewGuineaImg = "/pages/Games/Growth/IQ/img/hard-mode/pg.png";
let PhilippinesImg = "/pages/Games/Growth/IQ/img/hard-mode/ph.png";
let ParaguayImg = "/pages/Games/Growth/IQ/img/hard-mode/py.png";
let QatarImg = "/pages/Games/Growth/IQ/img/hard-mode/qa.png";
let SolomonIslandsImg = "/pages/Games/Growth/IQ/img/hard-mode/sb.png";
let SeychellesImg = "/pages/Games/Growth/IQ/img/hard-mode/sc.png";
let SomaliaImg = "/pages/Games/Growth/IQ/img/hard-mode/so.png";
let SurinameImg = "/pages/Games/Growth/IQ/img/hard-mode/sr.png";
let SouthSudanImg = "/pages/Games/Growth/IQ/img/hard-mode/ss.png";
let ElSalvadorImg = "/pages/Games/Growth/IQ/img/hard-mode/sv.png";
let TogoImg = "/pages/Games/Growth/IQ/img/hard-mode/tg.png";
let TunisiaImg = "/pages/Games/Growth/IQ/img/hard-mode/tn.png";
let UgandaImg = "/pages/Games/Growth/IQ/img/hard-mode/ug.png";
let UruguayImg = "/pages/Games/Growth/IQ/img/hard-mode/uy.png";
let VirginIslandsBritishImg = "/pages/Games/Growth/IQ/img/hard-mode/vg.png";
let VirginIslandsUSImg = "/pages/Games/Growth/IQ/img/hard-mode/vi.png";
let SamoaImg = "/pages/Games/Growth/IQ/img/hard-mode/ws.png";
let KosovoImg = "/pages/Games/Growth/IQ/img/hard-mode/xk.png";
let SouthAfricaImg = "/pages/Games/Growth/IQ/img/hard-mode/za.png";
let ZambiaImg = "/pages/Games/Growth/IQ/img/hard-mode/zm.png";
let ZimbabweImg = "/pages/Games/Growth/IQ/img/hard-mode/zw.png";


let arrCounrysImgHard = [AndorraImg, AlbaniaImg, AntarcticaImg, AmericanSamoaImg, BosniaAndHerzegovinaImg, BarbadosImg, BangladeshImg, BahrainImg, BurundiImg, BermudaImg, BhutanImg, BotswanaImg, CentralAfricanRepublicImg, CongoImg, CookIslandsImg, CaboVerdeImg, WesternSaharaImg, GabonImg, GhanaImg, GambiaImg, GuatemalaImg, GuamImg, GuineaBissauImg, GuyanaImg, HondurasImg, HungaryImg, JerseyImg, JordanImg, KuwaitImg, CaymanIslandsImg, LaoPeoplesDemocraticRepublicImg, LebanonImg, SriLankaImg, LiberiaImg, MonacoImg, MaliImg, MongoliaImg, MaltaImg, MalaysiaImg, MozambiqueImg, NamibiaImg, NigerImg, NorfolkIslandImg, NicaraguaImg, NepalImg, NauruImg, OmanImg, FrenchPolynesiaImg, PapuaNewGuineaImg, PhilippinesImg, ParaguayImg, QatarImg, SolomonIslandsImg, SeychellesImg, SomaliaImg, SurinameImg, SouthSudanImg, ElSalvadorImg, TogoImg, TunisiaImg, UgandaImg, UruguayImg, VirginIslandsBritishImg, VirginIslandsUSImg, SamoaImg, KosovoImg, SouthAfricaImg, ZambiaImg, ZimbabweImg]
let arrCounrysTextHard = ['Андорра', 'Албания', 'Антарктика', 'Американский Самоа', 'Босния и Герцеговина', 'Барбадос', 'Бангладеш', 'Бахрейн', 'Бурунди', 'Бермудские Ост.', 'Бутан', 'Ботсвана', 'Центральная Африканская Республика', 'Республика Конго', 'Ост. Кука', 'Кабо-Верде', 'Запад. Сахара', 'Габон', 'Гана', 'Гамбия', 'Гватемала', 'Гуам', 'Гвинея-Бисау', 'Гайана', 'Гондурас', 'Венгрия', 'Джерси', 'Иордания', 'Кувейт', 'Ост. Кайман', 'Лаос', 'Ливан', 'Шри-Ланка', 'Либерия', 'Монако', 'Мали', 'Монголия', 'Мальта', 'Малайзия', 'Мозамбик', 'Намибия', 'Нигер', 'Ост. Норфолк', 'Никарагуа', 'Непал', 'Науру', 'Оман', 'Французская Полинезия', 'Папуа-Новая Гвинея', 'Филиппины', 'Парагвай', 'Катар', 'Соломоновы Ост.', 'Сейшельские Ост.', 'Сомали', 'Суринам', 'Южный Судан', 'Сальвадор', 'Того', 'Тунис', 'Уганда', 'Уругвай', 'Виргинские Ост. (Великобритания)', 'Виргинские Ост. (США)', 'Самоа', 'Республика Косово', 'Южно-Африканская Республика', 'Замбия', 'Зимбабве']




//переменные с иконками флагов крейзи мод
let AntiguaandBarbudaImg = "/pages/Games/Growth/IQ/img/crazy-mode/ag.png";
let AnguillaImg = "/pages/Games/Growth/IQ/img/crazy-mode/ai.png";
let ArubaImg = "/pages/Games/Growth/IQ/img/crazy-mode/aw.png";
let ÅlandIslandsImg = "/pages/Games/Growth/IQ/img/crazy-mode/ax.png";
let BurkinaFasoImg = "/pages/Games/Growth/IQ/img/crazy-mode/bf.png";
let SaintBarthélemyImg = "/pages/Games/Growth/IQ/img/crazy-mode/bl.png";
let BruneiDarussalamImg = "/pages/Games/Growth/IQ/img/crazy-mode/bn.png";
let BonaireSintEustatiusandSabaImg = "/pages/Games/Growth/IQ/img/crazy-mode/bq.png";
let BelizeImg = "/pages/Games/Growth/IQ/img/crazy-mode/bz.png";
let CocosKeelingIslandsImg = "/pages/Games/Growth/IQ/img/crazy-mode/cc.png";
let CongoDemocraticRepublicImg = "/pages/Games/Growth/IQ/img/crazy-mode/cd.png";
let CuraçaoImg = "/pages/Games/Growth/IQ/img/crazy-mode/cw.png";
let ChristmasIslandImg = "/pages/Games/Growth/IQ/img/crazy-mode/cx.png";
let DjiboutiImg = "/pages/Games/Growth/IQ/img/crazy-mode/dj.png";
let DominicaImg = "/pages/Games/Growth/IQ/img/crazy-mode/dm.png";
let EritreaImg = "/pages/Games/Growth/IQ/img/crazy-mode/er.png";
let EthiopiaImg = "/pages/Games/Growth/IQ/img/crazy-mode/et.png";
let FijiImg = "/pages/Games/Growth/IQ/img/crazy-mode/fj.png";
let FalklandIslandsMalvinasImg = "/pages/Games/Growth/IQ/img/crazy-mode/fk.png";
let MicronesiaFederatedStatesImg = "/pages/Games/Growth/IQ/img/crazy-mode/fm.png";
let FaroeIslandsImg = "/pages/Games/Growth/IQ/img/crazy-mode/fo.png";
let NorthernIrelandImg = "/pages/Games/Growth/IQ/img/crazy-mode/gb-nir.png";
let WalesImg = "/pages/Games/Growth/IQ/img/crazy-mode/gb-wls.png";
let GrenadaImg = "/pages/Games/Growth/IQ/img/crazy-mode/gd.png";
let FrenchGuianaImg = "/pages/Games/Growth/IQ/img/crazy-mode/gf.png";
let GuernseyImg = "/pages/Games/Growth/IQ/img/crazy-mode/gg.png";
let GibraltarImg = "/pages/Games/Growth/IQ/img/crazy-mode/gi.png";
let GuadeloupeImg = "/pages/Games/Growth/IQ/img/crazy-mode/gp.png";
let EquatorialGuineaImg = "/pages/Games/Growth/IQ/img/crazy-mode/gq.png";
let SouthGeorgiaSouthSandwichIslandsImg = "/pages/Games/Growth/IQ/img/crazy-mode/gs.png";
let IsleofManImg = "/pages/Games/Growth/IQ/img/crazy-mode/im.png";
let KiribatiImg = "/pages/Games/Growth/IQ/img/crazy-mode/ki.png";
let ComorosImg = "/pages/Games/Growth/IQ/img/crazy-mode/km.png";
let SaintKittsNevisImg = "/pages/Games/Growth/IQ/img/crazy-mode/kn.png";
let SaintLuciaImg = "/pages/Games/Growth/IQ/img/crazy-mode/lc.png";
let LiechtensteinImg = "/pages/Games/Growth/IQ/img/crazy-mode/li.png";
let LesothoImg = "/pages/Games/Growth/IQ/img/crazy-mode/ls.png";
let MontenegroImg = "/pages/Games/Growth/IQ/img/crazy-mode/me.png";
let MarshallIslandsImg = "/pages/Games/Growth/IQ/img/crazy-mode/mh.png";
let MyanmarImg = "/pages/Games/Growth/IQ/img/crazy-mode/mm.png";
let MacaoImg = "/pages/Games/Growth/IQ/img/crazy-mode/mo.png";
let MartiniqueImg = "/pages/Games/Growth/IQ/img/crazy-mode/mq.png";
let MauritaniaImg = "/pages/Games/Growth/IQ/img/crazy-mode/mr.png";
let MontserratImg = "/pages/Games/Growth/IQ/img/crazy-mode/ms.png";
let MauritiusImg = "/pages/Games/Growth/IQ/img/crazy-mode/mu.png";
let MaldivesImg = "/pages/Games/Growth/IQ/img/crazy-mode/mv.png";
let MalawiImg = "/pages/Games/Growth/IQ/img/crazy-mode/mw.png";
let NewCaledoniaImg = "/pages/Games/Growth/IQ/img/crazy-mode/nc.png";
let NiueImg = "/pages/Games/Growth/IQ/img/crazy-mode/nu.png";
let SaintPierreMiquelonImg = "/pages/Games/Growth/IQ/img/crazy-mode/pm.png";
let PitcairnImg = "/pages/Games/Growth/IQ/img/crazy-mode/pn.png";
let PalauImg = "/pages/Games/Growth/IQ/img/crazy-mode/pw.png";
let RwandaImg = "/pages/Games/Growth/IQ/img/crazy-mode/rw.png";
let SaintHelenaAscensionTristandaCunhaImg = "/pages/Games/Growth/IQ/img/crazy-mode/sh.png";
let SierraLeoneImg = "/pages/Games/Growth/IQ/img/crazy-mode/sl.png";
let SanMarinoImg = "/pages/Games/Growth/IQ/img/crazy-mode/sm.png";
let SenegalImg = "/pages/Games/Growth/IQ/img/crazy-mode/sn.png";
let SaoTomePrincipeImg = "/pages/Games/Growth/IQ/img/crazy-mode/st.png";
let SintMaartenDutchpartImg = "/pages/Games/Growth/IQ/img/crazy-mode/sx.png";
let EswatiniImg = "/pages/Games/Growth/IQ/img/crazy-mode/sz.png";
let TokelauImg = "/pages/Games/Growth/IQ/img/crazy-mode/tk.png";
let TimorLesteImg = "/pages/Games/Growth/IQ/img/crazy-mode/tl.png";
let TongaImg = "/pages/Games/Growth/IQ/img/crazy-mode/to.png";
let TrinidadTobagoImg = "/pages/Games/Growth/IQ/img/crazy-mode/tt.png";
let TuvaluImg = "/pages/Games/Growth/IQ/img/crazy-mode/tv.png";
let TanzaniaUnitedRepublic = "/pages/Games/Growth/IQ/img/crazy-mode/tz.png";
let VanuatuImg = "/pages/Games/Growth/IQ/img/crazy-mode/vu.png";

let arrCounrysImgcrazy = [AntiguaandBarbudaImg, AnguillaImg, ArubaImg, ÅlandIslandsImg, BurkinaFasoImg, SaintBarthélemyImg, BruneiDarussalamImg, BonaireSintEustatiusandSabaImg, BelizeImg, CocosKeelingIslandsImg, CongoDemocraticRepublicImg, CuraçaoImg, ChristmasIslandImg, DjiboutiImg, DominicaImg, EritreaImg, EthiopiaImg, FijiImg, FalklandIslandsMalvinasImg, MicronesiaFederatedStatesImg, FaroeIslandsImg, NorthernIrelandImg, WalesImg, GrenadaImg, FrenchGuianaImg, GuernseyImg, GibraltarImg, GuadeloupeImg, EquatorialGuineaImg, SouthGeorgiaSouthSandwichIslandsImg, IsleofManImg, KiribatiImg, ComorosImg, SaintKittsNevisImg, SaintLuciaImg, LiechtensteinImg, LesothoImg, MontenegroImg, MarshallIslandsImg, MyanmarImg, MacaoImg, MartiniqueImg, MauritaniaImg, MontserratImg, MauritiusImg, MaldivesImg, MalawiImg, NewCaledoniaImg, NiueImg, SaintPierreMiquelonImg, PitcairnImg, PalauImg, RwandaImg, SaintHelenaAscensionTristandaCunhaImg, SierraLeoneImg, SanMarinoImg, SenegalImg, SaoTomePrincipeImg, SintMaartenDutchpartImg, EswatiniImg, TokelauImg, TimorLesteImg, TongaImg, TrinidadTobagoImg, TuvaluImg, TanzaniaUnitedRepublic, VanuatuImg]
let arrCounrysTextcrazy = ['Антигуа и Барбуда', 'Ангилья', 'Аруба', 'Эландские Ост.', 'Буркина-Фасо', 'Сен-Бартельми', 'Бруней-Даруссалам', 'Бонайре,Саба и Синт-Эстатиус', 'Белиз', 'Кокосовые(Килинг)Ост.', 'Конго, Демократическая Республики', 'Кюрасао', 'Ост. Рождества', 'Джибути', 'Доминика', 'Эритрея', 'Эфиопия', 'Фиджи', 'Фолклендские Ост.(Мальвинские)', 'Микронезия, Федеративные Штаты', 'Фарерские Ост.', 'Северная Ирландия', 'Уэльс', 'Гренада', 'Французская Гвиана', 'Гернси', 'Гибралтар', 'Гваделупа', 'Экваториальная Гвинея', 'Южная Джорджия и Юж.Сандвичевы Ост.', 'Ост. Мэн', 'Кирибати', 'Коморы', 'Сент-Китс и Невис', 'Сент-Люсия', 'Лихтенштейн', 'Лесото', 'Черногория', 'Маршалловы Ост.', 'Мьянма', 'Макао', 'Мартиника', 'Мавритания', 'Монтсеррат', 'Маврикий', 'Мальдивы', 'Малави', 'Новая Каледония', 'Ниуэ', 'Сент-Пьер и Микелон', 'Питкерн', 'Палау', 'Руанда', 'Ост. Св. Елены, вознесения и Тристан-да-Кунья', 'Сьерра-Леоне', 'Сан-Марино', 'Сенегал', 'Сан-Томе и Принсипи', 'Синт-Мартен', 'Эсватини', 'Токелау', 'Тимор-Лесте', 'Тонга', 'Тринидад и Тобаго', 'Тувалу', 'Танзания (Об. Респ.)', 'Вануату']




// меню результатов 
let menuResultsContainer = document.querySelector(".container-results-menu");
let menuResultsRedRectangle = document.querySelector(".box-informations-orange__rectangle-red");
let menuResultsGreenRectangle = document.querySelector(".box-informations-orange__rectangle-green");
let menuResultsCercleProcents = document.querySelector('.box-informations-orange__circle-procent-results');
let menuResultsTimer = document.querySelector(".box-informations-orange__time");

let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");


//считает время с начала игры
let seconds = 0;
let minutes = 0;
let expUpForMode;
let iqUpForMode;
let gameModeId;
let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin;
let rangeForMode;//до какого значения ранд числа
let ModeTimeAnim;
let chosenGameMode; //в неё записываем режим после выбора режима пользователем
let arrGameMode;//в неё записываем массив с флагами
let arrTextGameMode;
let randomNumberBtn;
let arrAlredyExistNumbrs = [];
let conditionPress = false;//при нажатии на кнопку будет true
let countRightBody = document.querySelector(".count-right");
let countWrongBody = document.querySelector(".count-wrong");
let hardModeButtonsContainer = document.querySelector('.button-hardMode-container');
let arrayRandomNumbers = [];//массив рандобных чисел для блоков без повторения
let flagsBody = document.querySelector(".flags-body-img");
let deadeLine = document.getElementById("deadeLine");
let easyModeButton = document.querySelector('.easy-mode-button');
let normalModeButton = document.querySelector('.normal-mode-button');
let hardModeButton = document.querySelector('.hard-mode-button');
let crazyModeButton = document.querySelector('.crazy-mode-button');
let modeOptionsContainer = document.querySelector('.mode-options-container');
let gameMode = document.querySelector('.game-mode');
let gameModeStyleEasy = document.querySelector('.game-mode-style-easy');
const startButtonContainer = document.querySelector('.button-start-container');
const startButtonGameMode = document.querySelector('.start-menu__game-mode');
const victoryLooseScreenContainer = document.querySelector('.victory-loose-screen-container');
const victoryLooseScreenGameMode = document.querySelector('.victory-loose-screen__mode');
const victoryLooseScreenWinLooseText = document.querySelector('.victory-loose-screen__win-loose-text');
const victoryLooseScreenResultsButton = document.querySelector('.victory-loose-screen__results-button');
const resultsMenuContainer = document.querySelector('.results-menu-container');
const resultsMenuMode = document.querySelector('.results-menu__mode');
const resultsMenuWinLooseItem = document.querySelector('.items-container__win-loose-item');
const resultsMenuTimeItem = document.querySelector('.items-container__time-item');
const resultsMenuOpenedCardsItem = document.querySelector('.opened-cards');
const resultsMenuDoneCardsItem = document.querySelector('.items-container__done-cards-item');
const resultsMenuWinLooseIcon = document.querySelector('.items-container__win-loose-icon');
const resultsMenuTime = document.querySelector('.results-menu__time');
const resultsMenuIqItem = document.querySelector('.items-container__iq-item');
const resultsMenuExpItem = document.querySelector('.items-container__exp-item');
const hintsButton = document.querySelector('.hints');
let hintCounter = document.querySelector('.hint-counter');
let eyeValueForJS = eyeValue;//записываю из переменной с инфой из базы данных в обычн js переменную для динамич. показа на экране

//z
//AJAX запрос на сервер для добавления в базу данных инфы 
function doAjaxExperience() {

   let expUpForModeAjax;

   if (statusLoosOrWin == "win") {//проверка на победу или луз
      expUpForModeAjax = `${expUpForMode}`;
   } else {
      expUpForModeAjax = 2;
   }

   $.ajax({
      url: '/dataBase/controllers/bonusSystem/experience.php',
      type: 'POST',
      dataType: "json",
      data: {
         expUpForModeAjax: expUpForModeAjax,

      },
      success: function (data) {
         console.log(data.expUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

function doAjaxMinusHints() {//минусует подсказки


   $.ajax({
      url: '/dataBase/controllers/antiBonusSystem/minusEyeHints.php',
      type: 'POST',
      data: {
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

//AJAX запрос на сервер для добавления в базу данных инфы при выйгрыше
function doAjaxWin() {
   let IqUpForModeAjax = `${iqUpForMode}`;


   $.ajax({
      url: '/dataBase/controllers/bonusSystem/bonusForWin copy.php',
      type: 'POST',
      dataType: "json",
      data: {
         IqUpForModeAjax: IqUpForModeAjax,

      },
      success: function (data) {
         console.log(data.IqUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

function doAjaxMinusHints() {


   $.ajax({
      url: '/dataBase/controllers/antiBonusSystem/minusEyeHints.php',
      type: 'POST',
      data: {
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}


function doAjaxLoose() {
   let IqUpForModeAjax = `2`;

   $.ajax({
      url: '/dataBase/controllers/bonusSystem/bonusForLoose.php',
      type: 'POST',
      dataType: "json",
      data: {
         IqUpForModeAjax: IqUpForModeAjax,

      },
      success: function (data) {
         console.log(data.IqUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

//AJAX запрос на сервер для добавления в базу данных инфы при выйгрыше
function doAjaxResults() {
   let modeID = `${gameModeId}`;
   let win = `${winForResults}`;
   let loose = `${looseForResults}`;
   let time_sec = `${seconds}`;
   let rightAnswerRes = `${rightAnswer}`;

   $.ajax({
      url: '/dataBase/resultsGames/resultsCountriesGame.php',
      type: 'POST',
      dataType: "json",
      data: {
         modeID: modeID,
         win: win,
         loose: loose,
         time_sec: time_sec,
         rightAnswerRes: rightAnswerRes,
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERRORчик');
      }
   })
}

//z

//при нажатии на отмену вспл окна настройки 
document.querySelector('.pop-up__cancel').onclick = function () {
   settings.style = 'visibility:hidden;';
};
//при нажатии на иконку настроек
document.querySelector('.linkToTheSettings').onclick = function () {
   settings.style = 'visibility:visible;';
};

//при нажатии на отмену вспл окна назад
document.querySelector('.pop-up__cancel2').onclick = function () {
   comeback.style = 'visibility:hidden;';
};
//при нажатии на иконку назад
document.querySelector('.comeback-button').onclick = function () {
   comeback.style = 'visibility:visible;';
};

//при нажатии на отмену вспл окна рестарт
document.querySelector('.pop-up__cancel3').onclick = function () {
   restart.style = 'visibility:hidden;';
};
//при нажатии на иконку рестарт
document.querySelector('.linkToTheRestart').onclick = function () {
   restart.style = 'visibility:visible;';
};
//при нажатии на иконку подсказок
hintsButton.onclick = function () {
   if (eyeValue > 0 && eyeValueForJS > 0) {
      eyeValueForJS -= 1;
      hintCounter.innerHTML = eyeValueForJS;
      audioComplete.play();
      doAjaxMinusHints();
      let copyRandNumber = randomNumberBtn;//сделано в связи с багом покраски в зелйный кнопки
      arrButtons[copyRandNumber].style = 'background:green;';
      setTimeout(() => {
         arrButtons[copyRandNumber].style = 'background:#213242;';
      }, 500);
   }
};

easyModeButton.onclick = function () {//при нажатии на изи кнопку сложности
   chosenGameMode = 'easy';
   rangeForMode = 39;
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Легко';
   gameMode.classList.add('game-mode-style-easy');
   ModeTimeAnim = '60';
   startButtonContainer.style = 'display: block;';
   startButtonGameMode.innerHTML = 'Легко';
   startButtonGameMode.classList.add('start-menu__easy-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__easy-mode');
   victoryLooseScreenGameMode.innerHTML = 'Легко';
   resultsMenuMode.classList.add('results-menu__easy-mode');
   resultsMenuMode.innerHTML = 'Легко';
   numbrButtnsForMode = 3;
   expUpForMode = 5;
   iqUpForMode = 10;
   gameModeId = 1;
   audioComplete.play();
}
normalModeButton.onclick = function () {
   chosenGameMode = 'normal';
   rangeForMode = 57;
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Нормально';
   gameMode.classList.add('game-mode-style-normal');
   ModeTimeAnim = '60';
   startButtonContainer.style = 'display: block;'
   startButtonGameMode.innerHTML = 'Нормально';
   startButtonGameMode.classList.add('start-menu__normal-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__normal-mode');
   victoryLooseScreenGameMode.innerHTML = 'Нормально';
   resultsMenuMode.classList.add('results-menu__normal-mode');
   resultsMenuMode.innerHTML = 'Нормально';
   numbrButtnsForMode = 3;
   expUpForMode = 6;
   iqUpForMode = 12;
   gameModeId = 2;
   audioComplete.play();
}
hardModeButton.onclick = function () {
   chosenGameMode = 'hard';
   rangeForMode = 68;
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Сложно';
   gameMode.classList.add('game-mode-style-hard');
   ModeTimeAnim = '60';
   startButtonContainer.style = 'display: block;'
   startButtonGameMode.innerHTML = 'Сложно';
   startButtonGameMode.classList.add('start-menu__hard-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__hard-mode');
   victoryLooseScreenGameMode.innerHTML = 'Сложно';
   resultsMenuMode.classList.add('results-menu__hard-mode');
   resultsMenuMode.innerHTML = 'Сложно';
   hardModeButtonsContainer.style = "display:flex;";
   numbrButtnsForMode = 5;
   expUpForMode = 8;
   iqUpForMode = 15;
   gameModeId = 3;
   audioComplete.play();
}
crazyModeButton.onclick = function () {
   chosenGameMode = 'crazy';
   rangeForMode = 66;
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Безумно';
   gameMode.classList.add('game-mode-style-crazy');
   ModeTimeAnim = '60';
   startButtonContainer.style = 'display: block;'
   startButtonGameMode.innerHTML = 'Безумно';
   startButtonGameMode.classList.add('start-menu__crazy-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__crazy-mode');
   victoryLooseScreenGameMode.innerHTML = 'Безумно';
   resultsMenuMode.classList.add('results-menu__crazy-mode');
   resultsMenuMode.innerHTML = 'Безумно';
   hardModeButtonsContainer.style = "display:flex;";
   numbrButtnsForMode = 5;
   expUpForMode = 10;
   iqUpForMode = 20;
   gameModeId = 4;
   audioComplete.play();
}
victoryLooseScreenResultsButton.onclick = function () {
   resultsMenuContainer.style = 'display:block;';
   audioComplete.play();
}

//анимация проигриша 
function showLooseMessage() {
   deadeLine.style = "animation-play-state: paused ";
   victoryLooseScreenContainer.style = 'display:flex;';
   victoryLooseScreenWinLooseText.innerHTML = 'Поражение!'
   victoryLooseScreenWinLooseText.classList.add('loose-text-red');
   resultsMenuWinLooseItem.innerHTML = 'Поражение!';
   resultsMenuWinLooseItem.classList.add('items-container__win-loose-item-red');
   resultsMenuOpenedCardsItem.innerHTML = `${rightAnswer}`;
   resultsMenuTime.innerHTML = `${seconds}`;
   resultsMenuDoneCardsItem.classList.add('items-container__done-cards-item-red');
   resultsMenuTimeItem.classList.add('items-container__time-item-red');
   statusLoosOrWin = "loose";
   resultsMenuIqItem.innerHTML = '+2';
   resultsMenuExpItem.innerHTML = `+2`;
   looseForResults = 1;
   doAjaxLoose();//z //вызов запроса в БД
   doAjaxExperience();
   doAjaxResults();

}
function showWinMessage() {
   deadeLine.style = "animation-play-state: paused ";
   victoryLooseScreenContainer.style = 'display:flex;';
   victoryLooseScreenWinLooseText.innerHTML = 'Победа!'
   victoryLooseScreenWinLooseText.classList.add('victory-text-green');
   resultsMenuWinLooseItem.innerHTML = 'Победа!'
   resultsMenuWinLooseItem.classList.add('items-container__win-loose-item-green');
   resultsMenuOpenedCardsItem.innerHTML = `${rightAnswer}`;
   resultsMenuTime.innerHTML = `${seconds}`;
   resultsMenuDoneCardsItem.classList.add('items-container__done-cards-item-green');
   resultsMenuTimeItem.classList.add('items-container__time-item-green');
   resultsMenuIqItem.innerHTML = '+50';
   resultsMenuExpItem.innerHTML = '+20';
   statusLoosOrWin = "win";
   resultsMenuIqItem.innerHTML = `+${iqUpForMode}`;
   resultsMenuExpItem.innerHTML = `+${expUpForMode}`;
   winForResults = 1;
   doAjaxWin();
   doAjaxExperience();
   doAjaxResults();
   audioVictory.play();
}
deadeLine.addEventListener("animationend", showLooseMessage);

function checkPressButton(numberButton) {
   if (arrButtons[randomNumberBtn] == numberButton) {
      rightAnswer += 1;
      if (wrongAnswer > 0 && rightAnswer + wrongAnswer == 10) {
         showLooseMessage();
      }
      if (rightAnswer == 10) {
         showWinMessage();
      }
   } else {
      wrongAnswer += 1;
      if (wrongAnswer > 0 && rightAnswer + wrongAnswer == 10) {
         showLooseMessage();
      }
      if (rightAnswer == 10) {
         showLooseMessage();
      }
   }
   showFlags();
}

button1.onclick = function () {
   conditionPress = true;
   checkPressButton(button1);
   audioCardDone.play();
}
button2.onclick = function () {
   conditionPress = true;
   checkPressButton(button2);
   audioCardDone.play();

}
button3.onclick = function () {
   conditionPress = true;
   checkPressButton(button3);
   audioCardDone.play();

}
button4.onclick = function () {
   conditionPress = true;
   checkPressButton(button4);
   audioCardDone.play();

}
button5.onclick = function () {
   conditionPress = true;
   checkPressButton(button5);
   audioCardDone.play();

}
button6.onclick = function () {
   conditionPress = true;
   checkPressButton(button6);
   audioCardDone.play();
}

function ChoiseGameModeArray() {
   if (chosenGameMode == 'easy') {
      arrGameMode = arrCounrysImgEasy;
      arrTextGameMode = arrCounrysTextEasy;
   } else if (chosenGameMode == 'normal') {
      arrGameMode = arrCounrysImgNormal;
      arrTextGameMode = arrCounrysTextNormal;
   } else if (chosenGameMode == 'hard') {
      arrGameMode = arrCounrysImgHard;
      arrTextGameMode = arrCounrysTextHard;
   } else if (chosenGameMode == 'crazy') {
      arrGameMode = arrCounrysImgcrazy;
      arrTextGameMode = arrCounrysTextcrazy;
   }
}

function randomLoopForArr() {
   const count = 15;  // кол-во требуемых чисел
   let m = {};
   for (let i = 0; i < count; ++i) {
      let r = Math.floor(Math.random() * (rangeForMode - i));
      arrayRandomNumbers.push(((r in m) ? m[r] : r) + 1);
      let l = rangeForMode - i - 1;
      m[r] = (l in m) ? m[l] : l;
   }
   //console.log(arrayRandomNumbers);
}

function showFlags() {
   if (conditionPress == true) {
      arrayRandomNumbers = [];
      randomLoopForArr();
      for (let i = 0; i < arrAlredyExistNumbrs.length; i++) {
         if (arrayRandomNumbers[0] == arrAlredyExistNumbrs[i]) {
            arrayRandomNumbers = [];
            randomLoopForArr();
            //console.log('уже есть ,нужен новый');
         }
      }
      conditionPress = false;
   }
   flagsBody.innerHTML = `<img class="img-country" src="${arrGameMode[arrayRandomNumbers[0]]}">`;//добавляет флаг в html
   arrAlredyExistNumbrs.push(arrayRandomNumbers[0]);
   randomNumberBtn = Math.floor(Math.random() * numbrButtnsForMode);//рандомная кнопка с правильным ответом
   //console.log(randomNumberBtn);
   let iterCount = 1;// нужно чтобы с каждой итерац менялся индекс массива
   for (let k = 0; k <= numbrButtnsForMode; k++) {
      arrButtons[k].innerHTML = arrTextGameMode[arrayRandomNumbers[iterCount]];
      iterCount++;
   }
   arrButtons[randomNumberBtn].innerHTML = arrTextGameMode[arrayRandomNumbers[0]];//вставляет правильный ответ текст в кнопку
}


function game() {
   function timerGame() {
      let timerID = setInterval(function () {

         seconds += 1;
      }, 1000)
   }
   timerGame();
   randomLoopForArr();
   ChoiseGameModeArray();
   showFlags();
   deadeLine.style = `animation: deadeLine ${ModeTimeAnim}s linear `;//запуск анимации,c переменной под каждый мод игы
}

//активация кнопки старт при нажатии
const BUTTON_START = document.querySelector('.button-start');
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {
      audioStart.play();
      //при нажатии кнопки старт запускается функция game и начинаеться игра
      game();
   }
}