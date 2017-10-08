<!--start footer section-->
<footer class="footer-v2">
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-widget widget-about">
                  <div class="widget-top">
                      <h3 class="widget-title">SITE MAP</h3>
                  </div>
                  <div class="widget-body">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('user.about')}}">About Us</a></li>
                    <li><a href="{{route('listings.all')}}">Properties</a></li>
                    <li><a href="{{route('agents.all')}}">Agents</a></li>
                    <li><a href="{{route('user.blog.posts')}}">Community Discussion</a></li>
                    <li><a href="{{route('user.contact')}}">Contact Us</a></li>

                  </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-widget widget-contact">
                    <div class="widget-top">
                        <h3 class="widget-title">TOP VIEWED</h3>
                    </div>
                    <div class="widget-body">
                        <ul class="list-unstyled">
                          <?php $most_viewed = App\Property::where('views','>',0)->orderBy('views','DESC')->take(6)->get();?>
                          @if(sizeof($most_viewed)>0)
                          @foreach($most_viewed as $most_viewed_property)
                            <li><a href="/property-details/{{$most_viewed_property->id}}">{{$most_viewed_property->title}}</a> ({{$most_viewed_property->views}} Views)</li>
                          @endforeach
                        @else
                          <li>No listings to Display!</li>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="footer-widget widget-newsletter">
                    <div class="widget-top">
                        <h3 class="widget-title">Newsletter Subscribe</h3>
                    </div>
                    <div class="widget-body" id="newsletter">
                        <form action="/subscribe-to-newsletter" method="post" role="search">
                        {{ csrf_field() }}
                            <div class="table-list">
                                <div class="form-group table-cell">
                                    <div class="input-email input-icon">
                                        <input class="form-control" name="email" required="true" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="table-cell">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p>Don't Worry We Won't Disclose Your Info.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="footer-col">
              <p>&copy; <?php echo date('Y');?> e-NYUMBANI</p>
            </div>
          </div>
            <div class="col-md-6 col-sm-6">
                <div class="footer-col">
                    <div class="navi">
                        <ul id="footer-menu" class="">
                          <li><a href="{{route('user.privacy')}}">Privacy</a></li>
                          <li><a href="{{route('user.termsofUse')}}">Terms of Use</a></li>
                          <li><a href="{{route('user.personalsafety')}}">Person Safety</a></li>
                          <li><a href="{{route('user.disclaimer')}}">Disclaimer Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <div class="footer-col foot-social">
                    <p>
                        Follow us
                        <a target="_blank" class="btn-facebook" href="https://www.facebook.com/Enyumbani/?ref=br_rs" target="_blank"><i class="fa fa-facebook-square"></i></a>

                        <a target="_blank" class="btn-twitter" href="https://twitter.com/e_nyumbani" target="_blank"><i class="fa fa-twitter-square"></i></a>

                        <a target="_blank" class="btn-google-plus" href="https://plus.google.com/113758555594905762806" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!--end footer section-->
<datalist id="cities">
<option value="Abako"><option value="Aber"><option value="Abia"><option value="Abim"><option value="Aboki"><option value="Achumet"><option value="Achwa">
<option value="Adachal"><option value="Adagimon"><option value="Adea"><option value="Adilang"><option value="Adjumani"><option value="Adok"><option value="Adumi">
<option value="Adwari"><option value="Agora"><option value="Agule"><option value="Aguliya"><option value="Agulul"><option value="Ajia"><option value="Ajono"><option value="Akaba"><option value="Akalu"><option value="Akilok"><option value="Akpokoa"><option value="Alebtong"><option value="Aloi"><option value="Alui"><option value="Amgamwa">
<option value="Amilo"><option value="Amolatar"><option value="Amugo"><option value="Amuria"><option value="Amuru"><option value="Anaka"><option value="Anyavu">
<option value="Anyiribu"><option value="Apac"><option value="Apala"><option value="Api"><option value="Apigikwe"><option value="Apoka">
<option value="Apokori"><option value="Arapai"><option value="Aringa"><option value="Arinyapi"><option value="Arivu"><option value="Ariwa">
<option value="Arua"><option value="Asasi"><option value="Aswa"><option value="Atanga I"><option value="Atar"><option value="Atiak"><option value="Atura"><option value="Atyak"><option value="Aupi"><option value="Awach"><option value="Awer">
<option value="Awoja"><option value="Bajo"><option value="Bala"><option value="Bale"><option value="Balita"><option value="Bamunanika"><option value="Banda"><option value="Bar"><option value="Baringo"><option value="Barogal">
<option value="Bibia"><option value="Bikonzi"><option value="Biliefe"><option value="Birere"><option value="Biso"><option value="Biti"><option value="Bobi"><option value="Bombo"><option value="Bondo">
<option value="Boroboro"><option value="Borough"><option value="Bubale"><option value="Bubba"><option value="Budadiri"><option value="Budaka"><option value="Bude">
<option value="Bududa"><option value="Budzi"><option value="Bufumbo"><option value="Bugadi"><option value="Bugado"><option value="Buganza">
<option value="Bugaya"><option value="Bugema"><option value="Bugembe"><option value="Bugiri"><option value="Bugobero"><option value="Bugongi"><option value="Bugoye">
<option value="Buhimba"><option value="Buhoba"><option value="Buhugu"><option value="Buija"><option value="Buikwe"><option value="Bujuko"><option value="Bukakata"><option value="Bukanya">
<option value="Bukedea">
<option value="Bukhaweka"><option value="Bukoto"><option value="Bukuku"><option value="Bukumi"><option value="Bukusi"><option value="Bukuya"><option value="Bukwiri"><option value="Bulangira"><option value="Buliisa"><option value="Bulindi"><option value="Buluchecke">
<option value="Bulukatoni"><option value="Bulungi"><option value="Bumbo"><option value="Bundibugyo"><option value="Bundibuyo"><option value="Busembatia"><option value="Busembatya"><option value="Buseruka"><option value="Bushenyi"><option value="Busia"><option value="Busingiro"><option value="Busolwe">
<option value="Busumbu"><option value="Buta"><option value="Butaleja"><option value="Butema"><option value="Butiaba"><option value="Butuntumala"><option value="Butuntumula"><option value="Buwama"><option value="Buwaya">
<option value="Buwenge"><option value="Buyabi"><option value="Buyana"><option value="Buyuge"><option value="Bwera"><option value="Bwijanga"><option value="Byerima"><option value="Cegere"><option value="Chakolomun"><option value="Chanjojo"><option value="Chebonet">
<option value="Chepsikunya"><option value="Cheptui"><option value="Chondo"><option value="Curu"><option value="Cwero"><option value="Cyahafi"><option value="Danya"><option value="Delu">
<option value="Dokolo"><option value="Entebbe"><option value="Erezeli"><option value="Eruba"><option value="Fort Portal"><option value="Gaba"><option value="Galiraya">
<option value="Ganda"><option value="Gayaza"><option value="Gayaze"><option value="Gem"><option value="Gogonya"><option value="Gogonyo">
<option value="Goli"><option value="Gombe"><option value="Goru"><option value="Gulu"><option value="Gurumu"><option value="Gwere"><option value="Hima"><option value="Hoima"><option value="Ibanda"><option value="Iganga"><option value="Ihungu">
<option value="Ikulwe"><option value="Inde"><option value="Inomo"><option value="Iramva"><option value="Iriri"><option value="Ishaka">
<option value="Isingiro"><option value="Jaber"><option value="Jinja"><option value="Kaabong"><option value="Kabale"><option value="Kabarwa"><option value="Kabasanda"><option value="Kaberamaido"><option value="Kaboyo">
<option value="Kabujogera"><option value="Kabwohe"><option value="Kachumbala"><option value="Kadugala"><option value="Kagadi"><option value="Kagamba"><option value="Kaganda">
<option value="Kaiti"><option value="Kajjansi"><option value="Kakindu"><option value="Kakinga"><option value="Kakira"><option value="Kakiri"><option value="Kakoge"><option value="Kakoma"><option value="Kakumiro"><option value="Kalagi">
<option value="Kalangala"><option value="Kalapata"><option value="Kaliro"><option value="Kalisizo"><option value="Kalongo"><option value="Kalule"><option value="Kalungu"><option value="Kambuga">
<option value="Kamdini"><option value="Kamirambazzi"><option value="Kammengo"><option value="Kampala"><option value="Kamuganguzi"><option value="Kamuli"><option value="Kamwenge">
<option value="Kangole"><option value="Kanoni"><option value="Kanungu"><option value="Kanyum"><option value="Kanyumu"><option value="Kanzhobe"><option value="Kapchorwa">
<option value="Kapeka"><option value="Kapelebyong"><option value="Kapujan"><option value="Kasanda"><option value="Kasese"><option value="Kashongi"><option value="Kasodo"><option value="Kasowa"><option value="Katakwi"><option value="Katanabirwa">
<option value="Katekwana"><option value="Katera"><option value="Kati"><option value="Katine"><option value="Katuke"><option value="Katuugo"><option value="Katwe"><option value="Kaweri"><option value="Kayabwe">
<option value="Kayunga"><option value="Kazo"><option value="Kem"><option value="Kibaale"><option value="Kibangya"><option value="Kibende"><option value="Kibiro"><option value="Kiboga"><option value="Kibooto"><option value="Kibuku"><option value="Kibuye"><option value="Kibwa">
<option value="Kibwera"><option value="Kibwiza"><option value="Kichwamba"><option value="Kidoko"><option value="Kidumule-gomba"><option value="Kigalama"><option value="Kigarama"><option value="Kigorobya"><option value="Kihihi"><option value="Kihiihi"><option value="Kijoro">
<option value="Kijura"><option value="Kikagati"><option value="Kikolimbo"><option value="Kikonda"><option value="Kikonge"><option value="Kikorba"><option value="Kikube"><option value="Kikwanda">
<option value="Kilak"><option value="Kimaga"><option value="Kimuli"><option value="Kinena"><option value="Kinoni"><option value="Kira"><option value="Kira Town"><option value="Kirimbi"><option value="Kirongo"><option value="Kiru">
<option value="Kiruhura"><option value="Kiryabisooli"><option value="Kiryandongo"><option value="Kiryanga"><option value="Kiryanongo"><option value="Kisaru"><option value="Kisoro"><option value="Kiswera"><option value="Kitagata"><option value="Kitgum">
<option value="Kitgum Matidi"><option value="Kiti"><option value="Kitoba"><option value="Kitoma"><option value="Kitongore"><option value="Kiwawu"><option value="Kiyuya">
<option value="Kiziba"><option value="Koboi"><option value="Koboko"><option value="Kokeris"><option value="Koliri"><option value="Kotido"><option value="Kuluba">
<option value="Kumi"><option value="Kunswa"><option value="Kwapa"><option value="Kyamusakazi"><option value="Kyanasoke"><option value="Kyangwali"><option value="Kyankoko"><option value="Kyankwanzi">
<option value="Kyenjojo"> <option value="Kyotera"><option value="Laropi"><option value="Laufori"><option value="Lima"><option value="Lira"><option value="Lire">
<option value="Lobalangit"><option value="Lobe"><option value="Lodonga"><option value="Lokapel"><option value="Lokiragodo"><option value="Lokopo">
<option value="Lokung"><option value="Lolito"><option value="Lopei"><option value="Lorengedwat"><option value="Lori"><option value="Loro"><option value="Lothaa"><option value="Lotithan"><option value="Lotome"><option value="Loyoro">
<option value="Loyoroit"><option value="Lugaga"><option value="Lugazi"><option value="Lugbari"><option value="Lugologolo"><option value="Lukaya"><option value="Lukoma">
<option value="Lukwemigo"><option value="Lumnga"><option value="Lutoto"><option value="Luweero"><option value="Lwabiyata"><option value="Lwakhakha"><option value="Lwala"><option value="Lwamagaali"><option value="Lwamagwa"><option value="Lwamata">
<option value="Lwebisiriza"><option value="Lwebisya"><option value="Lwemiyaga"><option value="Lwengo"><option value="Lyamutundwe"><option value="Lyantonde">
<option value="Mabale"><option value="Madera"><option value="Madi Opei"><option value="Madu"><option value="Magamaga"><option value="Makole"><option value="Malaba"><option value="Mamba"><option value="Manafwa"><option value="Maracha">
<option value="Masaka"><option value="Masindi"><option value="Masindi Port"><option value="Masode"><option value="Matany"><option value="Mate"><option value="Matugga"><option value="Mayuge"><option value="Mazimasa">
<option value="Mbaali"><option value="Mbale"><option value="Mbarara"><option value="Mede"><option value="Mengo"><option value="Meri"><option value="Metu"><option value="Metuli"><option value="Midigo"><option value="Minakulu">
<option value="Mirama Hills"><option value="Mitoma"><option value="Mitooma"><option value="Mityana"><option value="Mocha"><option value="Moroto"><option value="Morulinga"><option value="Moya"><option value="Moyo"><option value="Mpanga"><option value="Mpigi">
<option value="Mpondwe"><option value="Mubende"><option value="Mucwini"><option value="Mugore"><option value="Mukono"><option value="Mungenyi"><option value="Mushanga"><option value="Mutai"><option value="Mutir"><option value="Mvepi"><option value="Mweya">
<option value="Mwizi"><option value="Naam Okoro"><option value="Naama"><option value="Nabiswera"><option value="Nabweyo"><option value="Nabyeso"><option value="Nadiang"><option value="Nagalama"><option value="Najjanankumbi"><option value="Nakaloke"><option value="Nakapelimoru"><option value="Nakasongola"><option value="Nakibungulia"><option value="Nakifuma"><option value="Nakiita"><option value="Nalweyo"><option value="Namabuga"><option value="Namalwa"><option value="Namba">
<option value="Naminage II"><option value="Namutumba"><option value="Napak"><option value="Nawanyago"><option value="Ndagga"><option value="Ndaiga">
<option value="Ndeke"><option value="Nebbi"><option value="New Hope"><option value="Ngai"><option value="Ngenge"><option value="Ngeta"><option value="Ngoma"><option value="Ngotokwe"><option value="Ngunyboke"><option value="Ngwedo"><option value="Nkaiza"><option value="Nkoko"><option value="Nkokonjeru"><option value="Nkondo"><option value="Noko"><option value="Nombe">
<option value="Nsambya"><option value="Nsika"><option value="Ntabwe"><option value="Ntale"><option value="Ntoroko"><option value="Ntunda"><option value="Ntungamo"><option value="Ntusi"><option value="Ntwetwe"><option value="Nwoya">
<option value="Nyabyeya"><option value="Nyamegita"><option value="Nyapea"><option value="Nyaravur"><option value="Obalang"><option value="Obongi">
<option value="Obulubulu"><option value="Ogur"><option value="Okolim"><option value="Okollo"><option value="Okomi"><option value="Okwangalete"><option value="Oleba">
<option value="Olelpek"><option value="Olevu"><option value="Omoro"><option value="Omugo"><option value="Onder"><option value="Ongako"><option value="Onigo"><option value="Onom"><option value="Opa"><option value="Oraba"><option value="Oreko"><option value="Orijini">
<option value="Orom"><option value="Orungo"><option value="Orwamuge"><option value="Otwal"><option value="Owaffa"><option value="Oweko"><option value="Pacego"><option value="Pader"><option value="Padibe">
<option value="Paicho"><option value="Paidha"><option value="Paimol"><option value="Pajule"><option value="Pakelle"><option value="Pakuba"><option value="Pakwach"><option value="Palabek"><option value="Palaro"><option value="Palenga"><option value="Pallisa">
<option value="Pamvara"><option value="Panyangara"><option value="Panyimur"><option value="Paraa"><option value="Pawel"><option value="Pawor"><option value="Paya">
<option value="Peta"><option value="Pirre"><option value="Purongo"><option value="Ragem"><option value="Rengen"><option value="Rigbo"><option value="Rubaare"><option value="Rubanda">
<option value="Rubaya"><option value="Rubirizi"><option value="Rugombe"><option value="Ruhaama"><option value="Rukoki"><option value="Rukungiri"><option value="Rumog">
<option value="Rupa"><option value="Rushenyi"><option value="Rwemikoma"><option value="Rwenshama"><option value="Sanje"><option value="Sembabule"><option value="Semuto"><option value="Serere"><option value="Sererer"><option value="Sipi">
<option value="Sironko"><option value="Soroti"><option value="Suam"><option value="Sunga"><option value="Tabagonyi"><option value="Tira"><option value="Tonya"><option value="Tororo">
<option value="Tuba"><option value="Uleppi"><option value="Unyama"><option value="Usuku"><option value="Utrutru"><option value="Utumbari"><option value="Uzu"><option value="Vukula"><option value="Waka"><option value="Wakiso">
<option value="Wandi"><option value="Wanseko"><option value="War"><option value="Wattuba"><option value="Wigweng"><option value="Wobulenzi"><option value="Wol">
<option value="Yenga"><option value="Yidu"><option value="Yumbe"><option value="Zapi"><option value="Zeu"><option value="Zigote"><option value="Zigoti"><option value="Zirobwe">
<option value="Zombo"></datalist>


<datalist id="districts">
<option value="Buikwe"><option value="Bukomansimbi"><option value="Butambala"><option value="Buvuma"><option value="Gomba"><option value="Kalangala"><option value="Kalungu"><option value="Kampala"><option value="Kayunga"><option value="Kiboga"><option value="Kyankwanzi"><option value="Luweero">
<option value="Lwengo"><option value="Lyantonde"><option value="Masaka"><option value="Mityana"><option value="Mpigi"><option value="Mubende"><option value="Mukono"><option value="Nakaseke"><option value="Nakasongola">
<option value="Rakai"><option value="Sembabule"><option value="Wakiso"><option value="Amuria"><option value="Budaka"><option value="Bududa">
<option value="Bugiri"><option value="Bukedea"><option value="Bukwa"><option value="Bulambuli"><option value="Busia"><option value="Butaleja"><option value="Buyende"><option value="Iganga"><option value="Jinja">
<option value="Kaberamaido"><option value="Kaliro"><option value="Kamuli"><option value="Kapchorwa"><option value="Katakwi"><option value="Kibuku">
<option value="Kumi"><option value="Kween"><option value="Luuka"><option value="Manafwa"><option value="Mayuge"><option value="Mbale"><option value="Namayingo">
<option value="Namutumba"><option value="Ngora"><option value="Pallisa"><option value="Serere"><option value="Sironko"><option value="Soroti">
<option value="Tororo"><option value="Abim"><option value="Adjumani"><option value="Agago"><option value="Alebtong"><option value="Amolatar">
<option value="Amudat"><option value="Amuru"><option value="Apac"><option value="Arua"><option value="Dokolo"><option value="Gulu"><option value="Kaabong">
<option value="Kitgum"><option value="Koboko"><option value="Kole"><option value="Kotido"><option value="Lamwo"><option value="Lira">
<option value="Maracha"><option value="Moroto"><option value="Moyo"><option value="Nakapiripirit"><option value="Napak"><option value="Nebbi">
<option value="Nwoya"><option value="Oyam"><option value="Pader"><option value="Yumbe"><option value="Zombo"><option value="Buhweju"><option value="Buliisa"><option value="Bundibugyo"><option value="Bushenyi"><option value="Hoima">
<option value="Ibanda"><option value="Isingiro"><option value="Kabale"><option value="Kamwenge"><option value="Kanungu">
<option value="Kasese"><option value="Kibaale"><option value="Kiruhura"><option value="Kiryandongo"><option value="Kisoro"><option value="Kyegegwa"><option value="Kyenjojo"><option value="Masindi"><option value="Mbarara"><option value="Mitooma"><option value="Ntoroko">
<option value="Ntungamo"><option value="Rubirizi"><option value="Rukungiri">
<option value="Sheema"></datalist>
