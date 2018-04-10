<?php
/**
 *
 * Template Name: Test Page
 *
 *
 * @package
 */
 get_header();
    ?>
  <script src='https://www.google.com/recaptcha/api.js'></script>;  
 <div class="full-screan">  

     <div class="isp-new-section"  >
         <h2 class="center color-isp">Заявка на подключение</h2>
<!-- <div class="flex-list-block">
    <div class="flex-list-block--element">
<span class=" icon-circle--mini">1</span>
<div class="flex-list-block--element">
</div>
<span class=" icon-circle--mini">2</span>
<div class="flex-list-block--element">
</div>
<span class=" icon-circle--mini">3</span>
<div class="flex-list-block--element">
</div>
<span class=" icon-circle--mini">4</span>
<div class="flex-list-block--element">
</div>
<span class=" icon-circle--mini">5</span>
<div class="flex-list-block--element">
</div>
<span class=" icon-circle--mini">11</span>
</div>
</div> -->
        <div class="forms-connect">
        <form onsubmit="return false">
            <input class="" name="action" type="hidden" value="54321" />
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label   class="mdl-textfield__label mdl-color-text--grey" for="textfield_new_username1">Фамилия ( обязательное поле )</label>
                <input id="textfield_username1"   class="mdl-textfield__input" name="name1" pattern="^[ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ йцукенгшщзхфывапролджячсмитьбю ]{1,50}$" value="" type="text" />
                        <span class="mdl-textfield__error">На русском языке</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label class="mdl-textfield__label mdl-color-text--grey" for="textfield_new_username2">Имя ( обязательное поле )</label>
                <input id="textfield_username2"   class="mdl-textfield__input" name="name2" pattern="^[ЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ йцукенгшщзхфывапролджячсмитьбю ]{1,50}$" type="text" />
                        <span class="mdl-textfield__error">На русском языке</span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label class="mdl-textfield__label mdl-color-text--grey" for="textfield_new_username3">Отчество</label>
                <input id="textfield_username3" class="mdl-textfield__input" name="name3" pattern="^[а-яА-Я ]{1,50}$" type="text" />
                        <span class="mdl-textfield__error">На русском языке</span>
            </div>
        <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label class="mdl-textfield__label mdl-color-text--grey" for="textfield_telefon">Телефон ( обязательное поле )</label>
                <input id="textfield_telefon" class="mdl-textfield__input" name="telefon" pattern="^[\+]?[ ]*[0-9]?[ ]*(\([0-9 ]{2,5}\))?[0-9 \-]{5,50}$" type="text" />
                        <span class="mdl-textfield__error">формат: +7(xxx) xxx xx xx </span>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label class="mdl-textfield__label mdl-color-text--grey" for="textfield_email">E-mail</label>
                <input id="textfield_email" class="mdl-textfield__input" name="Email" pattern="^[a-zA-Z_.]{1,50}@[a-zA-Z_\-]{1,50}.[a-zA-Z_.\-]{1,50}$" type="email" />
                        <span class="mdl-textfield__error">формат: petro@mail.ru</span>
            </div>
        <br><br>
        <div id="recaptcha" class="g-recaptcha" data-sitekey="6LdYSDgUAAAAAIU8SDAO19CEfTahg1_I7W3Lp-Xf" data-callback="onSubmitReCaptcha" data-size="invisible"></div>

        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox">
        <input type="checkbox" id="checkbox" class="mdl-checkbox__input">
        <span class="mdl-checkbox__label">С обработкой персональных данных согласен</span>
        </label>
     
        <br>


        <br>
                <button id="login" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--raised mdl-button--colored">Отправить Заявку</button>
        <br><br>
        <span id="b" class="mdl-color-text--accent"></span>
        </form>

        </div>

<script type='text/javascript'>
function onSubmitReCaptcha(token) {
  var idForm='messageForm';
    console.log(grecaptcha.getResponse());
  var data = {
                    'name1': jQuery('#textfield_username1').val(),
                    'name2': jQuery('#textfield_username2').val(),
                    'name3': jQuery('#textfield_username3').val(),
                    'telefon': jQuery('#textfield_telefon').val(),
                    'email': jQuery('#textfield_email').val(),
                    'g-recaptcha-response': grecaptcha.getResponse()
                    };
                jxAction('connect_action', data, function(v){
                    if ('backwards' in v) {
                        jQuery('#b').text( v.backwards);
                        jQuery('.mdl-button').off('click');
                        // alert("Backwards = " + v.backwards);
                    }else{
                        jQuery('#b').text( v.error);
                    }
                });

//  sendForm(document.getElementById(idForm),'/feedback/process.php');
}
jQuery(document).ready(function(){
    
    jQuery('#checkbox').on('click', function(){
        console.log(jQuery('#textfield_username1').attr('required'));
        console.log(jQuery('#checkbox').prop('checked'));
        if ( jQuery('#checkbox').prop('checked') == false  ){
            jQuery('#textfield_username1').removeAttr("required");
            jQuery('#textfield_username2').removeAttr("required");
            jQuery('#textfield_telefon').removeAttr("required");

        }else{
            jQuery('#textfield_username1').attr('required', 'required');
            jQuery('#textfield_username2').attr('required', 'required');
            jQuery('#textfield_telefon').attr('required', 'required');            
        }
        console.log(jQuery('#textfield_username1').attr('required'));


    });

    jQuery('.mdl-button').on('click', function(){
        // document.querySelectorAll('input[type="text"]:valid'); 
        // $('#textfield_username1').attr('required', 'required');
        // console.log("Клик по ссылке ");
        // console.log( jQuery('#checkbox').val() );
        // console.log(  jQuery('#textfield_username1').val() );
        // alert("checkbox = " + jQuery('#textfield_username1').val());
        // alert("checkbox = " + jQuery('#checkbox').val()) +jQuery('#textfield_username1').val();
        if ( jQuery('#checkbox').prop('checked') == false  ) {
            jQuery('#b').text("Для регистрации заявки, подтвердите согласие на обработку персональных данных");
        }else{
            if (jQuery('#textfield_username1').val() =='' || jQuery('#textfield_username2').val() =='' || jQuery('#textfield_telefon').val() =='' ){
                jQuery('#b').text("Заполните обязательные элементы");
            }else{
                grecaptcha.execute();
                jQuery('#b').text("Отправляем заявку");
                // var data = {
                //     'name1': jQuery('#textfield_username1').val(),
                //     'name2': jQuery('#textfield_username2').val(),
                //     'name3': jQuery('#textfield_username3').val(),
                //     'telefon': jQuery('#textfield_telefon').val(),
                //     'email': jQuery('#textfield_email').val()
                //     };
                // jxAction('connect_action', data, function(v){
                //     if ('backwards' in v) {
                //         jQuery('b').text( v.backwards);
                //         jQuery('.mdl-button').off('click');
                //         // alert("Backwards = " + v.backwards);
                //     }else{
                //         jQuery('b').text( v.error);
                //     }
                // });

            }
        }


        // return false;
    });

});
</script>


      </div>

</div>
<?php get_footer(); ?>
