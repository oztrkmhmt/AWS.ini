<?php require APPROOT . '/views/inc/header.php' ; ?>
<link rel="stylesheet" href="../css/style.css">

<!-- Display Content IF NO Error -->
<?php if(empty($_SESSION['logindetails']['errorMessage']) && empty($_SESSION['policyScreen']['errorMessage'])){ ?>
<div id="wrapper">
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Header-->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 style="color:lightslategrey">ASM Ürünü Teklif İşlemi</h5>
                </div>
                <!-- Show Product Detail-->
                <div class="card-body">
                    <form id="form_abonman" action="" method="post">
                        <div style="float: left; width: 32.5% !important">
                            <fieldset  class="product_border fieldsetClass">
                                <legend class="product_border">Genel Bilgiler ( Abonman )</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="sigorta_Ettiren" >Sigorta Ettiren : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_abon_1" id="edt_abon_1" value='<?php echo($_SESSION['policyScreen']['sie_must']['must_unvani']) ?>' readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="sigortali">Sigortalı : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" title="Dikkat" data-toggle="popover"  data-placement="top" data-content="Arama yapabilmek için yan taraftaki arama iconunun üzerine tıklayınız !" data-trigger="hover" name="edt_abon_2" id="edt_abon_2" type="text" <?php if(isset($_SESSION['customerDetails']['must_kod'])){ ?> value='<?php echo(($_SESSION['customerDetails']['must_kod'])); ?>'
                                                <?php } ?> placeholder="Müşteri No" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor" data-toggle="modal" data-target="#tcknoModal"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="hidden" class="form-control form-control-sm is-valid" id="" value='' readonly>
                                            <?php if(isset($_SESSION['customerDetails']['must_kod'])){ ?>
                                            <div class="valid-feedback">
                                               <?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['adi']) ?> <?php echo($_SESSION['customerDetails']['kimlik_bilgisi']['soyadi']) ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="police_cinsi">Poliçe Cinsi : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_abon_3" id="edt_abon_3" value='<?php echo($_SESSION['policyScreen']['police_cinsi']) ?>' readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="islem_yapilan_acente">İşlem Yapılan Acente : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_abon_4" id="edt_abon_4" value='<?php echo($_SESSION['policyScreen']['acn_must']['must_unvani']) ?>' readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="abonman_flotan_no">Abonman / Flotan No : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_abon_5" id="edt_abon_5" value='' readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teklif_tarihi">Teklif Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" name="teklif_tarihi" id="teklif_tarihi" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_datepicker();" class="input-group-text cursor"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="tanzim_tarihi">Tanzim Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" name="tanzim_tarihi"  id="tanzim_tarihi" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_tanzim();" class="input-group-text cursor"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yükleme_tarihi">Yükleme Tarihi : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" name="yukleme_tarihi"  id="yukleme_tarihi" type="text" value="" readonly>
                                            <div class="input-group-append">
                                                <span onclick="show_yükleme();" class="input-group-text cursor"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="döviz_cinsi_kuru" >Döviz Cinsi/Kuru : </label>
                                        <select <?php foreach($_SESSION['policyScreen']['doviz_kurlari'] as $key => $value) ?> name="doviz_cinsi" id="doviz_cinsi" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['doviz_kurlari'] as $doviz_kurlari) {
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $doviz_kurlari['doviz_kodu'] ?>" value="<?= $doviz_kurlari['doviz_kodu'] ?>"><?= $doviz_kurlari['doviz_kodu']  ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="ist_bil" style="display:inline-block;margin-left: 1.3% !important; width: 32.5% !important">
                            <fieldset  class="product_border fieldsetClass">
                                <legend class="product_border">İstatistik Bilgiler</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="teminat_tipi" >Teminat Tipi : </label>
                                        <select id="edt_ist_TDG" name="edt_ist_TDG" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $teminat_tipi) {
                                                    if($teminat_tipi['ist_adi'] == "Teminat Tipi"){
                                                    foreach($teminat_tipi['ist_deger_tab'] as $key => $teminat_tipiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $teminat_tipiList['deger_kod'] ?>" value="<?= $teminat_tipiList['deger_adi'] ?>"><?= $teminat_tipiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="emtea_cinsi">Emtea Cinsi : </label>
                                        <div class="input-group mb-1">
                                            <select id="edt_ist_EMK" name="edt_ist_EMK" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $emtea_cinsi) {
                                                    if($emtea_cinsi['ist_adi'] == "Emtia Cinsi"){
                                                    foreach($emtea_cinsi['ist_deger_tab'] as $key => $emtea_cinsiList){ 
                                                    $selected='273';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $emtea_cinsiList['deger_kod'] ?>" value="<?= $emtea_cinsiList['deger_adi'] ?>"><?= $emtea_cinsiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="tasima_türü" >Taşıma Türü : </label>
                                        <select id="edt_ist_TT7" name="edt_ist_TT7" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $tasima_turu) {
                                                    if($tasima_turu['ist_adi'] == "Taşima Türü"){
                                                    foreach($tasima_turu['ist_deger_tab'] as $key => $tasima_turuList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $tasima_turuList['deger_kod'] ?>" value="<?= $tasima_turuList['deger_adi'] ?>"><?= $tasima_turuList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="ilave_bedel">İlave Bedel : </label>
                                        <div class="input-group mb-1">
                                            <select id="edt_ist_IBO" name="edt_ist_IBO" class="custom-select custom-select-sm">
                                                <?php
                                                    foreach($_SESSION['policyScreen']['police_ist'] as $ilave_bedel) {
                                                        if($ilave_bedel['ist_adi'] == "İlave Bedel Orani"){
                                                        foreach($ilave_bedel['ist_deger_tab'] as $key => $ilave_bedelList){ 
                                                        $selected='';
                                                        if ($key==$selected){
                                                            $selected='selected="selected"';
                                                        }else{
                                                            $selected='';
                                                        }
                                                        ?>
                                                <option <?php echo($selected) ?>id="<?= $ilave_bedelList['deger_kod'] ?>" value="<?= $ilave_bedelList['deger_adi'] ?>"><?= $ilave_bedelList['deger_adi']  ?></option>
                                                <?php
                                                    }}}
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="yurtici_yurtdisi">Yurtiçi-Yurtdışı : </label>
                                        <select id="edt_ist_YIY" name="edt_ist_YIY" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $yurticdis) {
                                                    if($yurticdis['ist_adi'] == "Yurt İçi-Y.Dişi"){
                                                    foreach($yurticdis['ist_deger_tab'] as $key => $yurticdisList){ 
                                                    $selected='1';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $yurticdisList['deger_kod'] ?>" value="<?= $yurticdisList['deger_adi'] ?>"><?= $yurticdisList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="kalkis_ulkesi">Kalkış Ülkesi : </label>
                                        <select id="edt_ist_BAU" name="edt_ist_BAU" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $policeDetail) {
                                                    if($policeDetail['ist_adi'] == "Kalkış Ülkesi"){
                                                    foreach($policeDetail['ist_deger_tab'] as $key => $policeList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $policeList['deger_kod'] ?>" value="<?= $policeList['deger_adi'] ?>"><?= $policeList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="kalkis_ili">Kalkış İli : </label>
                                        <select id="edt_ist_BIL" name="edt_ist_BIL" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $kalkis_ili) {
                                                    if($kalkis_ili['ist_adi'] == "Kalkiş İli"){
                                                    foreach($kalkis_ili['ist_deger_tab'] as $key => $kalkis_iliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $kalkis_iliList['deger_kod'] ?>" value="<?= $kalkis_iliList['deger_adi'] ?>"><?= $kalkis_iliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="varis_ulkesi">Varış Ülkesi : </label>
                                        <select id="edt_ist_BTU" name="edt_ist_BTU" data-toggle="popover" data-placement="top" data-content="Bu alan seçilmesi zorunludur !" data-trigger="hover" class="custom-select custom-select-sm" required>
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $kalkis_ili) {
                                                    if($kalkis_ili['ist_adi'] == "Variş Ülkesi"){
                                                    foreach($kalkis_ili['ist_deger_tab'] as $key => $kalkis_iliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?> id="<?= $kalkis_iliList['deger_kod'] ?>" value="<?= $kalkis_iliList['deger_adi'] ?>"><?= $kalkis_iliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="varis_ili" >Varış İli : </label>
                                        <select id="edt_ist_BIS" name="edt_ist_BIS" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $varisIli) {
                                                    if($varisIli['ist_adi'] == "Variş İli"){
                                                    foreach($varisIli['ist_deger_tab'] as $key => $varisIliList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $varisIliList['deger_kod'] ?>" value="<?= $varisIliList['deger_adi'] ?>"><?= $varisIliList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="ambalaj_cinsi">Ambalaj Cinsi : </label>
                                        <select id="edt_ist_AMC" name="edt_ist_AMC" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $amb_cinsi) {
                                                    if($amb_cinsi['ist_adi'] == "Ambalaj Cinsi"){
                                                    foreach($amb_cinsi['ist_deger_tab'] as $key => $amb_cinsiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $amb_cinsiList['deger_kod'] ?>" value="<?= $amb_cinsiList['deger_adi'] ?>"><?= $amb_cinsiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="gemi_imo_no" >Gemi İMO No : </label>
                                        <select id="edt_ist_GEM" name="edt_ist_GEM" class="custom-select custom-select-sm">
                                            <?php
                                                foreach($_SESSION['policyScreen']['police_ist'] as $gemi_adi) {
                                                    if($gemi_adi['ist_adi'] == "Gemi Adi/Imo"){
                                                    foreach($gemi_adi['ist_deger_tab'] as $key => $gemi_adiList){ 
                                                    $selected='';
                                                    if ($key==$selected){
                                                        $selected='selected="selected"';
                                                    }else{
                                                        $selected='';
                                                    }
                                                    ?>
                                            <option <?php echo($selected) ?>id="<?= $gemi_adiList['deger_kod'] ?>" value="<?= $gemi_adiList['deger_adi'] ?>"><?= $gemi_adiList['deger_adi']  ?></option>
                                            <?php
                                                }}}
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button style="float: right !important" onclick="policyScreen_Stringfy();" id="ist_btn" type="button" class="btn btn-secondary btn-sm">Kontrol Et</button>
                            </fieldset>
                        </div>
                        <div id="matbu_bil" style="float:right; width: 32.5% !important">
                            <fieldset class="product_border fieldsetClass">
                                <legend class="product_border">Matbu Bilgiler</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="kalkis_yeri" >Kalkış Yeri : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_4" id="edt_matbu_4" value="" readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="varis_yeri">Varış Yeri : </label>
                                        <div class="input-group mb-1">
                                            <input class="form-control form-control-sm" name="edt_matbu_7" id="edt_matbu_7" type="text" value="BERLİN" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="emtea_aciklama">Emtea Açıklama : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_11" id="edt_matbu_11" value="C" readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="vasita_cinsi">Vasıta Cinsi : </label>
                                        <input type="text" class="form-control form-control-sm" id="edt_matbu_13" name="edt_matbu_13" value="" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="adet">Adet : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_22" id="edt_matbu_22" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="agirlik">Ağırlık : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_24" id="edt_matbu_24" value="" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="kalkis_yeri_ing">Kalkış Yeri (İNG.) : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_8" id="edt_matbu_8" value="" readonly>
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="varis_yeri_ing">Varış Yeri (İNG.) : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_9" id="edt_matbu_9" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="emtea_aciklama_ing">Emtea Açıklama (İNG.) : </label>
                                        <input type="text" class="form-control form-control-sm" name="edt_matbu_12" id="edt_matbu_12" value="" readonly>
                                    </div>
                                </div>
                                <br>
                                <button style="float: right !important; margin-top: 14% !important" id="matbu_btn" type="submit" class="btn btn-secondary btn-sm">Kontrol et</button>
                            </fieldset>
                        </div>
                        <div id="teminat_div" style="float: left; width: 32.5% !important">
                            <fieldset class="product_border">
                                <legend class="product_border">TEMİNATLAR</legend>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="tem_icca">I.C.C.(A) : </label>
                                        <input class="form-control form-control-sm" name="edt_tem_2" id="edt_tem_2" type="number" onkeydown="return event.keyCode !== 69" value="100.000" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="tem_iccair">I.C.C.(AİR) : </label>
                                        <input type="number" class="form-control form-control-sm" onkeydown="return event.keyCode !== 69" name="edt_tem_3" id="edt_tem_3" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="tem_iccc">I.C.C.(C) : </label>
                                        <input type="number" class="form-control form-control-sm" onkeydown="return event.keyCode !== 69" name="edt_tem_4" id="edt_tem_4" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="grev">GREV : </label>
                                        <input type="number" class="form-control form-control-sm" onkeydown="return event.keyCode !== 69" name="edt_tem_5" id="edt_tem_5" value="" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-1">
                                        <label for="harp_grev">HARP/GREV (Abonman Teminat) : </label>
                                        <input type="number" class="form-control form-control-sm" onkeydown="return event.keyCode !== 69" name="edt_tem_6" id="edt_tem_6" value="" >
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2 mb-1">
                                <div class="input-group mb-1" id="inputIcon"></div>
                            </div>
                            <div id="result"></div>
                        </div>
                        <br>
                        <div class="form-row align-items-center" id="showLength"></div>
                        <div id="policyTextDiv"></div>

                        <div class="form-row">
                            <div class="col-md-2 mb-1">
                                <div id="inptDiv">
                                </div>
                            </div>
                        </div>
                        Result:
                         <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>  
                        <?php
                            print_r($_SESSION['env']['links'][$_SESSION['env']['db_type']]['fnc_search_cust']);
                            echo "<pre>";
                            var_dump($_SESSION);
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{} ?>
<?php Modal::GetModal('Müşteri Arama','tcknoModal','kimlikno')?>
<?php AlertModal::GetAlertModal('Dikkat !','istAlertModal','Zorunlu Alanlarda Lütfen Seçim Yapınız.','#721c24','white','white')?>
<?php Autocomplete::AutoComp(); ?>
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery/jquery-editable-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">

<script>

$( function() {
    function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#log" ).scrollTop( 0 );
    }
    $( "#inptDiv" ).autocomplete({
        source: getShipNames,
        autoFocus: true,
        minLength: 3,
        select: function( event, ui ) {
            log( "Selected: " + ui.item.value );
        }
    });
    console.log(getShipNames);
  } );

</script>

<!-- Create Element Editable-Select-->
<script>
    var myParent = document.getElementById("inptDiv");

    EditablePolicyScreen = '<?php echo json_encode($_SESSION['policyScreen']) ?>'; // Get JSON
    EditableJsonObject = JSON.parse(EditablePolicyScreen); // JSON Parse
   
    //Create and append select list
    var selectList = document.createElement("select");

    myParent.appendChild(selectList);
    myParent.setAttribute("class","custom-select custom-select-sm authComp-select");

    //Create and append the options
    for (var i = 0; i < EditableJsonObject.police_ist.length; i++) {
        var option = document.createElement("option");
        option.value = EditableJsonObject.police_ist[i].ist_adi;
        option.text = EditableJsonObject.police_ist[i].ist_adi;
        selectList.appendChild(option);
    }
</script>


<!-- Call Editable-Select-->
<script>
    $('.authComp-select').editableSelect();
</script>

<!-- Create Element Input Field with Icon-->
<script>
    var xInp = document.createElement("INPUT");
    var yDiv = document.createElement("Div");
    var sp = document.createElement("Span");
    var i = document.createElement("i");

    document.getElementById("inputIcon").appendChild(xInp);
    document.getElementById("inputIcon").appendChild(yDiv);
    yDiv.appendChild(sp);
    sp.appendChild(i);

    xInp.setAttribute("type", "text");
    //xInp.setAttribute("value", "DenemeAppend");
    xInp.setAttribute("id", "Inp_icon_id");
    xInp.setAttribute("class", "form-control form-control-sm");
    yDiv.setAttribute("class","input-group-append");
    sp.setAttribute("class","input-group-text cursor");
    i.setAttribute("class","fas fa-search");

        //Get Input Text Value
        const $InpSource = document.querySelector('#Inp_icon_id');
        const $result = document.querySelector('#result');

        const typeHandler = function(e) {
            $result.innerHTML = e.target.value;
        }

        $InpSource.addEventListener('input', typeHandler);
        $InpSource.addEventListener('propertychange', typeHandler);

</script>

<!-- Create Element Dynamically From Web API-->
<script type="text/javascript">

    var myDiv = document.getElementById("showLength");

    json_PolicyScreen = '<?php echo json_encode($_SESSION['policyScreen']) ?>'; //Get JSON
    json_object = JSON.parse(json_PolicyScreen); // JSON Parse
    
    for(var j=0; j<json_object.police_ist.length; j++){ //Loop For Get Values
        if(json_object.police_ist[j].is_browsable=='1'){
            var istDegerTabs = json_object.police_ist[j].ist_deger_tab;
            my_div=document.createElement('Div'); //Create Div for Width of Input
            var label = document.createElement("label"); //Create Label
            var selectList = document.createElement("select"); //Create Select
    
            //Set Attributes
            my_div.setAttribute("class","col-sm-4 col-md-4 col-lg-2 mb-1"); //Div Width
            my_div.appendChild(label);
            label.innerHTML = (json_object.police_ist[j].ist_adi + " : ") ; //InnerHTML Label
            my_div.appendChild(selectList);
            myDiv.appendChild(my_div);
            selectList.setAttribute("id", json_object.police_ist[j].ist_adi);
            selectList.setAttribute("class","custom-select custom-select-sm");
            selectList.setAttribute("style","height: calc(1em + 0.5rem + 2px) !important");
            
            //Create and append the Options
            for (var i = 0; i < istDegerTabs.length; i++) {
                var option = document.createElement("option");
                option.setAttribute("value", istDegerTabs[i].deger_adi);
                option.setAttribute("id", istDegerTabs[i].deger_kod);
                //Set Selected
                if(istDegerTabs[i].is_selected == '1'){
                    option.setAttribute("selected",istDegerTabs[i].deger_adi);
                }
                option.text = istDegerTabs[i].deger_adi;
                selectList.appendChild(option);
            } 
        }    
    }

    $('select').on('change', function() {
    for(var s=0; s<json_object.police_ist.length; s++){ //Loop For Get Values
        var selected_value = $(this).children(":selected").attr("value");
        var selected_ids = $(this).children(":selected").attr("id");
        var selectCompId = $(this).attr("id");

            var policeDegerTabs = json_object.police_ist[s].ist_deger_tab;
            for(var g = 0; g < policeDegerTabs.length; g++) {
                if(policeDegerTabs[g].deger_adi == selected_value && json_object.police_ist[s].ist_adi == selectCompId){
                    json_object.police_ist[s].selected_deger_kod = selected_ids; 
                }
            }
        }
        alert(selected_ids);
    });
    function policyScreen_Stringfy(){
        json_PolicyScreen = JSON.stringify(json_object);
        document.getElementById("policyTextDiv").innerHTML = json_PolicyScreen;
    }

</script>

<!-- Border Style and Popover-->
<script>

    document.getElementById('edt_ist_TDG').style.borderColor='tomato';
    document.getElementById('edt_ist_BTU').style.borderColor='tomato';
    document.getElementById('edt_ist_TT7').style.borderColor='tomato';
    document.getElementById('edt_ist_EMK').style.borderColor='tomato';
    document.getElementById('edt_ist_YIY').style.borderColor='tomato';
    document.getElementById('edt_ist_BAU').style.borderColor='tomato';

    $('#edt_ist_TDG').on('click', function() {
        document.getElementById('edt_ist_TDG').style.borderColor='#ced4da';
        $("#edt_ist_TDG").popover('disable');
    });
    $('#edt_ist_BTU').on('click', function() {
        document.getElementById('edt_ist_BTU').style.borderColor='#ced4da';
        $("#edt_ist_BTU").popover('disable');
    });
    $('#edt_ist_TT7').on('click', function() {
        document.getElementById('edt_ist_TT7').style.borderColor='#ced4da';
        $("#edt_ist_TT7").popover('disable');
    });
    $('#edt_ist_EMK').on('click', function() {
        document.getElementById('edt_ist_EMK').style.borderColor='#ced4da';
        $("#edt_ist_EMK").popover('disable');
    });
    $('#edt_ist_YIY').on('click', function() {
        document.getElementById('edt_ist_YIY').style.borderColor='#ced4da';
        $("#edt_ist_YIY").popover('disable');
    });
    $('#edt_ist_BAU').on('click', function() {
        document.getElementById('edt_ist_BAU').style.borderColor='#ced4da';
        $("#edt_ist_BAU").popover('disable');
    });
    $('select').on('change', function() {
        var id = $(this).children(":selected").attr("id");
    });
</script>

<!-- Call Popover-->
<script>
    $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
    });
</script>
<script>
    $('select').on('change', function() {
        $("select option:not(:selected)").removeClass("selected");
        $("select option:selected").addClass("selected");
    });
</script>

<!-- Create Element Dynamically From Web API-->
<script>
    $('select').on('change', function() {
        $("#matbu_bil").css("display", "none");
        $("#teminat_div").css("display", "none");
    });
</script>
<script>
    $('input').bind('input', function() { 
    if($(this).val() == ''){
        $("#teminat_div").css("display", "none");
    };
});
</script>

<!-- Get Value of Elements-->    
<script>
    var bauVal = $("#edt_ist_BAU").val();
    $("#edt_matbu_4").val(bauVal);
    $("#edt_matbu_8").val(bauVal);

    $('#edt_ist_BAU').on('change', function() {
        var getVal = this.value ;
        $("#edt_matbu_4").val(getVal);
        $("#edt_matbu_8").val(getVal);
    });
</script>
<script>
    var btuVal = $("#edt_ist_BTU").val();
    $("#edt_matbu_7").val(btuVal);
    $("#edt_matbu_9").val(btuVal);

    $('#edt_ist_BTU').on('change', function() {
        var getVal = this.value ;
        $("#edt_matbu_7").val(getVal);
        $("#edt_matbu_9").val(getVal);
    });
</script>
<script>
    var emkVal = $("#edt_ist_EMK").val();
    $("#edt_matbu_11").val(emkVal);
    $("#edt_matbu_12").val(emkVal);

    $('#edt_ist_EMK').on('change', function() {
        var getVal = this.value ;
        $("#edt_matbu_11").val(getVal);
        $("#edt_matbu_12").val(getVal);

    });
</script>

<!-- Set Datepickers-->    
<script>
    $( function() {
      $( "#teklif_tarihi" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
       $("#teklif_tarihi").datepicker("setDate", new Date());
    } );
</script>

<script>
    $( function() {
      $( "#tanzim_tarihi" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
      $("#tanzim_tarihi").datepicker("setDate", new Date());

    } );
</script>
<script>
    $( function() {
      $( "#yukleme_tarihi" ).datepicker({
        monthNames: ['Ocak', 'Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
        dayNamesMin: ['Pa','Pt','Sl','Çar','Perş','Cu','Ct'],
        firstday:1,
        dateFormat: 'dd/mm/yy'
      });
      $("#yukleme_tarihi").datepicker("setDate", new Date());

    } );
</script>
<script>
    function show_datepicker(){
        $('#teklif_tarihi').datepicker('show');
    }
</script>
<script>
    function show_tanzim(){
        $('#tanzim_tarihi').datepicker('show');
    }
</script>
<script>
    function show_yükleme(){
        $('#yukleme_tarihi').datepicker('show');
    }
</script>

<?php require APPROOT . '/views/inc/footer.php' ; ?>
<!-- Display Error Message When Error Occured -->
<div id="errorDiv" class="alert alert-danger" role="alert">
    <h6 class="alert-heading">Dikkat !</h6>
    <?php echo $_SESSION['policyScreen']['errorMessage'] ?>
</div>
<script>
    <?php if(empty($_SESSION['policyScreen']['errorMessage']) && empty($_SESSION['logindetails']['errorMessage'])){ ?>
        document.getElementById("errorDiv").style.visibility = "hidden";
    <?php }else{ ?>
        document.getElementById("errorDiv").style.visibility = "none";
    <?php }; ?>
</script>

<!-- Sigortalı Value --> <!-- Empty ? --> <!-- Display None -->
<script>
    $("#edt_abon_2").on("change paste keyup", function() {
    var sigortaliVal = $(this).val();
    if(sigortaliVal == ""){
        $("#matbu_bil").css("display", "none");
        $("#teminat_div").css("display", "none");
    } 
    });
</script>
<!-- Matbu Bilgileri Show/Hide-->
<script>
    $("#matbu_bil").css("display","none");
        $("#ist_btn").click(function(){        
            if(document.getElementById('edt_ist_TDG').style.borderColor!='tomato' && document.getElementById('edt_ist_EMK').style.borderColor!='tomato' && document.getElementById('edt_ist_TT7').style.borderColor!='tomato' && document.getElementById('edt_ist_YIY').style.borderColor!='tomato' && document.getElementById('edt_ist_BAU').style.borderColor!='tomato' && document.getElementById('edt_ist_BTU').style.borderColor!='tomato') {
            $("#matbu_bil").css("display", "inline-block");
        }
    });
  
    
</script>
<!-- Teminat Bilgileri Show/Hide-->
<script>
    $("#teminat_div").css("display", "none");
    $("#matbu_btn").click(function(){                       
        if($("#edt_matbu_13").val() != '' && $("#edt_matbu_22").val() != '' && $("#edt_matbu_24").val() != ''){
        var showDiv = 1;
        if(showDiv = 1){
            $("#teminat_div").css("display", "inline-block");
            $('html,body').animate({
                scrollTop: $("#teminat_div").offset().top},
                'slow');
        }else{
            $("#teminat_div").css("display", "none");
            }
        }
    });

</script>
